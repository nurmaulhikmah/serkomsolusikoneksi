@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa; min-height: 90vh;">

    <!-- Header Judul & Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0d233a;">Kelola Layanan</h4>
            <p class="text-muted small mb-0">Kelola daftar layanan, paket, dan harga yang ditawarkan oleh PT Solusi Koneksi Anda.</p>
        </div>
        <a href="{{ route('admin.layanan.create') }}" class="btn text-white fw-semibold px-3 py-2 rounded-3 shadow-sm" style="background-color: #0d233a;">
            <i class="fas fa-plus me-2"></i> Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Daftar Layanan -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        <div class="card-body p-4">
            @if(isset($layanans) && $layanans->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-uppercase fs-7 text-muted">
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col" style="width: 15%;">Gambar</th>
                                <th scope="col" style="width: 25%;">Nama Layanan</th>
                                <th scope="col" style="width: 15%;">Harga</th>
                                
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layanans as $index => $layanan)
                            <tr>
                                <td class="fw-semibold text-secondary">{{ $index + 1 }}</td>
                                <td>
                                    @if($layanan->gambar)
                                        <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->judul }}" class="rounded-3 shadow-sm" style="width: 60px; height: 45px; object-fit: cover;">
                                    @else
                                        <span class="badge bg-light text-muted border px-2 py-1">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $layanan->judul ?? $layanan->nama_layanan }}</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill">
                                        Rp {{ number_format($layanan->harga ?? 0, 0, ',', '.') }}
                                    </span>
                                </td>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1" title="Edit Layanan">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Hapus Layanan">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-server text-muted opacity-50 fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Belum Ada Data Layanan</h5>
                    <p class="text-muted small mb-0">Silakan tambahkan layanan baru menggunakan tombol di pojok kanan atas.</p>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection