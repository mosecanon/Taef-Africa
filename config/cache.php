<?php
/**
 * Cache Configuration
 * Predis (Redis) primary driver with fallback caching.
 */

return [
    'enabled' => false, // Disabled during active development so all design & UI updates render live immediately
    'default_ttl' => 300, // 5 minutes default page cache when enabled in production

    'redis' => [
        'scheme' => getenv('REDIS_SCHEME') ?: 'tcp',
        'host'   => getenv('REDIS_HOST') ?: '127.0.0.1',
        'port'   => (int)(getenv('REDIS_PORT') ?: 6379),
        'password' => getenv('REDIS_PASSWORD') ?: null,
        'database' => (int)(getenv('REDIS_DB') ?: 0),
        'timeout'  => 1.5, // low timeout to prevent blocking if redis is paused
        'prefix'   => 'aefs_2027:'
    ],

    'fallback_path' => __DIR__ . '/../cache'
];
