| Data | Keterangan |
|---|---|
| Mata Kuliah | Desain Pemograman web |
| NIM | 25410702035 |
| Nama | Muhammad Latif Sabilis Sudur |
| Kelas | TI - 2D |
| Repository | [Link Repository]( https://github.com/muhlatif1809-ui/DPW-2026-MuhammadLatifSabilisSudur/tree/main/Jobsheet-08 ) |

## Struktur File
```java
Jobsheet-08/
├── anggota/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── buku/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── docs/
│   └── wireframe.md
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
├── sql/
│   └── 01_buku_anggota.sql
└── index.php
└── Report.md
```

## Ringkasan
Jobsheet 8 melanjutkan SIMPUS-Mini dengan memindahkan penyimpanan data buku dan anggota dari $_SESSION ke database PostgreSQL simpus_mini. File koneksi.php menghubungkan PHP ke database lewat PDO, dan 01_buku_anggota.sql membuat tabel buku dan anggota. Setelah divalidasi di sisi server, data disimpan dengan INSERT memakai prepared statement, lalu ditampilkan dengan SELECT di halaman daftar, sedangkan Beranda menghitung totalnya dengan COUNT(*). Akibatnya, data bersifat permanen dan tidak hilang saat browser ditutup atau server dimatikan. Keterbatasannya, tombol Edit, Detail, dan Hapus belum terhubung ke database.