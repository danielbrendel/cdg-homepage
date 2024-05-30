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
            $access_token = env('MASTODONBOT_ACCESS_TOKEN');

            $response = NetUtilsModule::remoteRequest($server_instance . '/api/v2/media', [
                'header' => [
                    'Authorization: Bearer ' . $access_token,
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
                    'Authorization: Bearer ' . $access_token,
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
