@extends('layouts.app')

@section('content')
<!-- Tambahkan pt-4 atau perbesar jarak atasnya -->
<div class="container py-4 mt-5 pt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="{{ url('/') }}" class="btn btn-outline-dark rounded-pill">
                    <i class="fas fa-arrow-left me-1"></i> 
                </a>
            </div>

            <!-- Judul Artikel -->
            <h2 class="fw-bold mt-3 mb-4">{{ $artikel->judul }}</h2>
            
            <!-- Tanggal & Info -->
            <p class="text-muted small mb-1">
                <i class="far fa-calendar-alt me-1"></i> {{ $artikel->created_at->locale('id')->translatedFormat('d F Y') }}
            </p>

            <!-- Gambar Utama Artikel -->
            @if(!empty($artikel->gambar))
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded-4 shadow-sm w-50" alt="{{ $artikel->judul }}" style="max-height: 300px; object-fit: cover;">
                </div>
            @endif

            <!-- Isi / Konten Lengkap Artikel -->
            <div class="content-artikel fs-5 text-secondary lh-lg">
                {!! $artikel->konten ?? 'Belum ada konten untuk artikel ini.' !!}
            </div>
        </div>
    </div>
</div>
@endsection