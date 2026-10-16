@extends('layouts.admin') <!-- Sesuaikan dengan layout admin yang kamu pakai -->

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h2 class="fw-bold">Rating & Ulasan</h2>
        <p class="text-muted">Daftar ulasan dan bintang yang diberikan oleh pengunjung website.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center py-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ratings as $index => $r)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-bold">{{ $r->nama }}</td>
                                <td>
                                    <span class="text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $r->bintang)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="ms-1 fw-bold">({{ $r->bintang }}/5)</span>
                                </td>
                                <td>{{ $r->komentar ?? '-' }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.rating.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="far fa-comment-slash fa-2x mb-2"></i>
                                    <p class="mb-0">Belum ada ulasan yang masuk dari pengguna.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection