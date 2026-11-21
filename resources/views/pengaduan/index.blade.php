<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Perpustakaan Digital
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengaduan.daftar') }}">
                            Daftar Aduan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-md-7">
                    <h1 class="fw-bold mb-3">
                        Perpustakaan Digital
                    </h1>

                    <p class="text-muted">
                        Perpustakaan Digital
                    </p>

                    <p class="mb-4">
                        Perpustakaan Digital menyediakan layanan untuk memudahkan pengguna mencari, melihat, dan mengakses berbagai koleksi buku secara online. 
                        Melalui sistem ini, pengguna dapat menemukan informasi buku dengan lebih cepat dan praktis.
                    </p>

                    <a href="#form-pengaduan"
                        class="btn btn-primary px-4 py-2">
                        Buat Pengaduan
                    </a>
                </div>

                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/Perpus.png') }}"
                        alt="Laundry Kel 11"
                        class="img-fluid rounded"
                        style="max-height: 300px;">
                </div>

            </div>
        </div>
    </section>
    
    @include('pengaduan.form')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
