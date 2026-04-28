<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;

// 1. Tampilan Utama (Landing Page) untuk publik
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// 2. Rute Login (ib-login)
Route::get('/ib-login', function () {
    return view('auth.login');
})->name('login');

// 3. Rute CRUD Profile (Untuk Admin/Kamu)
Route::prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/profile/{profile}/update', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile/{profile}/delete', [ProfileController::class, 'destroy'])->name('destroy');
});
