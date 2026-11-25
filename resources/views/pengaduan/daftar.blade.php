<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Aduan - Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Perpustakaan Digital
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                    
                    <button type="submit" class="nav-link">
                    Logout ({{ Auth::user()->username }})
                    </button>
                </form>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                @endauth

                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => request()->is('/')
                        ]) href="{{ url('/') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => request()->is('daftar-aduan')
                        ]) href="{{ route('pengaduan.daftar') }}">
                            Daftar Aduan
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">

        <div class="mb-4">
            <h1 class="h3 fw-bold mb-1">
                Daftar Pengaduan Perpustakaan Digital
            </h1>

            <p class="text-muted">
                Rekapitulasi laporan dan pengaduan pelanggan
                Perpustakaan Digital yang masuk ke sistem.
            </p>
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">

            <table class="table table-bordered table-striped align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col" style="width: 12%;">Tanggal</th>
                        <th scope="col" style="width: 15%;">Pelapor</th>
                        <th scope="col" style="width: 15%;">Kategori</th>
                        <th scope="col" style="width: 28%;">Ringkasan</th>
                        <th scope="col" class="text-center" style="width: 10%;">Status</th>
                        @auth
                        <th scope="col" class="text-center" style="width: 15%;">
                            Aksi
                        </th>
                        @endauth
                    </tr>
                </thead>

                <tbody>

                    @foreach ($pengaduan as $item)
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->created_at?->format('d/m/Y') ?? '-' }}
                        </td>

                        <td>
                            {{ $item->nama }}
                        </td>

                        <td>
                            {{ $item->kategori }}
                        </td>

                        <td>
                            {{ $item->deskripsi }}
                        </td>

                        <td class="text-center">

                            @if ($item->status == 'Diproses')
                                <span class="badge bg-info text-dark px-2 py-1">
                                    Diproses
                                </span>

                            @elseif ($item->status == 'Selesai')
                                <span class="badge bg-success px-2 py-1">
                                    Selesai
                                </span>

                            @else
                                <span class="badge bg-warning text-dark px-2 py-1">
                                    Pending
                                </span>

                                
                            @endif
                        @auth
                        <td>
                        <div class="d-flex align-items-center gap-2">
                        @can('update', $item)
                        <a href="{{ route('pengaduan.edit', $item) }}"
                        class="btn btn-warning">
                        Edit
                    </a>
                    @endcan
                    @can('delete', $item)
                    <form action="{{ route('pengaduan.destroy', $item) }}"
                    method="POST"
                    class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                    Hapus
                </button>
            </form>
            @endcan
        </div>
    </td>
    @endauth

                    </tr>
                    @endforeach

                    @if ($pengaduan->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada pengaduan yang masuk.
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>

        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>