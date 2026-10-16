<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() { return view('frontend.home'); }
    public function profil() { return view('frontend.profil'); }
    public function layanan() { return view('frontend.layanan'); }
    public function artikel() { return view('frontend.artikel'); }
    public function galeri() { return view('frontend.galeri'); }
    public function kontak() { return view('frontend.kontak'); }
    
    // Halaman Admin sederhana
    public function admin() { return view('admin.index'); }
}
