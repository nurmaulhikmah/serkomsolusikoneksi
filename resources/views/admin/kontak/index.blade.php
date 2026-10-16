@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8f9fa;">

    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0d233a;">Pesan Masuk</h4>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3 bg-white">
        <div class="card-body p-4">
            @if(isset($kontaks) && $kontaks->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-uppercase fs-7 text-muted">
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col" style="width: 20%;">Nama Pengirim</th>
                                <th scope="col" style="width: 20%;">Email</th>
                                <th scope="col" style="width: 35%;">Isi Pesan</th>
                                <th scope="col" style="width: 20%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontaks as $index => $kontak)
                            <tr>
                                <td class="fw-semibold text-secondary">{{ $index + 1 }}</td>
                                <td class="fw-bold text-dark">{{ $kontak->nama ?? $kontak->name }}</td>
                                <td>
                                    <a href="mailto:{{ $kontak->email }}" class="text-decoration-none text-primary">{{ $kontak->email }}</a>
                                </td>
                                <td class="text-muted small text-wrap" style="max-width: 300px;">
                                    {{ $kontak->pesan ?? $kontak->message }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <!-- Tombol Balas via Gmail -->
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $kontak->email }}&su=Re: Balasan Pesan dari PT Solusi Koneksi Anda" 
                                           target="_blank" 
                                           class="btn btn-sm btn-primary rounded-2 px-2 py-1" 
                                           title="Balas via Gmail">
                                            <i class="fas fa-paper-plane me-1"></i> Balas
                                        </a>

                                        <!-- Tombol Hapus Pesan -->
                                        <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-2 px-2 py-1" title="Hapus Pesan">
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
                        <i class="fas fa-inbox text-muted opacity-50 fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Belum Ada Pesan Masuk</h5>
                    <p class="text-muted small mb-0">Pesan dari halaman kontak pengunjung akan muncul di tabel ini.</p>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection