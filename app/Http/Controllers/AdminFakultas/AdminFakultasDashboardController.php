<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFakultasDashboardController extends Controller
{
    public function index()
    {
        return view('admin_fakultas.dashboard');
    }
}
