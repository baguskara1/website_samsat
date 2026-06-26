<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pindah Nama - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/pindah_nama_detail.css') }}">
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
