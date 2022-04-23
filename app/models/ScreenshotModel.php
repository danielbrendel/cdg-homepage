<?php

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Class ScreenshotModel
 */ 
class ScreenshotModel extends \Asatru\Database\Model {
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

            ScreenshotModel::raw('INSERT INTO ' . self::tableName() . ' (screenshot, thumb, steamId, posted_on_twitter) VALUES(?, ?, ?, ?);', [
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
                $query = ScreenshotModel::where('id', '<', $fromIndex)->orderBy('id', 'desc')->limit(env('APP_SCREENSHOTLIMIT', self::SCREENSHOT_PACK_LIMIT));
            } else {
                $query = ScreenshotModel::orderBy('id', 'desc')->limit(env('APP_SCREENSHOTLIMIT', self::SCREENSHOT_PACK_LIMIT));
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
                    $cur['profile'] = ScreenshotModel::querySteamUser($cur['steamId']);
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
     * Query Steam user information
     * 
     * @param $steamId
     * @return mixed
     * @throws Exception
     */
    public static function querySteamUser($steamId)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . env('STEAM_APIKEY') . '&steamids=' . $steamId);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Failed to query Steam user data, status is: ' . $response->getStatusCode(), 500);
            }
            
            $data = json_decode($response->getBody());

            if (!isset($data->response->players[0])) {
                throw new Exception('Player data of SteamID ' . $steamId . ' not found', 404);
            }

            return $data->response->players[0];
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Post screenshot to Twitter feed
     * 
     * @param $img
     * @return void
     * @throws Exception
     */
    private static function postToTwitter($img, $steamId)
    {
        try {
            try {
                $user = static::querySteamUser($steamId);
            } catch (Exception $e) {
                $user = null;
            }
            
            $connection = new TwitterOAuth(env('TWITTERBOT_APIKEY',), env('TWITTERBOT_APISECRET'), env('TWITTERBOT_ACCESS_TOKEN'), env('TWITTERBOT_ACCESS_TOKEN_SECRET'));  
            $media = $connection->upload('media/upload', ['media' => $img]);
 
            if (!isset($media->media_id_string)) {
                throw new Exception('Failed to upload media to Twitter: ' . print_r($media, true));
            }

            $status = isset($user->personaname) ? 'Screenshot uploaded by ' . $user->personaname : '';
            $status .= ' ' . env('TWITTERBOT_TAGS');

            $parameters = [
                'status' => $status,
                'media_ids' => implode(',', [$media->media_id_string])
            ];

            $result = $connection->post('statuses/update', $parameters);
            if (!isset($result->id)) {
                throw new Exception('Failed to post status to Twitter: ' . print_r($result, true));
            }
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
            $screenshot = ScreenshotModel::where('posted_on_twitter', '=', false)->first();
            if ($screenshot) {
                ScreenshotModel::postToTwitter(public_path() . '/img/screenshots/' . $screenshot->get('screenshot'), $screenshot->get('steamId'));

                ScreenshotModel::raw('UPDATE `' . self::tableName() . '` SET posted_on_twitter = 1 WHERE id = ?', [$screenshot->get('id')]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Get remote contents
     * 
     * @param $url
     * @return string
     * @throws \Exception
     */
    protected static function getRemoteContents($url)
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($curl);

            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($code !== 200) {
                throw new \Exception('Remote host returned error: ' . $code);
            }

            if (curl_error($curl)) {
                throw new \Exception(curl_error($curl));
            }

            curl_close($curl);

            return $output;
        } catch (\Exception $e) {
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