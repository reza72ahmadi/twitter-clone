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

    // public function login()
    // {
    //     return view('auth.login');
    // }
}
