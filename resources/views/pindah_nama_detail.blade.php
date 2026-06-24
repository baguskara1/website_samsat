<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pindah Nama - SAMSAT DIY</title>
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
            padding: 60px 0;
            text-align: center;
        }

        .detail-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 20px;
            padding: 40px;
            box-shadow: -7px 7px 0px 0px black;
            margin: 40px 0;
        }

        .detail-section {
            margin-bottom: 30px;
        }

        .detail-section h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-weight: 600;
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .detail-value {
            font-size: 16px;
            color: #1e1e1e;
            font-weight: 500;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .badge-selesai {
            background: #d4f4dd;
            color: #0d7533;
        }

        .badge-pending {
            background: #fff4e0;
            color: #f57c00;
        }

        .badge-diproses {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-ditolak {
            background: #ffe0e0;
            color: #d32f2f;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #1e1e1e;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 30px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #ff5c5c;
        }

        .back-link::before {
            content: "←";
            margin-right: 8px;
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

            .detail-row {
                grid-template-columns: 1fr;
            }

            .detail-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(176.96deg, rgba(217, 217, 217, 0) 3.77%, rgba(247, 247, 247, 0.9) 39.15%); position: relative; z-index: 10;">
        <div class="container" style="padding: 20px 150px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="logo-circle">
                    <div>SA<br>MSAT</div>
                </div>
                <h1 style="font-size: 28px; font-weight: bold; color: #1e1e1e;">SAMSAT DIY</h1>
            </div>

            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/pindah-nama">Pindah Nama</a>
                <a href="/login" class="btn-primary" style="margin: 0; padding: 12px 30px;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 20px;">Detail Permohonan Pindah Nama</h2>
            <p style="font-size: 18px; color: #666;">Informasi lengkap permohonan pindah nama kendaraan</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container" style="padding: 60px 100px;">
        <a href="{{ route('pindah_nama.index') }}" class="back-link">Kembali ke Daftar</a>

        <div class="detail-card">
            <!-- Status -->
            <div class="detail-section">
                <h3>Status Permohonan</h3>
                <span class="badge badge-{{ $pindahNama->status }}">
                    @if($pindahNama->status == 'pending')
                        Menunggu Verifikasi
                    @elseif($pindahNama->status == 'diproses')
                        Sedang Diproses
                    @elseif($pindahNama->status == 'selesai')
                        Selesai
                    @else
                        Ditolak
                    @endif
                </span>
            </div>

            <!-- Informasi Kendaraan -->
            <div class="detail-section">
                <h3>Informasi Kendaraan</h3>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">No. Polisi</span>
                        <span class="detail-value">{{ $pindahNama->kendaraan->no_polisi }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Merk/Tipe</span>
                        <span class="detail-value">{{ $pindahNama->kendaraan->merk }} / {{ $pindahNama->kendaraan->tipe }}</span>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">Tahun Pembuatan</span>
                        <span class="detail-value">{{ $pindahNama->kendaraan->tahun_pembuatan }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Jenis SIM</span>
                        <span class="detail-value">{{ $pindahNama->kendaraan->jenis }}</span>
                    </div>
                </div>
            </div>

            <!-- Data Pemilik Lama -->
            <div class="detail-section">
                <h3>👤 Data Pemilik Lama</h3>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">Nama Pemilik</span>
                        <span class="detail-value">{{ $pindahNama->nama_pemilik_lama }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">NIK</span>
                        <span class="detail-value">{{ $pindahNama->nik_pemilik_lama }}</span>
                    </div>
                </div>
            </div>

            <!-- Data Pemilik Baru -->
            <div class="detail-section">
                <h3>👥 Data Pemilik Baru</h3>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">Nama Pemilik Baru</span>
                        <span class="detail-value">{{ $pindahNama->nama_pemilik_baru }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">NIK Baru</span>
                        <span class="detail-value">{{ $pindahNama->nik_pemilik_baru }}</span>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">No. Telepon</span>
                        <span class="detail-value">{{ $pindahNama->no_telepon_pemilik_baru }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">{{ $pindahNama->email_pemilik_baru ?? '-' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Alamat</span>
                    <span class="detail-value">{{ $pindahNama->alamat_pemilik_baru }}</span>
                </div>
            </div>

            <!-- Alasan Pindah Nama -->
            <div class="detail-section">
                <h3>📝 Alasan Pindah Nama</h3>
                <div class="detail-item">
                    <span class="detail-value">{{ $pindahNama->alasan_pindah_nama }}</span>
                </div>
            </div>

            <!-- Tanggal -->
            <div class="detail-section">
                <h3>📅 Tanggal</h3>
                <div class="detail-row">
                    <div class="detail-item">
                        <span class="detail-label">Tanggal Pengajuan</span>
                        <span class="detail-value">{{ $pindahNama->tanggal_pengajuan->format('d M Y H:i') }}</span>
                    </div>
                    @if($pindahNama->tanggal_selesai)
                    <div class="detail-item">
                        <span class="detail-label">Tanggal Selesai</span>
                        <span class="detail-value">{{ $pindahNama->tanggal_selesai->format('d M Y') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            @if($pindahNama->catatan_admin)
            <div class="detail-section">
                <h3>Catatan Admin</h3>
                <div class="detail-item">
                    <span class="detail-value">{{ $pindahNama->catatan_admin }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container" style="padding: 40px 100px;">
            <div style="display: grid; grid-template-columns: auto 1fr auto; gap: 40px; margin-bottom: 40px; align-items: start;">
                <div>
                    <div class="logo-circle" style="background: rgba(255, 255, 255, 0.1); margin-bottom: 10px;">
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
