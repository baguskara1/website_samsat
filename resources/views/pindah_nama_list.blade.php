<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pindah Nama - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/pindah_nama_list.css') }}">
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
                <a href="/Daftar_kendaraan">Daftar Kendaraan</a>
                <a href="/faq">FAQ</a>
                <a href="/login" class="btn-primary" style="margin: 0; padding: 12px 30px;">Login</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 20px;">Daftar Permohonan Pindah Nama</h2>
            <p style="font-size: 18px; color: #666; margin-bottom: 40px;">Pantau status permohonan pindah nama kendaraan Anda</p>
            <a href="{{ route('pindah_nama.create') }}" class="btn-primary" style="padding: 14px 30px; font-size: 18px;">
                ➕ Ajukan Pindah Nama Baru
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container" style="padding: 60px 100px;">
        <div style="margin-bottom: 30px;">
            <h3 style="font-size: 32px; font-weight: 600; margin-bottom: 10px;">Data Permohonan</h3>
            <p style="font-size: 16px; color: #666;">Total: <strong>{{ count($pindahNamas) }} permohonan</strong></p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Polisi</th>
                            <th>Pemilik Lama</th>
                            <th>Pemilik Baru</th>
                            <th>NIK Baru</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pindahNamas as $index => $pindahNama)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $pindahNama->kendaraan->no_polisi }}</strong></td>
                            <td>{{ $pindahNama->nama_pemilik_lama }}</td>
                            <td>{{ $pindahNama->nama_pemilik_baru }}</td>
                            <td>{{ $pindahNama->nik_pemilik_baru }}</td>
                            <td>{{ $pindahNama->tanggal_pengajuan->format('d M Y') }}</td>
                            <td>
                                <span class="badge badge-{{ $pindahNama->status }}">
                                    @if($pindahNama->status == 'pending')
                                        Menunggu
                                    @elseif($pindahNama->status == 'diproses')
                                        Diproses
                                    @elseif($pindahNama->status == 'selesai')
                                        Selesai
                                    @else
                                        Ditolak
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                    <a href="{{ route('pindah_nama.show', $pindahNama->id) }}" style="padding: 8px 12px; background: #e3f2fd; color: #1976d2; border: 1px solid #1976d2; border-radius: 6px; font-size: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.background='#1976d2'; this.style.color='white';" onmouseout="this.style.background='#e3f2fd'; this.style.color='#1976d2';">
                                        Lihat
                                    </a>
                                    @if($pindahNama->status == 'pending' || $pindahNama->status == 'diproses')
                                        <form action="{{ route('pindah_nama.complete', $pindahNama->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" style="padding: 8px 12px; background: #d4f4dd; color: #0d7533; border: 1px solid #0d7533; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='#0d7533'; this.style.color='white';" onmouseout="this.style.background='#d4f4dd'; this.style.color='#0d7533';">
                                                Selesaikan
                                            </button>
                                        </form>
                                        <form action="{{ route('pindah_nama.reject', $pindahNama->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" style="padding: 8px 12px; background: #ffe0e0; color: #d32f2f; border: 1px solid #d32f2f; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='#d32f2f'; this.style.color='white';" onmouseout="this.style.background='#ffe0e0'; this.style.color='#d32f2f';">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 60px 20px;">
                                <div style="font-size: 48px; margin-bottom: 20px;">📋</div>
                                <h4 style="font-size: 24px; font-weight: 600; margin-bottom: 10px; color: #1e1e1e;">Belum Ada Permohonan</h4>
                                <p style="font-size: 16px; color: #666; margin-bottom: 20px;">Belum ada permohonan pindah nama yang diajukan</p>
                                <a href="{{ route('pindah_nama.create') }}" class="btn-primary">Ajukan Sekarang</a>
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
</body>
</html>
