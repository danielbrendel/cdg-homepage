<?php

/**
 * Class SitemapModule
 */
class SitemapModule {
    /**
     * @return string
     * @throws \Exception
     */
    public static function generate()
    {
        try {
            $sitemap = [
                '/',
                '/news',
                '/download',
                '/tools',
                '/screenshots',
                '/backgrounds',
                '/api'
            ];

            $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">{%URLS%}</urlset>';
            $node = '<url><loc>{%URL%}</loc></url>';

            $nodes = '';

            foreach ($sitemap as $url) {
                $nodes .= str_replace('{%URL%}', url($url), $node);
            }

            return str_replace('{%URLS%}', $nodes, $xml);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
