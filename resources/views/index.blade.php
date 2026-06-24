<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsat DIY</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SAMSAT DIY - Layanan Pajak Kendaraan Digital</title>
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

        .hero-section {
            position: relative;
            overflow: hidden;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%);
            opacity: 0.73;
            z-index: 1;
        }

        .service-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 37px;
            padding: 40px;
            box-shadow: -7px 7px 0px 0px black;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: -10px 12px 0px 0px black;
        }

        .service-card.dark {
            background: #1e1e1e;
            color: #fbfbfb;
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

        .btn-secondary {
            background: #fbfbfb;
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

        .btn-secondary:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .about-box {
            background: #e0e0e0;
            border-radius: 37px;
            padding: 60px;
            text-align: center;
        }

        .dark-section {
            background: #1e1e1e;
            color: #fbfbfb;
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

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: rgba(255, 92, 92, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .footer {
            background: #1e1e1e;
            color: #fbfbfb;
            padding: 60px 0;
            margin-top: 100px;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 15px;
                font-size: 14px;
            }

            .hero-section {
                min-height: 400px;
            }

            .service-card {
                padding: 25px;
            }

            .service-grid {
                grid-template-columns: 1fr;
            }

            .about-box {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10;">
        <div style="max-width: 1440px; margin: 0 auto; padding: 20px 100px; display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 20px;">
                <div style="width: 60px; height: 60px; background: #1e1e1e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fbfbfb; font-weight: bold; font-size: 12px; text-align: center;">
                    <div>SA<br>MSAT</div>
                </div>
                <h1 style="font-size: 28px; font-weight: bold; color: #1e1e1e;">SAMSAT DIY</h1>
            </div>

            <!-- Nav Links -->
            <div class="nav-links">
                <a href="#about">About Us</a>
                <a href="#services">Daftar kendaraan</a>
                <a href="/faq">FAQ</a>
                <a href="/login" class="btn-primary" style="margin: 0; padding: 12px 30px;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="max-width: 1440px; margin: 0 auto; padding: 80px 100px;">
        <div class="hero-background"></div>
        <div style="position: relative; z-index: 2; max-width: 500px;">
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 30px; line-height: 1.4;">
                Navigasi digital yang membantu anda dalam mengurus tentang berbagai hal masalah kendaraan anda
            </h2>
            <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                <button class="btn-secondary">Bayar Pajak</button>
                <button class="btn-secondary">Balik Nama</button>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div style="background: #1e1e1e; height: 80px; display: flex; align-items: center; justify-content: space-around; color: #fbfbfb; font-size: 18px; font-weight: 600;">
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
        <span>SAMSAT DIY</span>
    </div>

    <!-- Services Section -->
    <section id="services" style="max-width: 1440px; margin: 0 auto; padding: 100px; background: #fbfbfb;">
        <div style="margin-bottom: 60px;">
            <span class="red-badge">SERVICE</span>
            <p style="font-size: 16px; color: #666; margin-top: 10px;">Lorem Ipsum - Lorem Ipsum</p>
        </div>

        <div class="service-grid">
            <!-- Service 1 -->
            <div class="service-card">
                <div class="icon-box" style="background: #ff5c5c; color: white; margin-bottom: 20px;">
                    💳
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Pembayaran Pajak Kendaraan</h3>
                <p style="font-size: 16px; line-height: 1.6; color: #1e1e1e; margin-bottom: 20px;">
                    Kami melayani pembayaran pajak mulai dari pajak kendaraan 5 tahun hingga 1 tahun, bisa dilakukan secara online.
                </p>
                <a href="#" class="btn-primary" style="display: inline-block;">Bayar Pajak</a>
            </div>

            <!-- Service 2 -->
            <div class="service-card dark">
                <div class="icon-box" style="background: rgba(255, 255, 255, 0.2); color: white; margin-bottom: 20px;">
                    🔄
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Proses Balik Nama Kendaraan</h3>
                <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    Kami melayani perpindahan nama kendaraan
                </p>
                <a href="#" style="color: #ff5c5c; text-decoration: none; font-weight: 600; font-size: 16px;">Pindah Nama →</a>
            </div>

            <!-- Service 3 -->
            <div class="service-card dark">
                <div class="icon-box" style="background: rgba(255, 255, 255, 0.2); color: white; margin-bottom: 20px;">
                    📋
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Melihat Data Kendaraan Terdaftar</h3>
                <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    Memungkinkan anda melihat data kendaraan anda yang telah terdaftar dan informasi pajaknya.
                </p>
                <a href="#" style="color: #ff5c5c; text-decoration: none; font-weight: 600; font-size: 16px;">Informasi Kendaraan →</a>
            </div>

            <!-- Service 4 -->
            <div class="service-card">
                <div class="icon-box" style="background: #ff5c5c; color: white; margin-bottom: 20px;">
                    ❓
                </div>
                <h3 style="font-size: 28px; font-weight: 600; margin-bottom: 20px;">Memudahkan anda dalam mencari informasi</h3>
                <p style="font-size: 16px; line-height: 1.6; color: #1e1e1e; margin-bottom: 20px;">
                    Kami melayani pembayaran pajak mulai dari pajak kendaraan 5 tahun hingga 1 tahun, bisa dilakukan secara online.
                </p>
                <a href="/faq" class="btn-primary" style="display: inline-block;">FAQ</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" style="max-width: 1440px; margin: 0 auto; padding: 60px 100px;">
        <div class="about-box">
            <h2 style="font-size: 36px; font-weight: 600; margin-bottom: 20px;">Tertarik informasi mengenai kami lebih dalam lagi!?</h2>
            <p style="font-size: 16px; color: #666; margin-bottom: 40px;">Lorem Ipsum</p>
            <a href="#" class="btn-secondary" style="background: #1e1e1e; color: #fbfbfb;">About Us</a>
            <div style="margin-top: 40px; font-size: 80px;">👥</div>
        </div>
    </section>

    <!-- Case Study Section -->
    <section style="max-width: 1440px; margin: 0 auto; padding: 100px;">
        <div style="margin-bottom: 40px;">
            <span class="red-badge">Case Study</span>
        </div>
        <div class="dark-section" style="border-radius: 37px; padding: 100px 40px; text-align: center;">
            <p style="font-size: 24px; font-weight: 600;">Latar Belakang</p>
        </div>
    </section>

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