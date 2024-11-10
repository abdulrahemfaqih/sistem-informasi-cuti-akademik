<?php

namespace App\Http\Controllers\AdminBak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBakDashboardController extends Controller
{
    public function index()
    {
        return view('admin_bak.dashboard');
    }
}
