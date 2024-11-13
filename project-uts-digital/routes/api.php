<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;

// Rute untuk autentikasi user
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rute untuk API dengan middleware autentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('news', NewsController::class);
});
