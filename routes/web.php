<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::inertia('/about', 'About', ["user" => "Mike"])->middleware('verified')->name('about');

require __DIR__ . '/auth.php';
