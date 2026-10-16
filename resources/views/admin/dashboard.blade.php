@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0" style="color: #0d233a;">Dashboard Admin</h3>
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary btn-sm px-3">
            <i class="fas fa-external-link-alt me-1"></i> Pratinjau Situs
        </a>
    </div>

    <div class="row g-3">
        <!-- Card Layanan -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-uppercase fw-bold text-muted small">Layanan</span>
                        <div class="p-2 bg-light rounded text-primary">
                            <i class="fas fa-sitemap fs-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #0d233a;">{{ $totalLayanan ?? 3 }}</h2>
                    <span class="text-muted small">Produk / Jasa</span>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('admin.layanan.index') }}" class="text-decoration-none small text-muted d-flex justify-content-between align-items-center">
                        Kelola Layanan <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Artikel -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-uppercase fw-bold text-muted small">Artikel</span>
                        <div class="p-2 bg-light rounded text-primary">
                            <i class="fas fa-file-alt fs-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #0d233a;">{{ $totalArtikel ?? 4 }}</h2>
                    <span class="text-muted small">Publikasi Konten</span>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('admin.artikel.index') }}" class="text-decoration-none small text-muted d-flex justify-content-between align-items-center">
                        Kelola Artikel <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Galeri -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-uppercase fw-bold text-muted small">Galeri</span>
                        <div class="p-2 bg-light rounded text-primary">
                            <i class="fas fa-images fs-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #0d233a;">{{ $totalGaleri ?? 3 }}</h2>
                    <span class="text-muted small">File Gambar</span>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none small text-muted d-flex justify-content-between align-items-center">
                        Kelola Galeri <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Profil Perusahaan (BARU) -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-uppercase fw-bold text-muted small">Profil</span>
                        <div class="p-2 bg-light rounded text-primary">
                            <i class="fas fa-building fs-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #0d233a;"><i class="fas fa-pen-to-square fs-4 text-info"></i></h2>
                    <span class="text-muted small">Edit Informasi</span>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('admin.profil.edit') }}" class="text-decoration-none small text-muted d-flex justify-content-between align-items-center">
                        Edit Profil <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection