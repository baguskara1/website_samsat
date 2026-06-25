<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif;line-height:1.6;color:#333;max-width:600px;margin:0 auto;padding:20px}.header{background:linear-gradient(135deg,#667eea,#764ba2);color:white;padding:30px;text-align:center;border-radius:10px 10px 0 0}.content{padding:30px;border:1px solid #ddd;border-top:none;border-radius:0 0 10px 10px}.btn{display:inline-block;padding:12px 24px;background:#ff5c5c;color:white;text-decoration:none;border-radius:8px;font-weight:bold;margin:20px 0}.footer{text-align:center;padding:20px;color:#999;font-size:12px}</style></head>
<body>
<div class="header"><h2>SAMSAT DIY</h2><p>Layanan Pajak Kendaraan Digital</p></div>
<div class="content">
<h3>Selamat Datang, {{ $name }}!</h3>
<p>Terima kasih telah mendaftar di SAMSAT DIY.</p>
<p>Akun Anda telah berhasil dibuat. Sekarang Anda dapat:</p>
<ul>
<li>Mendaftarkan kendaraan Anda</li>
<li>Membayar pajak kendaraan secara online</li>
<li>Mengajukan permohonan pindah nama</li>
<li>Melihat riwayat permohonan Anda</li>
</ul>
<a href="{{ url('/dashboard') }}" class="btn">Masuk ke Dashboard</a>
<p>Jika Anda memiliki pertanyaan, silakan hubungi tim support kami.</p>
</div>
<div class="footer"><p>&copy; {{ date('Y') }} SAMSAT DIY</p></div>
</body>
</html>
