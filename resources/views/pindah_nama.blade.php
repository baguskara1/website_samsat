<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pindah Nama Kendaraan - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/pindah_nama.css') }}">
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
