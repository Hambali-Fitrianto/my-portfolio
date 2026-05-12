<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::get('/ib-login', function () {
    return view('auth.login');
})->name('login');

Route::post('/ib-login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('profile.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('store');
    Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('show');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('destroy');
});
