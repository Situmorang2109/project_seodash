<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =============================
    // SHOW LOGIN FORM
    // =============================
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // =============================
    // LOGIN
    // =============================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Login failed']);
    }

    // =============================
    // SHOW REGISTER FORM
    // =============================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // =============================
    // REGISTER
    // =============================
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created');
    }

    // =============================
    // LOGOUT
    // =============================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
