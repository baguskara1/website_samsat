<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <a href="/" class="back-link">Kembali</a>

            <div class="logo-section">
                <div class="logo">
                    <div>SA<br>MSAT</div>
                </div>
                <h1>SAMSAT DIY</h1>
                <p>Platform Pajak Kendaraan Digital</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email / NIK</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email atau NIK Anda"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password Anda"
                        required
                    >
                </div>

                <div class="remember-me">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                    >
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk</button>

                <div class="form-footer">
                    <p>Belum punya akun?</p>
                    <a href="/register" class="btn-register">Daftar Sekarang</a>
                    <p style="margin-top: 15px; font-size: 12px; color: #999;">
                        Lupa password? <a href="/forgot-password" style="color: #ff5c5c;">Reset di sini</a>
                    </p>
                    <p style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0; font-size: 13px;">
                        Login sebagai <a href="/admin/login" style="color: #ff5c5c; font-weight: 600;">Admin</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
