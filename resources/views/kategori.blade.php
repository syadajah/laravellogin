<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center py-3">📚 Toko Buku</h3>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">📚 Kelola Buku</a></li>
            <li class="nav-item"><a href="{{ route('kategori') }}" class="nav-link active">📑 Kelola Kategori</a></li>
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

        <!-- 🔥 Data Kategori Card -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">📑 Data Kategori</h5>
                <!-- Tombol Modal -->
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                    + Tambah Kategori
                </button>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Dibuat</th>
                            <th>Diupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
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
        <!-- END Data Kategori Card -->

        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form mengarah ke route sesuai -->
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
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
