<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Admin\ProfilController;
use App\Models\Layanan;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Profil;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    $layanans = Layanan::latest()->take(3)->get();
    $artikels = Artikel::latest()->take(3)->get();
    $galeris  = Galeri::latest()->take(6)->get();

    return view('frontend.home', compact('layanans', 'artikels', 'galeris'));
});

// --- RUTE PUBLIK PROFIL ---
Route::get('/profil', function () {
    $profil = Profil::first();
    return view('frontend.profil', compact('profil'));
});

// --- RUTE GLOBAL SEARCH ---
Route::get('/search', function (Request $request) {
    $keyword = trim($request->input('search'));
    $keywordLower = strtolower($keyword);

    if ($keywordLower === 'layanan') {
        $layanans = Layanan::latest()->take(3)->get();
        $artikels = collect();
        $galeris  = collect();
    } 
    elseif ($keywordLower === 'artikel') {
        $layanans = collect();
        $artikels = Artikel::latest()->take(3)->get();
        $galeris  = collect();
    } 
    elseif ($keywordLower === 'galeri') {
        $layanans = collect();
        $artikels = collect();
        $galeris  = Galeri::latest()->take(6)->get();
    } 
    elseif (str_contains($keywordLower, 'profil') || str_contains($keywordLower, 'tentang')) {
        return redirect('/profil');
    }
    elseif (str_contains($keywordLower, 'kontak')) {
        return redirect('/kontak');
    }
    else {
        $layanans = Layanan::where('judul', 'like', "%{$keyword}%")
                    ->orWhere('deskripsi', 'like', "%{$keyword}%")
                    ->get();

        $artikels = Artikel::where('judul', 'like', "%{$keyword}%")
                    ->get();

        $galeris = Galeri::where('judul', 'like', "%{$keyword}%")->get();
    }

    return view('frontend.search', compact('layanans', 'artikels', 'galeris', 'keyword'));
})->name('search');

// --- RUTE PUBLIK KONTAK ---
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// --- RUTE PUBLIK RATING ---
Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');

// --- RUTE PUBLIK LAINNYA ---
Route::get('/layanan', [LayananController::class, 'publicIndex'])->name('layanan.index');

Route::get('/artikel', [ArtikelController::class, 'publicIndex'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.index');

// --- RUTE ADMIN DENGAN PROTEKSI AUTH ---
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [LayananController::class, 'dashboard'])->name('admin.dashboard');

    // --- CRUD PROFIL PERUSAHAAN ---
    Route::get('/profil', [ProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('admin.profil.update');

    // --- KELOLA AKUN ADMIN (BARU) ---
    Route::get('/admin-users', [AuthController::class, 'indexAdmin'])->name('admin.users.index');
    Route::get('/admin-users/create', [AuthController::class, 'createAdmin'])->name('admin.users.create');
    Route::post('/admin-users', [AuthController::class, 'storeAdmin'])->name('admin.users.store');
    Route::delete('/admin-users/{id}', [AuthController::class, 'destroyAdmin'])->name('admin.users.destroy');

    // CRUD Layanan Lengkap
    Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

    // CRUD Artikel Lengkap
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

    // CRUD Galeri Lengkap
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // CRUD Pesan Masuk (Kontak) Lengkap
    Route::get('/kontak', [KontakController::class, 'adminIndex'])->name('admin.kontak.index');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('admin.kontak.destroy');

    // --- KELOLA RATING & ULASAN DI ADMIN ---
    Route::get('/rating', [RatingController::class, 'adminIndex'])->name('admin.rating.index');
    Route::delete('/rating/{id}', [RatingController::class, 'destroy'])->name('admin.rating.destroy');
});