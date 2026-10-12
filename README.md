# Website Perpustakaan Sekolah
Aplikasi web pengelolaan perpustakaan sekolah, dibuat dengan Laravel sebagai latihan Pemrograman Web.

## Fitur
- Login admin (Laravel Breeze)
- CRUD Data Buku dengan pencarian berdasarkan judul atau pengarang
- Data Anggota
- Transaksi peminjaman buku
- Semua halaman hanya bisa diakses setelah login (middleware `auth`)

## Teknologi
- Laravel 12 (PHP 8.2+)
- MySQL (XAMPP)
- Tailwind CSS dan Vite (bawaan Breeze)

## Cara Menjalankan
1. Clone repository:
```
   git clone https://github.com/AzzahwahChalisa/WebsitePerpustakaan.git
   cd WebsitePerpustakaan
```
2. Pasang dependensi:
```
   composer install
   npm install
```
3. Salin file konfigurasi dan buat app key:
```
   copy .env.example .env
   php artisan key:generate
```
   (Mac/Linux: `cp .env.example .env`)
4. Jalankan MySQL di XAMPP, lalu buat database kosong bernama `db_perpus` di phpMyAdmin.
5. Atur `.env`
6. Buat tabel dan akun admin:
```
   php artisan migrate
   php artisan db:seed
```
7. Jalankan di dua terminal:
```
   npm run dev
   php artisan serve
```
8. Buka http://127.0.0.1:8000

## Akun Admin (untuk latihan)
- Email: `admin@perpus.test`
- Password: `admin123`

Akun ini hanya untuk percobaan lokal. Ganti password-nya kalau aplikasi dipakai sungguhan.

## Struktur Singkat
- `app/Http/Controllers` berisi BukuController, AnggotaController, PeminjamanController
- `app/Models` berisi Buku, Anggota, Peminjaman
- `resources/views` berisi tampilan Blade (buku, anggota, peminjaman)
- `routes/web.php` berisi route aplikasi
