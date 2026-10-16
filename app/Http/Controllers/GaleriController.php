<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Tampilkan Daftar Galeri di Admin (TAMBAHAN METHOD INDEX YANG DICARI)
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    // Tampilkan Daftar Galeri di Sisi Publik / Frontend
    public function publicIndex()
    {
        $galeris = Galeri::latest()->get();
        return view('frontend.galeri', compact('galeris'));
    }

    // Tampilkan Form Tambah Galeri (Cukup Upload Gambar)
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan Galeri
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul' => 'Galeri Foto', // Judul otomatis secara sistem agar tidak error
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeris', 'public');
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // Hapus Galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}