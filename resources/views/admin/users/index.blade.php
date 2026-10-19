@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h4 class="fw-bold mb-0" style="color: #0d233a;">Kelola Akun Admin</h4>
        <a href="{{ route('admin.users.create') }}" class="btn text-white fw-semibold" style="background-color: #0d233a;">
            <i class="fas fa-user-plus me-1"></i> Tambah Admin Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3 shadow-sm bg-white">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email Login</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $index => $adm)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $adm->name }}</td>
                            <td>{{ $adm->email }}</td>
                            <td>{{ $adm->created_at->format('d M Y') }}</td>
                            <td>
                                @if(auth()->id() !== $adm->id)
                                <form action="{{ route('admin.users.destroy', $adm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @else
                                <span class="badge bg-success">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection