<?php
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("Plik .env nie istnieje!");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Pomijaj komentarze
        }
        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}
try {
    loadEnv(__DIR__ . '/.env');
} catch (Exception $e) {
    die($e->getMessage());
}
session_start();
function connect()
{
    try {
        $db = new mysqli($_ENV['SERVER'], $_ENV['LOGIN'], $_ENV['PASSWORD'], $_ENV['DB_NAME']);
        return $db;
    }catch (Exception $e) {
        echo "znaleziono bład".$e->getMessage();
    }
}
$db=connect();