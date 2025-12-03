<?php

/**
 * Class SteamScreenModel
 */ 
class SteamScreenModel extends \Asatru\Database\Model
{
    /**
     * Acquire latest Steam screenshot and post to Twitter
     * 
     * @param array $platforms
     * @return void
     * @throws Exception
     */
    public static function acquireAndPost(array $platforms = [])
    {
        try {
            $screenData = static::queryLatestScreenshot();
            if ($screenData !== null) {
                $temp_name = 'tmp_' . md5(random_bytes(55)) . '.jpg';
                file_put_contents(public_path() . '/img/screenshots/' . $temp_name, file_get_contents($screenData['image']));

                $hashed = md5_file(public_path() . '/img/screenshots/' . $temp_name);
                
                foreach ($platforms as $pfkey => $platform) {
                    $count = static::raw('SELECT COUNT(*) AS count FROM `' . self::tableName() . '` WHERE hash = ? AND platform = ?', [$hashed, $pfkey])->first()?->get('count');
                    if ($count == 0) {
                        rename(public_path() . '/img/screenshots/' . $temp_name, public_path() . '/img/screenshots/' . $hashed . '.jpg');

                        $user = null;

                        if (env('APP_PARSESTEAMUSER')) {
                            try {
                                if ($screenData['steamId']['custom']) {
                                    $user = SteamModule::queryUserByCustomId($screenData['steamId']['id']);
                                } else {
                                    $user = SteamModule::queryUser($screenData['steamId']['id']);
                                }
                            } catch (Exception $e) {
                                $user = null;
                            }
                        }

                        $status = isset($user->personaname) ? 'Screenshot uploaded by ' . $user->personaname : '';

                        $className = ucfirst($pfkey) . 'Module';
                        $instance = new $className;
                        $status = (($instance->supportsHashtags()) ? $status . "\n\n" . env('APP_POSTTAGS') : '');
                        $instance->postToFeed(public_path() . '/img/screenshots/' . $hashed . '.jpg', $status);

                        static::raw('INSERT INTO `' . self::tableName() . '` (hash, platform) VALUES(?, ?)', [$screenData['hash'], $pfkey]);
                    }
                }

                if (file_exists(public_path() . '/img/screenshots/' . $temp_name)) {
                    unlink(public_path() . '/img/screenshots/' . $temp_name);
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Query latest uploaded Steam screenshot
     * 
     * @return mixed
     * @throws Exception
     */
    private static function queryLatestScreenshot()
    {
        try {
            $html = NetUtilsModule::getRemoteContents("https://steamcommunity.com/app/1001860/screenshots/?p=1&browsefilter=mostrecent");
            $images = HtmlParserModule::getImageTags($html);
            
            foreach ($images as $image) {
                if (HtmlParserModule::queryTagAttribute($image, 'class') === 'apphub_CardContentPreviewImage') {
                    $image = HtmlParserModule::queryTagAttribute($image, 'src');
                    $steamId = HtmlParserModule::extractSteamId($html);
                    
                    $steam_hash = '';
                    $hash_pos = strpos($image, 'ugc/');
                    if ($hash_pos !== false) {
                        for ($i = $hash_pos + 4; $i < strlen($image); $i++) {
                            if (substr($image, $i, 2) === '/?') {
                                break;
                            }

                            $steam_hash .= substr($image, $i, 1);
                        }
                    }

                    if ($steam_hash === '') {
                        $steam_hash = $image;
                    }

                    if (!static::imageAlreadyPosted($steam_hash)) {
                        return [
                            'image' => $image,
                            'steamId' => $steamId,
                            'hash' => $steam_hash
                        ];
                    }
                }
            }

            return null;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Check if the given image has already been posted
     * 
     * @param $image
     * @return bool
     * @throws Exception
     */
    public static function imageAlreadyPosted($image)
    {
        try {
            $exists = SteamScreenModel::raw('SELECT COUNT(*) AS count FROM `' . self::tableName() . '` WHERE hash = ?', [$image]);
            
            return $exists->get(0)->get('count') > 0;
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
        return 'tbl_steamscreens';
    }
}