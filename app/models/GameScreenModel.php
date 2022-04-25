<?php

/**
 * Class GameScreenModel
 */ 
class GameScreenModel extends \Asatru\Database\Model 
{
    const FILE_IDENT = 'imgfile';
    const SCREENSHOT_PACK_LIMIT = 12;

    /**
     * Store screenshot from game
     * 
     * @return void
     */
    public static function store()
    {
        try {
            if ($_FILES[self::FILE_IDENT]['error'] !== UPLOAD_ERR_OK) {
                throw new Exception('File upload error: ' . $_FILES[self::FILE_IDENT]['error']);
            }

            $newName = md5(random_bytes(55) . date('Y-m-d H:m:i'));
            move_uploaded_file($_FILES[self::FILE_IDENT]['tmp_name'], public_path() . '/img/screenshots/' . $newName . '.bmp');

            list($width, $height) = getimagesize(public_path() . '/img/screenshots/' . $newName . '.bmp');
            $thumb = imagecreatetruecolor(500, 300);
            $source = imagecreatefrombmp(public_path() . '/img/screenshots/' . $newName . '.bmp');
            imagecopyresized($thumb, $source, 0, 0, 0, 0, 500, 300, $width, $height);
            imagebmp($thumb, public_path() . '/img/screenshots/' . $newName . '_thumb.bmp');

            GameScreenModel::raw('INSERT INTO ' . self::tableName() . ' (screenshot, thumb, steamId, posted_on_twitter) VALUES(?, ?, ?, ?);', [
                $newName . '.bmp',
                $newName . '_thumb.bmp',
                isset($_GET['steamid']) ? $_GET['steamid'] : '',
                false
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Query screenshots
     * 
     * @param $fromIndex
     * @return mixed
     * @throws Exception
     */
    public static function query($fromIndex = null)
    {
        try {
            if (($fromIndex !== null) && (is_numeric($fromIndex))) {
                $query = GameScreenModel::where('id', '<', $fromIndex)->orderBy('id', 'desc')->limit(env('APP_SCREENSHOTLIMIT', self::SCREENSHOT_PACK_LIMIT));
            } else {
                $query = GameScreenModel::orderBy('id', 'desc')->limit(env('APP_SCREENSHOTLIMIT', self::SCREENSHOT_PACK_LIMIT));
            }

            $data = $query->get();
            $result = array();

            for ($i = 0; $i < $data->count(); $i++) {
                $item = $data->get($i);

                $cur = array();
                $cur['id'] = $item->get('id');
                $cur['screenshot'] = $item->get('screenshot');
                $cur['thumb'] = $item->get('thumb');
                $cur['steamId'] = $item->get('steamId');
                $cur['posted_on_twitter'] = $item->get('posted_on_twitter');
                $cur['created_at'] = $item->get('created_at');

                try {
                    $cur['profile'] = GameScreenModel::querySteamUser($cur['steamId']);
                } catch (Exception $e) {
                    $cur['profile'] = array();
                    $cur['profile']['personaname'] = 'N/A';
                    $cur['profile']['avatar'] = asset('img/avatar.png');
                }

                $cur['diff'] = (new Carbon($cur['created_at']))->diffForHumans();

                $result[] = $cur;
            }
            
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Post a screenshot to Twitter feed
     * 
     * @return void
     * @throws Exception
     */
    public static function twitterCronPost()
    {
        try {
            $screenshot = GameScreenModel::where('posted_on_twitter', '=', false)->first();
            if ($screenshot) {
                try {
                    $user = SteamModule::queryUser($screenshot->get('steamId'));
                } catch (Exception $e) {
                    $user = null;
                }

                TwitterModule::postToTwitter(public_path() . '/img/screenshots/' . $screenshot->get('screenshot'), $user);

                GameScreenModel::raw('UPDATE `' . self::tableName() . '` SET posted_on_twitter = 1 WHERE id = ?', [$screenshot->get('id')]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Return the associated table name of the migration
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'tbl_screenshots';
    }
}