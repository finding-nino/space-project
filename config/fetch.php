<?php

require_once 'db_conn.php';


$apiKey = getenv('NASA_API_KEY');

if ($apiKey === false) {
    throw new RuntimeException('NASA_API_KEY not set');
}

$url = "https://api.nasa.gov/planetary/apod?api_key={$apiKey}";




// &date={$date} add to $url and set a $date for specific days


$response = file_get_contents($url);
$data = json_decode($response, true);

$sql = "INSERT OR IGNORE INTO apod_entries (date, title, url, hdurl, media_type, explanation, copyright)
        VALUES (:date, :title, :url, :hdurl, :media_type, :explanation, :copyright)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':date'        => $data['date'],
    ':title'       => $data['title'],
    ':url'         => $data['url'],
    ':hdurl'       => $data['hdurl'] ?? null,
    ':media_type'  => $data['media_type'],
    ':explanation' => $data['explanation'],
    ':copyright'   => $data['copyright'] ?? null,
]);

echo "Entry saved successfully";