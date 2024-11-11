<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminBak\AdminBakDashboardController;
use App\Http\Controllers\Mahasiswa\MahasiswaDashboardController;
use App\Http\Controllers\AdminFakultas\AdminFakultasDashboardController;
use App\Http\Controllers\AdminFakultas\DataTembusanBssController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login.form');
    Route::post('/login', [AuthController::class, 'store'])->name('login');
});


Route::middleware('auth')->group(function () {
    Route::prefix('admin_bak')->group(function () {
        Route::get('/dashboard', [AdminBakDashboardController::class, 'index'])->name('admin.bak.dashboard');
    });
});




Route::middleware('auth')->group(function () {
    Route::prefix('admin_fakultas')->group(function () {
        Route::get('/dashboard', [AdminFakultasDashboardController::class, 'index'])->name('admin.fakultas.dashboard');
        Route::get('/data-tembusan-bss/baru', [DataTembusanBssController::class, 'dataTembusanBssBaru'])->name('admin.fakultas.data-tembusan-bss-baru');
        Route::get('/data-tembusan-bss/histori', [DataTembusanBssController::class, 'dataTembusanBssHistori'])->name('admin.fakultas.data-tembusan-bss-histori');
    });


});


Route::middleware('auth')->group(function () {
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    });
});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
