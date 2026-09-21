-- Skema awal database rental_ps (PostgreSQL)  -- DIGANTI: sebelumnya "rental"
-- Buat dulu database bernama "rental_ps" (pgAdmin: klik kanan Databases > Create > Database),
-- lalu jalankan file ini di Query Tool pada database tersebut.

-- DIGANTI: tabel "kendaraan" menjadi "konsol"
CREATE TABLE IF NOT EXISTS konsol (
    id SERIAL PRIMARY KEY,
    tipe VARCHAR(10) NOT NULL CHECK (tipe IN ('PS3', 'PS4', 'PS5')),  -- DIGANTI: sebelumnya "merek VARCHAR(100)"; CHECK adalah BARU
    no_unit VARCHAR(20) NOT NULL UNIQUE,                              -- DIGANTI: sebelumnya "plat_nomor"
    jumlah_stik INTEGER NOT NULL DEFAULT 2 CHECK (jumlah_stik BETWEEN 1 AND 4), -- DIGANTI: sebelumnya "tahun INTEGER"; CHECK adalah BARU
    tarif_per_jam INTEGER NOT NULL DEFAULT 0                          -- DIGANTI: sebelumnya "tarif" (per hari)
);

-- TETAP: tabel penyewa sama seperti proyek Rental
CREATE TABLE IF NOT EXISTS penyewa (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_penyewa VARCHAR(50) NOT NULL UNIQUE,
    alamat VARCHAR(255),
    no_hp VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS konsol (
    id SERIAL PRIMARY KEY,
    tipe VARCHAR(10) NOT NULL CHECK (tipe IN ('PS3', 'PS4', 'PS5')),  
    no_unit VARCHAR(20) NOT NULL UNIQUE,                            
    jumlah_stik INTEGER NOT NULL DEFAULT 2 CHECK (jumlah_stik BETWEEN 1 AND 4),
    tarif_per_jam INTEGER NOT NULL DEFAULT 0                         
);

CREATE TABLE IF NOT EXISTS penyewa (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_penyewa VARCHAR(50) NOT NULL UNIQUE,
    alamat VARCHAR(255),
    no_hp VARCHAR(30)
);
