<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Solusi Koneksi Anda</title>
    <!-- Bootstrap 5 CDN & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-dark min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #0d233a !important;">

<div class="container p-3">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <div class="card border-0 shadow-lg rounded-3 bg-white p-4">
                <div class="card-body">
                    
                    <!-- Header Logo -->
                    <div class="text-center mb-4">
                        <div class="p-3 d-inline-block rounded-circle bg-primary bg-opacity-10 text-primary mb-2">
                            <i class="fas fa-lock fs-3" style="color: #0d233a;"></i>
                        </div>
                        <h4 class="fw-bold mb-1" style="color: #0d233a;">Login Admin</h4>
                        <p class="text-muted small">PT Solusi Koneksi Anda</p>
                    </div>

                    <!-- Alert Error -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold small" style="color: #0d233a;">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control border-start-0 shadow-none" id="email" name="email" value="{{ old('email') }}" placeholder="email@gmail.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold small" style="color: #0d233a;">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control border-start-0 shadow-none" id="password" name="password" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark fw-semibold w-100 py-2 shadow-sm" style="background-color: #0d233a;">
                            Masuk ke Dashboard
                        </button>
                    </form>

                    <div class="text-center mt-2">
                        <a href="/" class="text-decoration-none small text-muted">
                        Kembali ke Website Utama
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>