<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar Pajak - SAMSAT DIY</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /*
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fbfbfb;
            color: #1e1e1e;
        }*/
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fbfbfb;
            color: #1e1e1e;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 100px;
        }

        .logo-circle {
            width: 60px;
            height: 60px;
            background: #1e1e1e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fbfbfb;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #1e1e1e;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ff5c5c;
        }

        .btn-primary {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid #1e1e1e;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: -5px 5px 0px 0px black;
            display: inline-block;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .page-header {
            background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%);
            padding: 60px 0 100px 0;
            text-align: center;
        }

        .form-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 37px;
            padding: 50px;
            box-shadow: -7px 7px 0px 0px black;
            max-width: 700px;
            margin: -60px auto 60px auto;
            position: relative;
            z-index: 2;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #1e1e1e;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            font-size: 16px;
            border: 2px solid #1e1e1e;
            border-radius: 12px;
            background: #fbfbfb;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            background: white;
            border-color: #ff5c5c;
            box-shadow: -4px 4px 0px 0px rgba(255, 92, 92, 0.3);
        }

        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 15px;
            border: 2px solid #1e1e1e;
            text-align: left;
            line-height: 1.5;
        }

        .alert-success {
            background: #d4f4dd;
            color: #0d7533;
            box-shadow: -4px 4px 0px 0px #0d7533;
        }

        .alert-error {
            background: #ffe0e0;
            color: #d32f2f;
            box-shadow: -4px 4px 0px 0px #d32f2f;
        }

        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 60px 0;
            margin-top: 100px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
            .nav-links {
                gap: 15px;
                font-size: 14px;
            }
            .form-card {
                padding: 30px 20px;
                margin-top: -30px;
            }
        }
    </style>
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
        <div class="form-card">
            <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 30px; border-bottom: 2px solid #e0e0e0; padding-bottom: 15px;">Formulir Pembayaran</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <span style="font-size: 18px; display: block; margin-bottom: 5px;">Terjadi Kesalahan!</span>
                    Harap lengkapi semua data formulir dengan benar.
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

</body>
</html>