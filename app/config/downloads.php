<?php

return [
    [
        'name' => 'Portable version',
        'version' => env('APP_STANDALONEDLVER'),
        'resource' => 'downloads/cdg_v' . env('APP_STANDALONEDLVER') . '.zip',
        'active' => true
    ],

    [
        'name' => 'Installer version',
        'version' => env('APP_STANDALONEDLVER'),
        'resource' => 'downloads/cdg_v' . env('APP_STANDALONEDLVER') . '_installer.msi',
        'active' => true
    ]
];