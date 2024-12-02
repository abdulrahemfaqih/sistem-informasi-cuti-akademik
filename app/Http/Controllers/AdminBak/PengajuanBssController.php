<?php

namespace App\Http\Controllers\AdminBak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanBssController extends Controller
{
    public function index() {
        return view('admin_bak.pengajuan_bss_diajukan');
    }

    public function daftarPengajuanBss() {
        return view('admin_bak.daftar_pengajuan_bss');
    }
}
