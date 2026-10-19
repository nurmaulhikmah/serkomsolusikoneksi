<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel untuk pengunjung publik (frontend).
     */
    public function publicIndex()
    {
        $artikels = Artikel::latest()->get();
        return view('frontend.artikel', compact('artikels'));
    }

    /**
     * Menampilkan detail artikel untuk pengunjung publik (frontend).
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('frontend.artikel-detail', compact('artikel'));
    }

    /**
     * Menampilkan daftar artikel di admin.
     */
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Menampilkan form tambah artikel.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'content' => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'konten' => $request->content,
            'gambar'  => $path,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit artikel.
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Memperbarui data artikel di database.
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'content' => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $artikel->gambar;
        if ($request->hasFile('gambar')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'content' => $request->content,
            'gambar'  => $path,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus data artikel dari database.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}