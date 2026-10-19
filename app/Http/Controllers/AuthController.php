<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses data login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus data sesi dan membuat token sesi baru demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }

    // ==========================================
    // FITUR KELOLA AKUN ADMIN (MULTI-ADMIN)
    // ==========================================

    /**
     * Menampilkan daftar semua akun admin.
     */
    public function indexAdmin()
    {
        $admins = User::latest()->get();
        return view('admin.users.index', compact('admins'));
    }

    /**
     * Menampilkan form untuk menambah admin baru.
     */
    public function createAdmin()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan data admin baru ke database.
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Akun admin baru berhasil ditambahkan!');
    }

    /**
     * Menghapus akun admin dari database.
     */
    public function destroyAdmin($id)
    {
        $admin = User::findOrFail($id);
        
        // Mencegah admin menghapus akunnya sendiri yang sedang aktif digunakan
        if (auth()->id() == $admin->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun yang sedang Anda gunakan!');
        }

        $admin->delete();
        return redirect()->route('admin.users.index')->with('success', 'Akun admin berhasil dihapus!');
    }
}