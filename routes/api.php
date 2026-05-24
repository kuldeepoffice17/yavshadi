<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('location')->group(function () {
    Route::get('/countries', [LocationController::class, 'countries']);
    Route::post('/states',   [LocationController::class, 'states']);
    Route::post('/cities',   [LocationController::class, 'cities']);
});