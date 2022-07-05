<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)
        ->prefix('auth')
        ->name('auth')
        ->group(function () {
            Route::post('/login', 'login')->name('login');
        });

    // Rutas con autenticación
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::controller(AuthController::class)
            ->prefix('auth')
            ->name('auth')
            ->group(function () {
                Route::get('/logout', 'logout')->name('logout');
            });
    });
});
