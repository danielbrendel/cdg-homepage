<?php

/*
    Asatru PHP - routes configuration file

    Add here all your needed routes.

    Schema:
        [<url>, <method>, controller_file@controller_method]
    Example:
        [/my/route, get, mycontroller@index]
        [/my/route/with/{param1}/and/{param2}, get, mycontroller@another]
    Explanation:
        Will call index() in app\controller\mycontroller.php if request is 'get'
        Every route with $ prefix is a special route
*/

return [
    array('/', 'GET', 'index@index'),
    array('/index', 'GET', 'index@index'),
    array('/news', 'GET', 'index@news'),
    array('/news/query', 'GET', 'index@queryNews'),
    array('/download', 'GET', 'index@download'),
    array('/tools', 'GET', 'index@tools'),
    array('/screenshots', 'GET', 'index@screenshots'),
    array('/screenshots/query/steam', 'ANY', 'index@querySteamScreenshots'),
    array('/screenshots/query', 'GET', 'index@queryDbScreenshots'),
    array('/cdg/uploadScreenshot', 'POST', 'index@uploadScreenshot'),
    array('/backgrounds', 'GET', 'index@backgrounds'),
    array('/backgrounds/query', 'POST', 'index@queryBackgrounds'),
    array('/documentation', 'GET', 'index@documentation'),
    array('/api', 'GET', 'index@api'),
    array('/cronjob/gamescreens/{pw}', 'ANY', 'index@cronjob_gamescreens'),
    array('/cronjob/steamscreens/twitter/{pw}', 'ANY', 'index@cronjob_steamscreens_twitter'),
    array('/cronjob/steamscreens/mastodon/{pw}', 'ANY', 'index@cronjob_steamscreens_mastodon'),
    array('$404', 'ANY', 'error404@index')
];
