<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', LoginController::class)
    ->middleware('guest');

// Logout route
Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');

// Registration route
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', RegisterController::class)
    ->middleware('guest');
    
// Home route
Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');
