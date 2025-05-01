<?php

namespace App\Http\Controllers\Api;

use App\Models\Sensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensorController extends Controller
{
    // GET /api/sensors
    public function index()
    {
        return Sensor::all();
    }

    // POST /api/sensors
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'lan' => 'required|string',
            'lon' => 'required|string',
        ]);

        $sensor = Sensor::create($validated);
        return response()->json($sensor, 201);
    }

    // PUT /api/sensors/{id}
    public function update(Request $request, $id)
    {
        $sensor = Sensor::findOrFail($id);

        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'lan' => 'required|string',
            'lon' => 'required|string',
        ]);

        $sensor->update($validated);

        return response()->json(['message' => 'Sensor updated successfully', 'sensor' => $sensor]);
    }

    // DELETE /api/sensors/{id}
    public function destroy($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();

        return response()->json(['message' => 'Sensor deleted successfully']);
    }
}
