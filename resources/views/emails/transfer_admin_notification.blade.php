<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1e1e1e; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
        .content { background: #f5f5f5; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .info-box { background: white; border-left: 4px solid #ff5c5c; padding: 15px; margin: 15px 0; }
        .status-badge { display: inline-block; padding: 8px 15px; border-radius: 5px; font-weight: 600; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-completed { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 20px; border-top: 1px solid #ddd; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️ Notifikasi Transfer Nama</h1>
            <p>Admin Alert - SAMSAT DIY</p>
        </div>

        <div class="content">
            <p>Halo Admin,</p>

            <p>Ada pembaruan status transfer nama kendaraan yang memerlukan perhatian Anda:</p>

            <div class="info-box">
                <p><strong>No Polisi:</strong> {{ $no_polisi }}</p>
                <p><strong>Pemilik Lama:</strong> {{ $old_owner }}</p>
                <p><strong>Pemilik Baru:</strong> {{ $new_owner }}</p>
                <p>
                    <strong>Status:</strong>
                    <span class="status-badge status-{{ $status }}">
                        {{ ucfirst($status) }}
                    </span>
                </p>
                <p><strong>Waktu Update:</strong> {{ $date }}</p>
            </div>

            <p>Silakan masuk ke admin dashboard untuk melihat detail lengkap dan mengambil tindakan yang diperlukan.</p>

            <p>Link: <a href="{{ url('/admin/analytics/transfers') }}">Lihat Transfer Analytics</a></p>

            <p>Regards,<br>System SAMSAT DIY</p>
        </div>

        <div class="footer">
            <p>© 2026 SAMSAT DIY. Email admin notification.</p>
        </div>
    </div>
</body>
</html>
