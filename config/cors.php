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

    'paths' => ['api/*', 'auth/api/*','client/*', 'pacient/*', 'prescriptions/*','appointments/*', 'especies', 'mascota/*'], // Sólo rutas API
    'allowed_methods' => ['*'], // GET, POST, PUT, DELETE, etc.
    'allowed_origins' => [
        'http://localhost:5173',    // Vue en desarrollo
        'https://tu-sitio.com' // Producción
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // false para JWT (no cookies)

];
