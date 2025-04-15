<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['verified', 'password.confirm'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateInfo'])
        ->name('profile.info');
    Route::put('profile', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.delete');
});



require __DIR__ . '/auth.php';
