@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4 text-primary font-weight-bold">Checkout</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Form Pemesanan -->
    <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" class="php-email-form shadow-sm" data-aos="fade-up" data-aos-delay="200">
        @csrf

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Nama Pemesan -->
        <div class="mb-4">
            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" class="form-control shadow-sm" id="nama_pemesan" required>
        </div>

        <!-- No Meja -->
        <div class="mb-4">
            <label for="no_meja" class="form-label">Nomor Meja</label>
            <input type="text" name="no_meja" class="form-control shadow-sm" id="no_meja" required>
        </div>

        <!-- Detail Pesanan -->
        <h4 class="mt-4 text-primary font-weight-bold">Detail Pesanan</h4>
        <div class="list-group mb-3">
            @foreach($items as $index => $item)
                @if($item['quantity'] > 0)
                    <div class="list-group-item">
                        <h5>{{ $item['menu']->nama_menu }} ({{ $item['quantity'] }})</h5>
                        <p>{{ $item['menu']->deskripsi }}</p>
                        <span>Rp {{ number_format($item['total_price'], 0, ',', '.') }}</span>
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="items[{{ $index }}][menu]" value="{{ $item['menu']->nama_menu }}">
                        <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Total Harga -->
        <h4>Total: Rp <span id="total" class="text-primary font-weight-bold">{{ number_format($total, 0, ',', '.') }}</span></h4>

        <input type="hidden" name="total_harga" value="{{ $total }}">

        <!-- Tampilkan QRIS -->
        <p><strong>QRIS:</strong></p>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $restoran->qris) }}" alt="{{ $restoran->id_pemilik }}" class="img-fluid" style="max-width: 500px; height: auto;">
        </div>

        <!-- Bukti Pembayaran -->
        <div class="mb-4">
            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control shadow-sm" id="bukti_pembayaran" required>
        </div>

        <!-- Tombol Edit dan Checkout -->
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary btn-custom px-5 py-3 shadow-sm rounded-pill" onclick="window.history.back();">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="submit" class="btn btn-warning btn-custom px-5 py-3 shadow-sm rounded-pill mt-3">
                <i class="bi bi-bag-check"></i> Checkout
            </button>
        </div>
    </form>
</div>

@section('styles')
<style>
    /* General Form Styling */
    .php-email-form {
        padding: 40px;
        background-color: #f1f6fc;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .php-email-form:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .form-control {
        border-radius: 12px;
        box-shadow: none;
        font-size: 16px;
        padding: 12px 20px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }

    /* Button Styling */
    .btn-custom {
        background-color: #ffcc00;
        color: #fff;
        border-radius: 30px;
        padding: 12px 36px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
        border: none;
    }

    .btn-custom:hover {
        background-color: #e5b800;
        transform: translateY(-3px);
    }

    /* Text Styling */
    .text-danger {
        font-size: 12px;
        margin-top: 5px;
    }

    .text-primary {
        color: #007bff !important;
    }

    /* Responsiveness */
    @media (max-width: 767px) {
        .php-email-form {
            padding: 25px;
        }

        .btn-custom {
            padding: 10px 30px;
        }
    }
</style>
@endsection
@endsection
