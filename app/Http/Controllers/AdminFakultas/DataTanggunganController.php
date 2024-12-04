<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Http\Controllers\Controller;
use App\Models\TanggunganFakultas;
use Illuminate\Http\Request;

class DataTanggunganController extends Controller
{
    public function dataTanggungan()
    {
        $tanggungan = TanggunganFakultas::get();
        return view('admin_fakultas.data_tanggungan');
    }
}
