<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/')->controller(AuthenticationController::class)->group(function ():void {
    Route::post('/login', 'store');
    Route::delete('/logout', 'destroy');
});

Route::prefix('/staff')->controller(StaffController::class)->middleware('auth:sanctum')->group(function():void {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{staff}', 'show');
    Route::put('/{staff}', 'update');
    Route::delete('/{staff}', 'destroy');
});
