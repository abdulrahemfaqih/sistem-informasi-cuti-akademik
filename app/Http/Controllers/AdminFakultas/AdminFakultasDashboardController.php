<?php

namespace App\Http\Controllers\AdminFakultas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFakultasDashboardController extends Controller
{
    public function index()
    {
        return view('admin_fakultas.dashboard');
    }


}
