<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SensorData;
use App\Observers\SensorDataObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        SensorData::observe(SensorDataObserver::class);
    }
}
