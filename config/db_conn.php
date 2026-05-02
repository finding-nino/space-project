<?php
try {

    $pdo = new PDO('sqlite:' . __DIR__ . '/../data/apod_entries.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec('PRAGMA journal_mode = WAL');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>