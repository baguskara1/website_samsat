<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar Pajak - SAMSAT DIY</title>
    
    <link rel="stylesheet" href="{{ asset('css/bayarpajak.css') }}">
</head>
<body>
    
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10;">
        <div class="container" style="padding: 20px 100px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="logo-circle">
                    <div>SA<br>MSAT</div>
                </div>
                <h1 style="font-size: 28px; font-weight: bold; color: #1e1e1e;">SAMSAT DIY</h1>
            </div>

            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/Daftar_kendaraan">Daftar Kendaraan</a>
                <a href="/faq">FAQ</a>
                <a href="{{ url('/login') }}" class="btn-primary" style="margin: 0; padding: 12px 30px;">Login</a>
            </div>
        </div>
    </nav>

    <section class="page-header">
        <div class="container">
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 20px;">Pajak Tahunan Kendaraan</h2>
            <p style="font-size: 18px; color: #666; margin-bottom: 40px;">Silakan isi data kendaraan Anda untuk mengecek dan membayar pajak tahunan secara digital.</p>
        </div>
    </section>

    <main class="container">
        @if (isset($snapToken))
            <!-- Detail Tagihan Neo-Brutalist Card -->
            <div class="form-card" style="margin-bottom: 60px;">
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 30px; border-bottom: 2px solid #e0e0e0; padding-bottom: 15px;">Detail Tagihan Pajak</h3>
                
                <div style="margin-bottom: 30px; background: #fbfbfb; border: 2px solid #1e1e1e; border-radius: 12px; padding: 25px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px;">
                        <span style="font-weight: 600; color: #666;">Nomor Polisi:</span>
                        <span style="font-weight: 700; color: #1e1e1e;">{{ $vehicle->no_polisi }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px;">
                        <span style="font-weight: 600; color: #666;">Nama Pemilik:</span>
                        <span style="font-weight: 700; color: #1e1e1e;">{{ $vehicle->nama_pemilik }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px;">
                        <span style="font-weight: 600; color: #666;">Merk / Tipe:</span>
                        <span style="font-weight: 700; color: #1e1e1e;">{{ $vehicle->merk }} / {{ $vehicle->tipe }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px;">
                        <span style="font-weight: 600; color: #666;">Tahun Pembuatan:</span>
                        <span style="font-weight: 700; color: #1e1e1e;">{{ $vehicle->tahun_pembuatan }}</span>
                    </div>
                    <hr style="border: none; border-top: 2px solid #e0e0e0; margin: 20px 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 800; font-size: 18px; color: #1e1e1e;">Total Tagihan:</span>
                        <span style="font-weight: 800; font-size: 24px; color: #ff5c5c;">Rp {{ number_format($nominal, 0, ',', '.') }}</span>
                    </div>
                </div>

                <button id="pay-button" class="btn-primary" style="width: 100%; font-size: 18px; padding: 18px;">
                    Bayar Sekarang
                </button>
            </div>
        @else
            <!-- Form Input Kendaraan biasa -->
            <div class="form-card">
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 30px; border-bottom: 2px solid #e0e0e0; padding-bottom: 15px;">Formulir Pembayaran</h3>

                @if (request()->query('status') === 'success')
                    <div class="alert alert-success">
                        <strong>✓ Pembayaran Berhasil!</strong><br>
                        Terima kasih telah membayar pajak tepat waktu. Bukti pembayaran resmi telah kami kirimkan ke email Anda.
                    </div>
                @endif
                @if (request()->query('status') === 'pending')
                    <div class="alert alert-warning" style="background: #fff3cd; color: #856404; border: 2px solid #ffeeba; box-shadow: -4px 4px 0px 0px #856404;">
                        <strong>⏳ Pembayaran Tertunda!</strong><br>
                        Silakan selesaikan proses pembayaran Anda melalui metode yang telah Anda pilih.
                    </div>
                @endif
                @if (request()->query('status') === 'error')
                    <div class="alert alert-error">
                        <strong>✗ Pembayaran Gagal!</strong><br>
                        Mohon maaf, transaksi pembayaran Anda gagal diproses. Silakan coba beberapa saat lagi.
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <span style="font-size: 18px; display: block; margin-bottom: 5px;">Terjadi Kesalahan!</span>
                        <ul style="margin-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/bayar-pajak') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nopol" class="form-label">Nomor Polisi (Plat Nomor)</label>
                        <input type="text" id="nopol" name="nopol" placeholder="Contoh: AB 1234 XY" 
                               value="{{ old('nopol') }}" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="nik" class="form-label">NIK Pemilik Sesuai STNK</label>
                        <input type="text" id="nik" name="nik" placeholder="Masukkan 16 digit NIK" 
                               value="{{ old('nik') }}" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="norangka" class="form-label">5 Digit Terakhir Nomor Rangka</label>
                        <input type="text" id="norangka" name="norangka" placeholder="Contoh: 98765" 
                               value="{{ old('norangka') }}" class="form-input" required>
                    </div>

                    <div class="form-group" style="margin-bottom: 40px;">
                        <label for="email" class="form-label">Email (Untuk Bukti Bayar)</label>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" 
                               value="{{ old('email') }}" class="form-input" required>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; font-size: 18px; padding: 18px;">
                        Cek Tagihan & Bayar Pajak
                    </button>
                </form>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer style="background: #1e1e1e; color: #fbfbfb; padding: 70px 0 30px 0; margin-top: 100px; width: 100vw; margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); position: relative; bottom: 0; border-top: 5px solid #ff5c5c; box-shadow: 0 -10px 30px rgba(0,0,0,0.1); overflow-x: hidden;">
        
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 40px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 50px; margin-bottom: 50px;">
                
                <!-- Kolom Kiri: Logo & Deskripsi -->
                <div>
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 25px;">
                        <div style="width: 55px; height: 55px; background: #fbfbfb; color: #1e1e1e; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; text-align: center; line-height: 1.1; box-shadow: -3px 3px 0px #ff5c5c;">
                            SA<br>MSAT
                        </div>
                        <h3 style="font-size: 26px; font-weight: 800; color: #fbfbfb; letter-spacing: 1px;">SAMSAT DIY</h3>
                    </div>
                    <p style="font-size: 15px; color: #a0a0a0; line-height: 1.7;">
                        Platform layanan digital resmi untuk kemudahan pembayaran pajak dan informasi kendaraan bermotor di wilayah Daerah Istimewa Yogyakarta.
                    </p>
                </div>

                <!-- Kolom Tengah: Tautan Cepat -->
                <div>
                    <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 25px; color: #fbfbfb;">Tautan Cepat</h4>
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <a href="/about" style="color: #a0a0a0; text-decoration: none; font-size: 15px; transition: color 0.3s;" onmouseover="this.style.color='#ff5c5c'" onmouseout="this.style.color='#a0a0a0'">Beranda</a>
                        <a href="/Daftar_kendaraan" style="color: #a0a0a0; text-decoration: none; font-size: 15px; transition: color 0.3s;" onmouseover="this.style.color='#ff5c5c'" onmouseout="this.style.color='#a0a0a0'">Daftar Kendaraan</a>
                        <a href="/faq" style="color: #a0a0a0; text-decoration: none; font-size: 15px; transition: color 0.3s;" onmouseover="this.style.color='#ff5c5c'" onmouseout="this.style.color='#a0a0a0'">FAQ & Bantuan</a>
                    </div>
                </div>

                <!-- Kolom Kanan: Kontak & Sosial Media -->
                <div>
                    <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 25px; color: #fbfbfb;">Hubungi Kami</h4>
                    <p style="font-size: 15px; color: #a0a0a0; margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                        <span>📍</span> Jl. Tentara Pelajar No. 13, Yogyakarta
                    </p>
                    <p style="font-size: 15px; color: #a0a0a0; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                        <span>📞</span> (0274) 123456
                    </p>
                    
                    <!-- Ikon Sosial Media -->
                    <div style="display: flex; gap: 15px;">
                        <a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='#ff5c5c'; this.style.borderColor='#ff5c5c'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'">IG</a>
                        <a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='#ff5c5c'; this.style.borderColor='#ff5c5c'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'">FB</a>
                        <a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='#ff5c5c'; this.style.borderColor='#ff5c5c'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'">X</a>
                    </div>
                </div>

            </div>

            <!-- Garis Pemisah & Copyright -->
            <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 25px; text-align: center; font-size: 14px; color: #777;">
                <p>&copy; 2024 SAMSAT DIY - Layanan Pajak Kendaraan Digital. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @if (isset($snapToken))
        <script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            document.getElementById('pay-button').onclick = function(e){
                e.preventDefault();
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result){
                        window.location.href = "{{ route('bayar_pajak.form') }}?status=success";
                    },
                    onPending: function(result){
                        window.location.href = "{{ route('bayar_pajak.form') }}?status=pending";
                    },
                    onError: function(result){
                        window.location.href = "{{ route('bayar_pajak.form') }}?status=error";
                    },
                    onClose: function(){
                        alert('Anda menutup popup pembayaran sebelum menyelesaikan transaksi.');
                    }
                });
            };
        </script>
    @endif
</body>
</html>