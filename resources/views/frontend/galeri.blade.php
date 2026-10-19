@extends('layouts.app')

@section('content')
<!-- 1. Hero Section Galeri -->
<div class="w-100 position-relative text-white overflow-hidden mb-4" 
     style="padding-top: 60px; padding-bottom: 60px; background: linear-gradient(rgba(13, 35, 58, 0.85), rgba(27, 59, 111, 0.85)), url('{{ asset('img/galeri.jpg') }}') center/cover no-repeat; min-height: 35vh; display: flex; align-items: center;">
    
    <div class="container px-4 px-md-5 py-4">
        <h1 class="text-info fw-bold text-uppercase mb-2">Galeri</h1>
        <p class="col-lg-7 fs-5 opacity-85 mb-0 text-light fw-light">
             Rekam jejak aktivitas, pengerjaan instalasi di lapangan,dan portofolio proyek tim.
        </p>
    </div>
</div>

<!-- 2. Konten Utama Galeri -->
<div class="container py-4">

    @if($galeris->isEmpty())
        <div class="card shadow-sm border-0 rounded-4 text-center py-5">
            <div class="card-body">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h4 class="fw-bold">Belum Ada Dokumentasi Galeri</h4>
                <p class="text-muted">Admin belum mengunggah foto dokumentasi kegiatan perusahaan.</p>
            </div>
        </div>
    @else
        <div class="row g-4">
            @foreach($galeris as $galeri)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if(!empty($galeri->gambar))
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="Galeri" style="height: 200px; object-fit: cover;">
                        @elseif(!empty($galeri->foto))
                            <img src="{{ asset('storage/' . $galeri->foto) }}" class="card-img-top" alt="Galeri" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-2x"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection