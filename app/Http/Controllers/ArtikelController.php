<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // Tampilkan Daftar Artikel di Panel Admin
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('admin.artikel.index', compact('artikels'));
    }

    // Tampilkan Halaman Depan / Publik (List Artikel)
    public function publicIndex()
    {
        $artikels = Artikel::latest()->get();
        return view('frontend.artikel', compact('artikels'));
    }

    // Tampilkan Halaman Detail Artikel (Publik)
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('frontend.artikel-detail', compact('artikel'));
    }

    // Tampilkan Form Tambah Artikel
    public function create()
    {
        return view('admin.artikel.create');
    }

    // Proses Simpan Artikel ke Database
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|max:255',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul'  => $request->judul,
            'konten' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Tampilkan Form Edit Artikel
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    // Proses Update Artikel ke Database
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'     => 'required|max:255',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $artikel->judul = $request->judul;
        $artikel->konten = $request->deskripsi;

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $artikel->gambar = $request->file('gambar')->store('artikels', 'public');
        }

        $artikel->save();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }
}