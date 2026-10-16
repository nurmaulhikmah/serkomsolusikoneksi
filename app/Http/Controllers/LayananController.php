<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Artikel;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Tampilkan statistik dan halaman dashboard admin.
     */
    public function dashboard()
    {
        $totalLayanan = Layanan::count();
        $totalArtikel = Artikel::count();
        $totalGaleri  = Galeri::count();

        return view('admin.dashboard', compact('totalLayanan', 'totalArtikel', 'totalGaleri'));
    }

    /**
     * Tampilkan daftar layanan untuk pengunjung publik (frontend).
     */
    public function publicIndex()
    {
        $layanans = Layanan::latest()->get();
        return view('frontend.layanan', compact('layanans'));
    }

    /**
     * Tampilkan daftar layanan di panel admin.
     */
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Tampilkan form untuk menambah layanan baru.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Simpan data layanan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'harga'     => 'required|numeric|min:0',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul'       => $request->judul,
            'harga'       => $request->harga,
        ];

        // Proses simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit layanan.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Perbarui data layanan di database.
     */
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'harga'     => 'required|numeric|min:0',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul'       => $request->judul,
            'harga'       => $request->harga,
        ];

        // Jika ada upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar && Storage::disk('public')->exists($layanan->gambar)) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan perusahaan berhasil diperbarui.');
    }

    /**
     * Hapus data layanan dari database.
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        
        // Hapus file gambar dari storage jika ada
        if ($layanan->gambar && Storage::disk('public')->exists($layanan->gambar)) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}