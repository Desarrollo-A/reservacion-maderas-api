<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)
        ->prefix('auth')
        ->name('auth.')
        ->group(function () {
            Route::post('/login', 'login')->name('login');
            Route::post('/restore-password', 'restorePassword')->name('restore.password');
        });

    Route::apiResource('users', UserController::class)
        ->only(['store']);

    // Rutas con autenticación
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::controller(AuthController::class)
            ->prefix('auth')
            ->name('auth.')
            ->group(function () {
                Route::get('/navigation', 'getNavigationMenu')->name('navigation');
                Route::get('/user', 'getUser')->name('user');
                Route::get('/logout', 'logout')->name('logout');

                Route::post('/change-password', 'changePassword')->name('change.password');
            });
    });
});
