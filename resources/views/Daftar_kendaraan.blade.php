<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan - SAMSAT DIY</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

        .page-header {
            background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%);
            padding: 60px 0;
            text-align: center;
        }

        .search-box {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: -5px 5px 0px 0px black;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-box input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 16px;
            background: transparent;
        }

        .table-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 37px;
            padding: 40px;
            box-shadow: -7px 7px 0px 0px black;
            margin: 40px 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead {
            background: #1e1e1e;
            color: #fbfbfb;
        }

        .data-table th {
            padding: 20px;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
            border: 2px solid #1e1e1e;
        }

        .data-table th:first-child {
            border-radius: 15px 0 0 0;
        }

        .data-table th:last-child {
            border-radius: 0 15px 0 0;
        }

        .data-table td {
            padding: 20px;
            border: 2px solid #e0e0e0;
            border-top: none;
            font-size: 15px;
        }

        .data-table tbody tr:hover {
            background: #f7f7f7;
        }

        .data-table tbody tr:last-child td:first-child {
            border-radius: 0 0 0 15px;
        }

        .data-table tbody tr:last-child td:last-child {
            border-radius: 0 0 15px 0;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-active {
            background: #d4f4dd;
            color: #0d7533;
            border: 1px solid #0d7533;
        }

        .badge-expired {
            background: #ffe0e0;
            color: #d32f2f;
            border: 1px solid #d32f2f;
        }

        .badge-warning {
            background: #fff4e0;
            color: #f57c00;
            border: 1px solid #f57c00;
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

            .table-card {
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10;">
        <div class="container" style="padding: 20px 150px; display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="logo-circle">
                    <div>SA<br>MSAT</div>
                </div>
                <h1 style="font-size: 28px; font-weight: bold; color: #1e1e1e;">SAMSAT DIY</h1>
            </div>

            <!-- Nav Links -->
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="#daftar">Daftar Kendaraan</a>
                <a href="/faq">FAQ</a>
                <a href="/login" class="btn-primary" style="margin: 0; padding: 12px 30px;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 20px;">Daftar Kendaraan Terdaftar</h2>
            <p style="font-size: 18px; color: #666; margin-bottom: 40px;">Kelola dan pantau data kendaraan Anda dengan mudah</p>
            
            <!-- Search Box -->
            <div class="search-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#1e1e1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="text" placeholder="Cari berdasarkan No. Polisi, Nama Pemilik, atau NIK..." id="searchInput">
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section id="daftar" class="container" style="padding: 60px 100px;">
        <div style="margin-bottom: 30px;">
            <h3 style="font-size: 32px; font-weight: 600; margin-bottom: 10px;">Data Kendaraan</h3>
            <p style="font-size: 16px; color: #666;">Total: <strong>{{ count($kendaraans) }} kendaraan</strong> terdaftar</p>
        </div>

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No. Polisi</th>
                            <th>Nama Pemilik</th>
                            <th>NIK</th>
                            <th>Merk/Tipe</th>
                            <th>Jenis SIM</th>
                            <th>Tahun</th>
                            <th>Status Pajak</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($kendaraans as $kendaraan)
                        <tr>
                            <td><strong>{{ $kendaraan->no_polisi }}</strong></td>
                            <td>{{ $kendaraan->nama_pemilik }}</td>
                            <td>{{ $kendaraan->NIK }}</td>
                            <td>{{ $kendaraan->merk }}  {{ $kendaraan->tipe }}</td>
                            <td>{{ $kendaraan->jenis }}</td>
                            <td>{{ $kendaraan->tahun_pembuatan }}</td>
                            <td><span class="badge badge-active">Aktif</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 60px 20px;">
                                <div style="font-size: 48px; margin-bottom: 20px;">!</div>
                                <h4 style="font-size: 24px; font-weight: 600; margin-bottom: 10px; color: #1e1e1e;">Belum Ada Data Kendaraan</h4>
                                <p style="font-size: 16px; color: #666;">Data kendaraan akan muncul di sini ketika sudah terdaftar di sistem</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        
        // Real-time search as user types
        searchInput.addEventListener('input', function(e) {
            performSearch(e.target.value);
        });

        // Enhanced search on Enter key press with focus on table
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const searchValue = e.target.value;
                performSearch(searchValue);
                
                // Scroll to table and highlight results
                const tableCard = document.querySelector('.table-card');
                if (tableCard) {
                    tableCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    
                    // Add highlight effect to visible rows
                    setTimeout(() => {
                        const visibleRows = document.querySelectorAll('#tableBody tr[style=""], #tableBody tr:not([style])');
                        visibleRows.forEach((row, index) => {
                            setTimeout(() => {
                                row.style.transition = 'background-color 0.3s ease';
                                row.style.backgroundColor = '#fff4e0';
                                setTimeout(() => {
                                    row.style.backgroundColor = '';
                                }, 500);
                            }, index * 100);
                        });
                    }, 500);
                }
            }
        });

        function performSearch(searchValue) {
            const searchLower = searchValue.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            let visibleCount = 0;
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const isVisible = text.includes(searchLower);
                row.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });

            // Update result count
            updateSearchResultCount(visibleCount, searchValue);
        }

        function updateSearchResultCount(count, searchTerm) {
            const countElement = document.querySelector('section p strong');
            if (countElement) {
                if (searchTerm.trim() !== '') {
                    countElement.textContent = `${count} kendaraan ditemukan`;
                } else {
                    const totalRows = document.querySelectorAll('#tableBody tr').length;
                    countElement.textContent = `${totalRows} kendaraan`;
                }
            }
        }

        const sampleData = [
            {
                noPolisi: 'AB 1234 CD',
                namaPemilik: 'John Doe',
                nik: '3374012345678901',
                merkTipe: 'Honda / Beat',
                jenisSim: 'SIM-C',
                tahun: '2020',
                statusPajak: 'active',
                statusText: 'Aktif'
            },
            {
                noPolisi: 'AB 5678 EF',
                namaPemilik: 'Jane Smith',
                nik: '3374023456789012',
                merkTipe: 'Yamaha / Mio',
                jenisSim: 'SIM-C',
                tahun: '2019',
                statusPajak: 'warning',
                statusText: 'Jatuh Tempo'
            },
            {
                noPolisi: 'AB 9012 GH',
                namaPemilik: 'Bob Johnson',
                nik: '3374034567890123',
                merkTipe: 'Toyota / Avanza',
                jenisSim: 'SIM-A',
                tahun: '2018',
                statusPajak: 'expired',
                statusText: 'Mati'
            }
        ];

        function loadSampleData() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';
            
            sampleData.forEach(data => {
                const row = createTableRow(data);
                tbody.appendChild(row);
            });

            updateTotalCount();
        }

        function createTableRow(data) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${data.noPolisi}</strong></td>
                <td>${data.namaPemilik}</td>
                <td>${data.nik}</td>
                <td>${data.merkTipe}</td>
                <td>${data.jenisSim}</td>
                <td>${data.tahun}</td>
                <td><span class="badge badge-${data.statusPajak}">${data.statusText}</span></td>
            `;
            return tr;
        }

        function updateTotalCount() {
            const count = document.querySelectorAll('#tableBody tr').length;
            document.querySelector('section p strong').textContent = `${count} kendaraan`;
        }
    </script>
</body>
</html>
