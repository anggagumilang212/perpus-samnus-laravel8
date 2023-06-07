<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class HomeController extends Controller
{
    public function home()
    {
        $peminjaman = Peminjaman::all();
        return view('home', compact('peminjaman'));
    }
}
