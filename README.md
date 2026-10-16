# MVC PHP Native - Data Buku
 
Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller
pada PHP Native.
 
## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git
 
## Instalasi
1. Clone atau salin project ke folder web server (htdocs atau www).
2. Import database/perpustakaan.sql lewat phpMyAdmin.
3. Sesuaikan koneksi pada config/database.php.
4. Buka http://localhost/mvc-buku/public/index.php
 
## Struktur Folder
- app/models/      : akses dan operasi data
- app/controllers/ : alur request, memanggil Model dan View
- app/views/       : tampilan HTML
- config/          : konfigurasi koneksi database
- database/        : skema dan data awal SQL
- public/          : entry point dan aset (CSS)
 
## Fitur
- Menampilkan, menambah, mengubah, dan menghapus data buku
- Validasi input dan pesan berhasil atau gagal
 
