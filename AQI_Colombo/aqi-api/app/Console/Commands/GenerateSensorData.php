<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sensor;
use App\Models\SensorData;
use Carbon\Carbon;

class GenerateSensorData extends Command
{
    protected $signature = 'sensors:generate-data';
    protected $description = 'Generate random AQI data for all sensors every 30s (2 per min)';

    public function handle(): void
    {
        $sensors = Sensor::all();
        $now = Carbon::now();

        foreach ($sensors as $sensor) {
            for ($i = 0; $i < 2; $i++) {
                SensorData::create([
                    'sensor_id' => $sensor->id,
                    'timestamp' => $now->copy()->subSeconds(30 * $i),
                    'aqi' => rand(0, 300),
                    'pm25' => rand(5, 150),
                    'pm10' => rand(10, 200),
                    'no2' => rand(0, 100),
                    'so2' => rand(0, 80),
                    'co' => rand(0, 50),
                    'ozone' => rand(0, 120),
                ]);
            }
        }

        $this->info('✅ Sensor data generated.');
    }
}
