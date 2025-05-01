<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_id', 'timestamp', 'aqi', 'pm25', 'pm10', 'no2', 'so2', 'co', 'ozone'
    ];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
