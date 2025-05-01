<?php

namespace App\Observers;

use App\Models\SensorData;
use App\Models\Alert;

class SensorDataObserver
{
    public function created(SensorData $sensorData)
    {
        $aqi = $sensorData->aqi;

        // If AQI is not high, don't create an alert
        if ($aqi <= 100) return;

        // Determine AQI category
        $category = $this->getAqiCategory($aqi);

        // Create alert with category-based title
        Alert::create([
            'title' => "⚠️ {$category} Air Quality Detected",
            'sensor_id' => $sensorData->sensor_id,
            'location' => $sensorData->sensor->location ?? 'Unknown',
            'status' => 'active',
        ]);
    }

    private function getAqiCategory($aqi)
    {
        if ($aqi <= 50) return 'Good';
        if ($aqi <= 100) return 'Moderate';
        if ($aqi <= 150) return 'Unhealthy for Sensitive Groups';
        if ($aqi <= 200) return 'Unhealthy';
        if ($aqi <= 300) return 'Very Unhealthy';
        return 'Hazardous';
    }
}
