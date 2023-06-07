<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formlogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request)) {
            return redirect('admin/peminjaman');
        }
        return redirect()->back()->with('error', 'Email Or Password Are Wrong');
    }
    public function logout()
    {

        Auth::logout();
        return redirect('/login');
    }
}
