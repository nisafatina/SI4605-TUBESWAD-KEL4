<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
    <link rel="stylesheet"  href="{{ asset('assets/css/report.css') }}">
</head>
<body>
    <div class="header">
        <h1>Admin Report</h1>
        <div class="subtext">Generated on {{ now()->format('F j, Y') }}</div>
    </div>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $index => $admin)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Admin Management System • Confidential</p>
    </div>
</body>
</html>
