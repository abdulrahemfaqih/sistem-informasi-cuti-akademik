<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataTembusanBssController extends Controller
{
    public function dataTembusanBssBaru()
    {
        return view('admin_fakultas.data_tembusan_bss.baru');
    }

    public function dataTembusanBssHistori()
    {
        return view('admin_fakultas.data_tembusan_bss.histori');
    }
}
