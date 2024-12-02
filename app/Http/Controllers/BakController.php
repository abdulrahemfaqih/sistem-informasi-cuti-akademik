<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BakController extends Controller
{
    public function dashboard()
    {
        return view('admin_bak.dashboard');
    }

    public function pengajuanBss()
    {
        return view('admin_bak.pengajuan_bss');
    }

    public function daftarMahasiswaCuti()
    {
        return view('admin_bak.daftar_mahasiswa_cuti');
    }
}
