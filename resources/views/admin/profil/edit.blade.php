@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="max-width: 950px;">
    <div class="mb-4">
        <h3 class="fw-bold mb-1" style="color: #0d233a;">Edit Profil Perusahaan</h3>
        <p class="text-muted small mb-0">Kelola semua halaman Profil Perusahaan</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Bagian 1: Header Banner (Hero) -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3 text-primary"><i class="fas fa-image me-2"></i>Banner</h5>
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul</label>
                    <input type="text" name="hero_judul" class="form-control rounded-3" value="{{ old('hero_judul', $profil->hero_judul ?? '') }}" required>
                </div>
                <div class="mb-0">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="hero_deskripsi" rows="2" class="form-control rounded-3">{{ old('hero_deskripsi', $profil->hero_deskripsi ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Bagian 2: Tentang Perusahaan -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3 text-primary"><i class="fas fa-building me-2"></i>Tentang Perusahaan</h5>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control rounded-3" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Paragraf 1</label>
                    <textarea name="deskripsi_1" rows="3" class="form-control rounded-3" required>{{ old('deskripsi_1', $profil->deskripsi_1 ?? '') }}</textarea>
                </div>
                <div class="mb-0">
                    <label class="form-label fw-bold">Paragraf 2</label>
                    <textarea name="deskripsi_2" rows="3" class="form-control rounded-3">{{ old('deskripsi_2', $profil->deskripsi_2 ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Visi & Misi -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3 text-primary"><i class="fas fa-bullseye me-2"></i>Visi & Misi</h5>
                <div class="mb-3">
                    <label class="form-label fw-bold">Visi</label>
                    <textarea name="visi" rows="3" class="form-control rounded-3">{{ old('visi', $profil->visi ?? '') }}</textarea>
                </div>
                <div class="mb-0">
                    <label class="form-label fw-bold">Misi<span class="text-muted fw-normal small"></span></label>
                    <textarea name="misi" rows="4" class="form-control rounded-3">{{ old('misi', $profil->misi ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-5">
            <button type="submit" class="btn text-white fw-semibold px-4 py-2 rounded-3 shadow-sm" style="background-color: #0d233a;">
                <i class="fas fa-save me-2"></i> Simpan Perubahan Profil
            </button>
        </div>
    </form>
</div>
@endsection