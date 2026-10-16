@extends('layouts.app')

@section('content')
<!-- Header Page Banner Layanan --> 
<div class="position-relative text-white overflow-hidden py-5 mb-5" style="background: linear-gradient(rgba(13, 35, 58, 0.9), rgba(13, 35, 58, 0.85)), url('{{ asset('img/layanan.jpg') }}') center/cover no-repeat; padding-top: 120px !important;">
    <div class="container px-4 px-md-5 py-4">
        <span class="text-info fw-bold text-uppercase tracking-wider small">Solusi & Produk</span>
        <h1 class="display-4 fw-bold text-white mb-2">Layanan Perusahaan</h1>
        <p class="col-lg-7 fs-5 opacity-85 mb-0 text-light fw-light">
            Berbagai pilihan layanan infrastruktur jaringan dan konektivitas terbaik yang dirancang khusus untuk kebutuhan bisnis Anda.
        </p>
    </div>
</div>

<!-- Konten Semua Layanan (Menampilkan SEMUA data, bentuk card dijamin 100% sama plek kaya di Home) -->
<div class="container px-4 px-md-5 pb-5">
    @if(isset($layanans) && $layanans->count() > 0)
        <div class="row g-4">
            @foreach($layanans as $layanan)
            <div class="col-md-4 mb-3">
                <!-- CARD INI DIJAMIN SAMA PERSIS DENGAN YANG ADA DI HOME -->
                <div class="card h-100 shadow-sm border-0 rounded-4 bg-white overflow-hidden d-flex flex-column">
                    
                    <!-- Gambar Layanan -->
                    <div class="p-3 pb-0">
                        @if(isset($layanan->image) && $layanan->image)
                            <img src="{{ asset('storage/' . $layanan->image) }}" class="card-img-top rounded-3" alt="{{ $layanan->title }}" style="height: 180px; object-fit: cover;">
                        @elseif(isset($layanan->gambar) && $layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" class="card-img-top rounded-3" alt="{{ $layanan->title }}" style="height: 180px; object-fit: cover;">
                        @else
                            <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80" class="card-img-top rounded-3" alt="Layanan" style="height: 180px; object-fit: cover;">
                        @endif
                    </div>

                    <!-- Isi Card (Judul & Deskripsi) -->
                    <div class="card-body p-4 d-flex flex-column">
                        <h4 class="card-title fw-bold fs-5 mb-3" style="color: #0d233a;">
                            {{ $layanan->title ?? $layanan->judul }}
                        </h4>

                        <!-- Bagian Harga / Mulai dari -->
                        <div class="mt-auto pt-3 border-top">
                            <span class="text-muted small d-block mb-1">Mulai dari:</span>
                            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 fs-6 rounded-pill">
                                Rp {{ number_format($layanan->harga ?? $layanan->price ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Tampilan Jika Belum Ada Data Layanan -->
        <div class="p-5 text-center bg-light rounded-4 border border-dashed my-4">
            <div class="mb-3">
                <i class="fas fa-boxes text-muted fs-1"></i>
            </div>
            <h4 class="fw-bold" style="color: #0d233a;">Belum Ada Layanan Tersedia</h4>
            <p class="text-muted small mb-0">Admin belum menambahkan data layanan atau produk ke dalam sistem.</p>
        </div>
    @endif
</div>
@endsection