@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold">Hasil Pencarian untuk: <span class="text-primary">"{{ $keyword }}"</span></h2>
        <p class="text-muted">Menampilkan hasil pencarian yang sesuai.</p>
    </div>

    <!-- 1. HASIL LAYANAN -->
    @if($layanans->isNotEmpty())
    <div class="mb-5">
        <h4 class="fw-bold mb-3 border-bottom pb-2">Layanan</h4>
        <div class="row g-4">
            @foreach($layanans as $layanan)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if(!empty($layanan->gambar))
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" class="card-img-top" alt="{{ $layanan->judul }}" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                <i class="fas fa-image fa-2x"></i>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold mb-2">{{ $layanan->judul }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit($layanan->deskripsi, 80) }}</p>
                            
                            @if(!empty($layanan->harga))
                                <p class="fw-bold text-primary mb-3">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</p>
                            @endif

                            <a href="{{ url('/layanan') }}" class="btn btn-sm btn-outline-primary mt-auto rounded-pill">Lihat Layanan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 2. HASIL ARTIKEL -->
    @if($artikels->isNotEmpty())
    <div class="mb-5">
        <h4 class="fw-bold mb-3 border-bottom pb-2">Artikel</h4>
        <div class="row g-4">
            @foreach($artikels as $artikel)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if(!empty($artikel->gambar))
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                <i class="fas fa-newspaper fa-2x"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold mb-2">{{ $artikel->judul }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit($artikel->deskripsi ?? $artikel->isi, 80) }}</p>
                            <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-sm btn-outline-warning mt-auto rounded-pill">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 3. HASIL GALERI -->
    @if($galeris->isNotEmpty())
    <div class="mb-5">
        <h4 class="fw-bold mb-3 border-bottom pb-2">Galeri</h4>
        <div class="row g-4">
            @foreach($galeris as $galeri)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if(!empty($galeri->gambar))
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="Galeri" style="height: 180px; object-fit: cover;">
                        @elseif(!empty($galeri->foto))
                            <img src="{{ asset('storage/' . $galeri->foto) }}" class="card-img-top" alt="Galeri" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                <i class="fas fa-images fa-2x"></i>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold mb-3">{{ $galeri->judul ?? $galeri->nama_galeri ?? 'Galeri Foto' }}</h5>
                            <a href="{{ url('/galeri') }}" class="btn btn-sm btn-outline-success mt-auto rounded-pill">Lihat Galeri</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Jika tidak ada hasil sama sekali -->
    @if($layanans->isEmpty() && $artikels->isEmpty() && $galeris->isEmpty())
        <div class="alert alert-warning text-center rounded-pill py-3">
            Tidak ada hasil yang ditemukan untuk kata kunci "{{ $keyword }}".
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-4"><i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda</a>
    </div>
</div>
@endsection