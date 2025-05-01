<?php

return [
    'paths' => ['api/*', '*'], // Include * if frontend uses root routes

    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // Temporarily allow all
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],

    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

