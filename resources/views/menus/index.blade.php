@extends('layouts.app_admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-gradient">Daftar Menu</h2>
                <p class="text-muted">Lihat menu yang tersedia di restoran!</p>
            </div>

            <!-- Menampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success fade-in rounded-pill shadow-sm">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah Menu -->
            <a href="{{ route('menus.create') }}" class="btn btn-primary mb-4 btn-rounded">
                <i class="fas fa-plus-circle"></i> Tambah Menu
            </a>

            <!-- Menampilkan Daftar Menu -->
            @if($menus->isEmpty())
                <p class="text-center text-muted">Tidak ada menu yang tersedia.</p>
            @else
                <div class="row">
                    @foreach($menus as $menu)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-lg border-0 rounded-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-body p-4">
                                <h5 class="card-title text-primary fw-bold">{{ $menu->nama_menu }}</h5>
                                <p class="text-secondary small"><strong>Restoran:</strong> {{ $menu->restoran->nama_restoran ?? 'Tidak Diketahui' }}</p>
                                <p class="text-dark"><strong>Harga:</strong> Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <p class="text-dark"><strong>Kategori:</strong> {{ $menu->kategori }}</p>

                                <div class="d-flex align-items-center mt-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-rounded btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-rounded btn-sm">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            <a href="{{ route('menus.downloadPdf') }}" class="btn btn-primary mb-4 btn-rounded">
                <i class="fas fa-download"></i> Download PDF
            </a>
            <!-- Navigasi pagination -->
            <div class="text-center mt-4">
                {{ $menus->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Gradient Text */
    .text-gradient {
        background: linear-gradient(90deg, #007bff, #6c63ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Card Styling */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Button Styling */
    .btn-rounded {
        border-radius: 30px;
        padding: 10px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        font-weight: bold;
        border: none;
    }

    .btn-primary:hover {
        background: #0056b3;
        opacity: 0.9;
    }

    .btn-warning {
        background: linear-gradient(to right, #ffc107, #ffb300);
        color: white;
        font-weight: bold;
        border: none;
    }

    .btn-warning:hover {
        background: #ffb300;
        opacity: 0.9;
    }

    .btn-danger {
        background: linear-gradient(to right, #dc3545, #e4606d);
        color: white;
        font-weight: bold;
        border: none;
    }

    .btn-danger:hover {
        background: #e4606d;
        opacity: 0.9;
    }

    /* Alert Styling */
    .alert-success {
        background-color: #eaf7ea;
        color: #2f8038;
        border: none;
    }

    .fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
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
