<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '330550095455-r3cpiu2dlhl5oaefog8lc73u5h34hb0o.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '1399480233781869',
        'client_secret' => '778cf5d0697c35fcd568ac97f71653dd',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],
];
