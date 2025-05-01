<?php

namespace App\Http\Controllers\Api;

use App\Models\SensorData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensorDataController extends Controller
{
    public function index()
    {
        return SensorData::orderBy('timestamp', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sensor_id' => 'required|exists:sensors,id',
            'timestamp' => 'required|date',
            'aqi' => 'nullable|integer',
            'pm25' => 'nullable|numeric',
            'pm10' => 'nullable|numeric',
            'no2' => 'nullable|numeric',
            'so2' => 'nullable|numeric',
            'co' => 'nullable|numeric',
            'ozone' => 'nullable|numeric',
        ]);

        $data = SensorData::create($validated);
        return response()->json($data, 201);
    }

    public function getBySensor($sensor_id)
    {
        return SensorData::where('sensor_id', $sensor_id)->orderBy('timestamp', 'desc')->get();
    }
}
