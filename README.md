HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# website_samsat
Pembuatan Website Samsat Untuk Tugas Pemrograman Web

### 1. Project Overview
**Nama Proyek:** 
    Aplikasi Samsat Online

**Deskripsi Singkat:** 
    Aplikasi Yang Memungkinkan Kita terkait Kenadaran (Pajak, Pemindahan nama, Dll) Bisa dilakukan Secara Online dan praktis dari perangkat kita.

**Tujuan:**
    Menyelesaikan masalah mengenai Pembayaran pajak, Pemindahan nama, dan lain-lain yang terkait pajak dapat dilakukan secara online atau daring tanpa harus kesusahan mendatangi samsat terdekat. hal ini juga memudahkan dalam pendataan kendaraan pada pihak berawajib, terkait data kendaraan.

### 2. Target Users
- **Masyarakat:** 
    [User Biasa] Masyarakat yang termaksud dalam golongan yang telah memiliki kendaraan dan ingin mendaftarkan atau membayar pajak dan hal lain terkait administrasi kendaraan kepihak berwajib.
- **Pihak Berwajib** 
    Bagi pihak berwajib yang ingin mendata atau pendataan kendaraan bagi kendaraan masyarakat.
- **[User Type 3]:** 
    [Deskripsi dan kebutuhan]

### 3. Core Features (MVP)

|    Fitur    |                            Deskripsi                                  | Prioritas |
|-------------|-----------------------------------------------------------------------|-----------|
| Input data  | Pengguna dapat memasukan data.                                        | P0        |
| Create data | Pengguna dapat membua data mengenai pajak kenderaan.                  | P1        |
| Read data   | Pengguna dan pihak berwajib dapat melihat data kendaraan.             | P2        |
| Update data | Data kendaraan dapat terbarui seperti pajak dan data rangka kendaraan.| P1        |
| Login       | Data user yang massuk pada Webste Samsat                              | P1        |
| FAQ         | Data kendaraan dapat terbarui seperti pajak dan data rangka kendaraan.| P2        |
| About       | Mengeniai samsat atau aplikasi yang dikembangkan                      | P2        |
| Nav Button  | Navigasi yang memungkinkan kita dapat dengan mudah unutk request      | P1        |
|             | page pada website                                                     |           |

**Prioritas:**
- **P0 (Wajib)**: 
    Harus ada di MVP, aplikasi tidak jalan tanpa ini
- **P1 (Penting)**: 
    Fitur penting tapi bisa ditunda ke fase berikutnya
- **P2 (Nice-to-have)**: 
    Fitur tambahan, bisa dikerjakan nanti

### 4. User Flow
1. Login → Dashboard → Fitur Utama 
    1. User melakukan Pembayaran pajak & pendataan kendaraan.
    2. System merespon pembayaran serta pendataan kendaraan.
    3. User melihat hasil dari pendataan dan pembayaran pajak yang dilakukan.
    4. User menyelesaikan telah menyelesaikan pendataan pembayaran pajak pada pihak berwajib.
2. → Selesai


### 5. Success Metrics
- Response time < 5 detik
- User bisa selesaikan task utama dalam 3 klik
- 100% uptime
- User retention 80%

### 6. Constraints
- **Timeline:** 
    Estimasi Pengerjaan selama seminggu.
- **Budget:** 
    Rp.0 (Bakti Masyarakat)
- **Tech Stack:** 
    Laravel, Github, Cloud Larvel, Online Db, 9router, Ai Agentic(Github Copilot, Kiro, Gemini, opencodeai, dll), Hosting gratis
- **Team:** 
    Team atau pengerjaan kelompok yang diketuai oleh @baskaraa

### 7. Risks & Assumptions
- Tech risk: Framework barudan bahasa yang belum dikuasai.
- Scope risk: Fitur bertambah di tengah jalan sering waktu.
- Timeline risk: Underestimate effort
- Deadline Project: Satu Pengerjaan dalam pembentukan aplikasi.

### 8. Next Steps
1. Buat Tech Spec - [TimeLine]
2. Setup Project - [Timeline]
3. Implementasi Core Features - [Timeline]
4. Testing & Deployment [Timeline]
