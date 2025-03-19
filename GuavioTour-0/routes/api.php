<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiServiceController;
use App\Http\Controllers\AuthController;




Route:: resource('/apiservice', ApiServiceController::class)->middleware('auth:sanctum');
Route::post('/loginUser', [AuthController::class, 'loginUser']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');