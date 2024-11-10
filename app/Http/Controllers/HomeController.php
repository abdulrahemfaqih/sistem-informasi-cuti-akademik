<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return redirect()->route('login');
    }

    private function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'admin_bak':
                return redirect()->route('admin.bak.dashboard');
            case 'admin_fakultas':
                return redirect()->route('admin.fakultas.dashboard');
            case 'mahasiswa':
                return redirect()->route('mahasiswa.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['msg' => 'Role tidak valid']);
        }
    }
}
