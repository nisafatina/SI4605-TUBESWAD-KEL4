<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<div class="wrapper">
    {{-- Header --}}
    <h2>Detail Pemilik Toko</h2>

    {{-- Form --}}
    <form>
        {{-- Input Fields --}}
        <div class="input-field">
            <input type="email" id="email" name="email" value="{{ $admin->email }}" disabled>
            <label for="email"></label>
        </div>

        <div class="input-field">
            <input type="text" id="nama" name="nama" value="{{ $admin->nama }}" disabled>
            <label for="nama"></label>
        </div>

        <div class="input-field">
            <input type="text" id="alamat" name="alamat" value="{{ $admin->alamat }}" disabled>
            <label for="alamat"></label>
        </div>

        <div class="input-field">
            <input type="text" id="no_hp" name="no_hp" value="{{ $admin->no_hp }}" disabled>
            <label for="no_hp"></label>
        </div>

        {{-- Tombol Kembali --}}
        <div class="button-group">
            <a href="{{ route('auth.index') }}" class="btn btn-cancel">Kembali</a>
        </div>
    </form>
</div>
