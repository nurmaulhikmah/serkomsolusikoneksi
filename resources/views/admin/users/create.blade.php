@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Tambah Akun Admin Baru</h4>
    </div>

    <div class="card border rounded-3 shadow-sm bg-white col-md-8">
        <div class="card-body p-4">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email / Username Login</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn text-white px-4 fw-semibold" style="background-color: #0d233a;">Simpan Admin</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light border px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection