@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa;">

    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm px-2 py-1" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Tambah Foto Galeri</h4>
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

    <!-- DIBERSIHKAN: col-md-6 dihapus agar card form melebar full -->
    <div class="card border rounded-3 shadow-sm bg-white">
        <div class="card-body p-4 text-start">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 text-start">
                    <label for="gambar" class="form-label fw-semibold small" style="color: #0d233a;">Pilih File Gambar <span class="text-danger">*</span></label>
                    <input type="file" class="form-control shadow-none @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" required>
                    <div class="form-text text-muted small">Format: JPEG, PNG, JPG, WEBP (Maksimal 2MB).</div>
                </div>

                <div class="d-flex gap-2 justify-content-start">
                    <button type="submit" class="btn text-white px-4 fw-semibold" style="background-color: #0d233a;">Upload Foto</button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border px-4 fw-semibold text-muted">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection