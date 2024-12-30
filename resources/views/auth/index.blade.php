@extends('layouts.app_admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        @if ($admin->isEmpty())
            <p class="text-center">Belum ada data admin</p>
        @else
            @foreach ($admin as $data)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-light">
                            <h5 class="mb-0">Admin {{ $loop->iteration }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $data->email }}</p>
                            <p><strong>Nama:</strong> {{ $data->nama }}</p>
                            <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                            <p><strong>No. HP:</strong> {{ $data->no_hp }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('auth.show', $data->id) }}" class="btn btn-info btn-sm shadow-sm px-4 py-2 rounded-3 me-2">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('auth.edit', $data->id) }}" class="btn btn-warning btn-sm shadow-sm px-4 py-2 rounded-3 me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('auth.destroy', $data->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm px-4 py-2 rounded-3"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="text-center mt-5">
        <a href="{{ route('exportpdf.index') }}" class="btn btn-primary btn-lg shadow-sm rounded-pill px-5 py-3">
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/tabel.css') }}">
<!-- Add Bootstrap Icons for buttons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
