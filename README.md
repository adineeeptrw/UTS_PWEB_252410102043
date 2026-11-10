# Mauw Coffee

Aplikasi web sederhana untuk mengelola penjualan biji kopi. Dibuat untuk UTS Pemrograman Web dengan Laravel murni (MVC + Blade, tanpa database).

Alur: login dengan username, lalu username dikirim lewat request parameter ke Dashboard, Profil, dan Pengelolaan. Data biji kopi berupa array dari `PageController` dan ditampilkan dengan `@forelse`.

## Screenshot

![Login](public/screenshot/login.png)
![Dashboard](public/screenshot/dashboard_mauw.png)
![Profil](public/screenshot/profil.png)
![Penjualan](public/screenshot/penjualan.png)

## Cara menjalankan

```
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
