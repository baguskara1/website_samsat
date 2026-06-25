<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - SAMSAT DIY</title>
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

        .form-container {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            padding: 40px;
            box-shadow: -5px 5px 0px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #1e1e1e;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #1e1e1e;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-container {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
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

        .alert-error {
            background: #ffe0e0;
            color: #d32f2f;
            border-color: #d32f2f;
        }

        .error-text {
            color: #d32f2f;
            font-size: 12px;
            margin-top: 5px;
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

            .form-container {
                padding: 25px;
            }

            .btn-container {
                flex-direction: column;
            }

            .navbar-menu {
                gap: 15px;
                width: 100%;
                flex-wrap: wrap;
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
            <h1>Tambah User Baru</h1>
            <p>Buat akun user baru untuk mengakses layanan SAMSAT DIY</p>
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

            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-top: 10px; margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="contoh@email.com">
                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required minlength="6" placeholder="Minimal 6 karakter">
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password">
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Tambah User</button>
                        <a href="/admin/dashboard" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
