<?php

/**
 * Vercel Serverless Function Handler for Laravel
 */

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

// Forward the request to standard Laravel public/index.php
require __DIR__ . '/../public/index.php';
