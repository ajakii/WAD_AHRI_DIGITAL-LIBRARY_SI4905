<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan - Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm p-4">

                    <h3 class="fw-bold mb-4 border-bottom pb-3">
                        Edit Pengaduan Perpustakaan
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('pengaduan.update', $pengaduan) }}" method="POST">

                        @csrf
                        @method('PUT')

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text"
                                class="form-control"
                                name="nama"
                                value="{{ old('nama', $pengaduan->nama) }}"
                                required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Email</label>
                            <input type="email"
                                class="form-control"
                                name="email"
                                value="{{ old('email', $pengaduan->email) }}"
                                required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori Pengaduan</label>

                            <select class="form-select" name="kategori" required>

                            <option value="Buku Hilang"
                                {{ old('kategori', $pengaduan->kategori) == 'Buku Hilang' ? 'selected' : '' }}>
                                Buku Hilang
                            </option>

                            <option value="Kendala Peminjaman"
                                {{ old('kategori', $pengaduan->kategori) == 'Kendala Peminjaman' ? 'selected' : '' }}>
                                Kendala Peminjaman
                            </option>

                            <option value="Keterlambatan Pengambilan"
                                {{ old('kategori', $pengaduan->kategori) == 'Keterlambatan Pengambilan' ? 'selected' : '' }}>
                                Keterlambatan Pengambilan
                            </option>

                            <option value="Pelayanan Perpustakaan"
                                {{ old('kategori', $pengaduan->kategori) == 'Pelayanan Perpustakaan' ? 'selected' : '' }}>
                                Pelayanan Perpustakaan
                            </option>

                        </select>
                        </div>

                        
                        @if (Auth::user()->hasRole('admin'))
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                Status Pengaduan
                                </label>

                            <select class="form-select" name="status" required>

                                <option value="Pending"
                                {{ old('status', $pengaduan->status) == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                                <option value="Diproses"
                                {{ old('status', $pengaduan->status) == 'Diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                                <option value="Selesai"
                                {{ old('status', $pengaduan->status) == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>
                    </div>

@endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Pengaduan</label>

                            <textarea class="form-control"
                                name="deskripsi"
                                rows="4"
                                required>{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
                        </div>

                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pengaduan.daftar') }}"
                                class="btn btn-secondary">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>