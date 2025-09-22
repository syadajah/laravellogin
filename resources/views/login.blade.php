<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Buku - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-bg">

  <div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="col-lg-6 col-md-8"> <!-- CARD BESAR -->
        <div class="card shadow-lg border-0">
          <div class="card-header text-center bg-primary text-white">
            <h3 class="mb-0">📚 Toko Buku</h3>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8"> <!-- FORM DALAM CARD BESAR -->
                <form method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
                </form>

                @if ($errors->any())
                  <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
