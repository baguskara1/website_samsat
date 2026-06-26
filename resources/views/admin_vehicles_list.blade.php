<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/admin_vehicles_list.css') }}">
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
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/vehicles">Kendaraan</a>
            <a href="/admin/users">Users</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Daftar Semua Kendaraan</h1>
            <p>Kelola data kendaraan yang terdaftar di sistem SAMSAT DIY</p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="action-bar">
                <h2 style="font-size: 24px; font-weight: 700;">Total Kendaraan: {{ $vehicles->total() }}</h2>
                <div style="display: flex; gap: 15px;">
                    <a href="/admin/vehicles/create" class="btn btn-primary">+ Tambah Kendaraan</a>
                    <a href="/admin/dashboard" class="btn btn-secondary">← Kembali ke Dashboard</a>
                </div>
            </div>

            <div style="background: white; border: 2px solid #1e1e1e; border-radius: 12px; padding: 20px; margin-bottom: 25px; box-shadow: -4px 4px 0px rgba(0,0,0,0.1);">
                <form method="GET" action="{{ route('admin.vehicles') }}" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
                    <div style="flex: 2; min-width: 200px;">
                        <label style="display: block; font-size: 12px; font-weight: 600; margin-bottom: 5px; color: #666;">Cari Kendaraan</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No. Polisi, Nama Pemilik, Merk..." style="width: 100%; padding: 10px 14px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit;">
                    </div>
                    <div style="min-width: 150px;">
                        <label style="display: block; font-size: 12px; font-weight: 600; margin-bottom: 5px; color: #666;">Jenis</label>
                        <select name="jenis" style="width: 100%; padding: 10px 14px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit; background: white;">
                            <option value="">Semua Jenis</option>
                            <option value="SIM-A" {{ request('jenis') == 'SIM-A' ? 'selected' : '' }}>SIM-A (Mobil)</option>
                            <option value="SIM-B1" {{ request('jenis') == 'SIM-B1' ? 'selected' : '' }}>SIM-B1 (Bus/Truk)</option>
                            <option value="SIM-B2" {{ request('jenis') == 'SIM-B2' ? 'selected' : '' }}>SIM-B2 (Trailer)</option>
                            <option value="SIM-C" {{ request('jenis') == 'SIM-C' ? 'selected' : '' }}>SIM-C (Motor)</option>
                            <option value="SIM-C1" {{ request('jenis') == 'SIM-C1' ? 'selected' : '' }}>SIM-C1 (Motor/Becak)</option>
                            <option value="SIM-C2" {{ request('jenis') == 'SIM-C2' ? 'selected' : '' }}>SIM-C2 (Kendaraan Khusus)</option>
                        </select>
                    </div>
                    <div style="min-width: 120px;">
                        <label style="display: block; font-size: 12px; font-weight: 600; margin-bottom: 5px; color: #666;">Tahun</label>
                        <input type="number" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun" min="1900" max="2100" style="width: 100%; padding: 10px 14px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit;">
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" style="padding: 10px 20px; background: #1e1e1e; color: white; border: 2px solid #1e1e1e; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer;">Cari</button>
                        <a href="{{ route('admin.vehicles') }}" style="padding: 10px 20px; background: white; color: #1e1e1e; border: 2px solid #1e1e1e; border-radius: 8px; font-weight: 600; font-size: 14px; text-decoration: none;">Reset</a>
                    </div>
                </form>
            </div>

            @if(count($vehicles) > 0)
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No. Polisi</th>
                                <th>Pemilik</th>
                                <th>NIK</th>
                                <th>Merk / Tipe</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td><strong>{{ $vehicle->no_polisi }}</strong></td>
                                <td>{{ $vehicle->nama_pemilik }}</td>
                                <td>{{ $vehicle->NIK }}</td>
                                <td>{{ $vehicle->merk }} / {{ $vehicle->tipe }}</td>
                                <td><span class="badge badge-success">{{ $vehicle->jenis }}</span></td>
                                <td>{{ $vehicle->tahun_pembuatan }}</td>
                                <td>{{ $vehicle->warna }}</td>
                                <td>{{ $vehicle->no_rangka }}</td>
                                <td>{{ $vehicle->no_mesin }}</td>
                                <td>
                                    <a href="/admin/vehicles/{{ $vehicle->id }}/edit" class="btn-small btn-edit">Edit</a>
                                    <a href="/admin/vehicles/{{ $vehicle->id }}/delete" class="btn-small btn-delete btn-delete-swal" data-name="{{ $vehicle->no_polisi }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 20px; display: flex; justify-content: center;">
                    {{ $vehicles->links() }}
                </div>
            @else
                <div class="table-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">🚗</div>
                        <h3>Belum Ada Kendaraan</h3>
                        <p>Belum ada data kendaraan yang terdaftar. Tambahkan kendaraan baru untuk memulai.</p>
                        <a href="/admin/vehicles/create" class="btn btn-primary">+ Tambah Kendaraan Pertama</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        // SweetAlert2 delete confirmation
        document.querySelectorAll('.btn-delete-swal').forEach(btn => {
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
