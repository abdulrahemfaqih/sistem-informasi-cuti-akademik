<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::user());
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors([
                'login_failed' => 'Username atau password yang Anda masukkan salah.'
            ]);
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
