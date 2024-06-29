<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('dashboard')->with('success', 'User Registered Successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'User Login Successfully');
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'User Logged out Successfully');
    }
}
