<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
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
            <a href="{{ route("admin.analytics") }}">📊 Analytics</a>
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
