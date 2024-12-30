<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Menu</h2>
    <form action="{{ route('menus.update', $menus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="{{ $menus->nama_menu }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $menus->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ $menus->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" id="kategori" value="{{ $menus->kategori }}">
        </div>
        <div class="mb-3">
            <label for="id_pemilik" class="form-label">Restoran</label>
            <select name="id_pemilik" class="form-control" id="id_pemilik" required>
                <option value="">Pilih Restoran</option>
                @foreach($restoran as $restoran)
                    <option value="{{ $restoran->id }}" {{ $restoran->id == $menus->restoran_id ? 'selected' : '' }}>
                        {{ $restoran->nama_restoran }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar_menu" class="form-label">Gambar Menu</label>
            @if($menus->gambar_menu)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $menus->gambar_menu) }}" alt="Gambar Menu" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            <input type="file" name="gambar_menu" class="form-control" id="gambar_menu">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
