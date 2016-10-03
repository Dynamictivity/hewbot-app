<?php
return [
    'dyn' => [
        'namespace' => 'dyn',
        'site' => [
            'name' =>               'Foundation App',
            'url' =>                env('DYN_SITE_URL', 'http://localhost:8765'),
        ],
        'support' => [
            'name' =>               'Dynamictivity Support',
            'email' =>              'support@dynamictivity.com',
        ],
        'google' => [
            'analytics' =>          env('DYN_GOOGLE_ANALYTICS', 'UA-5187184-35'),
        ],
    ],
];
