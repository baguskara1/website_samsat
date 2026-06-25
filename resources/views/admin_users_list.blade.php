<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User - SAMSAT DIY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fbfbfb;
            color: #1e1e1e;
        }

        .container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 50px;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
        }

        .navbar-brand h2 {
            font-size: 24px;
            font-weight: 700;
        }

        .navbar-admin-badge {
            background: rgba(255,255,255,0.3);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .navbar-menu a:hover {
            opacity: 0.8;
        }

        .btn-logout {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #fff;
            color: #ff5c5c;
        }

        .page-header {
            padding: 40px 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .page-content {
            padding: 0 50px 60px;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: 2px solid #1e1e1e;
        }

        .btn-primary {
            background: #ff5c5c;
            color: #1e1e1e;
            box-shadow: -4px 4px 0px rgba(0,0,0,0.1);
        }

        .btn-primary:hover {
            box-shadow: -8px 8px 0px black;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: white;
            color: #1e1e1e;
            box-shadow: -4px 4px 0px rgba(0,0,0,0.1);
        }

        .btn-secondary:hover {
            box-shadow: -8px 8px 0px black;
            transform: translateY(-3px);
        }

        .table-container {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: -5px 5px 0px rgba(0,0,0,0.1);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background: #1e1e1e;
            color: white;
        }

        .data-table th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            border-right: 1px solid #333;
        }

        .data-table th:last-child {
            border-right: none;
        }

        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table tbody tr:hover {
            background: #f7f7f7;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #d4f4dd;
            color: #0d7533;
        }

        .btn-small {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }

        .btn-edit {
            background: #e3f2fd;
            color: #1976d2;
            border-color: #1976d2;
        }

        .btn-edit:hover {
            background: #1976d2;
            color: white;
        }

        .btn-delete {
            background: #ffe0e0;
            color: #d32f2f;
            border-color: #d32f2f;
        }

        .btn-delete:hover {
            background: #d32f2f;
            color: white;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 2px solid;
        }

        .alert-success {
            background: #d4f4dd;
            color: #0d7533;
            border-color: #0d7533;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .page-header {
                padding: 30px 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .page-content {
                padding: 0 20px 40px;
            }

            .navbar-menu {
                gap: 15px;
                width: 100%;
                flex-wrap: wrap;
            }

            .action-bar {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .table-container {
                overflow-x: auto;
            }

            .data-table {
                min-width: 600px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <h2>SAMSAT DIY</h2>
            <div class="navbar-admin-badge">ADMIN PANEL</div>
        </div>
        <div class="navbar-menu">
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/vehicles">Kendaraan</a>
            <a href="/admin/users">Users</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Daftar Semua User</h1>
            <p>Kelola akun user yang terdaftar di sistem SAMSAT DIY</p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="action-bar">
                <h2 style="font-size: 24px; font-weight: 700;">Total User: {{ count($users) }}</h2>
                <div style="display: flex; gap: 15px;">
                    <a href="/admin/users/create" class="btn btn-primary">+ Tambah User</a>
                    <a href="/admin/dashboard" class="btn btn-secondary">← Kembali ke Dashboard</a>
                </div>
            </div>

            @if(count($users) > 0)
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Terdaftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <a href="/admin/users/{{ $user->id }}/edit" class="btn-small btn-edit">Edit</a>
                                    <a href="/admin/users/{{ $user->id }}/delete" class="btn-small btn-delete" onclick="return confirm('Yakin ingin menghapus user {{ $user->name }}?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="table-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">👤</div>
                        <h3>Belum Ada User</h3>
                        <p>Belum ada user yang terdaftar. Tambahkan user baru untuk memulai.</p>
                        <a href="/admin/users/create" class="btn btn-primary">+ Tambah User Pertama</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
