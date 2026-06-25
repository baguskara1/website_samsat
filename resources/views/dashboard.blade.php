<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SAMSAT DIY</title>
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

        .navbar {
            background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%);
            border-bottom: 2px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 20px;
            text-decoration: none;
            color: #1e1e1e;
        }

        .navbar-brand-logo {
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

        .navbar-brand h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a, .navbar-menu button {
            text-decoration: none;
            color: #1e1e1e;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            background: none;
            border: none;
            transition: color 0.3s ease;
        }

        .navbar-menu a:hover, .navbar-menu button:hover {
            color: #ff5c5c;
        }

        .btn-logout {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid #1e1e1e;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: -3px 3px 0px black;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 100px;
        }

        .welcome-section {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 20px;
            padding: 40px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .welcome-section h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #1e1e1e;
        }

        .welcome-section p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .dashboard-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            padding: 30px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .dashboard-card:hover {
            box-shadow: -7px 7px 0px black;
            transform: translateY(-3px);
        }

        .dashboard-card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .dashboard-card h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #1e1e1e;
        }

        .dashboard-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .alert {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 2px solid;
        }

        .alert-success {
            background: #e0ffe0;
            border-color: #4caf50;
            color: #2e7d32;
        }

        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 60px 0;
            margin-top: 100px;
        }

        .footer-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 40px 100px;
        }

        @media (max-width: 768px) {
            .navbar-container {
                padding: 15px 20px;
            }

            .navbar-brand h1 {
                font-size: 20px;
            }

            .navbar-menu {
                gap: 10px;
                font-size: 12px;
            }

            .container {
                padding: 40px 20px;
            }

            .welcome-section {
                padding: 25px;
            }

            .welcome-section h1 {
                font-size: 24px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <div class="navbar-brand-logo">
                    <div>SA<br>MSAT</div>
                </div>
                <h1>SAMSAT DIY</h1>
            </a>
            <div class="navbar-menu">
                <a href="/">Home</a>
                <a href="/profile">Profil</a>
                <a href="/faq">FAQ</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                ✓ {{ session('status') }}
            </div>
        @endif

        <div class="welcome-section">
            <h1>Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
            <p>Anda telah berhasil login ke SAMSAT DIY. Kelola semua keperluan pajak kendaraan Anda dengan mudah melalui dashboard ini.</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <a href="/bayar-pajak" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">💰</div>
                    <h3>Bayar Pajak</h3>
                    <p>Lakukan pembayaran pajak kendaraan Anda dengan mudah melalui berbagai metode pembayaran.</p>
                </div>
            </a>

            <a href="/pindah-nama/create" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">📝</div>
                    <h3>Balik Nama</h3>
                    <p>Ajukan permohonan perpindahan nama kendaraan secara online dan lacak statusnya.</p>
                </div>
            </a>

            <a href="/Daftar_kendaraan" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">🚗</div>
                    <h3>Data Kendaraan</h3>
                    <p>Lihat informasi lengkap kendaraan yang terdaftar beserta status pajaknya.</p>
                </div>
            </a>

            <a href="/pindah-nama" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">📋</div>
                    <h3>Riwayat Permohonan</h3>
                    <p>Cek status permohonan balik nama kendaraan Anda yang sedang diproses.</p>
                </div>
            </a>

            <a href="/faq" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">❓</div>
                    <h3>Bantuan</h3>
                    <p>Temukan jawaban atas pertanyaan Anda di pusat bantuan SAMSAT DIY kami.</p>
                </div>
            </a>

            <a href="/about" style="text-decoration: none; color: inherit;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">ℹ️</div>
                    <h3>Tentang Kami</h3>
                    <p>Pelajari lebih lanjut tentang layanan dan tim di balik SAMSAT DIY.</p>
                </div>
            </a>
        </div>

        <!-- Statistics Section -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
            <div style="background: white; border: 2px solid #1e1e1e; border-radius: 12px; padding: 20px; text-align: center; box-shadow: -4px 4px 0px rgba(0,0,0,0.1);">
                <h4 style="font-size: 32px; font-weight: 800; color: #ff5c5c;">{{ count($vehicles) }}</h4>
                <p style="font-size: 13px; font-weight: 600; color: #666; margin-top: 5px;">Kendaraan Saya</p>
            </div>
            <div style="background: white; border: 2px solid #1e1e1e; border-radius: 12px; padding: 20px; text-align: center; box-shadow: -4px 4px 0px rgba(0,0,0,0.1);">
                <h4 style="font-size: 32px; font-weight: 800; color: #667eea;">{{ count($transfers) }}</h4>
                <p style="font-size: 13px; font-weight: 600; color: #666; margin-top: 5px;">Permohonan Saya</p>
            </div>
            <div style="background: white; border: 2px solid #1e1e1e; border-radius: 12px; padding: 20px; text-align: center; box-shadow: -4px 4px 0px rgba(0,0,0,0.1);">
                <h4 style="font-size: 32px; font-weight: 800; color: #764ba2;">{{ $user->created_at->format('d M Y') }}</h4>
                <p style="font-size: 13px; font-weight: 600; color: #666; margin-top: 5px;">Member Sejak</p>
            </div>
        </div>

        <!-- My Vehicles -->
        @if(count($vehicles) > 0)
        <div style="background: white; border: 2px solid #1e1e1e; border-radius: 15px; padding: 30px; box-shadow: -5px 5px 0px rgba(0,0,0,0.1); margin-bottom: 40px;">
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #eee;">🚗 Kendaraan Saya</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #eee;">
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">No. Polisi</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Merk / Tipe</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Tahun</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Warna</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $v)
                    <tr style="border-bottom: 1px solid #f0f0f0;">
                        <td style="padding: 12px 10px; font-weight: 600;">{{ $v->no_polisi }}</td>
                        <td style="padding: 12px 10px;">{{ $v->merk }} / {{ $v->tipe }}</td>
                        <td style="padding: 12px 10px;">{{ $v->tahun_pembuatan }}</td>
                        <td style="padding: 12px 10px;">{{ $v->warna }}</td>
                        <td style="padding: 12px 10px;"><span style="background: #e3f2fd; color: #1976d2; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">{{ $v->jenis }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <!-- Recent Transfers -->
        @if(count($transfers) > 0)
        <div style="background: white; border: 2px solid #1e1e1e; border-radius: 15px; padding: 30px; box-shadow: -5px 5px 0px rgba(0,0,0,0.1); margin-bottom: 40px;">
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #eee;">📋 Permohonan Pindah Nama Terbaru</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #eee;">
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">No. Polisi</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Pemilik Baru</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Status</th>
                        <th style="padding: 10px; text-align: left; font-size: 12px; color: #666; text-transform: uppercase;">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfers as $transfer)
                    <tr style="border-bottom: 1px solid #f0f0f0;">
                        <td style="padding: 12px 10px; font-weight: 600;">{{ $transfer->kendaraan->no_polisi ?? '-' }}</td>
                        <td style="padding: 12px 10px;">{{ $transfer->nama_pemilik_baru }}</td>
                        <td style="padding: 12px 10px;">
                            @if($transfer->status == 'pending')
                                <span style="background: #fff4e0; color: #f57c00; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">Pending</span>
                            @elseif($transfer->status == 'selesai')
                                <span style="background: #d4f4dd; color: #0d7533; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">Selesai</span>
                            @else
                                <span style="background: #ffe0e0; color: #d32f2f; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">Ditolak</span>
                            @endif
                        </td>
                        <td style="padding: 12px 10px; font-size: 14px;">{{ $transfer->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 20px; text-align: right;">
                <a href="/pindah-nama" style="color: #667eea; font-weight: 600; text-decoration: none;">Lihat Semua →</a>
            </div>
        </div>
        @endif

        <!-- Info Section -->
        <div class="welcome-section" style="background: linear-gradient(135deg, #ff5c5c15, #ff5c5c05); border-color: #ff5c5c;">
            <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 15px;">📊 Informasi Akun Anda</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
                <div>
                    <p style="font-size: 12px; color: #999; margin-bottom: 5px;">Nama</p>
                    <p style="font-size: 16px; font-weight: 600;">{{ Auth::user()->name }}</p>
                </div>
                <div>
                    <p style="font-size: 12px; color: #999; margin-bottom: 5px;">Email</p>
                    <p style="font-size: 16px; font-weight: 600;">{{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p style="font-size: 12px; color: #999; margin-bottom: 5px;">Member Sejak</p>
                    <p style="font-size: 16px; font-weight: 600;">{{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

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
