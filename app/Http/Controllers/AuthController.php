<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validat = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);
        User::create($validat);
        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validat = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validat)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'logged in successfully');
        }
        return redirect()->route('login')->withErrors('failed');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'logged out successfully');
    }
}
