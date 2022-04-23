<?php

/**
 * Class NewsModule
 */
class NewsModule
{
    /**
     * Query news content from Steam
     * 
     * @param $fromStart
     * @return mixed
     * @throws Exception
     */
    public static function query($fromStart = 0)
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
}
