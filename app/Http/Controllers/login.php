<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class login extends Controller
{
    public function halamanlogin()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return view('/dashboard');
        }
        return redirect('/login')->with('message','Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
