<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #1e1e1e;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .reset-link {
            display: inline-block;
            background: #ff5c5c;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reset Password</h1>
            <p>SAMSAT DIY</p>
        </div>

        <div class="content">
            <p>Halo {{ $name }},</p>

            <p>Kami menerima permintaan untuk me-reset password akun Anda. Klik tombol di bawah untuk membuat password baru:</p>

            <div style="text-align: center;">
                <a href="{{ url('/reset-password/' . $token . '?user=' . $userId) }}" class="reset-link">
                    Reset Password
                </a>
            </div>

            <p>Atau salin link ini ke browser Anda:</p>
            <p style="word-break: break-all; background: white; padding: 10px; border-radius: 4px;">
                {{ url('/reset-password/' . $token . '?user=' . $userId) }}
            </p>

            <p><strong>Catatan:</strong> Link ini akan berlaku selama 1 jam. Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>

            <p>Regards,<br>
            Tim SAMSAT DIY</p>
        </div>

        <div class="footer">
            <p>© 2026 SAMSAT DIY. Semua hak dilindungi.</p>
            <p>Email ini dikirim kepada {{ $name }} karena ada permintaan reset password untuk akun ini.</p>
        </div>
    </div>
</body>
</html>
