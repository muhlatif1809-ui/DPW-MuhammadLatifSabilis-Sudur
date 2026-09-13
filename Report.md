| Data | Keterangan |
|---|---|
| Mata Kuliah | Desain Pemograman web |
| NIM | 25410702035 |
| Nama | Muhammad Latif Sabilis Sudur |
| Kelas | TI - 2D |
| Repository | [Link Repository]( https://github.com/muhlatif1809-ui/DPW-MuhammadLatifSabilis-Sudur ) |

## Struktur File
``` java
Jobsheet-05/
├── anggota/
│   ├── list.html
│   └── tambah.html
├── assets/
│   ├── css/style.css
│   └── js/app.js
├── buku/
│   ├── list.html
│   └── tambah.html
├── data/
│   ├── anggota.json
│   └── buku.json
├── docs/
│   └── wireframe.md
└── index.html
```


## Ringkasan

Repository ini merupakan versi terpisah dari project SIMPUS-Mini (Sistem Perpustakaan Mini) yang dibuat khusus untuk keperluan deployment ke Vercel, sehingga tidak tercampur dengan repository utama tugas per-jobsheet. Struktur file yang digunakan tetap sama seperti pada Jobsheet-05, terdiri dari halaman index.html sebagai beranda, folder anggota dan buku yang masing-masing memiliki halaman list.html untuk menampilkan data dan tambah.html untuk menambahkan data baru, folder assets yang menyimpan file styling dan JavaScript, folder data yang berisi file JSON sebagai sumber data buku dan anggota, serta folder docs yang menyimpan dokumen wireframe.

Pada versi ini, data buku dan anggota tidak lagi ditulis langsung di dalam HTML, melainkan diambil secara asinkron dari file anggota.json dan buku.json menggunakan fetch di dalam file anggota.js dan buku.js. Pendekatan ini membuat data lebih mudah dikelola karena cukup mengubah file JSON tanpa perlu menyentuh struktur HTML, sekaligus melatih penerapan konsep asynchronous JavaScript seperti async/await dan penanganan error saat proses pengambilan data gagal.

Repository ini kemudian dihubungkan ke akun GitHub dan di-deploy melalui Vercel agar aplikasi dapat diakses secara online tanpa perlu menjalankan server lokal. Proses ini mencakup pembuatan repository baru di GitHub, push project dari lokal menggunakan Git, hingga proses import dan konfigurasi project di Vercel untuk menghasilkan tautan deployment yang dapat dibagikan.