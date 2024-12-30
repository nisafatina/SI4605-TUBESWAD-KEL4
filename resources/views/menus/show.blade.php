<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Detail Menu</h2>
    <div class="mb-3">
        <strong>Nama Menu:</strong> {{ $menus->nama_menu }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi:</strong> {{ $menus->deskripsi }}
    </div>
    <div class="mb-3">
        <strong>Harga:</strong> Rp{{ number_format($menu->harga, 0, ',', '.') }}
    </div>
    <div class="mb-3">
        <strong>Kategori:</strong> {{ $menus->kategori }}
    </div>
    <div class="mb-3">
        <strong>Restoran:</strong> {{ $menus->restoran->nama_restoran ?? 'Tidak Diketahui' }}
    </div>
    <div class="mb-3">
        <strong>Gambar Menu:</strong>
        @if($menus->gambar_menu)
            <div>
                <img src="{{ asset('storage/' . $menus->gambar_menu) }}" alt="Gambar Menu" class="img-thumbnail" style="width: 200px;">
            </div>
        @else
            <p>Tidak ada gambar</p>
        @endif
    </div>
    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
</div>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
