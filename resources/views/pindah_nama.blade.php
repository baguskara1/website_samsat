<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pindah Nama Kendaraan - SAMSAT DIY</title>
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

        .form-card {
            background: white;
            border: 2px solid #1e1e1e;
            border-radius: 37px;
            padding: 50px;
            box-shadow: -7px 7px 0px 0px black;
            margin: 40px 0;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .form-section h3 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1e1e1e;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #1e1e1e;
        }

        .form-group label span {
            color: #ff5c5c;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #1e1e1e;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: #fbfbfb;
        }

        .form-control:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.1);
            border-color: #ff5c5c;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 16px;
            border: 2px dashed #1e1e1e;
            border-radius: 10px;
            background: #fbfbfb;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            background: #f0f0f0;
            border-color: #ff5c5c;
        }

        .file-upload-label svg {
            width: 24px;
            height: 24px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 2px solid;
        }

        .alert-error {
            background: #ffe0e0;
            border-color: #ff5c5c;
            color: #c41e3a;
        }

        .alert-success {
            background: #e0ffe0;
            border-color: #4caf50;
            color: #2e7d32;
        }

        .alert-info {
            background: #e3f2fd;
            border-color: #2196f3;
            color: #1976d2;
        }

        .btn-submit {
            background: #ff5c5c;
            color: #1e1e1e;
            border: 2px solid #1e1e1e;
            padding: 16px 40px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: -5px 5px 0px 0px black;
            width: 100%;
            margin-top: 20px;
        }

        .btn-submit:hover {
            box-shadow: -7px 7px 0px 0px black;
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: -2px 2px 0px 0px black;
        }

        .requirements-box {
            background: #fff4e0;
            border: 2px solid #f57c00;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .requirements-box h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #f57c00;
        }

        .requirements-box ul {
            list-style: none;
            padding: 0;
        }

        .requirements-box li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
            font-size: 14px;
            color: #1e1e1e;
        }

        .requirements-box li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #f57c00;
            font-weight: bold;
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

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 30px 20px;
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
            <h2 style="font-size: 48px; font-weight: 600; margin-bottom: 20px;">Pindah Nama Kendaraan</h2>
            <p style="font-size: 18px; color: #666;">Ajukan permohonan pindah nama kendaraan Anda dengan mudah dan cepat</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container" style="padding: 60px 100px;">
        <!-- Requirements Box -->
        <div class="requirements-box">
            <h4>📋 Persyaratan Pindah Nama Kendaraan</h4>
            <ul>
                <li>KTP Asli Pemilik Lama dan Pemilik Baru</li>
                <li>BPKB Asli Kendaraan</li>
                <li>STNK Asli Kendaraan</li>
                <li>Kwitansi Jual Beli / Bukti Kepemilikan</li>
                <li>Formulir Permohonan yang telah diisi lengkap</li>
                <li>Cek Fisik Kendaraan (dilakukan di lokasi SAMSAT)</li>
                <li>Bukti Pembayaran Pajak Kendaraan</li>
            </ul>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terdapat kesalahan:</strong>
                <ul style="margin-top: 10px; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('pindah_nama.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Pilih Kendaraan -->
                <div class="form-section">
                    <h3>🚗 Pilih Kendaraan</h3>
                    <div class="form-group">
                        <label for="kendaraan_id">Pilih Kendaraan <span>*</span></label>
                        <select name="kendaraan_id" id="kendaraan_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}" 
                                    data-pemilik="{{ $kendaraan->nama_pemilik }}"
                                    data-nik="{{ $kendaraan->NIK }}"
                                    {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                                    {{ $kendaraan->no_polisi }} - {{ $kendaraan->merk }} {{ $kendaraan->tipe }} ({{ $kendaraan->nama_pemilik }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Data Pemilik Lama -->
                <div class="form-section">
                    <h3>👤 Data Pemilik Lama</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama_pemilik_lama">Nama Pemilik Lama <span>*</span></label>
                            <input type="text" name="nama_pemilik_lama" id="nama_pemilik_lama" class="form-control" 
                                value="{{ old('nama_pemilik_lama') }}" placeholder="Nama lengkap pemilik lama" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik_pemilik_lama">NIK Pemilik Lama <span>*</span></label>
                            <input type="text" name="nik_pemilik_lama" id="nik_pemilik_lama" class="form-control" 
                                value="{{ old('nik_pemilik_lama') }}" placeholder="NIK pemilik lama" required readonly>
                        </div>
                    </div>
                </div>

                <!-- Data Pemilik Baru -->
                <div class="form-section">
                    <h3>👥 Data Pemilik Baru</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama_pemilik_baru">Nama Pemilik Baru <span>*</span></label>
                            <input type="text" name="nama_pemilik_baru" id="nama_pemilik_baru" class="form-control" 
                                value="{{ old('nama_pemilik_baru') }}" placeholder="Nama lengkap pemilik baru" required>
                        </div>
                        <div class="form-group">
                            <label for="nik_pemilik_baru">NIK Pemilik Baru <span>*</span></label>
                            <input type="text" name="nik_pemilik_baru" id="nik_pemilik_baru" class="form-control" 
                                value="{{ old('nik_pemilik_baru') }}" placeholder="16 digit NIK" maxlength="16" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pemilik_baru">Alamat Lengkap Pemilik Baru <span>*</span></label>
                        <textarea name="alamat_pemilik_baru" id="alamat_pemilik_baru" class="form-control" 
                            placeholder="Alamat lengkap sesuai KTP" required>{{ old('alamat_pemilik_baru') }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="no_telepon_pemilik_baru">No. Telepon <span>*</span></label>
                            <input type="tel" name="no_telepon_pemilik_baru" id="no_telepon_pemilik_baru" class="form-control" 
                                value="{{ old('no_telepon_pemilik_baru') }}" placeholder="08xxxxxxxxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="email_pemilik_baru">Email</label>
                            <input type="email" name="email_pemilik_baru" id="email_pemilik_baru" class="form-control" 
                                value="{{ old('email_pemilik_baru') }}" placeholder="email@example.com">
                        </div>
                    </div>
                </div>

                <!-- Alasan Pindah Nama -->
                <div class="form-section">
                    <h3>📝 Alasan Pindah Nama</h3>
                    <div class="form-group">
                        <label for="alasan_pindah_nama">Alasan/Keterangan <span>*</span></label>
                        <textarea name="alasan_pindah_nama" id="alasan_pindah_nama" class="form-control" 
                            placeholder="Jelaskan alasan pindah nama kendaraan (misal: jual beli, hibah, warisan, dll)" required>{{ old('alasan_pindah_nama') }}</textarea>
                    </div>
                </div>

                <!-- Upload Dokumen -->
                <div class="form-section">
                    <h3>📎 Upload Dokumen Pendukung</h3>
                    <p style="font-size: 14px; color: #666; margin-bottom: 20px;">Format file: PDF, JPG, JPEG, PNG (Maksimal 2MB per file)</p>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="dokumen_ktp_lama">KTP Pemilik Lama</label>
                            <div class="file-upload">
                                <input type="file" name="dokumen_ktp_lama" id="dokumen_ktp_lama" accept=".pdf,.jpg,.jpeg,.png">
                                <div class="file-upload-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span>Pilih File KTP Lama</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dokumen_ktp_baru">KTP Pemilik Baru</label>
                            <div class="file-upload">
                                <input type="file" name="dokumen_ktp_baru" id="dokumen_ktp_baru" accept=".pdf,.jpg,.jpeg,.png">
                                <div class="file-upload-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span>Pilih File KTP Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="dokumen_bpkb">BPKB Kendaraan</label>
                            <div class="file-upload">
                                <input type="file" name="dokumen_bpkb" id="dokumen_bpkb" accept=".pdf,.jpg,.jpeg,.png">
                                <div class="file-upload-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span>Pilih File BPKB</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dokumen_stnk">STNK Kendaraan</label>
                            <div class="file-upload">
                                <input type="file" name="dokumen_stnk" id="dokumen_stnk" accept=".pdf,.jpg,.jpeg,.png">
                                <div class="file-upload-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span>Pilih File STNK</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dokumen_kwitansi">Kwitansi Jual Beli / Bukti Kepemilikan</label>
                        <div class="file-upload">
                            <input type="file" name="dokumen_kwitansi" id="dokumen_kwitansi" accept=".pdf,.jpg,.jpeg,.png">
                            <div class="file-upload-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span>Pilih File Kwitansi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="alert alert-info">
                    <strong>ℹ️ Informasi Penting:</strong>
                    <ul style="margin-top: 10px; padding-left: 20px;">
                        <li>Pastikan semua data yang dimasukkan sesuai dengan dokumen asli</li>
                        <li>Permohonan akan diproses dalam waktu 3-5 hari kerja</li>
                        <li>Anda akan dihubungi melalui nomor telepon yang terdaftar</li>
                        <li>Biaya administrasi akan diinformasikan setelah permohonan diverifikasi</li>
                    </ul>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">Ajukan Permohonan Pindah Nama</button>
            </form>
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

    <script>
        // Auto-fill pemilik lama dari kendaraan yang dipilih
        document.getElementById('kendaraan_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const pemilikLama = selectedOption.getAttribute('data-pemilik');
            const nikLama = selectedOption.getAttribute('data-nik');
            
            document.getElementById('nama_pemilik_lama').value = pemilikLama || '';
            document.getElementById('nik_pemilik_lama').value = nikLama || '';
        });

        // Update file upload label when file is selected
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const label = this.parentElement.querySelector('.file-upload-label span');
                if (this.files.length > 0) {
                    label.textContent = this.files[0].name;
                    label.style.color = '#4caf50';
                }
            });
        });

        // NIK validation (16 digits)
        document.getElementById('nik_pemilik_baru').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length > 16) {
                this.value = this.value.slice(0, 16);
            }
        });

        // Phone number validation
        document.getElementById('no_telepon_pemilik_baru').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
</body>
</html>
