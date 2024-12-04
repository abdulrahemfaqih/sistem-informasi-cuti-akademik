<?php

namespace App\Http\Controllers\AdminPerpus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPerpusDashboardController extends Controller
{
    public function index()
    {
        return view('admin_perpus.dashboard');
    }


}