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
        .info-box {
            background: white;
            border-left: 4px solid #ff5c5c;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
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
            <h1>Notifikasi Transfer Nama</h1>
            <p>SAMSAT DIY</p>
        </div>

        <div class="content">
            <p>Halo {{ $name }},</p>

            <p>Ada notifikasi terbaru mengenai proses transfer nama kendaraan Anda:</p>

            <div class="info-box">
                <p><strong>No Polisi:</strong> {{ $no_polisi }}</p>
                <p><strong>Pemilik Lama:</strong> {{ $old_owner }}</p>
                <p><strong>Pemilik Baru:</strong> {{ $new_owner }}</p>
                <p><strong>Status:</strong> <strong style="color: #ff5c5c;">{{ ucfirst($status) }}</strong></p>
                <p><strong>Tanggal Update:</strong> {{ $date }}</p>
            </div>

            @if($status === 'completed')
                <p>Selamat! Proses transfer nama kendaraan Anda telah <strong>SELESAI</strong>. Anda sekarang adalah pemilik resmi kendaraan tersebut.</p>
            @elseif($status === 'pending')
                <p>Proses transfer nama kendaraan Anda sedang dalam <strong>PROSES VERIFIKASI</strong>. Kami akan segera menghubungi Anda jika ada informasi tambahan yang diperlukan.</p>
            @elseif($status === 'rejected')
                <p>Mohon maaf, proses transfer nama kendaraan Anda telah <strong>DITOLAK</strong>. Silakan hubungi admin untuk informasi lebih lanjut.</p>
            @endif

            <p>Jika ada pertanyaan, jangan ragu untuk menghubungi tim support kami.</p>

            <p>Regards,<br>
            Tim SAMSAT DIY</p>
        </div>

        <div class="footer">
            <p>© 2026 SAMSAT DIY. Semua hak dilindungi.</p>
            <p>Email ini dikirim kepada {{ $email }} karena ada pembaruan status transfer nama kendaraan Anda.</p>
        </div>
    </div>
</body>
</html>
