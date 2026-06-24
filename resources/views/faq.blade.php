<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - SAMSAT DIY</title>
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

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 80px 40px;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .faq-header h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e1e1e;
        }

        .faq-header p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
        }

        .faq-accordion {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .faq-item {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: -4px 4px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: -6px 6px 0px black;
            transform: translateY(-2px);
        }

        .faq-item summary {
            padding: 24px 30px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            color: #1e1e1e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            background: linear-gradient(135deg, #fbfbfb, #ffffff);
            transition: all 0.3s ease;
        }

        .faq-item summary:hover {
            background: linear-gradient(135deg, #f0f0f0, #fbfbfb);
            color: #ff5c5c;
        }

        .faq-item summary::after {
            content: '▼';
            font-size: 12px;
            margin-left: 20px;
            transition: transform 0.3s ease;
            color: #ff5c5c;
        }

        .faq-item[open] summary::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 30px 24px 30px;
            background: white;
            border-top: 1px solid #e0e0e0;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-answer p {
            font-size: 15px;
            line-height: 1.8;
            color: #444;
            margin: 0;
        }

        .faq-answer ul, .faq-answer ol {
            margin-top: 15px;
            margin-left: 20px;
            font-size: 15px;
            line-height: 1.8;
            color: #444;
        }

        .faq-answer li {
            margin-bottom: 10px;
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

        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 60px 0;
            margin-top: 80px;
        }

        .red-badge {
            background: #ff5c5c;
            color: white;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 15px;
                font-size: 14px;
            }

            .faq-container {
                padding: 40px 20px;
            }

            .faq-header h1 {
                font-size: 32px;
            }

            .faq-item summary {
                padding: 18px 20px;
                font-size: 15px;
            }

            .faq-answer {
                padding: 0 20px 18px 20px;
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
                <a href="/#about">About Us</a>
                <a href="/">Home</a>
                <a href="/about">Tentang Kami</a>
                <a href="/login" style="background: #ff5c5c; color: #1e1e1e; border: 2px solid #1e1e1e; padding: 10px 20px; border-radius: 8px; font-weight: 600; box-shadow: -4px 4px 0px 0px black;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="faq-container">
        <!-- Header -->
        <div class="faq-header">
            <span class="red-badge">FAQ</span>
            <h1>Pusat Bantuan & FAQ</h1>
            <p>Temukan jawaban dari pertanyaan yang paling sering ditanyakan seputar layanan SAMSAT DIY</p>
        </div>

        <!-- FAQ Accordion -->
        <div class="faq-accordion">
            <!-- Question 1 -->
            <details class="faq-item" open>
                <summary>Apakah ada layanan pembayaran pajak secara online?</summary>
                <div class="faq-answer">
                    <p>Ya, kami menyediakan layanan pembayaran pajak kendaraan secara online. Anda dapat melakukan pembayaran melalui platform SAMSAT DIY kapan saja dan dimana saja tanpa perlu datang ke kantor. Pembayaran dapat dilakukan untuk:</p>
                    <ul>
                        <li>Pajak kendaraan tahunan</li>
                        <li>Pajak progresif</li>
                        <li>Pajak STNK pengganti</li>
                    </ul>
                </div>
            </details>

            <!-- Question 2 -->
            <details class="faq-item" open>
                <summary>Apa saja metode pembayaran yang tersedia?</summary>
                <div class="faq-answer">
                    <p>SAMSAT DIY menerima berbagai metode pembayaran untuk kemudahan Anda:</p>
                    <ul>
                        <li>Kartu Kredit / Debit (Visa, MasterCard)</li>
                        <li>Transfer Bank</li>
                        <li>E-Wallet (GoPay, OVO, Dana, LinkAja)</li>
                        <li>Mobile Banking dari berbagai bank</li>
                        <li>QRIS untuk transfer dari semua platform dompet digital</li>
                    </ul>
                </div>
            </details>

            <!-- Question 3 -->
            <details class="faq-item" open>
                <summary>Apakah tersedia pembayaran nontunai?</summary>
                <div class="faq-answer">
                    <p>Tentu saja! Kami menyediakan berbagai pilihan pembayaran nontunai untuk kemudahan dan keamanan Anda:</p>
                    <ul>
                        <li>Kartu mesin EDC dari berbagai bank</li>
                        <li>Pembayaran menggunakan QRIS yang dapat menerima dari berbagai dompet digital</li>
                        <li>M-Banking dari semua institusi keuangan</li>
                    </ul>
                    <p style="margin-top: 15px;">Semua transaksi dijamin aman dengan enkripsi tingkat tinggi.</p>
                </div>
            </details>

            <!-- Question 4 -->
            <details class="faq-item" open>
                <summary>Apakah kendaraan dari luar DIY dapat membayar pajak di SAMSAT DIY?</summary>
                <div class="faq-answer">
                    <p>Tidak, pembayaran pajak kendaraan tidak bisa lintas provinsi. Pajak Kendaraan Bermotor hanya bisa dibayarkan di Kantor SAMSAT di wilayah provinsi yang sama sesuai dengan domisili kendaraan berdasarkan STNK Anda.</p>
                    <p style="margin-top: 15px;">Jika kendaraan Anda terdaftar di DIY, maka pembayaran harus dilakukan melalui SAMSAT DIY. Untuk kendaraan dari provinsi lain, silakan menghubungi SAMSAT setempat.</p>
                </div>
            </details>

            <!-- Question 5 -->
            <details class="faq-item" open>
                <summary>Apakah bisa membayar pajak 5 tahunan secara online?</summary>
                <div class="faq-answer">
                    <p>Pembayaran pajak 5 tahunan tidak bisa dilakukan secara online dan harus dilakukan secara langsung di kantor SAMSAT. Silakan datang ke:</p>
                    <ul>
                        <li>Kantor SAMSAT Sleman</li>
                        <li>Kantor SAMSAT Maguwoharjo</li>
                        <li>Kantor SAMSAT Induk lainnya di DIY</li>
                    </ul>
                    <p style="margin-top: 15px;"><strong>Syarat:</strong> Nama dan alamat pemilik di STNK dan KTP masih sesuai, serta nomor polisi kendaraan tidak termasuk nomor pilihan.</p>
                </div>
            </details>

            <!-- Question 6 -->
            <details class="faq-item" open>
                <summary>Syarat balik nama kendaraan bermotor apa saja?</summary>
                <div class="faq-answer">
                    <p>Untuk melakukan balik nama kendaraan, Anda harus menyiapkan dokumen-dokumen berikut:</p>
                    <ul>
                        <li>BPKB (Bukti Pemilikan Kendaraan) asli</li>
                        <li>STNK (Surat Tanda Nomor Kendaraan) asli</li>
                        <li>KTP pemilik baru (fotokopi)</li>
                        <li>Kuitansi jual beli, risalah lelang, akta hibah, atau akta waris</li>
                        <li>Bukti pembayaran pajak terakhir</li>
                    </ul>
                    <p style="margin-top: 15px;">Proses balik nama akan diverifikasi oleh tim SAMSAT DIY.</p>
                </div>
            </details>

            <!-- Question 7 -->
            <details class="faq-item">
                <summary>Berapa biaya yang diperlukan untuk layanan SAMSAT DIY?</summary>
                <div class="faq-answer">
                    <p>SAMSAT DIY hanya memfasilitasi pembayaran pajak kendaraan resmi sesuai dengan peraturan yang berlaku. Biaya yang dikenakan adalah:</p>
                    <ul>
                        <li>Pajak Kendaraan Bermotor sesuai dengan ketentuan UU No. 28 Tahun 2009</li>
                        <li>Administrasi dan biaya layanan digital minimal atau gratis untuk kemudahan Anda</li>
                    </ul>
                    <p style="margin-top: 15px;">Tidak ada biaya tambahan atau biaya tersembunyi. Semua biaya akan ditampilkan sebelum Anda menyelesaikan transaksi.</p>
                </div>
            </details>

            <!-- Question 8 -->
            <details class="faq-item">
                <summary>Bagaimana cara melihat riwayat pembayaran pajak saya?</summary>
                <div class="faq-answer">
                    <p>Anda dapat melihat riwayat pembayaran pajak dengan langkah-langkah berikut:</p>
                    <ol>
                        <li>Login ke akun SAMSAT DIY Anda</li>
                        <li>Klik menu "Riwayat Pembayaran"</li>
                        <li>Pilih kendaraan yang ingin dilihat</li>
                        <li>Riwayat pembayaran akan ditampilkan lengkap dengan tanggal dan nominal pembayaran</li>
                    </ol>
                    <p style="margin-top: 15px;">Anda juga dapat mengunduh bukti pembayaran dalam format PDF dari halaman riwayat tersebut.</p>
                </div>
            </details>

            <!-- Question 9 -->
            <details class="faq-item">
                <summary>Bagaimana jika ada kendala saat melakukan pembayaran?</summary>
                <div class="faq-answer">
                    <p>Jika Anda mengalami kendala saat melakukan pembayaran, silakan hubungi tim support kami melalui:</p>
                    <ul>
                        <li><strong>Chat Support:</strong> Tersedia di aplikasi SAMSAT DIY 24/7</li>
                        <li><strong>Email:</strong> support@samsatdiy.go.id</li>
                        <li><strong>Telepon:</strong> (0274) XXX-XXXX</li>
                        <li><strong>Media Sosial:</strong> Follow @SAMSATDIY di Instagram dan Facebook</li>
                    </ul>
                    <p style="margin-top: 15px;">Tim kami siap membantu menyelesaikan masalah Anda dengan cepat dan profesional.</p>
                </div>
            </details>

            <!-- Question 10 -->
            <details class="faq-item">
                <summary>Apakah data pribadi saya aman di SAMSAT DIY?</summary>
                <div class="faq-answer">
                    <p>Keamanan data pribadi Anda adalah prioritas utama kami. Kami menggunakan:</p>
                    <ul>
                        <li>Enkripsi SSL/TLS untuk semua komunikasi</li>
                        <li>Database yang terlindungi dengan sistem keamanan berlapis</li>
                        <li>Compliance dengan standar keamanan internasional (ISO 27001)</li>
                        <li>Tim security yang terus memantau sistem 24/7</li>
                        <li>Privacy Policy yang jelas dan transparan</li>
                    </ul>
                    <p style="margin-top: 15px;">Data Anda tidak akan dibagikan kepada pihak ketiga tanpa persetujuan Anda.</p>
                </div>
            </details>
        </div>

        <!-- CTA Section -->
        <div style="text-align: center; margin-top: 80px; padding: 40px; background: linear-gradient(135deg, #ff5c5c15, #ff5c5c05); border-radius: 20px;">
            <h2 style="font-size: 28px; font-weight: 600; margin-bottom: 15px; color: #1e1e1e;">Masih ada pertanyaan?</h2>
            <p style="font-size: 16px; color: #666; margin-bottom: 30px;">Hubungi tim support kami yang siap membantu Anda 24 jam sehari, 7 hari seminggu.</p>
            <a href="/" class="btn-primary">Hubungi Support</a>
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

    <script>
        // Ensure at least one FAQ item is open
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            const firstItem = faqItems[0];
            if (firstItem && !firstItem.hasAttribute('open')) {
                firstItem.setAttribute('open', '');
            }
        });
    </script>
</body>
</html>
                        </div>
                </details>

        </div>


    </div>
</body>
</html>