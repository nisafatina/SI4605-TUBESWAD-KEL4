@extends('layouts.app')

@section('title', 'WDP Dine In')

@section('content')
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WDP DINE IN PROGRAM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<main class="main">
  <!-- Top Section -->
  <section id="top-section" class="d-flex flex-column align-items-center justify-content-center text-center" style="height: 100vh; background: linear-gradient(90deg, #007bff, #6c63ff); color: white;">
    <div class="container">
      <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" style="width: 500px; height: auto; margin-bottom: 20px;">
      <h1 class="display-4 fw-bold text-white">WDP DINE IN PROGRAM</h1>
      <p class="lead text-white-50">Sistem pemesanan makan di tempat yang modern dan efisien</p>
      <a href="#restaurants" class="btn btn-light btn-lg shadow rounded-pill px-4 py-2 mt-3">Lihat Restoran</a>
    </div>
  </section>
  <!-- End Top Section -->

  <!-- Restaurant List Section -->
  <section id="restaurants" class="section mt-5">
    <div class="container">
      <h2 class="section-title text-center">Available Restaurants</h2>
      <div class="row gy-4 mt-4">
        @foreach($restorans as $restoran)
        <div class="col-md-4">
          <div class="card h-100 shadow">
            <!-- Pastikan menggunakan $restoran untuk mengambil data -->
            <img src="{{ asset('storage/' . $restoran->gambar) }}" class="card-img-top" alt="{{ $restoran->nama_restoran }}">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $restoran->nama_restoran }}</h5>
              <!-- Menambahkan deskripsi jika ada di model -->
              <p class="card-text">{{ $restoran->deskripsi ?? 'Deskripsi belum tersedia' }}</p>
              <a href="{{ route('restoran.showMenu', $restoran->id) }}" class="btn btn-primary">Pilih</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Restaurant List Section -->
</main>
<!-- Feedback Section -->
<div class="mb-4 text-center">
  <h2 class="display-4 fw-bold text-primary">FEEDBACK</h2>
  <p class="lead text-muted">WDP Telkom University</p>
</div>

<!-- Create Feedback Button -->
<div class="text-center">
  <a href="/feedback/create" class="text-decoration-none">
    <button type="button" class="btn btn-primary btn-lg shadow rounded-pill px-4 py-2">
      <i class="fas fa-pen me-2"></i> Buat Feedback
    </button>
  </a>
</div>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection

@section('styles')
<style>
  /* Top Section Styling */
  #top-section {
    height: 100vh;
    background: linear-gradient(90deg, #007bff, #6c63ff);
    color: white;
  }

  .btn-light {
    background: linear-gradient(to right, #ffffff, #f1f1f1);
    color: #007bff;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .btn-light:hover {
    background: #f1f1f1;
    opacity: 0.9;
    color: #0056b3;
  }

  /* Card Styling */
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .btn {
      font-size: 12px;
    }

    h2 {
      font-size: 1.8rem;
    }

    .card-body {
      padding: 15px;
    }
  }

  @media (max-width: 576px) {
    .btn {
      font-size: 11px;
      padding: 8px 12px;
    }

    h2 {
      font-size: 1.5rem;
    }
  }
</style>
@endsection
