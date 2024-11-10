<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        dd('dashboard mahasiswa');
        return view('mahasiswa.dashboard');
    }
}
