<?php

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Class TwitterModule
 */
class TwitterModule 
{
    /**
     * Post screenshot to Twitter feed
     * 
     * @param $asset
     * @param $text
     * @return void
     * @throws Exception
     */
    public function postToFeed($asset, $text)
    {
        try {
            $connection = new TwitterOAuth(env('TWITTERBOT_APIKEY',), env('TWITTERBOT_APISECRET'), env('TWITTERBOT_ACCESS_TOKEN'), env('TWITTERBOT_ACCESS_TOKEN_SECRET'));  
            $connection->setTimeouts(30, 50);
            
            $media = $connection->upload('media/upload', ['media' => $asset]);
            
            if (!isset($media->media_id_string)) {
                throw new Exception('Failed to upload media to Twitter: ' . print_r($media, true));
            }

            $parameters = [
                'status' => $text,
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
}
