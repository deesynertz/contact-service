<?php

return [
    /*
    |--------------------------------------------------------------------------
    | System Sender Email
    |--------------------------------------------------------------------------
    */
    'from' => [
        'address' => env('DEESYNERTZ_CONTACT_MAIL_FROM', 'sender@example.com'),
        'name'    => env('DEESYNERTZ_CONTACT_MAIL_FROM_NAME', 'Website Contact'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Management Receiver Email
    |--------------------------------------------------------------------------
    */
    'to' => env('DEESYNERTZ_CONTACT_MAIL_TO', 'receiver@example.com'),

    /*|--------------------------------------------------------------------------
    | Contact Form Route
    |--------------------------------------------------------------------------
    */
    'route' => '/contact/send',
];

