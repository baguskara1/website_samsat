<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pindah Nama - SAMSAT DIY</title>
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
            white-space: nowrap;
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

        .badge-pending {
            background: #fff4e0;
            color: #f57c00;
            border: 1px solid #f57c00;
        }

        .badge-diproses {
            background: #e3f2fd;
            color: #1976d2;
            border: 1px solid #1976d2;
        }

        .badge-selesai {
            background: #d4f4dd;
            color: #0d7533;
            border: 1px solid #0d7533;
        }

        .badge-ditolak {
            background: #ffe0e0;
            color: #d32f2f;
            border: 1px solid #d32f2f;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
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
