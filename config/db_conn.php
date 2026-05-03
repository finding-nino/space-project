<?php
try {

    $pdo = new PDO('sqlite:' . __DIR__ . '/../data/apod_entries.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec('PRAGMA journal_mode = WAL');

    $pdo->exec('CREATE TABLE IF NOT EXISTS apod_entries (
    date TEXT PRIMARY KEY,
    title TEXT,
    url TEXT,
    hdurl TEXT,
    media_type TEXT,
    explanation TEXT,
    copyright TEXT
)');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>