<?php

/**
 * Class DiscordModule
 */
class DiscordModule {
    /**
     * @param $asset
     * @param $text
     * @return void
     * @throws \Exception
     */
    public function postToFeed($asset, $text)
    {
        try {
            $api_endpoint = env('DISCORDBOT_API_ENDPOINT');
            $access_token = env('DISCORDBOT_ACCESS_TOKEN');
            $server_channel = env('DISCORDBOT_CHANNEL');

            $response = NetUtilsModule::remoteRequest($api_endpoint . '/' . $server_channel . '/messages', [
                'header' => [
                    'Authorization: Bot ' . $access_token
                ],
                'post' => [
                    'content' => $text,
                    'file' => new \CURLFile($asset)
                ]
            ]);

            if ((!isset($response['info']['http_code'])) || ($response['info']['http_code'] != 200)) {
                throw new \Exception('[Discord REST API] Got HTTP response code ' . $response['info']['http_code'], $response['info']['http_code']);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return bool
     */
    public function supportsHashtags()
    {
        return false;
    }
}
