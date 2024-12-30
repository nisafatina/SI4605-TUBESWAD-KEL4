<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Daftar Menu</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Restoran</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $index => $menu)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $menu->restoran->nama_restoran ?? 'Tidak Diketahui' }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>{{ $menu->kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
