<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;

use App\Models\SensorData;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function stats()
    {
        $totalSensors = Sensor::count();
        $activeAlerts = Alert::where('status', 'active')->count();
        $alertChanges = Alert::whereDate('created_at', today())->count() - 1;

        // Step 1: Get latest AQI per sensor
        $latestReadings = SensorData::select('sensor_id', 'aqi')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('sensor_data')
                    ->groupBy('sensor_id');
            })->get();

        // Step 2: Calculate average AQI from latest readings
        $averageAqi = $latestReadings->avg('aqi') ?? 0;
        $averageAqi = round($averageAqi, 2);

        // Step 3: Recent Alerts
        $recentAlerts = Alert::latest()->take(5)->get()->map(function ($alert) {
            return [
                'title' => $alert->title,
                'sensor_id' => $alert->sensor_id,
                'location' => $alert->location,
                'time' => $alert->created_at->diffForHumans(),
            ];
        });

        return response()->json([
            'total_sensors' => $totalSensors,
            'average_aqi' => $averageAqi,
            'active_alerts' => $activeAlerts,
            'alert_changes' => $alertChanges,
            'alerts' => $recentAlerts,
            'category' => $this->getCategory($averageAqi)
        ]);
    }

    private function getCategory($aqi)
    {
        if ($aqi <= 50) return 'Good';
        if ($aqi <= 100) return 'Moderate';
        if ($aqi <= 150) return 'Unhealthy for Sensitive Groups';
        if ($aqi <= 200) return 'Unhealthy';
        if ($aqi <= 300) return 'Very Unhealthy';
        return 'Hazardous';
    }
}
