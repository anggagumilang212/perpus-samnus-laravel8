<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user', compact('user'));

    }
    public function store(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        User::create([
            'email' => $request->email,
            'password' => $request->password,

        ]);

        return redirect('admin/user')->with('success', 'User Berhasil Dibuat.');
    }
    public function update(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        $atlet = User::where('id', $request->id)->update([
            'email' => $request->email,
            'password' => $request->password,

        ]);

        if ($atlet) {
            return redirect('admin/user')->with('success', 'User Berhasil Diedit.');
        }
    }
    public function delete(Request $request)
    {
        $del = User::where('id', $request->id)->delete();

        if ($del) {
            return redirect('admin/user')->with('success', 'User Berhasil Dihapus.');
        }
    }
}
