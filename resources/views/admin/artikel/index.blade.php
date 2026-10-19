@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa;">

    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Kelola Artikel</h4>
        <a href="{{ route('admin.artikel.create') }}" class="btn text-white fw-semibold shadow-sm px-3 py-2" style="background-color: #0d233a;">
            <i class="fas fa-plus me-1"></i> Tambah Artikel Baru
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
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Gambar</th>
                            <th width="30%">Judul Artikel</th>
                            <th width="30%">Isi Konten</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($artikels as $index => $artikel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Thumbnail" class="rounded border" style="width: 70px; height: 45px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada</span>
                                @endif
                            </td>
                            <td class="fw-semibold" style="color: #0d233a;">{{ $artikel->judul }}</td>
                            
                            <!-- PERBAIKAN DI SINI: Menggunakan $artikel->konten (atau fallback ke content) & strip_tags -->
                            <td class="text-muted small">
                                {{ Str::limit(strip_tags($artikel->konten ?? $artikel->content ?? ''), 50) }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-outline-warning btn-sm px-2 py-1 me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm px-2 py-1" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted small">Belum ada artikel yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection