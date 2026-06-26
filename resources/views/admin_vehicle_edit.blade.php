<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/admin_vehicle_edit.css') }}">
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
            <a href="/admin/dashboard#vehicles">Kendaraan</a>
            <a href="/admin/dashboard#users">Users</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Edit Kendaraan</h1>
            <p>Update informasi kendaraan dengan data yang benar</p>
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

            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-top: 10px; margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container">
                <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="no_polisi">Nomor Polisi *</label>
                            <input type="text" id="no_polisi" name="no_polisi" value="{{ old('no_polisi', $vehicle->no_polisi) }}" required maxlength="15" placeholder="Contoh: AB 1234 CD">
                            @error('no_polisi')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik *</label>
                            <input type="text" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik', $vehicle->nama_pemilik) }}" required placeholder="Nama lengkap pemilik">
                            @error('nama_pemilik')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK (Nomor Induk Kependudukan) *</label>
                        <input type="text" id="NIK" name="NIK" value="{{ old('NIK', $vehicle->NIK) }}" required placeholder="16 digit NIK">
                        @error('NIK')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="merk">Merk Kendaraan *</label>
                            <input type="text" id="merk" name="merk" value="{{ old('merk', $vehicle->merk) }}" required placeholder="Contoh: Honda, Toyota, Yamaha">
                            @error('merk')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipe">Tipe Kendaraan *</label>
                            <input type="text" id="tipe" name="tipe" value="{{ old('tipe', $vehicle->tipe) }}" required placeholder="Contoh: Vario 125, Avanza">
                            @error('tipe')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="jenis">Jenis Kendaraan *</label>
                            <select id="jenis" name="jenis" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="SIM-A" {{ old('jenis', $vehicle->jenis) == 'SIM-A' ? 'selected' : '' }}>SIM-A (Mobil)</option>
                                <option value="SIM-B1" {{ old('jenis', $vehicle->jenis) == 'SIM-B1' ? 'selected' : '' }}>SIM-B1 (Bus/Truk)</option>
                                <option value="SIM-B2" {{ old('jenis', $vehicle->jenis) == 'SIM-B2' ? 'selected' : '' }}>SIM-B2 (Trailer)</option>
                                <option value="SIM-C" {{ old('jenis', $vehicle->jenis) == 'SIM-C' ? 'selected' : '' }}>SIM-C (Motor)</option>
                                <option value="SIM-C1" {{ old('jenis', $vehicle->jenis) == 'SIM-C1' ? 'selected' : '' }}>SIM-C1 (Motor/Becak)</option>
                                <option value="SIM-C2" {{ old('jenis', $vehicle->jenis) == 'SIM-C2' ? 'selected' : '' }}>SIM-C2 (Kendaraan Khusus)</option>
                            </select>
                            @error('jenis')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_pembuatan">Tahun Pembuatan *</label>
                            <input type="number" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ old('tahun_pembuatan', $vehicle->tahun_pembuatan) }}" required min="1900" max="2100" placeholder="Contoh: 2020">
                            @error('tahun_pembuatan')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="warna">Warna Kendaraan *</label>
                        <input type="text" id="warna" name="warna" value="{{ old('warna', $vehicle->warna) }}" required placeholder="Contoh: Hitam, Putih, Merah">
                        @error('warna')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_rangka">Nomor Rangka *</label>
                        <input type="text" id="no_rangka" name="no_rangka" value="{{ old('no_rangka', $vehicle->no_rangka) }}" required placeholder="Nomor rangka kendaraan">
                        @error('no_rangka')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_mesin">Nomor Mesin *</label>
                        <input type="text" id="no_mesin" name="no_mesin" value="{{ old('no_mesin', $vehicle->no_mesin) }}" required placeholder="Nomor mesin kendaraan">
                        @error('no_mesin')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    @if(isset($users) && count($users) > 0)
                    <div class="form-group">
                        <label for="user_id">Pemilik Akun (Opsional)</label>
                        <select id="user_id" name="user_id" style="width: 100%; padding: 12px 16px; border: 2px solid #1e1e1e; border-radius: 8px; font-size: 14px; font-family: inherit; background: white;">
                            <option value="">-- Tidak Ada Pemilik Akun --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $vehicle->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <div style="font-size: 12px; color: #666; margin-top: 5px;">Hubungkan kendaraan ini dengan akun user</div>
                        @error('user_id')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif

                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Update Kendaraan</button>
                        <a href="/admin/dashboard" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
                    <div class="form-group">
                        <label for="harga">Harga Kendaraan (Rupiah) *</label>
                        <input type="number" id="harga" name="harga" value="{{ old('harga', $vehicle->harga ?? '') }}" required min="0" placeholder="Contoh: 150000000">
                        @error('harga')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

    </div>
</body>
</html>
