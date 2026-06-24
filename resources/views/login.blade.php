<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAMSAT DIY</title>
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
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #1e1e1e;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #1e1e1e;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: #fbfbfb;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.1);
            border-color: #ff5c5c;
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
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
            margin-bottom: 15px;
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

        .btn-register {
            display: inline-block;
            background: #1e1e1e;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #ff5c5c;
            color: #1e1e1e;
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

        .alert-success {
            background: #e0ffe0;
            border-color: #4caf50;
            color: #2e7d32;
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

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: -15px;
            margin-bottom: 25px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #ff5c5c;
        }

        .remember-me label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: 400;
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

            input[type="email"],
            input[type="password"] {
                padding: 12px 14px;
                font-size: 16px;
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
                        Lupa password? <a href="#" style="color: #ff5c5c;">Reset di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
