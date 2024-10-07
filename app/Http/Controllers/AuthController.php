<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Login berhasil');
        } else {
            return back()->with('error', 'Email or Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
