<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1e1e1e; color: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { background: #f5f5f5; padding: 30px; border-radius: 8px; margin-bottom: 20px; }
        .invoice-box { background: white; border: 2px solid #1e1e1e; padding: 20px; margin: 20px 0; border-radius: 6px; }
        .row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #e0e0e0; }
        .row:last-child { border-bottom: 2px solid #1e1e1e; }
        .label { font-weight: bold; }
        .amount { font-size: 18px; font-weight: bold; color: #ff5c5c; }
        .success-badge { background: #d4edda; border: 2px solid #155724; color: #155724; padding: 10px; border-radius: 6px; text-align: center; font-weight: bold; margin: 15px 0; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✓ Pembayaran Berhasil</h1>
            <p>SAMSAT DIY - Invoice Pajak Kendaraan</p>
        </div>

        <div class="content">
            <p>Halo <strong>{{ $vehicle->nama_pemilik }}</strong>,</p>

            <p>Terima kasih! Pembayaran pajak kendaraan Anda telah berhasil diproses. Berikut adalah detail invoice:</p>

            <div class="success-badge">
                ✓ PEMBAYARAN BERHASIL
            </div>

            <div class="invoice-box">
                <h3 style="margin-top: 0; border-bottom: 2px solid #1e1e1e; padding-bottom: 10px;">DETAIL KENDARAAN</h3>
                <div class="row">
                    <span class="label">Nomor Polisi:</span>
                    <span>{{ $vehicle->no_polisi }}</span>
                </div>
                <div class="row">
                    <span class="label">Nama Pemilik:</span>
                    <span>{{ $vehicle->nama_pemilik }}</span>
                </div>
                <div class="row">
                    <span class="label">Merk/Tipe:</span>
                    <span>{{ $vehicle->merk }} / {{ $vehicle->tipe }}</span>
                </div>
                <div class="row">
                    <span class="label">Tahun Pembuatan:</span>
                    <span>{{ $vehicle->tahun_pembuatan }}</span>
                </div>
                <div class="row">
                    <span class="label">Nomor Rangka:</span>
                    <span>{{ $vehicle->no_rangka }}</span>
                </div>
            </div>

            <div class="invoice-box">
                <h3 style="margin-top: 0; border-bottom: 2px solid #1e1e1e; padding-bottom: 10px;">DETAIL PEMBAYARAN</h3>
                <div class="row">
                    <span class="label">Transaction ID:</span>
                    <span>{{ $payment->midtrans_transaction_id }}</span>
                </div>
                <div class="row">
                    <span class="label">Nominal Pembayaran:</span>
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

            <p>Pajak kendaraan Anda telah berhasil dibayarkan dan berlaku hingga <strong>{{ $payment->valid_until->format('d MMMM Y') }}</strong>.</p>

            <p>Jika ada pertanyaan, silakan hubungi kami di email atau datang langsung ke kantor kami.</p>

            <p>Terima kasih,<br>
            <strong>Tim SAMSAT DIY</strong></p>
        </div>

        <div class="footer">
            <p>© 2026 SAMSAT DIY. Semua hak dilindungi.</p>
            <p>Email ini dikirim kepada {{ $payment->email }} sebagai bukti pembayaran pajak kendaraan.</p>
        </div>
    </div>
</body>
</html>
