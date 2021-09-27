<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',
            'name' => 'required|min:6'
        ]);

        if($request->password !== $request->password_confirm) {
            notify()->error('Konfirmasi password tidak cocok');
            return back();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user) {
            notify()->success('Akun Anda berhasil dibuat. Silahkan masuk.');
            return redirect()->route('login');
        }

        notify()->error('Terjadi kesalahan. Coba lagi.');
        return back();
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            notify()->error('Email tidak ditemukan. Silahkan registrasi terlebih dahulu.');
            return redirect()->route('register');
        }

        if(
            Auth::attempt(['email' => $request->email, 'password' => $request->password])
        ) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        notify()->error('Terjadi kesalahan. Coba lagi.');
        return back();
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
