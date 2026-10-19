@extends('layouts.app')

@section('content')

<div style="margin-top: 70px;"></div>


<div class="w-100 position-relative text-white overflow-hidden" 
     style="padding-top: 80px; padding-bottom: 80px; background: linear-gradient(rgba(13, 35, 58, 0.85), rgba(27, 59, 111, 0.85)), url('{{ asset('img/hero.jpg') }}') center/cover no-repeat; min-height: 70vh; display: flex; align-items: center;">
    
    <div class="container px-4 px-md-5">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold mb-3 text-white">Solusi Koneksi & Infrastruktur Digital Terpercaya</h1>
            <p class="fs-5 opacity-85 mb-4 text-light col-md-10">
                PT Solusi Koneksi Anda hadir untuk mendukung transformasi digital dan kelancaran operasional bisnis Anda melalui layanan internet berkecepatan tinggi dan handal.
            </p>
            <div class="d-flex gap-3">
                <a href="/layanan" class="btn btn-info fw-semibold px-4 py-2 text-dark shadow-sm">Jelajahi Layanan</a>
                <a href="/kontak" class="btn btn-outline-light px-4 py-2">Hubungi Kami</a>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">

    
    <div class="row align-items-center mb-5 py-3">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('img/tentang-kami.jpg') }}" alt="Tentang Kami" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6 ps-md-4">
            <h2 class="fw-bold mb-3" style="color: #0d233a !important;">Membangun Konektivitas Tanpa Batas</h2>
            <p class="text-muted">
                Kami adalah mitra strategis bagi perusahaan dan institusi yang membutuhkan solusi jaringan, konektivitas dedicated, serta infrastruktur teknologi informasi berkualitas tinggi di wilayah Bogor dan sekitarnya.
            </p>
            <a href="/profil" class="btn btn-outline-primary btn-sm fw-semibold">Profil Lengkap &rarr;</a>
        </div>
    </div>

   
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1" style="color: #0d233a;">Layanan</h2>
                <p class="text-muted small mb-0">Solusi terbaik yang dirancang khusus untuk kebutuhan bisnis Anda</p>
            </div>
            <a href="/layanan" class="btn btn-outline-primary btn-sm fw-semibold">Lihat Semua Layanan &rarr;</a>
        </div>

        @if(isset($layanans) && $layanans->count() > 0)
            <div class="row g-4">
                @foreach($layanans as $layanan)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column p-4">
                        
                       
                        <div class="mb-3 mx-auto overflow-hidden rounded-3" style="width: 100%; height: 160px; background-color: #f8f9fa;">
                            @if(isset($layanan->gambar) && $layanan->gambar)
                                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->judul }}" class="w-100 h-100" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                    <i class="fas fa-network-wired fa-3x text-secondary opacity-50"></i>
                                </div>
                            @endif
                        </div>
                     
                        <h4 class="card-title fw-bold fs-5 mb-2 text-start" style="color: #0d233a;">{{ $layanan->judul }}</h4>

                        
                        @if(isset($layanan->harga) && $layanan->harga > 0)
                            <div class="text-start mt-auto pt-3 border-top">
                                <span class="text-muted small d-block mb-1">Mulai dari:</span>
                                <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill fs-6">
                                    Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="card shadow-sm border-0 p-4 text-center">
                <p class="text-muted small mb-0">Belum ada layanan / produk yang ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>

   
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1" style="color: #0d233a;">Artikel</h2>
                <p class="text-muted small mb-0">Perkembangan terbaru dan tips teknologi dari perusahaan</p>
            </div>
            <a href="{{ route('artikel.index') }}" class="btn btn-outline-primary btn-sm fw-semibold">Lihat Semua Artikel &rarr;</a>
        </div>

        @if(isset($artikels) && $artikels->count() > 0)
            <div class="row g-4">
                @foreach($artikels as $artikel)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 rounded-4 p-4">
            <!-- Gambar atau isi card artikel -->
            @if(!empty($artikel->gambar))
                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top mb-3 rounded-3" alt="{{ $artikel->judul }}" style="height: 160px; object-fit: cover;">
            @endif

            <p class="text-muted small mb-1">
                <i class="far fa-calendar-alt me-1"></i> {{ $artikel->created_at->locale('id')->translatedFormat('d F Y') }}
            </p>
            
            <h5 class="fw-bold mb-2">{{ $artikel->judul }}</h5>
            
            <p class="text-muted small mb-3">
                {{ Str::limit(strip_tags($artikel->konten), 80) }}
            </p>

            <!-- UBAH BAGIAN INI -->
            <a href="{{ route('artikel.show', $artikel->id) }}" class="text-decoration-none fw-bold text-primary mt-auto">
                Baca Selengkapnya &rarr;
            </a>
          </div>
            </div>
        @endforeach
            </div>
        @else
            <div class="card shadow-sm border-0 p-4">
                <p class="text-muted text-center py-2 mb-0 small">Belum ada artikel atau informasi yang ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>


    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="fw-bold mb-1" style="color: #0d233a;">Galeri</h2>
                <p class="text-muted small mb-0">Dokumentasi aktivitas dan lapangan tim kami</p>
            </div>
            <a href="/galeri" class="btn btn-outline-primary btn-sm fw-semibold">Lihat Semua Galeri &rarr;</a>
        </div>

        @if(isset($galeris) && $galeris->count() > 0)
            <div class="row g-4">
                @foreach($galeris as $galeri)
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                        @if(isset($galeri->gambar) && $galeri->gambar)
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="Galeri PT Solusi Koneksi Anda" style="height: 220px; object-fit: cover;">
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="card shadow-sm border-0 p-4">
                <p class="text-muted text-center py-2 mb-0 small">Belum ada foto galeri kegiatan yang ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>

</div>

<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container py-4">
       
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2" style="color: #0d233a;">Lokasi Kantor Kami</h2>
            <p class="text-muted small">Kunjungi kantor pusat PT Solusi Koneksi Anda untuk konsultasi layanan jaringan dan infrastruktur.</p>
            <div class="mx-auto mt-2" style="width: 50px; height: 3px; background-color: #0dcaf0;"></div>
        </div>

        <div class="row g-4 align-items-center">
            
            <div class="col-lg-4">
                <div class="card border rounded-3 shadow-sm p-4 bg-white h-100">
                    <h5 class="fw-bold mb-3" style="color: #0d233a;">PT Solusi Koneksi Anda</h5>
                    
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="p-2 rounded border mt-1" style="background-color: #f0f4f8; color: #0d233a;">
                            <i class="fas fa-map-marker-alt fa-sm"></i>
                        </div>
                        <div>
                            <span class="fw-semibold small d-block text-dark">Alamat Kantor</span>
                            <small class="text-muted">Kawasan Niaga Jl. Pajajaran (Seberang Lippo Plaza Kebon Raya), Bogor, Jawa Barat</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="p-2 rounded border mt-1" style="background-color: #f0f4f8; color: #0d233a;">
                            <i class="fas fa-phone-alt fa-sm"></i>
                        </div>
                        <div>
                            <span class="fw-semibold small d-block text-dark">Telepon</span>
                            <small class="text-muted">(0251) 800-1234</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="p-2 rounded border mt-1" style="background-color: #f0f4f8; color: #0d233a;">
                            <i class="fas fa-envelope fa-sm"></i>
                        </div>
                        <div>
                            <span class="fw-semibold small d-block text-dark">Email Resmi</span>
                            <small class="text-muted">support@solusikoneksi.co.id</small>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-8">
                <div class="card border rounded-3 shadow-sm overflow-hidden bg-white">
                    <div style="width: 100%; height: 280px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3959135759715!2d106.8049903!3d-6.5971467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzUnNDkuNyJTIDEwNsKwNDgnMTguMCJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>



<section class="py-5 bg-light my-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-2">Beri Penilaian untuk Website Ini</h3>
        <p class="text-muted mb-4">Bantu kami meningkatkan kualitas layanan informasi digital PT Solusi Koneksi Anda.</p>
        <a href="{{ route('rating.index') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">
            Beri Penilaian Sekarang &rarr;
        </a>
    </div>
</section>
@endsection