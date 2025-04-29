<?php
header('Content-Type: application/json');

$api_key = "E4BC0A81-24CC-11F0-81BE-42010A80001F"; // replace with your real key

$url = "https://api.purpleair.com/v1/sensors?fields=name,latitude,longitude,pm2.5_atm,temperature,humidity,device_status,last_seen";

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "X-API-Key: $api_key\r\n"
    ]
];

$context = stream_context_create($opts);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo json_encode(["error" => "Unable to fetch sensor data"]);
    exit;
}

echo $response;
?>
