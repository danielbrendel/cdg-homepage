<?php

/**
 * Class SteamModule
 */
class SteamModule
{
    /**
     * Query Steam user information
     * 
     * @param $steamId
     * @return mixed
     * @throws Exception
     */
    public static function queryUser($steamId)
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
     * Get player data of a player with custom ID
     * 
     * @param $customId
     * @return mixed
     * @throws Exception
     */
    public static function queryUserByCustomId($customId)
    {
        try {
            $content = NetUtilsModule::getRemoteContents('https://steamcommunity.com/id/' . $customId);
            $steamId = HtmlParserModule::extractOwnerId($content);

            return $steamId; 
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Query news content from Steam
     * 
     * @param $fromStart
     * @return mixed
     * @throws Exception
     */
    public static function queryNews($fromStart = 0)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=1001860&count=12&maxlength=300&format=json');

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Failed to query news content, status is: ' . $response->getStatusCode(), 500);
            }

            return json_decode($response->getBody());
        } catch (Exception $e) {
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
    public static function queryScreenshots(string $sorting = 'mostrecent', int $limit = 0)
    {
        try {
            $result = array();
            $html = NetUtilsModule::getRemoteContents("https://steamcommunity.com/app/1001860/screenshots/?p=1&browsefilter={$sorting}");
    
            $images = HtmlParserModule::getImageTags($html);
            
            foreach ($images as $image) {
                if (HtmlParserModule::queryTagAttribute($image, 'class') === 'apphub_CardContentPreviewImage') {
                    $result[] = HtmlParserModule::queryTagAttribute($image, 'src');
                    
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
