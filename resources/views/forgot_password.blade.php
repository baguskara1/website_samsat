<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/forgot_password.css') }}">
</head>
<body>
    <div class="reset-container">
        <a href="/login" class="back-link">Kembali ke Login</a>

        <div class="reset-box">
            <div class="logo-section">
                <div class="logo">
                    <div>SA<br>MSAT</div>
                </div>
                <h1>Reset Password</h1>
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

            <div class="info-text">
                Masukkan email akun Anda. Kami akan mengirimkan link untuk reset password ke email tersebut.
            </div>

            <form action="{{ route('forgot.password.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email akun Anda" value="{{ old('email') }}" required autofocus>
                </div>
                <button type="submit" class="btn-reset">Kirim Link Reset Password</button>
            </form>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0; text-align: center; font-size: 13px;">
                Belum punya akun? <a href="/register" style="color: #ff5c5c; font-weight: 600; text-decoration: none;">Daftar di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
