<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

// 1. Tampilan Utama (Landing Page)
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// 2. Rute Login
Route::get('/ib-login', function () {
    return view('auth.login');
})->name('login');

// Rute untuk memproses form login (Ini yang tadi hilang)
Route::post('/ib-login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Rute CRUD Profile (Admin Area)
Route::prefix('admin')->name('profile.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('create');
    // Store menggunakan POST
    Route::post('/profile', [ProfileController::class, 'store'])->name('store');
    // Edit & Update
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('update');
    // Delete
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('destroy');
});
