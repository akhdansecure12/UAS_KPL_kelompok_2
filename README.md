# Login Security System

Sistem login dan registrasi berbasis PHP dengan fitur keamanan dasar (session security, security headers, dan pengelolaan password).

## Fitur

- Registrasi & login user
- Manajemen session yang aman (`httponly`, `samesite`)
- Security headers (X-Frame-Options, X-XSS-Protection, dll)
- Update password
- Dashboard & profil user

## Teknologi

- PHP
- MySQL / MariaDB
- HTML & CSS

## Cara Install & Menjalankan

### 1. Persiapan

Pastikan sudah terinstall:
- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)

### 2. Clone repository

```bash
git clone https://github.com/akhdansecure12/UAS_KPL_kelompok_2.git
```

Lalu pindahkan folder hasil clone ke:
```
C:\xampp\htdocs\login_security
```

### 3. Buat database

1. Jalankan **Apache** dan **MySQL** di XAMPP Control Panel
2. Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
3. Buat database baru bernama `db_security`
4. Klik tab **Import**, pilih file `database.sql` dari folder project, lalu klik **Go**

### 4. Konfigurasi koneksi database

Buka file `koneksi.php`, pastikan pengaturan berikut sesuai dengan environment Anda (default sudah sesuai untuk XAMPP lokal):

```php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_security";
```

### 5. Jalankan aplikasi

Buka browser dan akses:
```
http://localhost/login_security/index.php
```

## Struktur File

| File | Fungsi |
|---|---|
| `index.php` | Halaman login |
| `register.php` / `register_process.php` | Halaman & proses registrasi |
| `login_process.php` | Proses autentikasi login |
| `dashboard.php` | Halaman utama setelah login |
| `profile.php` | Halaman profil user |
| `update_password.php` | Ubah password |
| `logout.php` | Logout & hapus session |
| `koneksi.php` | Koneksi ke database |
| `style.css` | Styling tampilan |
| `database.sql` | Struktur tabel database |

## Catatan

Project ini dibuat untuk keperluan tugas (UAS KPL Kelompok 2). Kredensial database default mengikuti konfigurasi standar XAMPP (`root` tanpa password) dan hanya ditujukan untuk environment lokal/development.
