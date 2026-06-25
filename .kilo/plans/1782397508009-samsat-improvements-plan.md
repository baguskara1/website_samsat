# Rencana Perbaikan dan Penyempurnaan Website SAMSAT DIY

Rencana aksi ini dirancang untuk memperbaiki bug kritis, menyelaraskan UI/UX (termasuk footer dan logo), mengimplementasikan menu hamburger mobile yang responsif, menyisipkan animasi transisi antarhalaman, serta mengintegrasikan pengelolaan field `harga` kendaraan untuk admin.

---

## 🛠️ Keputusan Teknis & Arsitektur

1. **Pembuatan Layout Master (`layouts/app.blade.php`):**
   * Menyediakan struktur HTML5 boilerplate, pemanggilan Google Font Inter, font ikon Remixicon, CSS dasar, menu hamburger responsif, serta footer neobrutalist yang seragam.
   * Menampilkan navigasi secara dinamis berbasis status login:
     * **Admin (Session 'admin'):** Link ke Dashboard, Analytics, Payments, dan Logout.
     * **User Terautentikasi (Auth):** Link ke Dashboard, Profil Saya, FAQ, dan Logout.
     * **Guest:** Link ke About Us, Daftar Kendaraan, FAQ, dan Login.
   * Membawa logo lingkaran **SA SAMSAT** dan tulisan **SAMSAT DIY** yang konsisten ke semua halaman.

2. **Animasi Transisi Halaman (CSS Keyframes):**
   * Menyisipkan animasi `@keyframes pageFadeInSlide` di layout master agar setiap halaman yang dimuat bergeser lembut ke atas (*fade-in* + *slide-up*) saat perpindahan halaman.

3. **Perbaikan Bypass CSRF Webhook Midtrans (`bootstrap/app.php`):**
   * Mengecualikan route `payment/callback` dari middleware `VerifyCsrfToken` agar callback status pembayaran dari server Midtrans tidak menghasilkan error 419 Token Mismatch.

4. **Perbaikan Silent Bug Notifikasi Admin (`PindahNamaController.php`):**
   * Mengubah import baris ke-6 dari `use AppMailTransferStatusNotification;` menjadi `use App\Mail\TransferStatusNotification;`.

5. **Pengelolaan Field `harga` Kendaraan:**
   * Mendaftarkan field `harga` pada properti `$fillable` di model `Kendaraan`.
   * Menambahkan form input `harga` bertipe `number` pada halaman admin *Create* & *Edit* kendaraan.
   * Menambahkan validasi `harga` (`required|numeric|min:0`) di method `storeVehicle` & `updateVehicle` (`AdminAuthController.php`) serta `store` & `update` (`KendaraanController.php`).

---

## 📋 Langkah-Langkah Implementasi Detail

### Langkah 1: Buat File Layout Master `resources/views/layouts/app.blade.php`
Buat file layout master dengan isi:
* Head tag: Import Google Fonts Inter & Remixicon.
* CSS Styles:
  * Animasi `@keyframes pageFadeInSlide` yang diterapkan pada class wrapper utama.
  * Desain navbar responsif (desktop flex row, mobile hamburger menu toggle).
  * Desain neobrutalist footer yang seragam.
* HTML Body:
  * Kondisi pencabangan status login untuk merender navbar menu yang sesuai.
  * Ikon garis 3 (`ri-menu-line`) untuk hamburger menu di mobile.
  * Container drop-down menu mobile dengan JavaScript toggle (`display: block` / `none`).
  * `@yield('content')` untuk menaruh konten masing-masing view.
  * Footer universal.

### Langkah 2: Refactor View Halaman User dan Admin
Ubah view berikut untuk mewarisi `layouts.app`:
* Halaman User: `index`, `about`, `faq`, `Daftar_kendaraan`, `bayarpajak`, `user_profile`, `pindah_nama`, `pindah_nama_list`, `pindah_nama_detail`.
* Halaman Admin: `admin_analytics`, `analytics_vehicles`, `analytics_users`, `analytics_transfers`, `admin_payment_history`.
* **Caranya:** Hapus boilerplate `<!DOCTYPE html>` hingga penutup `</html>` pada file-file tersebut, lalu ganti dengan `@extends('layouts.app')` dan bungkus bagian konten utama di dalam `@section('content')` ... `@endsection`.

### Langkah 3: Edit `app/Http/Controllers/PindahNamaController.php`
* Cari baris: `use AppMailTransferStatusNotification;`
* Ganti dengan: `use App\Mail\TransferStatusNotification;`

### Langkah 4: Edit `bootstrap/app.php`
* Cari bagian konfigurasi `$middleware`:
  ```php
  ->withMiddleware(function (Middleware $middleware): void {
      $middleware->alias([
          'admin.auth' => \App\Http\Middleware\AdminAuth::class,
      ]);
  })
  ```
* Ganti menjadi:
  ```php
  ->withMiddleware(function (Middleware $middleware): void {
      $middleware->alias([
          'admin.auth' => \App\Http\Middleware\AdminAuth::class,
      ]);
      $middleware->validateCsrfTokens(except: [
          'payment/callback',
      ]);
  })
  ```

### Langkah 5: Edit Model `app/Models/Kendaraan.php`
* Tambahkan `'harga'` ke dalam array `$fillable`.

### Langkah 6: Edit Controllers Kendaraan (Admin & User)
* Di `AdminAuthController.php` (method `storeVehicle` & `updateVehicle`) dan `KendaraanController.php` (method `store` & `update`), tambahkan rule validasi untuk `harga`:
  ```php
  'harga' => 'required|numeric|min:0',
  ```

### Langkah 7: Edit Form Tambah/Edit Kendaraan Admin
* Di `admin_vehicle_create.blade.php` dan `admin_vehicle_edit.blade.php`, tambahkan form group baru:
  ```html
  <div class="form-group">
      <label for="harga">Harga Kendaraan (Rupiah) *</label>
      <input type="number" id="harga" name="harga" value="{{ old('harga', $kendaraan->harga ?? '') }}" required min="0" placeholder="Contoh: 150000000">
  </div>
  ```

---

## 🧪 Rencana Validasi Pengujian

1. **Uji Sintaks PHP (Linting):**
   * Jalankan `php -l` pada file controller dan model yang dimodifikasi untuk memastikan bebas error sintaks.
2. **Uji Render Layout & Animasi:**
   * Akses halaman Home, bayar pajak, dan profil di browser (mobile & desktop) untuk menguji responsivitas hamburger menu, keseragaman footer, dan kelancaran transisi fade-in.
3. **Uji Webhook Midtrans (CSRF Bypass):**
   * Lakukan simulasi POST request ke `/payment/callback` menggunakan Postman/cURL tanpa menyertakan CSRF token.
   * Pastikan tidak mengembalikan error status 419 (Token Mismatch), melainkan 403/404/200 dari validasi controller.
4. **Uji Pengiriman Email Status Balik Nama:**
   * Ubah status permohonan pindah nama di dashboard admin menjadi "Selesai" atau "Ditolak", lalu verifikasi log email di `storage/logs/laravel.log` untuk memastikan email ke admin dan user terkirim tanpa silent crash.
