<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif;line-height:1.6;color:#333;max-width:600px;margin:0 auto;padding:20px}.header{background:linear-gradient(135deg,#667eea,#764ba2);color:white;padding:30px;text-align:center;border-radius:10px 10px 0 0}.content{padding:30px;border:1px solid #ddd;border-top:none;border-radius:0 0 10px 10px}.status{display:inline-block;padding:8px 20px;border-radius:5px;font-weight:bold;font-size:16px;margin:15px 0}.status-selesai{background:#d4f4dd;color:#0d7533}.status-ditolak{background:#ffe0e0;color:#d32f2f}.footer{text-align:center;padding:20px;color:#999;font-size:12px}table{width:100%;border-collapse:collapse}td{padding:8px;border-bottom:1px solid #eee}</style></head>
<body>
<div class="header"><h2>SAMSAT DIY</h2><p>Layanan Pajak Kendaraan Digital</p></div>
<div class="content">
<h3>Status Permohonan Pindah Nama</h3>
<p>Halo,</p>
<p>Permohonan pindah nama kendaraan Anda telah <strong>{{ $statusText }}</strong>.</p>
<div style="text-align:center">
@if($pindahNama->status == 'selesai')
<span class="status status-selesai">✓ Selesai</span>
@else
<span class="status status-ditolak">✗ Ditolak</span>
@endif
</div>
<h4>Detail Permohonan:</h4>
<table>
<tr><td>No. Polisi</td><td><strong>{{ $pindahNama->kendaraan->no_polisi ?? '-' }}</strong></td></tr>
<tr><td>Pemilik Baru</td><td>{{ $pindahNama->nama_pemilik_baru }}</td></tr>
<tr><td>Tanggal Pengajuan</td><td>{{ $pindahNama->created_at->format('d M Y') }}</td></tr>
@if($pindahNama->tanggal_selesai)
<tr><td>Tanggal Selesai</td><td>{{ $pindahNama->tanggal_selesai->format('d M Y') }}</td></tr>
@endif
</table>
<p>Silakan login ke akun Anda untuk melihat detail lebih lanjut.</p>
</div>
<div class="footer"><p>&copy; {{ date('Y') }} SAMSAT DIY</p></div>
</body>
</html>
