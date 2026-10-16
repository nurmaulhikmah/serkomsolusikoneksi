@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa; min-height: 90vh;">

    <!-- Judul & Tombol Kembali -->
    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary btn-sm px-2 py-1" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Edit Layanan</h4>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card Form Edit Full Width -->
    <div class="card border-0 shadow-sm rounded-4 bg-white">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama / Judul Layanan -->
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold text-dark">Nama Layanan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control shadow-none @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $layanan->judul ?? $layanan->nama_layanan) }}" required>
                </div>

                <!-- Harga Layanan -->
                <div class="mb-3">
                    <label for="harga" class="form-label fw-semibold text-dark">Harga Layanan (Rp) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">Rp</span>
                        <input type="number" class="form-control shadow-none border-start-0 @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $layanan->harga) }}" placeholder="Contoh: 1500000" required>
                    </div>
                    <div class="form-text text-muted small mt-1">Masukkan angka nominal harga saja tanpa titik atau koma.</div>
                </div>

                <!-- Gambar Layanan -->
                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold text-dark">Ganti Gambar/Banner Layanan</label>
                    @if(!empty($layanan->gambar))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Layanan" class="rounded-3 shadow-sm border" style="width: 120px; height: 80px; object-fit: cover;">
                            <div class="form-text text-muted small">Gambar saat ini. Biarkan kosong jika tidak ingin mengubah gambar.</div>
                        </div>
                    @endif
                    <input type="file" class="form-control shadow-none @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                    <div class="form-text text-muted small mt-1">Format: JPEG, PNG, JPG, WEBP (Maksimal 2MB).</div>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn text-white fw-semibold px-4 py-2 rounded-3" style="background-color: #0d233a;">
                        <i class="fas fa-save me-2"></i> Perbarui Layanan
                    </button>
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-muted rounded-3">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection