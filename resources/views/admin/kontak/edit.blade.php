@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa;">

    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
        <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-secondary btn-sm px-2 py-1" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Edit Pesan Kontak</h4>
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

    <div class="row">
        <div class="col-12">
            <div class="card border rounded-3 shadow-sm bg-white">
                <div class="card-body p-4 text-start">
                    <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 text-start">
                            <label for="nama" class="form-label fw-semibold small" style="color: #0d233a;">Nama Pengirim <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $kontak->nama) }}" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="email" class="form-label fw-semibold small" style="color: #0d233a;">Email Pengirim <span class="text-danger">*</span></label>
                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $kontak->email) }}" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="pesan" class="form-label fw-semibold small" style="color: #0d233a;">Isi Pesan <span class="text-danger">*</span></label>
                            <textarea class="form-control shadow-none @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="5" required>{{ old('pesan', $kontak->pesan) }}</textarea>
                        </div>

                        <div class="d-flex gap-2 justify-content-start">
                            <button type="submit" class="btn text-white px-4 fw-semibold" style="background-color: #0d233a;">Perbarui Pesan</button>
                            <a href="{{ route('admin.pesan.index') }}" class="btn btn-light border px-4 fw-semibold text-muted">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection