@extends('layouts.app')

@section('content')
<!-- Spasi pembuka agar tidak tertutup Navbar Fixed-Top -->
<div style="margin-top: 70px;"></div>

<!-- Header Banner Kontak dengan Gambar Jelas -->
<div class="position-relative text-white overflow-hidden py-5 mb-5" 
     style="background: linear-gradient(rgba(13, 35, 58, 0.75), rgba(13, 35, 58, 0.75)), url('{{ asset('img/kontak.jpg') }}') center/cover no-repeat; padding-top: 120px !important;">
    <div class="container px-4 px-md-5 py-4">
        <h1 class="text-info fw-bold text-uppercase mb-2">Hubungi Kami</h1>
        <p class="col-lg-7 fs-5 opacity-85 mb-0 text-light fw-light">
            Silakan hubungi kami atau tinggalkan pesan untuk konsultasi kebutuhan layanan jaringan bisnis Anda.
        </p>
    </div>
</div>

<div class="container px-4 px-md-5 pb-5">
    <div class="row g-4 align-items-stretch">
        
        <!-- SEBELAH KIRI: Informasi Alamat & Kontak -->
        <div class="col-lg-5">
            <div class="card border rounded-3 shadow-sm p-4 bg-white h-100 d-flex flex-column justify-content-between">
                <div>
                    <h4 class="fw-bold mb-4" style="color: #0d233a;">Informasi Kontak</h4>

                    <!-- Alamat -->
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 rounded border text-white" style="background-color: #0d233a;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Alamat Kantor</h6>
                            <p class="text-muted small mb-0 leading-relaxed">
                                Jl. Raya Pajajaran No. 123, Bogor, Jawa Barat, Indonesia
                            </p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 rounded border text-white" style="background-color: #0d233a;">
                            <i class="fas fa-phone-alt fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Telepon / WhatsApp</h6>
                            <p class="text-muted small mb-0">(0251) 800-1234 / +62 812-3456-7890</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 rounded border text-white" style="background-color: #0d233a;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Email Resmi</h6>
                            <p class="text-muted small mb-0">support@solusikoneksi.co.id</p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="p-3 rounded border text-white" style="background-color: #0d233a;">
                            <i class="fas fa-clock fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Jam Operasional</h6>
                            <p class="text-muted small mb-0">Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu & Minggu: Layanan WhatsApp 24 Jam</p>
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-top mt-auto">
                    <p class="text-muted small mb-0 text-center">Tim profesional kami siap membantu kelancaran jaringan Anda.</p>
                </div>
            </div>
        </div>

        <!-- SEBELAH KANAN: Formulir Pesan -->
        <div class="col-lg-7">
            <div class="card border rounded-3 shadow-sm p-4 bg-white h-100">
                <h4 class="fw-bold mb-4" style="color: #0d233a;">Pesan</h4>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show small" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold small text-dark">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold small text-dark">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="pesan" class="form-label fw-semibold small text-dark">Isi Pesan <span class="text-danger">*</span></label>
                        <textarea class="form-control shadow-none" id="pesan" name="pesan" rows="5" placeholder="Tuliskan pesan atau konsultasi Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn w-100 text-white fw-semibold py-2" style="background-color: #0d233a;">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection