<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sensor_id')->constrained('sensors')->onDelete('cascade');
            $table->dateTime('timestamp');
            $table->integer('aqi')->nullable();
            $table->float('pm25')->nullable();
            $table->float('pm10')->nullable();
            $table->float('no2')->nullable();
            $table->float('so2')->nullable();
            $table->float('co')->nullable();
            $table->float('ozone')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
