<section id="form-pengaduan" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h2 class="h4 fw-bold mb-3 border-bottom pb-2">
                            Formulir Pengaduan Perpustakaan Digital
                        </h2>

                        <p class="text-muted mb-4">
                            Silakan isi formulir berikut untuk menyampaikan
                            keluhan atau saran terkait Perpustakaan Digital.
                        </p>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Pengaduan gagal dikirim!</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pengaduan.store') }}" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap Anda"
                                    maxlength="100"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">
                                    Alamat Email
                                </label>

                                <input type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    maxlength="50"
                                    required>
                            </div>

                                <div class="mb-3">
                                <label for="kategori" class="form-label fw-semibold">
                                Kategori Pengaduan
                            </label>
                            <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" disabled
                            {{ old('kategori') ? '' : 'selected' }}>
                            -- Pilih Kategori Pengaduan --
                        </option>
                        <option value="Buku Hilang"
                        @selected(old('kategori') == 'Buku Hilang')>
                        Buku Hilang
                    </option>
                    <option value="Kendala Peminjaman"
                    @selected(old('kategori') == 'Kendala Peminjaman')>
                    Kendala Peminjaman
                </option>
                    <option value="Keterlambatan Pengambilan"
                    @selected(old('kategori') == 'Keterlambatan Pengambilan')>
                    Keterlambatan Pengambilan
                </option>
                    <option value="Pelayanan Perpustakaan"
                    @selected(old('kategori') == 'Pelayanan Perpustakaan')>
                        Pelayanan Perpustakaan
                </option>
                </select>
            </div>

                            <div class="mb-4">
                                <label for="deskripsi" class="form-label fw-semibold">
                                    Deskripsi Pengaduan
                                </label>

                                <textarea class="form-control"
                                    id="deskripsi"
                                    name="deskripsi"
                                    rows="4"
                                    maxlength="200"
                                    placeholder="Jelaskan keluhan atau pengaduan Anda..."
                                    required>{{ old('deskripsi') }}</textarea>
                            </div>

                            <button type="submit"
                                class="btn btn-primary w-100 py-2">
                                Kirim Pengaduan
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>