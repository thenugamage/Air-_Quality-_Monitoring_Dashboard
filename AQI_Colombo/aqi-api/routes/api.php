<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\SensorDataController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;

// ----------------------
// 🔐 AUTH ROUTES
// ----------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Sensors
Route::get('/sensors', [SensorController::class, 'index']);
Route::post('/sensors', [SensorController::class, 'store']);
Route::get('/sensors/{id}', [SensorController::class, 'show']);
Route::put('/sensors/{id}', [SensorController::class, 'update']);
Route::delete('/sensors/{id}', [SensorController::class, 'destroy']);

// Sensor Data
Route::get('/sensor-data', [SensorDataController::class, 'index']);

Route::get('/sensor-data/{sensor_id}', [SensorDataController::class, 'getBySensor']);

// ----------------------
// 👤 USER MANAGEMENT
// ----------------------
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// ----------------------
// 📊 DASHBOARD STATS
// ----------------------
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
