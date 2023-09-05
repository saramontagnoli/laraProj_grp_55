<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('public/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'getOccupazione'])
        ->name('getOccupazione');

    Route::get('/register', [RegisteredUserController::class, 'getStato'])
        ->name('getStato');

    Route::get('/register', [RegisteredUserController::class, 'getRegione'])
        ->name('getRegione');

    Route::get('/register', [RegisteredUserController::class, 'getProvincia'])
        ->name('getProvincia');

    Route::get('/register', [RegisteredUserController::class, 'getComune'])
        ->name('getComune');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
