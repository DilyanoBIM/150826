<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Middleware 'guest' untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('modules.auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Middleware 'auth' untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        // PERBARUI BARIS DI BAWAH INI
        // Sesuaikan dengan struktur folder: pages/dashboard/index.blade.php
        return view('pages.dashboard.index'); 
    })->name('dashboard');

    // TAMBAHKAN ROUTE INI:
    Route::get('/products', function () {
        return view('pages.products.index'); 
    })->name('products.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});