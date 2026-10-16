@extends('layouts.app')

@section('content')
<!-- Header Page Banner Profil -->
<div class="position-relative text-white overflow-hidden py-5 mb-5" style="background: linear-gradient(rgba(13, 35, 58, 0.9), rgba(13, 35, 58, 0.85)), url('{{ asset('img/profil.jpg') }}') center/cover no-repeat; padding-top: 120px !important;">
    <div class="container px-4 px-md-5 py-4">
        <span class="text-info fw-bold text-uppercase tracking-wider small">Tentang Kami</span>
        <h1 class="display-4 fw-bold text-white mb-2">{{ $profil->hero_judul ?? 'Profil Perusahaan' }}</h1>
        <p class="col-lg-7 fs-5 opacity-85 mb-0 text-light fw-light">
            {{ $profil->hero_deskripsi ?? 'Mengenal lebih dekat PT Solusi Koneksi Anda sebagai mitra transformasi digital dan infrastruktur jaringan terpercaya.' }}
        </p>
    </div>
</div>

<!-- Konten Utama Profil (Dalam Container Rapi & Berjarak) -->
<div class="container px-4 px-md-5 pb-5">

    <!-- About Section / Tentang Kami -->
    <div class="row align-items-center mb-5 pb-4">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h2 class="fw-bold mb-3" style="color: #0d233a;">{{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}</h2>
            <p class="text-muted leading-relaxed fs-6 mb-3">
                {{ $profil->deskripsi_1 ?? '' }}
            </p>
            @if(!empty($profil->deskripsi_2))
                <p class="text-muted leading-relaxed fs-6 mb-0">
                    {{ $profil->deskripsi_2 }}
                </p>
            @endif
        </div>
        <div class="col-lg-6 ps-lg-5">
            <img src="{{ asset('img/profil1.jpg') }}" alt="Tim PT Solusi Koneksi Anda" class="img-fluid rounded-3 shadow border">
        </div>
    </div>

    <!-- Visi & Misi Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-3" style="background-color: #f8fafc; border-left: 5px solid #00d4ff !important;">
                <div class="card-body p-2">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="p-2 bg-info bg-opacity-10 text-info rounded-2 fs-4">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="fw-bold fs-4 mb-0" style="color: #0d233a;">Visi Kami</h3>
                    </div>
                    <p class="card-text text-muted mb-0 leading-relaxed">
                        {{ $profil->visi ?? '' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-3" style="background-color: #f8fafc; border-left: 5px solid #0d233a !important;">
                <div class="card-body p-2">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-2 fs-4">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="fw-bold fs-4 mb-0" style="color: #0d233a;">Misi Kami</h3>
                    </div>
                    <ul class="text-muted mb-0 ps-3 leading-relaxed">
                        @if(!empty($profil->misi))
                            @foreach(explode("\n", str_replace("\r", "", $profil->misi)) as $poinMisi)
                                @if(trim($poinMisi) != '')
                                    <li class="mb-2">{{ $poinMisi }}</li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

   <!-- Bagian Logo Klien / Mitra Kerja -->
    <div class="mb-5 text-center">
        <h5 class="text-uppercase fw-bold text-muted mb-4 tracking-wider small" style="letter-spacing: 2px;">Dipercaya Oleh Berbagai Perusahaan</h5>
        <div class="row align-items-center justify-content-center g-4">
            <!-- Ganti teks atau div ini dengan tag <img> logo klien perusahaan jika ada -->
            <div class="col-6 col-md-3">
                <div class="p-3 border border-light-subtle rounded-3 bg-white shadow-sm fw-bold text-muted py-4">
                    <i class="fas fa-building me-2 text-info"></i> MITRA KORPORAT 1
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border border-light-subtle rounded-3 bg-white shadow-sm fw-bold text-muted py-4">
                    <i class="fas fa-network-wired me-2 text-info"></i> MITRA KORPORAT 2
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border border-light-subtle rounded-3 bg-white shadow-sm fw-bold text-muted py-4">
                    <i class="fas fa-shield-alt me-2 text-info"></i> MITRA KORPORAT 3
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border border-light-subtle rounded-3 bg-white shadow-sm fw-bold text-muted py-4">
                    <i class="fas fa-globe me-2 text-info"></i> MITRA KORPORAT 4
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Call to Action (CTA) / Hubungi Kami -->
    <div class="p-5 rounded-3 text-white text-center shadow-sm position-relative overflow-hidden mb-4" style="background: linear-gradient(135deg, #0d233a 0%, #16365c 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10 bg-grid"></div>
        <div class="position-relative z-1">
            <h3 class="fw-bold mb-3">Siap Meningkatkan Konektivitas Bisnis Anda?</h3>
            <p class="text-light opacity-85 mb-4 col-lg-8 mx-auto fw-light">
                Konsultasikan kebutuhan infrastruktur jaringan dan internet dedicated perusahaan Anda bersama tim ahli kami sekarang juga.
            </p>
            <a href="{{ route('kontak.index') }}" class="btn btn-info text-white fw-semibold px-4 py-3 rounded-pill shadow-sm">
                <i class="fas fa-headset me-2"></i> Hubungi Tim Kami
            </a>
        </div>
    </div>
</div>
@endsection