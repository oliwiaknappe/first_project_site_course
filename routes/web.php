<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::middleware('guest')->group(function () {
    // Show registration form
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', RegisterController::class);
    // Show login form
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', LoginController::class);
});
    
// Protected routes
Route::middleware('auth')->group(function () {
    // Home routes
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/users/list', [UserController::class, 'index']);
    // Delete route
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    // Logout route
    Route::post('/logout', LogoutController::class)->name('logout');
});