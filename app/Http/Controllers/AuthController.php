<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(UserRequest $request, User $user)
    {
        User::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Your Account Created Successfully');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $validated =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'You loggen in Successfully');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'The email or password you provided is not correct',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You logged out Successfully');
    }
}
