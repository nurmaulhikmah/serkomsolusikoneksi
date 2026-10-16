<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function edit()
    {

        $profil = Profil::firstOrCreate([], [
            'hero_judul' => 'Profil Perusahaan',
            'hero_deskripsi' => 'Mengenal lebih dekat PT Solusi Koneksi Anda sebagai mitra transformasi digital dan infrastruktur jaringan terpercaya.',
            'nama_perusahaan' => 'PT Solusi Koneksi Anda',
            'deskripsi_1' => 'PT Solusi Koneksi Anda adalah perusahaan terdepan yang bergerak di bidang penyedia layanan konektivitas, internet dedicated, dan solusi infrastruktur digital terintegrasi di Indonesia.',
            'deskripsi_2' => 'Kami berkomitmen memberikan performa jaringan berkecepatan tinggi, aman, dan stabil demi menunjang kelancaran operasional bisnis skala kecil, menengah, hingga korporasi besar.',
            'visi' => 'Menjadi penyedia solusi konektivitas dan infrastruktur digital terdepan serta paling terpercaya di Indonesia yang mengutamakan kualitas, inovasi, dan kepuasan pelanggan.',
            'misi' => "Memberikan layanan internet dedicated dan jaringan komunikasi data yang cepat, stabil, dan terjangkau.\nMenyediakan dukungan teknis 24/7 yang responsif dan profesional demi menjaga kepuasan klien.\nTerus berinovasi mengembangkan infrastruktur jaringan modern sesuai perkembangan teknologi global.",
            'stat_1_angka' => '99.9%',
            'stat_1_label' => 'Uptime SLA Network',
            'stat_2_angka' => '24/7',
            'stat_2_label' => 'Dukungan Tim Teknis',
            'stat_3_angka' => '100+',
            'stat_3_label' => 'Klien Korporat & Bisnis',
        ]);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::first();

        $request->validate([
            'hero_judul' => 'required|string|max:255',
            'hero_deskripsi' => 'nullable|string',
            'nama_perusahaan' => 'required|string|max:255',
            'deskripsi_1' => 'required|string',
            'deskripsi_2' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'stat_1_angka' => 'nullable|string',
            'stat_1_label' => 'nullable|string',
            'stat_2_angka' => 'nullable|string',
            'stat_2_label' => 'nullable|string',
            'stat_3_angka' => 'nullable|string',
            'stat_3_label' => 'nullable|string',
        ]);

        $profil->update($request->all());

        return redirect()->route('admin.profil.edit')->with('success', 'Teks profil perusahaan berhasil diperbarui!');
    }
}