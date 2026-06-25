<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SAMSAT DIY</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #fbfbfb; color: #1e1e1e; }
        .navbar { background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); border-bottom: 2px solid #e0e0e0; position: sticky; top: 0; z-index: 100; }
        .navbar-container { max-width: 1440px; margin: 0 auto; padding: 20px 100px; display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { display: flex; align-items: center; gap: 20px; text-decoration: none; color: #1e1e1e; }
        .navbar-brand-logo { width: 60px; height: 60px; background: #1e1e1e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fbfbfb; font-weight: bold; font-size: 12px; text-align: center; }
        .navbar-brand h1 { font-size: 28px; font-weight: bold; }
        .navbar-menu { display: flex; gap: 30px; align-items: center; }
        .navbar-menu a, .navbar-menu button { text-decoration: none; color: #1e1e1e; font-weight: 500; font-size: 16px; cursor: pointer; background: none; border: none; transition: color 0.3s ease; }
        .navbar-menu a:hover, .navbar-menu button:hover { color: #ff5c5c; }
        .btn-logout { background: #ff5c5c; color: #1e1e1e; border: 2px solid #1e1e1e; padding: 10px 20px; border-radius: 8px; font-weight: 600; box-shadow: -3px 3px 0px black; }
        .container { max-width: 1200px; margin: 0 auto; padding: 80px 100px; }
        .page-title { font-size: 28px; font-weight: 700; margin-bottom: 30px; }
        .form-card { background: white; border: 2px solid #1e1e1e; border-radius: 20px; padding: 40px; box-shadow: -5px 5px 0px rgba(0,0,0,0.1); max-width: 700px; margin: 0 auto; }
        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 8px; color: #1e1e1e; font-size: 14px; }
        .form-group input { width: 100%; padding: 12px 16px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease; }
        .form-group input:focus { outline: none; border-color: #ff5c5c; box-shadow: 0 0 0 3px rgba(255,92,92,0.1); }
        .form-divider { border: none; border-top: 2px solid #eee; margin: 30px 0; }
        .form-info { background: #f0f0f0; border: 1px solid #ddd; border-radius: 8px; padding: 12px 16px; font-size: 13px; color: #666; margin-bottom: 25px; }
        .btn { padding: 14px 28px; border-radius: 10px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; border: 2px solid #1e1e1e; }
        .btn-primary { background: #ff5c5c; color: #1e1e1e; box-shadow: -4px 4px 0px rgba(0,0,0,0.1); }
        .btn-primary:hover { box-shadow: -8px 8px 0px black; transform: translateY(-3px); }
        .btn-secondary { background: white; color: #1e1e1e; box-shadow: -4px 4px 0px rgba(0,0,0,0.1); }
        .btn-secondary:hover { box-shadow: -8px 8px 0px black; transform: translateY(-3px); }
        .alert { padding: 16px 20px; border-radius: 8px; margin-bottom: 20px; border: 2px solid; }
        .alert-success { background: #e0ffe0; border-color: #4caf50; color: #2e7d32; }
        .alert-error { background: #ffe0e0; color: #d32f2f; border-color: #d32f2f; }
        .error-text { color: #d32f2f; font-size: 12px; margin-top: 5px; }
        .footer { background: #1e1e1e; color: #fbfbfb; padding: 60px 0; margin-top: 100px; }
        .footer-container { max-width: 1440px; margin: 0 auto; padding: 40px 100px; text-align: center; }
        @media (max-width: 768px) {
            .navbar-container { padding: 15px 20px; flex-direction: column; gap: 15px; }
            .navbar-brand h1 { font-size: 20px; }
            .navbar-menu { gap: 10px; font-size: 12px; flex-wrap: wrap; justify-content: center; }
            .container { padding: 40px 20px; }
            .form-card { padding: 25px; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <div class="navbar-brand-logo"><div>SA<br>MSAT</div></div>
                <h1>SAMSAT DIY</h1>
            </a>
            <div class="navbar-menu">
                <a href="/dashboard">Dashboard</a>
                <a href="/profile">Profil</a>
                <a href="/faq">FAQ</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">👤 Profil Saya</h1>

        @if (session('status'))
            <div class="alert alert-success">✓ {{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="form-divider">

                <div class="form-info">Kosongkan password jika tidak ingin mengganti password Anda.</div>

                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Masukkan password saat ini">
                </div>

                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" minlength="8" placeholder="Minimal 8 karakter">
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Ulangi password baru">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <p>SAMSAT DIY - Layanan Pajak Kendaraan Digital</p>
        </div>
    </footer>
</body>
</html>
