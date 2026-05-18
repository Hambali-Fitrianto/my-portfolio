<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController; // 1. Impor Controller Project Baru

// 1. Tampilan Utama (Landing Page)
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// 2. Rute Login & Logout
Route::get('/ib-login', function () {
    return view('auth.login');
})->name('login');

Route::post('/ib-login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Rute Admin Area (Terproteksi Login)
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // CRUD Profile
    Route::name('profile.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('index');
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('create');
        Route::post('/profile', [ProfileController::class, 'store'])->name('store');
        Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('show');
        Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // CRUD Experience
    Route::name('experience.')->group(function () {
        Route::get('/experience', [ExperienceController::class, 'index'])->name('index');
        Route::get('/experience/create', [ExperienceController::class, 'create'])->name('create');
        Route::post('/experience', [ExperienceController::class, 'store'])->name('store');
        Route::get('/experience/{experience}', [ExperienceController::class, 'show'])->name('show');
        Route::get('/experience/{experience}/edit', [ExperienceController::class, 'edit'])->name('edit');
        Route::put('/experience/{experience}', [ExperienceController::class, 'update'])->name('update');
        Route::delete('/experience/{experience}', [ExperienceController::class, 'destroy'])->name('destroy');
    });

    // CRUD Education
    Route::name('education.')->group(function () {
        Route::get('/education', [EducationController::class, 'index'])->name('index');
        Route::get('/education/create', [EducationController::class, 'create'])->name('create');
        Route::post('/education', [EducationController::class, 'store'])->name('store');
        Route::get('/education/{education}/edit', [EducationController::class, 'edit'])->name('edit');
        Route::put('/education/{education}', [EducationController::class, 'update'])->name('update');
        Route::delete('/education/{education}', [EducationController::class, 'destroy'])->name('destroy');
    });

    // CRUD Projects (Penambahan Komponen Baru)
    Route::name('projects.')->group(function () {
        Route::get('/projects', [ProjectController::class, 'index'])->name('index');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('store');
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('show');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('destroy');
        // Rute khusus hapus satu file screenshot di form edit
        Route::delete('/projects/image/{image}', [ProjectController::class, 'destroyImage'])->name('destroyImage');
    });
});
