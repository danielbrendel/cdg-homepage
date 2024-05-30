<?php

/**
 * Class MastodonModule
 */
class MastodonModule {
    public static function screenshot($asset, $text = '')
    {
        try {
            $server_instance = env('MASTODON_SERVER_INSTANCE');
            $client_id = env('MASTODON_CLIENT_KEY');
            $client_auth = env('MASTODON_CLIENT_AUTH');
            $client_secret = env('MASTODON_CLIENT_SECRET');
            $access_token = env('MASTODON_ACCESS_TOKEN');

            $response =  NetUtilsModule::remoteRequest($server_instance . '/oauth/token', [
                'post' => [
                    'grant_type' => 'authorization_code',
                    'code' => $client_auth,
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
                    'scope' => 'read write'
                ]
            ]);
            
            $token_json = json_decode($response['data']);
            if (!isset($token_json->access_token)) {
                throw new \Exception('No access token returned');
            }

            $response = NetUtilsModule::remoteRequest($server_instance . '/api/v2/media', [
                'header' => [
                    'Authorization: Bearer ' . $token_json->access_token
                ],
                'post' => [
                    'file' => new \CURLFile($asset, 'image/jpg', 'image.jpg')
                ]
            ]);

            $media_json = json_decode($response['data']);
            if (!isset($media_json->id)) {
                throw new \Exception('No media ID returned');
            }

            $response = NetUtilsModule::remoteRequest($server_instance . '/api/v1/statuses', [
                'header' => [
                    'Authorization: Bearer ' . $token_json->access_token,
                    'Content-Type: application/json'
                ],
                'post' => json_encode([
                    'status' => $text,
                    'media_ids' => [$media_json->id],
                    'visibility' => 'public'
                ])
            ]);

            $status_json = json_decode($response['data']);
            if (!isset($status_json->id)) {
                throw new \Exception('No status ID returned');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
