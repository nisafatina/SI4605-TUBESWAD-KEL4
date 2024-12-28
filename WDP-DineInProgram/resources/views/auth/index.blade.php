<link rel="stylesheet" href="{{ asset('assets/css/tabel.css') }}">
{{-- Tabel Data Admin --}}
<div class="card shadow-sm rounded">
    <div class="card-header bg-dark text-light">
        <h5>Daftar Admin</h5>
    </div>
    <div class="card-body">
        @if ($admin->isEmpty())
            <p class="text-center">Belum ada data admin</p>
        @else
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. HP</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td class="text-center">
                                <a href="{{ route('auth.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('auth.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('auth.destroy', $data->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
