<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">
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

            <form action="{{ route('reset.password.process') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="user_id" value="{{ $userId }}">

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password baru" required>
                    <div class="password-requirements">
                        ✓ Minimal 8 karakter
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru" required>
                </div>

                <button type="submit" class="btn-reset">Reset Password</button>
            </form>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0; text-align: center; font-size: 13px;">
                Ingat password Anda? <a href="/login" style="color: #ff5c5c; font-weight: 600; text-decoration: none;">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
