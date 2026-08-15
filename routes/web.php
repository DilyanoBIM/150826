<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Middleware 'guest' untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Middleware 'auth' untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});