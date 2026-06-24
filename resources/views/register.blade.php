<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SAMSAT DIY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #fbfbfb 0%, #f5f5f5 100%);
            color: #1e1e1e;
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-box {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 20px;
            padding: 60px 50px;
            box-shadow: -10px 10px 0px 0px black;
            width: 100%;
            max-width: 450px;
            transition: all 0.3s ease;
        }

        .login-box:hover {
            box-shadow: -12px 12px 0px 0px black;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-section .logo {
            width: 80px;
            height: 80px;
            background: #1e1e1e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fbfbfb;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            margin: 0 auto 20px;
        }

        .logo-section h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .logo-section p {
            font-size: 14px;
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #1e1e1e;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #1e1e1e;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: #fbfbfb;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.1);
            border-color: #ff5c5c;
        }

        input::placeholder {
            color: #999;
        }

        .btn-login {
            width: 100%;
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid #1e1e1e;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: -5px 5px 0px 0px black;
            font-family: 'Inter', sans-serif;
            margin-top: 10px;
        }

        .btn-login:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: -2px 2px 0px 0px black;
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
        }

        .form-footer p {
            font-size: 14px;
            color: #666;
        }

        .form-footer a {
            color: #ff5c5c;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #1e1e1e;
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 2px solid;
        }

        .alert-error {
            background: #ffe0e0;
            border-color: #ff5c5c;
            color: #c41e3a;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #1e1e1e;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 30px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #ff5c5c;
        }

        .back-link::before {
            content: "←";
            margin-right: 8px;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin: 20px 0;
            font-size: 13px;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #ff5c5c;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .terms-checkbox label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: 400;
            color: #666;
        }

        .terms-checkbox a {
            color: #ff5c5c;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .login-box {
                padding: 40px 25px;
            }

            .logo-section {
                margin-bottom: 30px;
            }

            .logo-section h1 {
                font-size: 24px;
            }

            input {
                font-size: 16px;
                padding: 12px 14px;
            }

            .btn-login {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
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
                <p>Daftar Akun Baru</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email Anda"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">No. Handphone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        placeholder="08XX-XXXX-XXXX"
                        value="{{ old('phone') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Buat password yang kuat"
                        required
                    >
                    <small style="color: #999; font-size: 12px; margin-top: 5px; display: block;">
                        Minimal 8 karakter, kombinasi huruf dan angka
                    </small>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Ulangi password Anda"
                        required
                    >
                </div>

                <div class="terms-checkbox">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms"
                        required
                    >
                    <label for="terms">
                        Saya setuju dengan <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
                    </label>
                </div>

                <button type="submit" class="btn-login">Daftar Sekarang</button>

                <div class="form-footer">
                    <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
