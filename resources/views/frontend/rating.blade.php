@extends('layouts.app')

@section('content')
<div class="container py-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <!-- Card Form Penilaian -->
            <div class="card shadow-sm border-0 rounded-4 p-4 p-md-5 bg-white">
                
                <!-- Judul & Subtitle -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-2">Beri Penilaian untuk Website Ini</h3>
                    <p class="text-muted small">
                        Bantu kami meningkatkan kualitas layanan informasi digital PT Solusi Koneksi Anda.
                    </p>
                </div>

                <!-- Notifikasi Sukses -->
                @if(session('success'))
                    <div class="alert alert-success rounded-pill text-center py-2 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Penilaian -->
                <form action="{{ route('rating.store') }}" method="POST">
                    @csrf
                    
                    <!-- Nama (Opsional) -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Nama</label>
                        <input type="text" name="nama" class="form-control rounded-3 py-2 px-3" placeholder="Nama Anda...">
                    </div>

                    <!-- Seberapa puas Anda dengan website ini? -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Seberapa puas Anda dengan website ini?</label>
                        <select name="bintang" class="form-select rounded-3 py-2 px-3" required>
                            <option value="5">⭐⭐⭐⭐⭐ - Sangat Memuaskan</option>
                            <option value="4">⭐⭐⭐⭐ - Memuaskan</option>
                            <option value="3">⭐⭐⭐ - Cukup</option>
                            <option value="2">⭐⭐ - Kurang</option>
                            <option value="1">⭐ - Buruk</option>
                        </select>
                    </div>

                    <!-- Kritik & Saran -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Kritik & Saran</label>
                        <textarea name="komentar" class="form-control rounded-3 p-3" rows="4" placeholder="Tuliskan masukan untuk kemajuan PT Solusi Koneksi Anda..."></textarea>
                    </div>

                    <!-- Tombol Kirim -->
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold fs-6">
                        Kirim Penilaian Website
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection