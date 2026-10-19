@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa;">

    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Kelola Galeri Foto</h4>
        <a href="{{ route('admin.galeri.create') }}" class="btn text-white fw-semibold px-3" style="background-color: #0d233a;">
            <i class="fas fa-plus me-1"></i> Tambah Foto Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border rounded-3 shadow-sm bg-white">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light text-uppercase fs-7">
                        <tr>
                            <th width="10%">No</th>
                            <th width="65%">Gambar</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeris as $index => $galeri)
                            <tr>
                                <td class="fw-semibold">{{ $index + 1 }}</td>
                                <td>
                                    @if($galeri->gambar)
                                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Galeri" class="rounded shadow-sm" style="width: 100px; height: 70px; object-fit: cover;">
                                    @else
                                        <span class="text-muted small">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-3" title="Hapus">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Belum ada foto galeri yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection