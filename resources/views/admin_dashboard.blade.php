<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SAMSAT DIY</title>
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
            padding: 0 50px;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
        }

        .navbar-brand h2 {
            font-size: 24px;
            font-weight: 700;
        }

        .navbar-admin-badge {
            background: rgba(255,255,255,0.3);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .navbar-menu a:hover {
            opacity: 0.8;
        }

        .btn-logout {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #fff;
            color: #ff5c5c;
        }

        .dashboard-header {
            padding: 40px 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .dashboard-header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .dashboard-content {
            padding: 0 50px 60px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 15px;
            padding: 30px;
            box-shadow: -5px 5px 0px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: -8px 8px 0px black;
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: #ff5c5c;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            color: #666;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 3px solid #ff5c5c;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .action-btn {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: -4px 4px 0px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            box-shadow: -8px 8px 0px black;
            transform: translateY(-3px);
        }

        .action-btn.primary {
            background: #ff5c5c;
            color: #1e1e1e;
        }

        .action-btn.secondary {
            background: #1e1e1e;
            color: white;
        }

        .table-responsive {
            overflow-x: auto;
            margin-bottom: 40px;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 12px;
            overflow: hidden;
        }

        .data-table thead {
            background: #1e1e1e;
            color: white;
        }

        .data-table th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            border-right: 1px solid #333;
        }

        .data-table th:last-child {
            border-right: none;
        }

        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table tbody tr:hover {
            background: #f7f7f7;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #d4f4dd;
            color: #0d7533;
        }

        .badge-warning {
            background: #fff4e0;
            color: #f57c00;
        }

        .badge-danger {
            background: #ffe0e0;
            color: #d32f2f;
        }

        .btn-small {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit {
            background: #e3f2fd;
            color: #1976d2;
            border-color: #1976d2;
        }

        .btn-delete {
            background: #ffe0e0;
            color: #d32f2f;
            border-color: #d32f2f;
        }

        .btn-view {
            background: #e0ffe0;
            color: #0d7533;
            border-color: #0d7533;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 12px;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .dashboard-header {
                padding: 30px 20px;
            }

            .dashboard-header h1 {
                font-size: 24px;
            }

            .dashboard-content {
                padding: 0 20px 40px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }

            .navbar-menu {
                gap: 15px;
                width: 100%;
                flex-wrap: wrap;
            }

            .section-title {
                font-size: 20px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <h2>SAMSAT DIY</h2>
            <div class="navbar-admin-badge">ADMIN PANEL</div>
        </div>
        <div class="navbar-menu">
            <a href="#vehicles">Kendaraan</a>
            <a href="#users">Users</a>
            <a href="#transfers">Pindah Nama</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1>Admin Dashboard</h1>
            <p>Kelola semua data kendaraan, user, dan permohonan pindah nama</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <div class="container">
            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ count($vehicles) ?? 0 }}</div>
                    <div class="stat-label">Total Kendaraan Terdaftar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ count($users) ?? 0 }}</div>
                    <div class="stat-label">Total User Terdaftar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ count($transfers) ?? 0 }}</div>
                    <div class="stat-label">Total Permohonan Pindah Nama</div>
                </div>
            </div>

            <!-- Vehicles Management -->
            <div id="vehicles">
                <h2 class="section-title">?? Manajemen Kendaraan</h2>
                
                <div class="action-buttons">
                    <a href="/admin/vehicles/create" class="action-btn primary">+ Tambah Kendaraan Baru</a>
                    <a href="/admin/vehicles" class="action-btn secondary">Lihat Semua Kendaraan</a>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No. Polisi</th>
                                <th>Pemilik</th>
                                <th>Merk/Tipe</th>
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($vehicles) > 0)
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td><strong>{{ $vehicle->no_polisi }}</strong></td>
                                    <td>{{ $vehicle->nama_pemilik }}</td>
                                    <td>{{ $vehicle->merk }} / {{ $vehicle->tipe }}</td>
                                    <td>{{ $vehicle->tahun_pembuatan }}</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <a href="/admin/vehicles/{{ $vehicle->id }}/edit" class="btn-small btn-edit">Edit</a>
                                        <a href="/admin/vehicles/{{ $vehicle->id }}/delete" class="btn-small btn-delete btn-delete-vehicle" data-name="{{ $vehicle->no_polisi }}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 40px;">Belum ada data kendaraan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Users Management -->
            <div id="users" style="margin-top: 60px;">
                <h2 class="section-title">?? Manajemen User</h2>
                
                <div class="action-buttons">
                    <a href="/admin/users/create" class="action-btn primary">+ Tambah User Baru</a>
                    <a href="/admin/users" class="action-btn secondary">Lihat Semua User</a>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Terdaftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                <tr>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <a href="/admin/users/{{ $user->id }}/edit" class="btn-small btn-edit">Edit</a>
                                        <a href="/admin/users/{{ $user->id }}/delete" class="btn-small btn-delete" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 40px;">Belum ada data user</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Transfer Requests -->
            <div id="transfers" style="margin-top: 60px;">
                <h2 class="section-title">?? Permohonan Pindah Nama</h2>
                
                <div class="action-buttons">
                    <a href="/pindah-nama" class="action-btn secondary">Lihat Semua Permohonan</a>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No. Polisi</th>
                                <th>Pemilik Lama</th>
                                <th>Pemilik Baru</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($transfers) > 0)
                                @foreach($transfers as $transfer)
                                <tr>
                                    <td><strong>{{ $transfer->kendaraan->no_polisi }}</strong></td>
                                    <td>{{ $transfer->nama_pemilik_lama }}</td>
                                    <td>{{ $transfer->nama_pemilik_baru }}</td>
                                    <td>
                                        @if($transfer->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($transfer->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $transfer->tanggal_pengajuan->format('d M Y') }}</td>
                                    <td>
                                        <a href="/pindah-nama/{{ $transfer->id }}" class="btn-small btn-view">Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 40px;">Belum ada permohonan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.btn-delete-vehicle').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const name = this.dataset.name;
                const href = this.href;
                Swal.fire({
                    title: 'Hapus Kendaraan?',
                    text: `Yakin ingin menghapus kendaraan ${name}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d32f2f',
                    cancelButtonColor: '#666',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
        @endif
    </script>
</body>
</html>
