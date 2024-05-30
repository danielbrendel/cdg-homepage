<?php

/**
 * Class MastodonModule
 */
class MastodonModule {
    /**
     * @param $asset
     * @param $text
     * @return void
     * @throws \Exception
     */
    public static function postToMastodon($asset, $text)
    {
        try {
            $server_instance = env('MASTODONBOT_SERVER_INSTANCE');

            $response = NetUtilsModule::remoteRequest($server_instance . '/api/v1/apps', [
                'post' => http_build_query([
                    'client_name' => env('APP_NAME') . ' Mastodon Bot',
                    'redirect_uris' => 'urn:ietf:wg:oauth:2.0:oob',
                    'scopes' => 'read write'
                ])
            ]);
            
            $app_json = json_decode($response['data']);
            if (isset($app_json->error)) {
                throw new \Exception('[api/v1/apps] ' . $app_json->error, $response['info']['http_code']);
            }

            $response =  NetUtilsModule::remoteRequest($server_instance . '/oauth/token', [
                'post' => http_build_query([
                    'grant_type' => 'client_credentials',
                    'client_id' => $app_json->client_id,
                    'client_secret' => $app_json->client_secret,
                    'scope' => 'read write'
                ])
            ]);
            
            $token_json = json_decode($response['data']);
            if (isset($token_json->error)) {
                throw new \Exception('[oauth/token] ' . $token_json->error, $response['info']['http_code']);
            }

            $response =  NetUtilsModule::remoteRequest($server_instance . '/api/v1/apps/verify_credentials', [
                'header' => [
                    'Authorization: Bearer ' . $token_json->access_token
                ]
            ]);
            
            $verify_json = json_decode($response['data']);
            if (isset($verify_json->error)) {
                throw new \Exception('[api/v1/apps/verify_credentials] ' . $verify_json->error, $response['info']['http_code']);
            }

            $response = NetUtilsModule::remoteRequest($server_instance . '/api/v2/media', [
                'header' => [
                    'Authorization: Bearer ' . $token_json->access_token,
                    'Content-Type: multipart/form-data'
                ],
                'post' => [
                    'file' => new \CURLFile($asset)
                ]
            ]);
            
            $media_json = json_decode($response['data']);
            if (isset($media_json->error)) {
                throw new \Exception('[api/v2/media] ' . $media_json->error, $response['info']['http_code']);
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
            if (isset($status_json->error)) {
                throw new \Exception('[api/v1/statuses] ' . $status_json->error, $response['info']['http_code']);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
