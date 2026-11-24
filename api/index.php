<?php

/**
 * Vercel Serverless Function Handler for Laravel
 */

// Force cache and storage paths to /tmp for Vercel Serverless
$serverlessEnv = [
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_ROUTES_CACHE' => '/tmp/routes-v7.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => '/tmp/database.sqlite',
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
];

foreach ($serverlessEnv as $key => $val) {
    if (!getenv($key)) {
        putenv("{$key}={$val}");
        $_ENV[$key] = $val;
        $_SERVER[$key] = $val;
    }
}

// Ensure writable storage and cache paths exist in /tmp
$writablePaths = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
    '/tmp/bootstrap/cache',
];

foreach ($writablePaths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// Ensure SQLite database exists in /tmp
$targetDb = '/tmp/database.sqlite';
if (!file_exists($targetDb)) {
    $sourceDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($sourceDb)) {
        copy($sourceDb, $targetDb);
    } else {
        touch($targetDb);
    }
}

require __DIR__ . '/../public/index.php';
