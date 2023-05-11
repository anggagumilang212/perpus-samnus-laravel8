<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman', compact('peminjaman'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'judul_buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',

        ]);
        $peminjaman = Peminjaman::create([
            'nama' => $request->nama,
            'judul_buku' => $request->judul_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,

        ]);
        if ($peminjaman) {
            return redirect('admin/peminjaman')->with('success', 'peminjaman Berhasil Dibuat.');
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'judul_buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',

        ]);
        $peminjaman = Peminjaman::where('id', $request->id)->update([
            'nama' => $request->nama,
            'judul_buku' => $request->judul_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,

        ]);
        if ($peminjaman) {
            return redirect('admin/peminjaman')->with('success', 'peminjaman Berhasil Diedit.');
        }
    }
    public function delete(Request $request)
    {
        $del = Peminjaman::where('id', $request->id)->delete();

        if ($del) {
            return redirect('admin/peminjaman')->with('success', 'Peminjaman Berhasil Dihapus.');
        }
    }
}
