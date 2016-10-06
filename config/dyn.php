<?php
return [
    'dyn' => [
        'namespace' =>      'dyn',
        'site' => [
            'name' =>       'Hewbot.com',
            'url' =>        env('DYN_SITE_URL', 'http://localhost:8765'),
        ],
        'rundeck' => [
            'apiToken' =>   env('DYN_RUNDECK_APITOKEN', 'be543f0b-7c04-4c62-aa4b-2bbd46a1f80d'),
            'url' =>        env('DYN_RUNDECK_URL', 'http://localhost.localdomain:4440')
        ],
        'support' => [
            'name' =>       'Dynamictivity Support',
            'email' =>      'support@dynamictivity.com',
        ],
        'google' => [
            'analytics' =>  env('DYN_GOOGLE_ANALYTICS', 'UA-5187184-35'),
        ],
    ],
];
