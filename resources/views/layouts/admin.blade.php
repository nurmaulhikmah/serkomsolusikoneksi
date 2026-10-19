<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin - PT Solusi Koneksi Anda</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        /* Style Sidebar Admin */
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background-color: #0d233a;
            color: #ffffff;
            transition: all 0.3s;
        }
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 10px 18px;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 6px;
            margin-bottom: 4px;
            transition: all 0.2s ease-in-out;
        }
        #sidebar .nav-link:hover, 
        #sidebar .nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.12);
        }
        #sidebar .nav-link i {
            width: 22px;
        }
        .main-content {
            width: 100%;
            min-height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR NAVIGATION -->
    <aside id="sidebar" class="d-flex flex-column justify-content-between p-3 border-end border-dark">
        <div>
            <!-- BRAND HEADER DENGAN LOGO PERUSAHAAN -->
            <div class="d-flex align-items-center gap-3 p-2 mb-4 border-bottom border-secondary border-opacity-25 pb-3">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo PT Solusi Koneksi Anda" width="38" height="38" class="rounded bg-white p-1 shadow-sm">
                <div>
                    <h5 class="fw-bold text-white mb-0" style="letter-spacing: -0.3px; font-size: 1.1rem;">Login Admin</h5>
                    <small class="text-info fw-semibold" style="font-size: 0.8rem;">Solusi Koneksi Anda</small>
                </div>
            </div>

            <ul class="nav flex-column px-2">
                <!-- Dashboard -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.dashboard') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-chart-line me-2"></i> Dashboard
                    </a>
                </li>

                <!-- Profil Perusahaan -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.profil.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.profil.edit') }}">
                        <i class="fas fa-building me-2"></i> Profil Perusahaan
                    </a>
                </li>

                <!-- Layanan -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.layanan.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.layanan.index') }}">
                        <i class="fas fa-sitemap me-2"></i> Layanan
                    </a>
                </li>

                <!-- Artikel -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.artikel.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.artikel.index') }}">
                        <i class="fas fa-file-alt me-2"></i> Artikel
                    </a>
                </li>

                <!-- Galeri -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.galeri.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.galeri.index') }}">
                        <i class="fas fa-images me-2"></i> Galeri
                    </a>
                </li>

                <!-- Pesan -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.kontak.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.kontak.index') }}">
                        <i class="fas fa-envelope me-2"></i> Pesan
                    </a>
                </li>

                <!-- Rating -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.rating.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.rating.index') }}">
                        <i class="fas fa-star me-2"></i> Rating
                    </a>
                </li>

                <!-- Kelola Admin (BARU) -->
                <li class="nav-item mb-1">
                    <a class="nav-link rounded-3 {{ request()->routeIs('admin.users.*') ? 'active text-info fw-bold bg-dark bg-opacity-25' : 'text-white' }}" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users-cog me-2"></i> Kelola Admin
                    </a>
                </li>
            </ul>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="border-top border-secondary border-opacity-25 pt-3">
            <a href="/" target="_blank" class="nav-link text-white-50 mb-2 py-1 small">
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="d-grid">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm text-start py-2 border-0 px-3 fw-semibold opacity-75">
                    <i class="fas fa-sign-out-alt me-2 text-danger"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA DASHBOARD -->
    <main class="main-content">
        @yield('content')
    </main>

</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>