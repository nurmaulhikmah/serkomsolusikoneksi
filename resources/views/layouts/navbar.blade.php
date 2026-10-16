<nav class="navbar navbar-dark fixed-top shadow-sm py-3" style="background-color: #0d233a !important;">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
        
        <div class="d-flex align-items-center gap-3">
            <!-- Tombol Garis Tiga (Hamburger Menu) -->
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo Perusahaan di Navbar Utama (Diarahkan ke Login Admin) -->
            <a class="navbar-brand d-flex align-items-center gap-2 m-0 text-decoration-none" href="{{ route('login') }}" title="Admin Login">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="38" height="38" class="rounded">
                <span class="fw-bold fs-5 text-white" style="letter-spacing: -0.5px;">Solusi Koneksi</span>
            </a>
        </div>

        <!-- FITUR SEARCH DITAMBAHKAN DI SISI KANAN -->
<form action="{{ route('search') }}" method="GET" class="d-flex m-0">
    <div class="input-group input-group-sm" style="max-width: 250px;">
        <input type="text" 
               name="search" 
               class="form-control bg-transparent text-white border-secondary rounded-start-pill ps-3 shadow-none navbar-search-input" 
               placeholder="Cari..." 
               value="{{ request('search') }}">
        <button class="btn btn-info text-white rounded-end-pill px-3" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>

<style>
    .navbar-search-input::placeholder {
        color: rgba(255, 255, 255, 0.85) !important; 
        opacity: 1;
    }
    .navbar-search-input:focus::placeholder {
        color: rgba(255, 255, 255, 0.5) !important;
    }
</style>

        <!-- Panel Sidebar Offcanvas dari Sebelah Kiri -->
        <div class="offcanvas offcanvas-start bg-white text-dark shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 320px;">
            
            <!-- Header Sidebar -->
            <div class="offcanvas-header border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <a class="navbar-brand d-flex align-items-center gap-2 m-0 text-decoration-none" href="{{ route('login') }}" title="Admin Login">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="32" height="32" class="rounded">
                    <span class="fw-bold fs-6" style="color: #0d233a;">Solusi Koneksi</span>
                </a>
                <button type="button" class="btn-close text-reset shadow-none m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            
            <!-- Body Sidebar -->
            <div class="offcanvas-body px-4 py-4">
                <ul class="navbar-nav flex-column gap-3">
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('/') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('profil*') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/profil">Profil Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('layanan*') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('artikel*') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('galeri*') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 {{ Request::is('kontak*') ? 'text-primary' : '' }}" style="color: #0d233a;" href="/kontak">Kontak Kami</a>
                    </li>
                </ul>
            </div>

            <!-- Footer Sidebar Kecil -->
            <div class="offcanvas-footer px-4 py-3 border-top text-muted small d-flex justify-content-between">
                <span>Privacy</span>
                <span>Terms of Use</span>
                <span>PT Solusi Koneksi</span>
            </div>

        </div>

    </div>
</nav>

<!-- Spasi agar konten utama tidak tertutup navbar fixed-top -->
<div style="margin-top: 70px;"></div>