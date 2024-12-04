<?php

namespace App\Http\Controllers\AdminLab;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLabDashboardController extends Controller
{
    public function index()
    {
        return view('admin_lab.dashboard');
    }


}