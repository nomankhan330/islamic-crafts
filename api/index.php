<?php

/**
 * Vercel Serverless Function Handler for Laravel
 */

// If running in Vercel Serverless environment, ensure writable storage paths exist in /tmp
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
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

    // If using SQLite on Vercel, copy SQLite file to /tmp if it doesn't already exist
    $dbConnection = getenv('DB_CONNECTION') ?: ($_ENV['DB_CONNECTION'] ?? '');
    if ($dbConnection === 'sqlite') {
        $targetDb = '/tmp/database.sqlite';
        if (!file_exists($targetDb)) {
            $sourceDb = __DIR__ . '/../database/database.sqlite';
            if (file_exists($sourceDb)) {
                copy($sourceDb, $targetDb);
            } else {
                touch($targetDb);
            }
        }
    }
}

// Forward the request to standard Laravel public/index.php
require __DIR__ . '/../public/index.php';
