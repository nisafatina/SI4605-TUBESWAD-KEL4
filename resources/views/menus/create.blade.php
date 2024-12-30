@extends('layouts.app_admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: bold;
        }
        h2 {
            color: #333;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
        }
        .form-control {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Menu</h2>
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" id="nama_menu" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" required>
            </div>
            <div class="mb-4">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" id="kategori">
            </div>
            <div class="mb-4">
                <label for="id_pemilik" class="form-label">Restoran</label>
                <select name="id_pemilik" class="form-control" id="id_pemilik" required>
                    <option value="">Pilih Restoran</option>
                    @foreach($restoran as $restoran)
                        <option value="{{ $restoran->id }}">{{ $restoran->nama_restoran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="gambar_menu" class="form-label">Gambar Menu</label>
                <input type="file" name="gambar_menu" class="form-control" id="gambar_menu">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
