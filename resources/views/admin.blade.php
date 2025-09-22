<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center py-3">📚 Toko Buku</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link active">📚 Kelola Buku</a></li>
            <li class="nav-item"><a href="{{ route('kategori') }}" class="nav-link">📑 Kelola Kategori</a></li>
            <li class="nav-item"><a href="#" class="nav-link">📈 Laporan Penjualan</a></li>
            <li class="nav-item"><a href="#" class="nav-link">🧾 Riwayat Transaksi</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- 🔥 Data Buku Card -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">📚 Data Buku</h5>
                <!-- Tombol Modal -->
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                    + Tambah Buku
                </button>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            <th>Cover</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_buku as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kode_buku }}</td>
                                <td>{{ $item->judul_buku }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->tahun_terbit }}</td>
                                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td>
                                    @if ($item->cover)
                                        <img src="{{ asset('storage/' . $item->cover) }}" alt="cover"
                                            width="50">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Data Buku Card -->

        <!-- Modal Tambah Buku -->
        <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form mengarah ke route sesuai -->
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Kode Buku</label>
                                    <input type="text" name="kode_buku" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Kategori</label>
                                    <select name="kategori_id" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Cover</label>
                                    <input type="file" name="cover" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- END Modal -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
