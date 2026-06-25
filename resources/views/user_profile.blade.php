<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SAMSAT DIY</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ═══ NAVBAR ═══ */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid #1e1e1e;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: #1e1e1e;
        }

        .navbar-brand-logo {
            width: 48px;
            height: 48px;
            background: #1e1e1e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fbfbfb;
            font-weight: bold;
            font-size: 10px;
            text-align: center;
            flex-shrink: 0;
        }

        .navbar-brand h1 {
            font-size: 22px;
            font-weight: 700;
        }

        .navbar-menu {
            display: flex;
            gap: 24px;
            align-items: center;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #1e1e1e;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .navbar-menu a:hover {
            color: #ff5c5c;
        }

        .btn-logout {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid #1e1e1e;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            box-shadow: -3px 3px 0px black;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .btn-logout:hover {
            box-shadow: -5px 5px 0px black;
            transform: translateY(-2px);
        }

        /* ═══ MAIN CONTENT ═══ */
        .container {
            max-width: 720px;
            margin: 0 auto;
            padding: 50px 24px;
            width: 100%;
            flex: 1;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
        }

        /* ═══ ALERTS ═══ */
        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 24px;
            border: 2px solid;
            font-size: 14px;
        }

        .alert-success {
            background: #e0ffe0;
            border-color: #4caf50;
            color: #2e7d32;
        }

        .alert-error {
            background: #ffe0e0;
            color: #d32f2f;
            border-color: #d32f2f;
        }

        .alert-error ul {
            margin-top: 8px;
            margin-left: 20px;
        }

        /* ═══ FORM CARD ═══ */
        .form-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 16px;
            padding: 40px;
            box-shadow: -6px 6px 0px rgba(0, 0, 0, 0.1);
        }

        .form-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e1e1e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #1e1e1e;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            background: #fbfbfb;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff5c5c;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.1);
        }

        .form-divider {
            border: none;
            border-top: 2px solid #f0f0f0;
            margin: 28px 0;
        }

        .form-info {
            background: #f5f5f5;
            border-left: 4px solid #ff5c5c;
            border-radius: 0 8px 8px 0;
            padding: 12px 16px;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /* ═══ BUTTONS ═══ */
        .btn-submit {
            width: 100%;
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #1e1e1e;
            background: #ff5c5c;
            color: #1e1e1e;
            box-shadow: -5px 5px 0px black;
            font-family: inherit;
            margin-top: 10px;
        }

        .btn-submit:hover {
            box-shadow: -7px 7px 0px black;
            transform: translateY(-3px);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: -2px 2px 0px black;
        }

        /* ═══ FOOTER ═══ */
        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 40px 0;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }

        /* ═══ RESPONSIVE ═══ */
        @media (max-width: 768px) {
            .navbar-container {
                padding: 12px 20px;
            }

            .navbar-brand h1 {
                font-size: 18px;
            }

            .navbar-brand-logo {
                width: 40px;
                height: 40px;
                font-size: 8px;
            }

            .navbar-menu {
                gap: 12px;
            }

            .navbar-menu a {
                font-size: 13px;
            }

            .btn-logout {
                padding: 6px 14px;
                font-size: 12px;
            }

            .container {
                padding: 30px 16px;
            }

            .page-title {
                font-size: 22px;
                margin-bottom: 20px;
            }

            .form-card {
                padding: 24px 20px;
                border-radius: 12px;
            }

            .btn-submit {
                font-size: 14px;
                padding: 12px 20px;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                flex-direction: column;
                gap: 12px;
            }

            .navbar-menu {
                gap: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .form-card {
                padding: 20px 16px;
            }
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
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
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
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="form-section-title">📋 Informasi Akun</div>

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="form-divider">

                <div class="form-section-title">🔒 Ubah Password</div>

                <div class="form-info">Kosongkan jika tidak ingin mengganti password Anda.</div>

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

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <p>© 2026 SAMSAT DIY — Layanan Pajak Kendaraan Digital</p>
        </div>
    </footer>
</body>
</html>
