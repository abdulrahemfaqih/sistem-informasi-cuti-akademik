<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminBak\AdminBakDashboardController;
use App\Http\Controllers\Mahasiswa\MahasiswaDashboardController;
use App\Http\Controllers\AdminFakultas\AdminFakultasDashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::prefix('admin_bak')->group(function () {
        Route::get('/dashboard', [AdminBakDashboardController::class, 'index'])->name('admin.bak.dashboard');
    });
});


// Route::middleware('auth')->group(function () {
Route::prefix('admin_fakultas')->group(function () {
    Route::get('/dashboard', [AdminFakultasDashboardController::class, 'index'])->name('admin.fakultas.dashboard');
});
// });


Route::middleware('auth')->group(function () {
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    });
});
