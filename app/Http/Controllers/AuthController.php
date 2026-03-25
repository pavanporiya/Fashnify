<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    //login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect('/');
        }

        return back()->with('error', 'Invalid credentials');
    }

    //show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    //register logic
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect('/login');
    }
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
