<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif;line-height:1.6;color:#333;max-width:600px;margin:0 auto;padding:20px}.header{background:linear-gradient(135deg,#667eea,#764ba2);color:white;padding:30px;text-align:center;border-radius:10px 10px 0 0}.content{padding:30px;border:1px solid #ddd;border-top:none;border-radius:0 0 10px 10px}.success-box{background:#d4f4dd;color:#0d7533;padding:15px;border-radius:8px;text-align:center;font-size:18px;font-weight:bold;margin:20px 0}.footer{text-align:center;padding:20px;color:#999;font-size:12px}table{width:100%;border-collapse:collapse}td{padding:8px;border-bottom:1px solid #eee}</style></head>
<body>
<div class="header"><h2>SAMSAT DIY</h2><p>Layanan Pajak Kendaraan Digital</p></div>
<div class="content">
<h3>Konfirmasi Pembayaran Pajak</h3>
<div class="success-box">✓ Pembayaran Berhasil Diproses</div>
<p>Halo,</p>
<p>Pembayaran pajak kendaraan Anda telah berhasil diproses. Berikut detail pembayaran:</p>
<table>
<tr><td>No. Polisi</td><td><strong>{{ $vehicle->no_polisi }}</strong></td></tr>
<tr><td>Nama Pemilik</td><td>{{ $vehicle->nama_pemilik }}</td></tr>
<tr><td>Merk/Tipe</td><td>{{ $vehicle->merk }} / {{ $vehicle->tipe }}</td></tr>
<tr><td>Tahun Pembuatan</td><td>{{ $vehicle->tahun_pembuatan }}</td></tr>
<tr><td>Tanggal Pembayaran</td><td>{{ $paymentDate }}</td></tr>
</table>
<p>Bukti pembayaran ini dikirim ke: <strong>{{ $emailTo }}</strong></p>
<p>Simpan email ini sebagai bukti pembayaran Anda.</p>
</div>
<div class="footer"><p>&copy; {{ date('Y') }} SAMSAT DIY</p></div>
</body>
</html>
