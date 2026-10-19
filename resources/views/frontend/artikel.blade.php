@extends('layouts.app')

@section('content')
<!-- Header Page Banner Artikel -->
<div class="position-relative text-white overflow-hidden py-5 mb-5" style="background: linear-gradient(rgba(13, 35, 58, 0.9), rgba(13, 35, 58, 0.85)), url('{{ asset('img/artikel.jpg') }}') center/cover no-repeat; padding-top: 120px !important;">
    <div class="container px-4 px-md-5 py-4">
        <h1 class="text-info fw-bold text-uppercase mb-2">Artikel</h1>
        <p class="col-lg-7 fs-5 opacity-85 mb-0 text-light fw-light">
            Temukan artikel, berita industri telekomunikasi, dan wawasan seputar teknologi jaringan dari tim PT Solusi Koneksi Anda.
        </p>
    </div>
</div>

<!-- Konten Utama Artikel (3 Berjajar Rapi) -->
<div class="container px-4 px-md-5 pb-5">
    <!-- Menggabungkan pengecekan $articles atau $artikels agar tidak kosong -->
    @php
        $listArtikel = $articles ?? $artikels ?? collect();
    @endphp

    @if($listArtikel->count() > 0)
        <div class="row g-4">
            @foreach($listArtikel as $article)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                    @if(isset($article->image) && $article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title ?? $article->judul }}" style="height: 160px; object-fit: cover;">
                    @elseif(isset($article->gambar) && $article->gambar)
                        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="{{ $article->title ?? $article->judul }}" style="height: 160px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 160px;">
                            <i class="fas fa-newspaper fs-1 opacity-50"></i>
                        </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex align-items-center gap-2 mb-2 text-muted small">
                            <i class="far fa-calendar-alt"></i>
                            <span>{{ $article->created_at ? $article->created_at->locale('id')->translatedformat('d F Y') : 'Terbaru' }}</span>
                        </div>
                        
                        <h5 class="card-title fw-bold fs-6 mb-3" style="color: #0d233a;">
                            {{ $article->title ?? $article->judul }}
                        </h5>
                        
                        <p class="card-text text-muted small leading-relaxed mb-4">
                            {{ Str::limit(strip_tags($article->content ?? $article->deskripsi), 100) }}
                        </p>
                        
                        <a href="/artikel/{{ $article->id }}" class="text-decoration-none fw-semibold small mt-auto text-primary">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Tampilan Jika Belum Ada Data Artikel -->
        <div class="p-5 text-center bg-light rounded-3 border border-dashed my-4">
            <div class="mb-3">
                <i class="fas fa-newspaper text-muted fs-1"></i>
            </div>
            <h4 class="fw-bold" style="color: #0d233a;">Belum Ada Artikel Dipublikasikan</h4>
            <p class="text-muted small mb-0">Admin belum menambahkan artikel atau berita terbaru ke dalam sistem.</p>
        </div>
    @endif
</div>
@endsection