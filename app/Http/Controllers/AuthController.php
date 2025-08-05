<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        //dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Secara default, peran adalah 'user'
        ]);

        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect sesuai peran
        if (Auth::user()->role === 'staff') {
            return redirect()->intended(route('staff.dashboard'));
        } elseif (Auth::user()->role === 'penghulu') {
            return redirect()->intended(route('penghulu.dashboard'));
        } else {
            return redirect()->intended(route('user.schedule'));
        }
    }

    // Jika login gagal, kembalikan ke halaman sebelumnya dengan pesan error
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}