<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Pemesanan</title>
</head>

<body>
    <h1>Pesanan Anda Berhasil Dibuat!</h1>
    <h1>Pemesanan Berhasil</h1>
    <p>Terima kasih, {{ $pemesanan->nama_pemesan }}!</p>
    <p>No Meja: {{ $pemesanan->no_meja }}</p>
    <p>Total Harga: Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
    <p>Status: {{ $pemesanan->status }}</p>
</body>

</html>
