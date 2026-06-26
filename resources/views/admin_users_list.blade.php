<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/admin_users_list.css') }}">
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
            <h1>Daftar Semua User</h1>
            <p>Kelola akun user yang terdaftar di sistem SAMSAT DIY</p>
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
                <h2 style="font-size: 24px; font-weight: 700;">Total User: {{ $users->total() }}</h2>
                <div style="display: flex; gap: 15px;">
                    <a href="/admin/users/create" class="btn btn-primary">+ Tambah User</a>
                    <a href="/admin/dashboard" class="btn btn-secondary">← Kembali ke Dashboard</a>
                </div>
            </div>

            <div style="background: white; border: 2px solid #1e1e1e; border-radius: 12px; padding: 20px; margin-bottom: 25px; box-shadow: -4px 4px 0px rgba(0,0,0,0.1);">
                <form method="GET" action="{{ route('admin.users') }}" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
                    <div style="flex: 1; min-width: 250px;">
                        <label style="display: block; font-size: 12px; font-weight: 600; margin-bottom: 5px; color: #666;">Cari User</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama atau Email..." style="width: 100%; padding: 10px 14px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit;">
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" style="padding: 10px 20px; background: #1e1e1e; color: white; border: 2px solid #1e1e1e; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer;">Cari</button>
                        <a href="{{ route('admin.users') }}" style="padding: 10px 20px; background: white; color: #1e1e1e; border: 2px solid #1e1e1e; border-radius: 8px; font-weight: 600; font-size: 14px; text-decoration: none;">Reset</a>
                    </div>
                </form>
            </div>

            @if(count($users) > 0)
                <div class="table-container">
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
                            @foreach($users as $user)
                            <tr>
                                <td><strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <a href="/admin/users/{{ $user->id }}/edit" class="btn-small btn-edit">Edit</a>
                                    <a href="/admin/users/{{ $user->id }}/delete" class="btn-small btn-delete btn-delete-swal" data-name="{{ $user->name }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 20px; display: flex; justify-content: center;">
                    {{ $users->links() }}
                </div>
            @else
                <div class="table-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">👤</div>
                        <h3>Belum Ada User</h3>
                        <p>Belum ada user yang terdaftar. Tambahkan user baru untuk memulai.</p>
                        <a href="/admin/users/create" class="btn btn-primary">+ Tambah User Pertama</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        document.querySelectorAll('.btn-delete-swal').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const name = this.dataset.name;
                const href = this.href;
                Swal.fire({
                    title: 'Hapus User?',
                    text: `Yakin ingin menghapus user ${name}?`,
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
