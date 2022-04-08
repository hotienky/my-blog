<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'firebase' => [
        'api_key' => 'AIzaSyB7mprSl8o97RyQOKcG4AQYmWfW1HZ1r-I',
        'auth_domain' => 'my-blog-5cfd0.firebaseapp.com',
        'database_url' => 'https://my-blog-5cfd0-default-rtdb.asia-southeast1.firebasedatabase.appm',
        'project_id' => 'my-blog-5cfd0',
        'storage_bucket' => 'my-blog-5cfd0.appspot.com',
        'messaging_sender_id' => '8647800564',
        'app_id' => '1:8647800564:web:9ff69d72a4f7d8a28c90a1',
        'measurement_id' => 'G-0LC02XX2M7',
    ],
];
