<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Halaman Depan / Publik
    public function index()
    {
        return view('frontend.kontak');
    }

    // Simpan Pesan dari Publik
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        Kontak::create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }

    // Admin: Tampilkan Daftar Pesan
    public function adminIndex()
    {
        $kontaks = Kontak::latest()->get();
        return view('admin.kontak.index', compact('kontaks'));
    }

    // Admin: Hapus Pesan
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }
}