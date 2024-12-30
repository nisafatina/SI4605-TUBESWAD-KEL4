<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bill</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Detail Pemesanan</h2>

        <div class="mb-4">
            <h4>Nama Pemesan: {{ $order->nama_pemesan }}</h4>
            <p>Nomor Meja: {{ $order->no_meja }}</p>
        </div>

        <h4>Detail Pesanan</h4>
        <div class="list-group mb-3">
            @foreach($items as $item)
            <div class="list-group-item">
                <h5>{{ $item->menu->nama_menu }} ({{ $item->quantity }})</h5>
                <p>{{ $item->menu->deskripsi }}</p>
                <span>Rp {{ number_format($item->menu->harga * $item->quantity, 0, ',', '.') }}</span>
            </div>
            @endforeach
        </div>

        <h4>Total: Rp {{ number_format($total, 0, ',', '.') }}</h4>

        <!-- Tombol untuk cetak -->
        <div class="text-center mt-4">
            <button class="btn btn-success" onclick="window.print()">Cetak Bill</button>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
