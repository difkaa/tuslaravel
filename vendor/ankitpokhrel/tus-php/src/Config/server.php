<?php

return [

    /**
     * Redis connection parameters.
     */
    'redis' => [
        'host' => getenv('REDIS_HOST') !== false ? getenv('REDIS_HOST') : 'redis-dev1.kemsos.net',
        'port' => getenv('REDIS_PORT') !== false ? getenv('REDIS_PORT') : '6379',
        'database' => getenv('REDIS_DB') !== false ? getenv('REDIS_DB') : 0,
    ],

    /**
     * File cache configs.
     */
    'file' => [
        'dir' => \dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '.cache' . DIRECTORY_SEPARATOR,
        'name' => 'tus_php.server.cache',
    ],
];
