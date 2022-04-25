<?php


/**
 * Class NetUtilsModule
 */
class NetUtilsModule
{
    /**
     * Get remote contents
     * 
     * @param $url
     * @return string
     * @throws \Exception
     */
    public static function getRemoteContents($url)
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
}
