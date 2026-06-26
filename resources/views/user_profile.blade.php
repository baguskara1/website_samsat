<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/user_profile.css') }}">
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
