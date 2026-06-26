<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMSAT DIY - Layanan Pajak Kendaraan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="https://tse2.mm.bing.net/th/id/OIP.7Sp3WKiJx6w9PoiZ03-MYwHaHa?r=0&cb=thfc1falcon2&rs=1&pid=ImgDetMain&o=7&rm=3">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css"  rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
</head>
<body>

        <!-- Navigation -->
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="max-width: 1440px; margin: 0 auto; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center;">
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
                 <a href="/about">About Us</a>
                <a href="/Daftar_kendaraan">Daftar kendaraan</a>
                <a href="/faq">FAQ</a>
                <a href="/login" style="background: #ff5c5c; color: #1e1e1e; border: 2px solid #1e1e1e; padding: 10px 20px; border-radius: 8px; font-weight: 600; box-shadow: -4px 4px 0px 0px black;">Login</a>
            </div>
        </div>
    </nav>

    
    <!-- Divider -->
    <div style="background: #ff5c5c; border-top: 2px solid #1e1e1e; border-bottom: 2px solid #1e1e1e; display: flex; align-items: center; color: #1e1e1e; font-weight: 600; font-size: 16px;">
        <div style="background: #1e1e1e; color: #fbfbfb; padding: 10px 20px; font-weight: bold; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; border-right: 2px solid #1e1e1e; white-space: nowrap; text-align: center; line-height: 1.4; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            INFO JADWAL<br>SAMSAT KELILING
        </div>
        <marquee behavior="scroll" direction="left" scrollamount="6" style="padding: 10px 0; margin: 0;">
            <i class="ri-information-2-fill"></i>  JADWAL SAMSAT KELILING DIY HARI INI: - Senin-Kamis: 08.00 - 11.00 WIB <i class="ri-map-pin-time-line"></i> Kota Yogyakarta: Depan Puro Pakualaman <i class="ri-map-pin-time-line"></i> Sleman: Halaman Polsek Depok Timur <i class="ri-map-pin-time-line"></i> Bantul: Lapangan Paseban Harap membawa STNK asli, KTP asli, dan BPKB!
        </marquee>
    </div>
    
    <!-- Hero Section -->
    <section class="hero-section container" style="padding: 80px 40px;">
        <div class="hero-background"></div>
        <div style="position: relative; z-index: 2; max-width: 900px;">
            <h2 style="font-size: 38px; font-weight: 600; margin-bottom: 50px; line-height: 1.4; text-align:center">
                Navigasi digital yang membantu anda dalam mengurus tentang berbagai hal masalah kendaraan anda
            </h2>
            <div style="display: flex; gap: 20px; margin-bottom: 30px; width:auto; justify-content:center;">
                <a href="/login" class="btn-secondary" style="display: inline-block;">Bayar Pajak</a>
                <a href="/pindah-nama/create" class="btn-secondary" style="display: inline-block;">Balik Nama</a>
            </div>
        </div>
    </section>
    
    <div class="divider-bar">
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
    </div>
    
    <!-- About Section -->
    <section id="about" class="container" style="padding: 80px 100px;">
        <div class="about-box-solid">
            
            <h2 style="font-size: 42px; font-weight: 800; margin-bottom: 20px; color: #1e1e1e; line-height: 1.2;">
                Kenali Tim Kami Lebih Dekat
            </h2>
            <p style="font-size: 18px; color: #4a4a4a; margin-bottom: 40px; line-height: 1.6; max-width: 700px;">
                Cari tahu visi, misi, dan dedikasi di balik layanan SAMSAT DIY. Kami berkomitmen memberikan kemudahan ekstra untuk pengurusan kendaraan Anda setiap harinya.
            </p>
            <a href="{{ route('about') }}" class="btn-primary" style="background: #1e1e1e; color: #fbfbfb; border-color: #1e1e1e; box-shadow: -5px 5px 0px 0px #ff5c5c; font-size: 18px; padding: 14px 32px;">
                Lihat Profil Kami
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="container section-padding" style="background: #fbfbfb;">
        <div class="service-grid">
            <!-- Service 1 -->
            <div class="service-card">
                <div class="icon-box" style="background: #ff5c5c; color: white; margin-bottom: 20px;">
                    1
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Pembayaran Pajak Kendaraan</h3>
                <p style="font-size: 16px; line-height: 1.6; color: #1e1e1e; margin-bottom: 20px;">
                    Kami melayani pembayaran pajak mulai dari pajak kendaraan 5 tahun hingga 1 tahun, bisa dilakukan secara online.
                </p>
                <a href="/login" class="btn-primary" style="display: inline-block;">Bayar Pajak</a>
            </div>

            <!-- Service 2 -->
            <div class="service-card dark">
                <div class="icon-box" style="background: rgba(255, 255, 255, 0.2); color: white; margin-bottom: 20px;">
                    2
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Proses Balik Nama Kendaraan</h3>
                <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    Kami melayani perpindahan nama kendaraan
                </p>
                <a href="/pindah-nama/create" style="color: #ff5c5c; text-decoration: none; font-weight: 600; font-size: 16px;">Pindah Nama →</a>
            </div>

            <!-- Service 3 -->
            <div class="service-card dark">
                <div class="icon-box" style="background: rgba(255, 255, 255, 0.2); color: white; margin-bottom: 20px;">
                    3
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Melihat Data Kendaraan Terdaftar</h3>
                <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    Memungkinkan anda melihat data kendaraan anda yang telah terdaftar dan informasi pajaknya.
                </p>
                <a href="/Daftar_kendaraan" style="color: #ff5c5c; text-decoration: none; font-weight: 600; font-size: 16px;">Informasi Kendaraan →</a>
            </div>

            <!-- Service 4 -->
            <div class="service-card">
                <div class="icon-box" style="background: #ff5c5c; color: white; margin-bottom: 20px;">
                    4
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Memudahkan anda dalam mencari informasi</h3>
                <p style="font-size: 16px; line-height: 1.6; color: #1e1e1e; margin-bottom: 20px;">
                    Kami melayani pembayaran pajak mulai dari pajak kendaraan 5 tahun hingga 1 tahun, bisa dilakukan secara online.
                </p>
                <a href="/faq" class="btn-primary" style="display: inline-block;">FAQ</a>
            </div>
        </div>
    </section>
    
    <!-- Berita Terkini Section -->
    <section style="max-width: 1440px; margin: 0 auto; padding: 60px 100px;">
        <div style="margin-bottom: 40px;">
            <span class="red-badge">BERITA</span>
            <h3 style="font-size: 32px; font-weight: 700; margin-top: 10px;">Berita SAMSAT Terkini</h3>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px;">
            
            <!-- Berita 1 -->
            <div style="background: #ffffff; border: 3px solid #1e1e1e; box-shadow: -8px 8px 0px 0px #1e1e1e; border-radius: 25px; padding: 25px; transition: transform 0.3s ease; display: flex; flex-direction: column; justify-content: space-between;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <span style="font-size: 12px; font-weight: 600; color: #666; display: block; margin-bottom: 10px;"><i class="ri-calendar-todo-line"></i> 26 Juni 2026</span>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 12px; line-height: 1.3;">Beli Kendaraan Baru atau Balik Nama Kendaraan Bermotor di DIY dengan Surat Keterangan Penduduk Non Permanen</h4>
                    <p style="font-size: 14px; color: #444; line-height: 1.6; margin-bottom: 20px;">Berdasarkan Surat Edaran Gubernur DIY Nomor B/400.12.4.4/4237/D19 Tahun 2025 tentang Administrasi Kependudukan Bagi Penduduk Non Permanen, kini penduduk luar DIY yang berdomisili di DIY dapat melakukan pembelian kendaraan baru atau mengurus balik nama kendaraan bekas menggunakan Surat Keterangan Pendaftaran Penduduk Non Permanen...</p>
                </div>
                <a href="https://samsatsleman.jogjaprov.go.id/index.php/286-beli-kendaraan-baru-atau-balik-nama-kendaraan-bermotor-di-diy-dengan-surat-keterangan-penduduk-non-permanen" style="color: #ff5c5c; font-weight: bold; text-decoration: none; font-size: 15px; display: inline-flex; align-items: center; gap: 5px; cursor: pointer;">Baca Selengkapnya <i class="ri-arrow-right-line"></i></a>
            </div>

            <!-- Berita 2 -->
            <div style="background: #ffffff; border: 3px solid #1e1e1e; box-shadow: -8px 8px 0px 0px #1e1e1e; border-radius: 25px; padding: 25px; transition: transform 0.3s ease; display: flex; flex-direction: column; justify-content: space-between;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <span style="font-size: 12px; font-weight: 600; color: #666; display: block; margin-bottom: 10px;"><i class="ri-calendar-todo-line"></i> 18 Juni 2026</span>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 12px; line-height: 1.3;">Libur Hari Suci Nyepi dan Libur Lebaran 1447 H</h4>
                    <p style="font-size: 14px; color: #444; line-height: 1.6; margin-bottom: 20px;">Menyambut Hari Suci Nyepi, Libur Lebaran 1447 H  dan Cuti Bersama, maka Samsat Sleman dan seluruh loket layanan TUTUP pada tanggal 24 s/d Maret 2026. Kembali buka untuk melayani masyarakat mulai hari Rabu 25 Maret 2026....</p>
                </div>
                <a href="https://samsatsleman.jogjaprov.go.id/index.php/284-libur-hari-suci-nyepi-dan-libur-lebaran-1447-h" style="color: #ff5c5c; font-weight: bold; text-decoration: none; font-size: 15px; display: inline-flex; align-items: center; gap: 5px; cursor: pointer;">Baca Selengkapnya <i class="ri-arrow-right-line"></i></a>
            </div>

            <!-- Berita 3 -->
            <div style="background: #ffffff; border: 3px solid #1e1e1e; box-shadow: -8px 8px 0px 0px #1e1e1e; border-radius: 25px; padding: 25px; transition: transform 0.3s ease; display: flex; flex-direction: column; justify-content: space-between;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <span style="font-size: 12px; font-weight: 600; color: #666; display: block; margin-bottom: 10px;"><i class="ri-calendar-todo-line"></i> 10 Juni 2026</span>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 12px; line-height: 1.3;">Pengumuman Tutup Layanan Tanggal 16 - 17 Februari 2026</h4>
                    <p style="font-size: 14px; color: #444; line-height: 1.6; margin-bottom: 20px;">Menyambut hari Libur Nasional Hari Raya Imlek dan Cuti Bersama, maka Samsat Sleman dan seluruh loket layanan TUTUP pada tanggal 16 - 17 Februari 2026. Kembali buka untuk melayani masyarakat mulai hari Rabu 18 Februari 2026...</p>
                </div>
                <a href="https://samsatsleman.jogjaprov.go.id/index.php/282-pengumuman-tutup-layanan-tanggal-16-17-februari-2026" style="color: #ff5c5c; font-weight: bold; text-decoration: none; font-size: 15px; display: inline-flex; align-items: center; gap: 5px; cursor: pointer;">Baca Selengkapnya <i class="ri-arrow-right-line"></i></a>
            </div>

        </div>
    </section>

        <!-- Section Statistik -->
    <section class="container" style="padding: 40px 40px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
        <div style="background: #ffffff; border: 2px solid #1e1e1e; box-shadow: -5px 5px 0px 0px #1e1e1e; border-radius: 16px; padding: 20px; text-align: center;">
            <h4 style="font-size: 36px; font-weight: 800; color: #ff5c5c;">12.4K+</h4>
            <p style="font-weight: 600; font-size: 14px; margin-top: 5px;">Pajak Terbayar Hari Ini</p>
        </div>
        <div style="background: #ffffff; border: 2px solid #1e1e1e; box-shadow: -5px 5px 0px 0px #1e1e1e; border-radius: 16px; padding: 20px; text-align: center;">
            <h4 style="font-size: 36px; font-weight: 800; color: #1e1e1e;">99.4%</h4>
            <p style="font-weight: 600; font-size: 14px; margin-top: 5px;">Kepuasan Warga DIY</p>
        </div>
        <div style="background: #ffffff; border: 2px solid #1e1e1e; box-shadow: -5px 5px 0px 0px #1e1e1e; border-radius: 16px; padding: 20px; text-align: center;">
            <h4 style="font-size: 36px; font-weight: 800; color: #ff5c5c;">5 Wilayah</h4>
            <p style="font-weight: 600; font-size: 14px; margin-top: 5px;">Terintegrasi Terpadu</p>
        </div>
    </section>

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
        // Add smooth scrolling for nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Add active link styling on scroll
        window.addEventListener('scroll', function() {
            let fromTop = window.scrollY;
            document.querySelectorAll('section').forEach(section => {
                let section_id = section.getAttribute('id');
                let navigation_links = document.querySelectorAll('.nav-links a[href="#' + section_id + '"]');
                if (section.offsetTop <= fromTop) {
                    navigation_links.forEach(link => {
                        link.style.color = '#ff5c5c';
                    });
                } else {
                    navigation_links.forEach(link => {
                        link.style.color = '#1e1e1e';
                    });
                }
            });
        });
    </script>
</body>
</html>