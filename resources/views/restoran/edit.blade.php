<!DOCTYPE html>
<html lang="en">

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

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
  </style>
</head>

<body>


  <!-- Edit Data Section -->
  <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title">
      <h2>Edit Data Restoran</h2>
      <p>Form untuk mengedit data restoran</p>
    </div>
    <!-- End Section Title -->

    <div class="container mb-3">
      <a href="{{ route('restoran.index') }}" class="read-more"><i class="bi bi-arrow-left"></i><span>Kembali</span></a>
    </div>

    <div class="container">

      <!-- Restoran Form -->
      <div class="">
        <form action="{{ route('restoran.update', $restoran->id) }}" method="POST" class="php-email-form"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row gy-4">

            <div class="col-md-12">
              <label for="id_pemilik">ID Pemilik</label>
              <input type="text" name="id_pemilik" class="form-control @error('id_pemilik') is-invalid @enderror"
                value="{{ old('id_pemilik', $restoran->id_pemilik) }}" required>
              @error('id_pemilik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12 ">
              <label for="nama_restoran">Nama Restoran</label>
              <input type="text" class="form-control @error('nama_restoran') is-invalid @enderror"
                name="nama_restoran" value="{{ old('nama_restoran', $restoran->nama_restoran) }}" required>
              @error('nama_restoran')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="gambar">Gambar</label>
              <input type="file" accept="image/*" class="form-control @error('gambar') is-invalid @enderror"
                name="gambar">
              @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div class="text-center mt-3">
                <img src="{{ asset('storage/' . $restoran->gambar) }}" alt="{{ $restoran->nama_restoran }}"
                  class="img-fluid" style="max-width: 500px; height: auto;">
              </div>
            </div>
            <!-- Input QRIS -->
            <div class="col-md-12">
              <label for="qris" class="form-label">Upload QRIS</label>
              <input type="file" name="qris" class="form-control @error('qris') is-invalid @enderror" id="qris" accept="image/*">
              @error('qris')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div class="text-center mt-3">
                <img src="{{ asset('storage/images/' . $restoran->qris) }}" alt="{{ $restoran->nama_restoran }}"
                  class="img-fluid" style="max-width: 500px; height: auto;">
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit">Update</button>
            </div>

          </div>
        </form>
      </div>
      <!-- End Restoran Form -->

    </div>

  </section>
  <!-- /Edit Data Section -->

</body>

</html>
