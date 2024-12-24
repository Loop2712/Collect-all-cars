<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // รวมเส้นทางที่ต้องการอนุญาต CORS

    'allowed_methods' => ['*'], // สามารถใช้ได้ทุกเมธอด

    'allowed_origins' => [
        'https://viicheck.com', 
        'https://app.viicheck.com',
    ], // ระบุโดเมนที่อนุญาตให้เข้าถึง

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // อนุญาตทุก header

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // รองรับคุกกี้ข้ามโดเมน

];
