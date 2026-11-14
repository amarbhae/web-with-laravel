# Web with Laravel

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

## About This Project

Web with Laravel merupakan proyek aplikasi web berbasis Laravel yang dibuat untuk mengelola data barang.

Fitur utama aplikasi:
- Menampilkan daftar barang.
- Menambahkan data barang.
- Mengubah data barang.
- Menghapus data barang.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- Simple, fast routing engine.
- Powerful dependency injection container.
- Multiple back-ends for session and cache storage.
- Expressive, intuitive database ORM.
- Database agnostic schema migrations.
- Robust background job processing.
- Real-time event broadcasting.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has extensive documentation and video tutorial resources. You can access the official documentation at:

https://laravel.com/docs

You can also visit:

- Laravel Learn: https://laravel.com/learn
- Laracasts: https://laracasts.com

## Technologies Used

- PHP
- Laravel
- MySQL / MariaDB
- HTML
- JavaScript
- Tailwind CSS
- Vite

## Installation

Berikut langkah-langkah untuk menjalankan proyek ini di komputer lokal.

### Requirements

Pastikan perangkat sudah memiliki:

- PHP
- Composer
- Node.js dan NPM
- MySQL atau MariaDB

### Installation Steps

1. Clone repository:

   ```bash
   git clone https://github.com/amarbhae/web-with-laravel.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd web-with-laravel
   ```

3. Install dependensi Laravel:

   ```bash
   composer install
   ```

4. Salin file konfigurasi `.env.example` menjadi `.env`.

   Pada Windows, file dapat disalin secara manual.

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Atur konfigurasi database pada file `.env` sesuai pengaturan MySQL atau MariaDB di komputer.

7. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

8. Install dependensi frontend:

   ```bash
   npm install
   ```

9. Jalankan Vite:

   ```bash
   npm run dev
   ```

10. Buka terminal baru dan jalankan aplikasi Laravel:

    ```bash
    php artisan serve
    ```

11. Buka aplikasi melalui browser:

    http://127.0.0.1:8000

## Contributing

Thank you for considering contributing to Laravel. The contribution guide can be found in the Laravel documentation:

https://laravel.com/docs/contributions

## Code of Conduct

In order to ensure that the Laravel community is welcoming, please review and abide by the Code of Conduct:

https://laravel.com/docs/contributions#code-of-conduct

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please refer to the official Laravel security documentation.

## License

The Laravel framework is open-sourced software licensed under the MIT license.

## Repository

GitHub Repository:

https://github.com/amarbhae/web-with-laravel
