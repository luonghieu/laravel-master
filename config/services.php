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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '731986707196649',
        'client_secret' => '4ad596af463c8f9795cd47008a452b9c',
        'redirect' => 'https://laravel-master.test/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'asTA0               3wBT',
        'client_secret' => 'hn1x              EWqMVI              JSvmE',
        'redirect' => 'http://laravel.dev/auth/twitter/callback',
    ],
];
