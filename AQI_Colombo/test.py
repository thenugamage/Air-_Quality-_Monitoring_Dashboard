import requests
import json

# Laravel API endpoint
url = "http://127.0.0.1:8000/api/sensors"

# If you're using token auth, add it here
headers = {
    "Content-Type": "application/json",
    # "Authorization": "Bearer YOUR_TOKEN_HERE"  # ← Uncomment if protected
}

# Sensor data to send
data = {
    "location": "Fort",
    "latitude": 6.9271,
    "longitude": 79.8612,
    "aqi": 85,
    "category": "Moderate",
    "last_updated": "2025-04-30 12:00:00",
    "trend": [80, 82, 84, 85, 86, 85]
}

# Send POST request
response = requests.post(url, headers=headers, data=json.dumps(data))

# Show response
print("Status Code:", response.status_code)
print("Response:", response.json())
