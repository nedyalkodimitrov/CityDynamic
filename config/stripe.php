<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stripe API Key
    |--------------------------------------------------------------------------
    |
    | This value is the Stripe API key. This key is used when making API calls
    */

    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'webhook' => [
        'secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],

    'fee' => [
        'application_fee' => 100, //1lev,
    ],

    'currency' => env('CURRENCY', 'bgn'),
];
