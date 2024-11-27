<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new RuntimeException("The .env file does not exist.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue; // Skip comments
        [$key, $value] = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

// Load environment variables
loadEnv(__DIR__ . '/.env');

// Access variables
$db_host = getenv('DB_HOST');
$db_name = getenv('DB_DATABASE');
echo "DB Host: $db_host, DB Name: $db_name";
