@extends('layouts.app')

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WDP DINE IN PROGRAM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    .read-more {
      background: var(--accent-color);
      color: var(--contrast-color);
      font-family: var(--heading-font);
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 1px;
      padding: 10px 28px;
      border-radius: 5px;
      transition: 0.3s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .read-more i {
      font-size: 18px;
      margin-right: 5px;
      line-height: 0;
      transition: 0.3s;
    }

    .read-more:hover {
      color: var(--contrast-color);
      background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    .read-more:hover i {
      transform: translate(-5px, 0);
    }

    .contact .php-email-form input[type=file] {
      font-size: 14px;
      padding: 10px 15px;
      box-shadow: none;
      border-radius: 0;
      color: var(--default-color);
      background-color: color-mix(in srgb, var(--background-color), transparent 50%);
      border-color: color-mix(in srgb, var(--default-color), transparent 80%);
    }

    /* Form styles */
    .contact .php-email-form .form-control {
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 14px;
      margin-bottom: 15px;
      box-shadow: none;
      border: 1px solid #ccc;
      transition: all 0.3s ease;
    }

    .contact .php-email-form .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .contact .php-email-form .btn {
      background-color: #007bff;
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      padding: 12px 30px;
      border-radius: 50px;
      transition: 0.3s;
    }

    .contact .php-email-form .btn:hover {
      background-color: #0056b3;
    }

    .contact .php-email-form label {
      font-weight: bold;
      margin-bottom: 5px;
      font-size: 14px;
    }

    .contact .php-email-form .form-group {
      margin-bottom: 15px;
    }

    .contact .php-email-form .form-group .invalid-feedback {
      color: red;
      font-size: 12px;
    }

    .container .section-title h2 {
      font-size: 36px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .container .section-title p {
      font-size: 16px;
      color: #555;
    }

    /* Back Button */
    .read-more {
      background: #f5f5f5;
      color: #007bff;
      font-weight: 500;
      padding: 10px 20px;
      border-radius: 30px;
      transition: 0.3s;
    }

    .read-more:hover {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>

<body>

  <!-- Add Data Section -->
  <section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title">
      <h2>Tambah Data Restoran</h2>
      <p>Form untuk menambahkan data restoran</p>
    </div>
    <!-- End Section Title -->

    <div class="container mb-3">
      <a href="{{ route('restoran.index') }}" class="read-more"><i class="bi bi-arrow-left"></i><span>Kembali</span></a>
    </div>

    <div class="container">
      <!-- Restoran Form -->
      <div class="">
        <form action="{{ route('restoran.store') }}" method="POST" class="php-email-form" enctype="multipart/form-data">
          @csrf
          <div class="row gy-4">

            <div class="col-md-12">
              <label for="id_pemilik">ID Pemilik</label>
              <input type="text" name="id_pemilik" class="form-control @error('id_pemilik') is-invalid @enderror"
                placeholder="Id Pemilik" value="{{ old('id_pemilik') }}" required="">
              @error('id_pemilik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="nama_restoran">Nama Restoran</label>
              <input type="text" class="form-control @error('nama_restoran') is-invalid @enderror"
                name="nama_restoran" placeholder="Nama Restoran" value="{{ old('nama_restoran') }}" required="">
              @error('nama_restoran')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="gambar">Gambar</label>
              <input type="file" accept="image/*" class="form-control @error('gambar') is-invalid @enderror"
                name="gambar" required="">
              @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Input QRIS -->
            <div class="col-md-12">
              <label for="qris" class="form-label">Upload QRIS</label>
              <input type="file" name="qris" class="form-control @error('qris') is-invalid @enderror" id="qris" accept="image/*">
              @error('qris')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn">Tambah</button>
            </div>

          </div>
        </form>
      </div>
      <!-- End Restoran Form -->
    </div>
  </section>
  <!-- /Data Section -->

</body>

</html>
