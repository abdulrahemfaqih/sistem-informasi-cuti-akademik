<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\AdminBak\PengajuanBssController;
use App\Http\Controllers\AdminBak\AdminBakDashboardController;
use App\Http\Controllers\Mahasiswa\MahasiswaDashboardController;
use App\Http\Controllers\AdminFakultas\DataTembusanBssController;
use App\Http\Controllers\AdminFakultas\AdminFakultasDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'create'])->name('login.form');
  Route::post('/login', [AuthController::class, 'store'])->name('login');
});


Route::middleware('auth')->group(function () {
  Route::prefix('admin_bak')->group(function () {
    Route::get('/dashboard', [BakController::class, 'dashboard'])->name('admin.bak.dashboard');
    Route::get('/pengajuan-bss', [BakController::class, 'pengajuanBss'])->name('admin.bak.pengajuan-bss');
    Route::get('/daftar-mahasiswa-cuti', [BakController::class, 'daftarMahasiswaCuti'])->name('admin.bak.daftar-mahasiswa-cuti');
  });
});


Route::middleware('auth')->group(function () {
  Route::prefix('admin_fakultas')->group(function () {
    Route::get('/dashboard', [AdminFakultasDashboardController::class, 'index'])->name('admin.fakultas.dashboard');
    Route::get('/data-tembusan-bss', [DataTembusanBssController::class, 'dataTembusanBss'])->name('admin.fakultas.data-tembusan-bss-baru');
  });
});


Route::middleware('auth')->group(function () {
  Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/pengajuan-bss', [MahasiswaController::class, 'indexBss'])->name('mahasiswa.bss.index');
    Route::post('/ajukan-bss', [MahasiswaController::class, 'storeBss'])->name('mahasiswa.bss.store');
    Route::get('/data-dokumen/{IdPengajuanBss}/edit', [MahasiswaController::class, 'editBss'])->name('mahasiswa.bss.edit');
    Route::put('/data-dokumen/{IdPengajuanBss}/update', [MahasiswaController::class, 'updateBss'])->name('mahasiswa.bss.update');
    Route::get('/data-dokumen/{IdPengajuanBss}/show', [MahasiswaController::class, 'showBss'])->name('mahasiswa.bss.show');
  });
});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
