<?php

return [
    'bower'     => [
        'directory' => 'bower_components'
    ],
    'namespace' => 'console',
    'instances' => [
        'admin' => [
            'engine' => 'admin-lte',
            'domain' => 'admin.console.example.com',
            'prefix' => 'lol',
            'ng_app' => 'app',
        ],
        'lecturer' => [
            'engine' => 'admin-lte',
            'domain' => 'admin.console.example.com',
            'prefix' => 'lol',
            'ng_app' => 'app',
        ]
    ]
];