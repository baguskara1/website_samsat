<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #ff5c5c; color: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { background: #f5f5f5; padding: 30px; border-radius: 8px; margin-bottom: 20px; }
        .alert-box { background: #fff3cd; border: 2px solid #ff9800; padding: 15px; border-radius: 6px; margin: 15px 0; }
        .info-box { background: white; border: 2px solid #1e1e1e; padding: 20px; margin: 15px 0; border-radius: 6px; }
        .row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #e0e0e0; }
        .row:last-child { border-bottom: none; }
        .label { font-weight: bold; }
        .amount { font-size: 18px; font-weight: bold; color: #ff5c5c; }
        .button { background: #ff5c5c; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; display: inline-block; margin-top: 15px; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️ PEMBAYARAN PAJAK MASUK</h1>
            <p>Admin Alert - SAMSAT DIY</p>
        </div>

        <div class="content">
            <p>Halo Admin,</p>

            <div class="alert-box">
                <strong>🔔 Ada pembayaran pajak kendaraan baru yang telah dikonfirmasi!</strong>
            </div>

            <div class="info-box">
                <h3 style="margin-top: 0; border-bottom: 2px solid #1e1e1e; padding-bottom: 10px;">DETAIL KENDARAAN</h3>
                <div class="row">
                    <span class="label">Nomor Polisi:</span>
                    <span><strong>{{ $payment->no_polisi }}</strong></span>
                </div>
                <div class="row">
                    <span class="label">Nama Pemilik:</span>
                    <span>{{ $payment->kendaraan->nama_pemilik ?? 'N/A' }}</span>
                </div>
                <div class="row">
                    <span class="label">Merk/Tipe:</span>
                    <span>{{ $payment->kendaraan->merk ?? 'N/A' }} / {{ $payment->kendaraan->tipe ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="info-box">
                <h3 style="margin-top: 0; border-bottom: 2px solid #1e1e1e; padding-bottom: 10px;">DETAIL PEMBAYAR</h3>
                <div class="row">
                    <span class="label">Email:</span>
                    <span>{{ $payment->email }}</span>
                </div>
                <div class="row">
                    <span class="label">Transaction ID:</span>
                    <span>{{ $payment->midtrans_transaction_id }}</span>
                </div>
            </div>

            <div class="info-box">
                <h3 style="margin-top: 0; border-bottom: 2px solid #1e1e1e; padding-bottom: 10px;">DETAIL PEMBAYARAN</h3>
                <div class="row">
                    <span class="label">Nominal:</span>
                    <span class="amount">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</span>
                </div>
                <div class="row">
                    <span class="label">Tanggal Pembayaran:</span>
                    <span>{{ $payment->paid_at->format('d M Y H:i') }}</span>
                </div>
                <div class="row">
                    <span class="label">Berlaku Hingga:</span>
                    <span><strong>{{ $payment->valid_until->format('d M Y') }}</strong></span>
                </div>
                <div class="row">
                    <span class="label">Status:</span>
                    <span style="color: #155724; font-weight: bold;">✓ CONFIRMED</span>
                </div>
            </div>

            <p>Silakan masuk ke dashboard admin untuk melihat detail lengkap pembayaran dan mengambil tindakan yang diperlukan.</p>

            <a href="{{ url('/admin/analytics') }}" class="button">Lihat Payment History</a>

            <p style="margin-top: 30px;">Terima kasih,<br>
            <strong>System SAMSAT DIY</strong></p>
        </div>

        <div class="footer">
            <p>© 2026 SAMSAT DIY. Admin notification system.</p>
        </div>
    </div>
</body>
</html>
