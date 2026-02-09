<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\login;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('siswa'))->with('success, selamat datang kembali');
        }

        return back()->withErrors([
            'Email atau password salah! periksa kembali!'
        ])->onlyInput('email');
    }
}
