<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Http\Controllers\Controller;
use App\Models\PengajuanBss;
use Illuminate\Http\Request;

class DataTembusanBssController extends Controller
{
    public function dataTembusanBss()
    {
        $tembusan = PengajuanBss::with(['mahasiswa', 'tahunAjaran', 'semester' ])->get();
        return view('admin_fakultas.data_tembusan_bss', compact('tembusan'));
    }
}
