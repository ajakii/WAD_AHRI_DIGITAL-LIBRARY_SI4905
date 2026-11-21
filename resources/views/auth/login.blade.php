<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

                <div class="card shadow p-4">

                    <h4 class="fw-bold mb-3 text-center">
                        Login Perpustakaan Digital
                    </h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="{{ old('username') }}"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>

                        <div class="form-check mb-3">
                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                class="form-check-input"
                                id="remember"
                            >
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Masuk
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

</body>
</html>