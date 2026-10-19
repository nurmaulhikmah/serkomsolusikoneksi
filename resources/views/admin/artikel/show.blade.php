@extends('layouts.app') {{-- Sesuaikan dengan layout frontend PT Solusi Koneksi kamu --}}

@section('content')
<div class="container py-5" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            

            <!-- Judul Artikel -->
            <h1 class="fw-bold mb-3" style="color: #0d233a;">{{ $artikel->judul }}</h1>

            <!-- Tanggal Publikasi (Format Bahasa Indonesia) -->
            <p class="text-muted small mb-4">
                <i class="far fa-calendar-alt me-1"></i>  {{ \Carbon\Carbon::parse($artikel->created_at)->locale('id')->translatedFormat('d F Y') }}
            </p>

            <!-- Gambar Utama Artikel -->
            @if($artikel->gambar)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 400px; object-fit: cover;">
                </div>
            @endif

            <!-- Isi Konten Artikel -->
            <div class="content-body text-dark" style="line-height: 1.8; font-size: 1.05rem;">
                {!! nl2br(e($artikel->content)) !!}
            </div>

            <!-- Tombol Kembali di Bawah (Mengarah ke Beranda Utama) -->
            <div class="mt-5 pt-3 border-top">
                <a href="{{ url('/') }}" class="btn text-white px-4 py-2 rounded-3" style="background-color: #0d233a;">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</div>
@endsection