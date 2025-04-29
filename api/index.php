<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Sensor Map - AQI Colombo</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        #map {
            height: 100vh;
            width: 100%;
        }

        .custom-div-icon div {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([6.9271, 79.8612], 11); // Centered at Colombo

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © OpenStreetMap contributors'
        }).addTo(map);

        function getColor(aqi) {
            if (aqi <= 50) return "green";
            else if (aqi <= 100) return "yellow";
            else if (aqi <= 150) return "orange";
            else if (aqi <= 200) return "red";
            else if (aqi <= 300) return "purple";
            else return "maroon";
        }

        function loadSensors() {
            fetch('get_simulated_sensors.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(sensor => {
                        const color = getColor(sensor.aqi);
                        const icon = L.divIcon({
                            className: 'custom-div-icon',
                            html: `<div style="background-color:${color};"></div>`,
                            iconSize: [14, 14]
                        });

                        const marker = L.marker([sensor.latitude, sensor.longitude], { icon })
                            .addTo(map)
                            .bindPopup(`
                                <b>${sensor.location}</b><br>
                                AQI: ${sensor.aqi}<br>
                                Temp: ${sensor.temperature} °C<br>
                                Humidity: ${sensor.humidity} %<br>
                                Last Seen: ${new Date().toLocaleTimeString()}
                            `);
                    });
                })
                .catch(error => console.error('Error loading sensor data:', error));
        }

        function clearMarkers() {
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });
        }

        loadSensors();

        // Refresh every 60 seconds
        setInterval(() => {
            clearMarkers();
            loadSensors();
        }, 60000);
    </script>

</body>
</html>
