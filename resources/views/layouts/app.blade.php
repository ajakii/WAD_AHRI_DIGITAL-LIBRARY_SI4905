<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Perpustakaan Digital')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/area.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('anggota.index') }}">Perpustakaan Digital</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a>
                <a class="nav-link" href="{{ route('area.index') }}">Fasilitas &amp; Area</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <span>{{ auth()->user()->username }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm">Logout</button>
                    </form>
                @else
                    <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>