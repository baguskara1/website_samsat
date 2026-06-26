<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
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
                <a href="/Daftar_kendaraan">Daftar Kendaraan</a>
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