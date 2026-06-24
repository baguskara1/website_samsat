<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - SAMSAT DIY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fbfbfb;
            color: #1e1e1e;
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
            margin-top: 20px;
        }

        .btn-primary:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
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

        .content-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: -5px 5px 0px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .content-card:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 60px 0;
            margin-top: 80px;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 15px;
                font-size: 14px;
            }

            .content-card {
                padding: 25px;
            }

            body {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="max-width: 1440px; margin: 0 auto; padding: 20px 100px; display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 20px;">
                <div style="width: 60px; height: 60px; background: #1e1e1e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fbfbfb; font-weight: bold; font-size: 12px; text-align: center;">
                    <div>SA<br>MSAT</div>
                </div>
                <a href="/" style="text-decoration: none; color: #1e1e1e;">
                    <h1 style="font-size: 28px; font-weight: bold;">SAMSAT DIY</h1>
                </a>
            </div>

            <!-- Nav Links -->
            <div class="nav-links">
                <a href="/about" style="color: #ff5c5c;">About Us</a>
                <a href="/">Home</a>
                <a href="/faq">FAQ</a>
                <a href="/login" style="background: #ff5c5c; color: #1e1e1e; border: 2px solid #1e1e1e; padding: 10px 20px; border-radius: 8px; font-weight: 600; box-shadow: -4px 4px 0px 0px black;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="max-width: 1200px; margin: 0 auto; padding: 80px 100px;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 80px;">
            <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px; line-height: 1.2;">
                Tentang SAMSAT DIY
            </h1>
            <p style="font-size: 18px; color: #666; line-height: 1.8;">
                Layanan digital terpadu untuk memudahkan masyarakat dalam mengurus keperluan pajak kendaraan bermotor
            </p>
        </div>

        <!-- About Content -->
        <div class="content-card">
            <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 20px; color: #1e1e1e;">Visi Kami</h2>
            <p style="font-size: 16px; line-height: 1.8; color: #444;">
                Menjadi platform digital terdepan yang memudahkan seluruh masyarakat Yogyakarta dalam mengurus pajak kendaraan bermotor dengan cepat, transparan, dan aman. Kami berkomitmen untuk meningkatkan kepercayaan masyarakat terhadap layanan publik melalui inovasi teknologi.
            </p>
        </div>

        <div class="content-card">
            <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 20px; color: #1e1e1e;">Misi Kami</h2>
            <ul style="font-size: 16px; line-height: 1.8; color: #444; list-style: none; padding-left: 0;">
                <li style="margin-bottom: 15px; padding-left: 30px; position: relative;">
                    <span style="position: absolute; left: 0; color: #ff5c5c; font-weight: bold;">✓</span>
                    Menyediakan platform digital yang mudah digunakan untuk pembayaran pajak kendaraan
                </li>
                <li style="margin-bottom: 15px; padding-left: 30px; position: relative;">
                    <span style="position: absolute; left: 0; color: #ff5c5c; font-weight: bold;">✓</span>
                    Meningkatkan efisiensi layanan publik dalam pengurusan pajak kendaraan bermotor
                </li>
                <li style="margin-bottom: 15px; padding-left: 30px; position: relative;">
                    <span style="position: absolute; left: 0; color: #ff5c5c; font-weight: bold;">✓</span>
                    Memberikan informasi lengkap dan transparan kepada masyarakat
                </li>
                <li style="margin-bottom: 15px; padding-left: 30px; position: relative;">
                    <span style="position: absolute; left: 0; color: #ff5c5c; font-weight: bold;">✓</span>
                    Mendukung digitalisasi layanan pemerintah untuk era modern
                </li>
            </ul>
        </div>

        <div class="content-card">
            <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 20px; color: #1e1e1e;">Service</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 30px;">
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Keamanan Terjamin</h3>
                    <p style="font-size: 14px; color: #666;">Data pribadi Anda dijaga dengan sistem enkripsi tingkat tinggi</p>
                </div>
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Pembayaran Cepat</h3>
                    <p style="font-size: 14px; color: #666;">Proses pembayaran pajak hanya dalam beberapa menit</p>
                </div>
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Akses Mudah</h3>
                    <p style="font-size: 14px; color: #666;">Tersedia di semua perangkat, kapan saja dan dimana saja</p>
                </div>
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Informasi Lengkap</h3>
                    <p style="font-size: 14px; color: #666;">Lihat detail lengkap kendaraan dan riwayat pembayaran Anda</p>
                </div>
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Balik Nama Mudah</h3>
                    <p style="font-size: 14px; color: #666;">Proses perpindahan nama kendaraan yang transparan</p>
                </div>
                <div style="background: #fbfbfb; padding: 20px; border-radius: 15px; border-left: 4px solid #ff5c5c;">
                    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #ff5c5c;">Pelayanan 24/7</h3>
                    <p style="font-size: 14px; color: #666;">Tim support kami siap membantu Anda setiap saat</p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 60px;">
            <p style="font-size: 18px; color: #666; margin-bottom: 30px;">
                Siap untuk memudahkan pengurusan pajak kendaraan Anda?
            </p>
            <a href="/" class="btn-primary" style="font-size: 18px; padding: 15px 40px;">Kembali ke Home</a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div style="max-width: 1440px; margin: 0 auto; padding: 40px 100px;">
            <div style="display: grid; grid-template-columns: auto 1fr auto; gap: 40px; margin-bottom: 40px; align-items: start;">
                <div>
                    <div style="width: 60px; height: 60px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fbfbfb; font-weight: bold; font-size: 12px; text-align: center; margin-bottom: 10px;">
                        <div>SA<br>MSAT</div>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 600;">SAMSAT DIY</h3>
                </div>
                <div style="text-align: center;">
                    <p style="font-size: 16px;">@All Reserved Alright</p>
                </div>
                <div style="text-align: right;">
                    <p style="font-size: 16px; font-weight: 600;">Our Media Social</p>
                </div>
            </div>
            <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 20px; text-align: center; font-size: 14px;">
                <p>&copy; 2024 SAMSAT DIY - Layanan Pajak Kendaraan Digital. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>