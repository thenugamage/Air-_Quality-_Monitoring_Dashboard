<?php
header('Content-Type: application/json');

// Simulated AQI data
$sensors = [
    [
        "id" => 1,
        "location" => "Colombo Fort",
        "latitude" => 6.9335,
        "longitude" => 79.8500,
        "aqi" => rand(30, 180),
        "history" => [
            ["time" => "09:00", "value" => rand(30, 150)],
            ["time" => "10:00", "value" => rand(30, 150)],
            ["time" => "11:00", "value" => rand(30, 150)],
        ]
    ],
    [
        "id" => 2,
        "location" => "Borella",
        "latitude" => 6.9150,
        "longitude" => 79.8788,
        "aqi" => rand(40, 190),
        "history" => [
            ["time" => "09:00", "value" => rand(30, 150)],
            ["time" => "10:00", "value" => rand(30, 150)],
            ["time" => "11:00", "value" => rand(30, 150)],
        ]
    ],
    [
        "id" => 3,
        "location" => "Dehiwala",
        "latitude" => 6.8500,
        "longitude" => 79.8655,
        "aqi" => rand(20, 120),
        "history" => [
            ["time" => "09:00", "value" => rand(30, 150)],
            ["time" => "10:00", "value" => rand(30, 150)],
            ["time" => "11:00", "value" => rand(30, 150)],
        ]
    ]
];

echo json_encode($sensors);
?>
