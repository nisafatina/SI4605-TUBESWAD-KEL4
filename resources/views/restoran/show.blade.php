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
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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

    .read-more.edit {
      background: var(--bs-warning);
    }

    .read-more.destroy {
      background: var(--bs-danger);
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

    button {
      border: none
    }
  </style>
</head>

<body>

  <!-- Detail Restoran Section -->
  <section>
    <div class="container section-title">
      <h2>Detail Restoran</h2>
      <p>Informasi lengkap tentang restoran</p>
    </div>

    <div class="container mb-3">
      <a href="{{ route('restoran.index') }}" class="read-more"><i class="bi bi-arrow-left"></i><span>Kembali</span></a>
      <a href="{{ route('restoran.edit', $restoran->id) }}" class="read-more edit"><i
          class="bi bi-pencil"></i><span>Edit</span></a>
      <form action="{{ route('restoran.destroy', $restoran->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="read-more destroy" onclick="return confirm('Apakah Anda Yakin?')">
          <i class="bi bi-trash"></i><span>Hapus</span>
        </button>
      </form>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>{{ $restoran->nama_restoran }}</h3>
        </div>
        <div class="card-body">
          <p><strong>Pemilik:</strong> {{ $restoran->id_pemilik }}</p>
          <p><strong>Nama Restoran:</strong> {{ $restoran->nama_restoran }}</p>
          <p><strong>Gambar:</strong></p>
          <div class="text-center">
            <img src="{{ asset('storage/' . $restoran->gambar) }}" alt="{{ $restoran->nama_restoran }}"
              class="img-fluid" style="max-width: 500px; height: auto;">
          </div>
          <p><strong>QRIS:</strong></p>
          <div class="text-center">
          <img src="{{ asset('storage/' . $restoran->qris) }}" alt="{{ $restoran->nama_restoran }}" class="img-fluid" style="max-width: 500px; height: auto;">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Detail Restoran Section -->

</body>

</html>
