<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>403 - Akses Ditolak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div class="card shadow-sm text-center p-5" style="max-width: 400px;">

            <h1 class="display-1 fw-bold text-danger">
                403
            </h1>

            <h3 class="fw-bold mb-3">
                Akses Ditolak
            </h3>

            <p class="text-muted">
                {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                Kembali ke Beranda
            </a>

        </div>

    </div>

</body>
</html>