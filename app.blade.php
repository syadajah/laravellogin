<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center py-3">📚 Toko Buku</h3>
    <ul class="nav flex-column">
      <li class="nav-item"><a href="/admin" class="nav-link">📊 Dashboard</a></li>
      <li class="nav-item"><a href="/buku/input" class="nav-link">📦 Input Stok Buku</a></li>
      <li class="nav-item"><a href="#" class="nav-link">💲 Harga</a></li>
      <li class="nav-item"><a href="#" class="nav-link">📈 Laporan Penjualan</a></li>
      <li class="nav-item"><a href="#" class="nav-link">🧾 Riwayat Transaksi</a></li>
    </ul>
    <form action="/logout" method="POST" class="mt-3 px-3">
      @csrf
      <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Topbar -->
    <nav class="navbar navbar-light bg-white shadow-sm p-3 mb-4">
      <span class="fw-bold">Selamat Datang Admin!</span>
    </nav>

    <div class="container-fluid">
      @yield('content')
    </div>
  </div>

</body>
</html>
