<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{

// Menampilkan daftar ulasan di Panel Admin
    public function adminIndex()
    {
        $ratings = Rating::latest()->get();
        return view('admin.rating.index', compact('ratings'));
    }

    // Menghapus ulasan dari Panel Admin
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect()->route('admin.rating.index')->with('success', 'Ulasan berhasil dihapus!');
    }

    // Menampilkan halaman ulasan & daftar rating
    public function index()
    {
        $ratings = Rating::latest()->get();
        $averageRating = Rating::avg('bintang') ? number_format(Rating::avg('bintang'), 1) : 0;
        $totalRating = Rating::count();

        return view('frontend.rating', compact('ratings', 'averageRating', 'totalRating'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'nullable|max:255',
            'bintang'  => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        Rating::create([
            'nama'     => $request->nama ?? 'Anonim',
            'bintang'  => $request->bintang,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas penilaian dan masukan Anda!');
    }
    
}