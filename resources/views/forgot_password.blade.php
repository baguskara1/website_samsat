<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SAMSAT DIY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #1e1e1e;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .reset-container {
            width: 100%;
            max-width: 450px;
        }

        .reset-box {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 20px;
            padding: 60px 50px;
            box-shadow: -10px 10px 0px 0px black;
            transition: all 0.3s ease;
        }

        .reset-box:hover {
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
        input[type="text"],
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
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.1);
            border-color: #ff5c5c;
        }

        input::placeholder {
            color: #999;
        }

        .btn-reset {
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

        .btn-reset:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .btn-reset:active {
            transform: translateY(0);
            box-shadow: -2px 2px 0px 0px black;
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

        .info-text {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 10px;
            border-left: 4px solid #ff5c5c;
        }

        @media (max-width: 768px) {
            .reset-box {
                padding: 40px 25px;
            }

            .logo-section {
                margin-bottom: 30px;
            }

            .logo-section h1 {
                font-size: 24px;
            }

            input[type="email"],
            input[type="text"],
            input[type="password"] {
                padding: 12px 14px;
                font-size: 16px;
            }

            .btn-reset {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
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
