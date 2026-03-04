<?php
/**
 * PayPal Setting & API Credentials
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Use 'sandbox' or 'live'
    
    'sandbox' => [
        'client_id'     => env('PAYPAL_SANDBOX_CLIENT_ID', 'AZqCIkBttmuv8ujEpl5cfaZk38MhtFbM1ugasbC-Q88wKFx0IiIQyoNPgUahWfoC6s714doVux5fQtRF'),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EClUBTdGAs3JJnbLf9X8ZNAMvLEZHB6Jsv0QqH-qmAxGzlcLQ-6KJWdGW13e1FYGo2nSMWs9FEyhoCEa'),
        'app_id'        => 'APP-80W284485P519543T',
    ],

    'live' => [
        'client_id'     => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'        => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true),
];
