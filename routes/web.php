<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\AdminFakultas\DataTanggunganController;
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
    // dashboard
    Route::get('/dashboard', [BakController::class, 'dashboard'])->name('admin.bak.dashboard');
    // pengajuan
    Route::get('/pengajuan-bss', [BakController::class, 'pengajuanBss'])->name('admin.bak.pengajuan-bss');
    Route::get('/pengajuan-bss/{id}', [BakController::class, 'detailPengajuanBss'])->name('admin.bak.detail-pengajuan-bss');
    Route::patch('/pengajuan-bss/{id}/proses', [BakController::class, 'processPengajuanBss'])->name('admin.bak.process-pengajuan-bss');
    // Route::patch('/pengajuan-bss/{id}/approve', [BakController::class, 'approvePengajuanBss'])->name('admin.bak.approve-pengajuan-bss');
    // Route::patch('/pengajuan-bss/{id}/reject', [BakController::class, 'rejectPengajuanBss'])->name('admin.bak.reject-pengajuan-bss');

    // daftar mahasiswa cuti
    Route::get('/daftar-mahasiswa-cuti', [BakController::class, 'daftarMahasiswaCuti'])->name('admin.bak.daftar-mahasiswa-cuti');
    Route::get('/detail-mahasiswa-cuti/{id}', [BakController::class, 'detailCutiMahasiswa'])->name('admin.bak.detail-mahasiswa-cuti');


    Route::get('/data-tahun-ajaran-semester', [TahunAkademikController::class, 'dataTahunAjaranSemester'])->name('admin.bak.data-tahun-ajaran-semester');
    // semester
    Route::post('/store-semester', [TahunAkademikController::class, 'storeSemester'])->name('admin.bak.store-semester');
    Route::delete('/delete-semester/{id}', [TahunAkademikController::class, 'deleteSemester'])->name('admin.bak.delete-semester');
    Route::patch('/set-aktif-semester/{id}', [TahunAkademikController::class, 'setAktifSemester'])->name('admin.bak.set-aktif-semester');
    Route::get('/semester/{id}', [TahunAkademikController::class, 'editSemester'])->name('admin.bak.edit-semester');
    Route::patch('/semester/{id}/update', [TahunAkademikController::class, 'updateSemester'])->name('admin.bak.update-semester');
    // tahun ajaran
    Route::post('/store-tahun-ajaran', [TahunAkademikController::class, 'storeTahunAjaran'])->name('admin.bak.store-tahun-ajaran');
    Route::delete('/delete-tahun-ajaran/{id}', [TahunAkademikController::class, 'deleteTahunAjaran'])->name('admin.bak.delete-tahun-ajaran');
    Route::patch('/set-aktif-tahun-ajaran/{id}', [TahunAkademikController::class, 'setAktifTahunAjaran'])->name('admin.bak.set-aktif-tahun-ajaran');
    Route::get('/tahun-ajaran/{id}', [TahunAkademikController::class, 'editTahunAjaran'])->name('admin.bak.edit-tahun-ajaran');
    Route::patch('/tahun-ajaran/{id}/update', [TahunAkademikController::class, 'updateTahunAjaran'])->name('admin.bak.update-tahun-ajaran');
  });
});


Route::middleware('auth')->group(function () {
  Route::prefix('admin_fakultas')->group(function () {
    Route::get('/dashboard', [AdminFakultasDashboardController::class, 'index'])->name('admin.fakultas.dashboard');
    Route::get('/data-tembusan-bss', [DataTembusanBssController::class, 'dataTembusanBss'])->name('admin.fakultas.data-tembusan-bss');
    Route::get('/data-tembusan-bss/{id}/download', [DataTembusanBssController::class, 'downloadPdf'])->name('admin.fakultas.download-bss');
    Route::get('/data-tanggungan', [DataTanggunganController::class, 'dataTanggungan'])->name('admin.fakultas.tanggungan');
    Route::get('/data-tanggungan/{id}/download', [DataTanggunganController::class, 'downloadPdf'])->name('admin.fakultas.download-bebas-tanggungan');
    Route::patch('/data-tanggungan/{id}/lunaskan', [DataTanggunganController::class, 'lunaskanData'])->name('admin.fakultas.lunaskan');
  });
});


Route::middleware('auth')->group(function () {
  Route::prefix('admin_perpus')->group(function () {
    Route::get('/dashboard', [AdminPerpusDashboardController::class, 'index'])->name('admin.perpus.dashboard');
    Route::get('/data-tanggungan', [DataTanggunganPerpusController::class, 'dataTanggungan'])->name('admin.perpus.tanggungan');
    Route::get('/data-tanggungan/{id}/download', [DataTanggunganPerpusController::class, 'downloadPdf'])->name('admin.perpus.download-bebas-tanggungan');
    Route::patch('/data-tanggungan/{id}/lunaskan', [DataTanggunganPerpusController::class, 'lunaskanData'])->name('admin.perpus.lunaskan');
  });
});


Route::middleware('auth')->group(function () {
  Route::prefix('admin_lab')->group(function () {
    Route::get('/dashboard', [AdminLabDashboardController::class, 'index'])->name('admin.lab.dashboard');
    Route::get('/data-tanggungan', [DataTanggunganLabController::class, 'dataTanggungan'])->name('admin.lab.tanggungan');
    Route::get('/data-tanggungan/{id}/download', [DataTanggunganLabController::class, 'downloadPdf'])->name('admin.lab.download-bebas-tanggungan');
    Route::patch('/data-tanggungan/{id}/lunaskan', [DataTanggunganLabController::class, 'lunaskanData'])->name('admin.lab.lunaskan');
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
    Route::get('/data-dokumen/{IdPengajuanBss}/cetak', [MahasiswaController::class, 'cetakBss'])->name('mahasiswa.bss.cetak');
  });
});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
