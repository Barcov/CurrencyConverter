<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Fixer.io API Key
    |--------------------------------------------------------------------------
    |
    | This value is used to connect to the fixer.io service.
    | Add the Api key that is displayed in your Fixer.io account to .env
    */

    'api_key' => env( 'FIXERIO_API_KEY', 'test' ),

    /*
    |--------------------------------------------------------------------------
    | API Cache TTL
    |--------------------------------------------------------------------------
    |
    | When this value is set to 0 the Fixer.io API will be hit on every API request.
    | TTL in seconds is used to serve cached entries from the database.
    | Once this expires the Fixer.io endpoint will be called to update currency data.
    | Useful TTL values are 300 (5 Minutes) 3600 (1 hour), 86400 (1 day), 604800 (1 week), 2592000 (1 month)
    */

    'api_cache_ttl' => env( 'FIXERIO_CACHE_TTL', '0' ),

    /*
    |--------------------------------------------------------------------------
    | DB Cache TTL
    |--------------------------------------------------------------------------
    |
    | When this value is set to 0, exchange rates from the Local DB will not be cached.
    | TTL in seconds is used to cached database calls. By default, cache is on the filesystem.
    | You can configure Redis or any supported cache drivers for laravel to cache queries in memory.
    | It's recommended that this TTL be smaller than the API Cache TTL to ensure that the database is updated with fresh data.
    |
    | Useful TTL values are 300 (5 Minutes) 3600 (1 hour), 86400 (1 day), 604800 (1 week), 2592000 (1 month)
    */

    'db_cache_ttl' => env( 'FIXERIO_DB_CACHE_TTL', '0' ),

];
