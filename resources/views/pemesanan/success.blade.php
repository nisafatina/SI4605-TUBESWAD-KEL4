<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Sukses</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">


    <!-- Include Bootstrap -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            border-radius: 20px;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        h1 {
            color: #28a745;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .btn {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><i class="bi bi-check-circle"></i> Pesanan Berhasil</h1>
        <p class="text-center">Terima kasih, <strong>{{ $pemesanan->nama_pemesan }}</strong>!</p>
        
        <div class="mb-4">
            <p><strong>No Meja:</strong> {{ $pemesanan->no_meja }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $pemesanan->status }}</p>
        </div>

        <div class="mt-4">
            <!-- Tombol untuk download tagihan -->
            <a href="{{ route('pemesanan.downloadBill', $pemesanan->id) }}" class="btn btn-success btn-custom">
                <i class="bi bi-file-earmark-pdf"></i> Download Bill (PDF)
            </a>
        </div>

        <div class="mt-3 text-center">
            <!-- Tombol untuk kembali ke dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-custom">
                <i class="bi bi-house-door"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
