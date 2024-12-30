<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<head>
<style>
    body::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url("{{ asset('assets/img/hero-bg.jpg') }}"), #000;
        background-position: center;
        background-size: cover;
    }
    </style>
</head>
<div class="wrapper">
    {{-- Header --}}
    <h2>Edit Data Pemilik Toko</h2>
    
    {{-- Form --}}
    <form action="{{ route('auth.update', $admin->id) }}" method="post">
        @csrf
        @method('PUT')

        {{-- Input Fields --}}
        <div class="input-field">
            <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
            <label for="email">Email</label>
        </div>
        @error('email')
            <div class="error show">{{ $message }}</div>
        @enderror

        <div class="input-field">
            <input type="text" id="nama" name="nama" value="{{ old('nama', $admin->nama) }}" required>
            <label for="nama">Nama</label>
        </div>
        @error('nama')
            <div class="error show">{{ $message }}</div>
        @enderror

        <div class="input-field">
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $admin->alamat) }}" required>
            <label for="alamat">Alamat</label>
        </div>
        @error('alamat')
            <div class="error show">{{ $message }}</div>
        @enderror

        <div class="input-field">
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $admin->no_hp) }}" required>
            <label for="no_hp">Nomor HP</label>
        </div>
        @error('no_hp')
            <div class="error show">{{ $message }}</div>
        @enderror

        {{-- Tombol Aksi --}}
        <div class="button-group">
            <a href="{{ route('auth.index') }}" class="btn btn-cancel">Kembali</a>
            <button type="submit" class="btn btn-submit">Simpan</button>
        </div>
    </form>

</div>
