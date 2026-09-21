<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

$tipe = trim($_POST['tipe'] ?? '');                                // DIGANTI: sebelumnya $merek dari 'merek'
$noUnit = strtoupper(trim($_POST['no_unit'] ?? ''));               // DIGANTI: sebelumnya $platNomor dari 'plat_nomor'
$jumlahStik = $_POST['jumlah_stik'] ?? '';                         // DIGANTI: sebelumnya $tahun dari 'tahun'
$tarif = $_POST['tarif_per_jam'] ?? '';                            // DIGANTI: sebelumnya dari 'tarif'
$tipeValid = ['PS3', 'PS4', 'PS5'];                                // BARU: daftar tipe konsol yang diizinkan

// Validasi server-side — wajib ada meski sudah divalidasi JavaScript,
// karena validasi client bisa dilewati (nonaktifkan JS / kirim request manual).
$errors = [];
if (!in_array($tipe, $tipeValid, true)) {                          // DIGANTI: sebelumnya cek $merek === ''
    $errors[] = "Tipe konsol harus PS3, PS4, atau PS5.";           // DIGANTI: sebelumnya "Merek wajib diisi."
}
if ($noUnit === '') {                                              // DIGANTI: sebelumnya $platNomor === ''
    $errors[] = "No. unit wajib diisi.";                           // DIGANTI: sebelumnya "Plat nomor wajib diisi."
}
if (!is_numeric($jumlahStik) || $jumlahStik < 1 || $jumlahStik > 4) { // DIGANTI: sebelumnya validasi tahun 1990 sampai tahun ini
    $errors[] = "Jumlah stik harus di antara 1-4.";                // DIGANTI: sebelumnya pesan tahun
}
if (!is_numeric($tarif) || $tarif < 0) {
    $errors[] = "Tarif tidak boleh negatif.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO konsol (tipe, no_unit, jumlah_stik, tarif_per_jam)
         VALUES (:tipe, :no_unit, :jumlah_stik, :tarif_per_jam)"     // DIGANTI: tabel dan kolom (sebelumnya kendaraan: merek, plat_nomor, tahun, tarif)
    );
    $stmt->execute([
        'tipe' => $tipe,                                           // DIGANTI: sebelumnya 'merek'
        'no_unit' => $noUnit,                                      // DIGANTI: sebelumnya 'plat_nomor'
        'jumlah_stik' => (int) $jumlahStik,                        // DIGANTI: sebelumnya 'tahun'
        'tarif_per_jam' => (int) $tarif,                           // DIGANTI: sebelumnya 'tarif'
    ]);
} catch (PDOException $e) {
    // 23505 = pelanggaran kolom UNIQUE (no. unit sudah ada)
    if ($e->getCode() === '23505') {
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'No. unit sudah terdaftar.']; // DIGANTI: sebelumnya "Plat nomor sudah terdaftar."
        header('Location: tambah.php');
        exit;
    }
    throw $e;
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Konsol berhasil ditambahkan.']; // DIGANTI: sebelumnya "Kendaraan berhasil ditambahkan."
header('Location: list.php');
exit;
