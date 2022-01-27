<?php
/**
 * Ininal Setting & API Credentials
 * Created by Erdal Demirci <erdemirr@hotmail.com>.
 */

return [
    'mode'          => env('ININAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'api_key'     => env('ININAL_API_KEY', ''),
    'api_secret' => env('ININAL_API_SECRET', ''),
    'payment_action' => env('ININAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('ININAL_CURRENCY', 'TRY'),
    'notify_url'     => env('ININAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('ININAL_LOCALE', 'tr_TR'), // force gateway language  i.e. tr_TR, en_US ... (for express checkout only)
    'validate_ssl'   => env('ININAL_VALIDATE_SSL', false), // Validate SSL when creating api client.
];
