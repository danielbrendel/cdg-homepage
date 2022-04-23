<?php

/**
 * Class ScreenshotModule
 */
class ScreenshotModule
{
    const FILE_IDENT = 'imgfile';
    const SCREENSHOT_PACK_LIMIT = 12;

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
     * Get image tags from code
     * 
     * @param $code
     * @return array
     */
    protected static function getImageTags($code)
    {
        $result = array();
        
        $inImgTag = false;
        $curCode = '';
        
        for ($i = 0; $i < strlen($code); $i++) {
            if (!$inImgTag) {
                if (substr($code, $i, 4) === '<img') {
                    $inImgTag = true;
                }
            }
            
            if ($inImgTag) {
                $curCode .= substr($code, $i, 1);
                
                if (substr($code, $i, 1) === '>') {
                    $result[] = $curCode;
                    $curCode = '';
                    $inImgTag = false;
                }
            }
        }
        
        return $result;
    }

    /**
     * Query tag attribute
     * 
     * @param $code
     * @param $attribute
     * @return string 
     */
    protected static function queryTagAttribute($code, $attribute)
    {
        $pos = strpos($code, $attribute . '="');
        
        if ($pos !== false) {
            $pos += strlen($attribute . '="');
            
            $curCode = '';
            
            for ($i = $pos; $i < strlen($code); $i++) {
                if (substr($code, $i, 1) === '"') {
                    break;
                }
                
                $curCode .= substr($code, $i, 1);
            }
            
            return $curCode;
        }
        
        return '';
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
     * Query Steam screenshots
     * 
     * @param string $sorting
     * @param int $limit
     * @return array
     * @throws \Exception
     */
    public static function querySteamScreenshots(string $sorting = 'mostrecent', int $limit = 0)
    {
        try {
            $result = array();
            $html = static::getRemoteContents("https://steamcommunity.com/app/1001860/screenshots/?p=1&browsefilter={$sorting}");
    
            $images = static::getImageTags($html);
            
            foreach ($images as $image) {
                if (static::queryTagAttribute($image, 'class') === 'apphub_CardContentPreviewImage') {
                    $result[] = static::queryTagAttribute($image, 'src');
                    
                    if (($limit > 0) && (count($result) >= $limit)) {
                        break;
                    }
                }
            }

            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
