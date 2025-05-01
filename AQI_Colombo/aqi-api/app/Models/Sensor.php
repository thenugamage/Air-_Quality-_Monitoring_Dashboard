<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'lan', 'lon', 'active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function data()
    {
        return $this->hasMany(SensorData::class);
    }
}
