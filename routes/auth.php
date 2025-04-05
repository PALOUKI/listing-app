<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::middleware('guest')->group(function () {

    //------------------Register------------------//
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'OnRegister']);

    //------------------Login------------------//
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'onLogin']);

    //------------------Reset-password------------------//
    Route::get('/forgot-password', [ResetPasswordController::class, 'resetPassword'])
        ->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetForm'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'resetHandler'])
        ->name('password.update');
});



Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    //------------------Confirm-password------------------//
    Route::get('/confirm-password', [ConfirmPasswordController::class, 'create'])
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmPasswordController::class, 'store'])
        ->middleware('throttle:6,1');
});
