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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('dashboard')->with('success', 'User Registered Successfully!');
    }
}
