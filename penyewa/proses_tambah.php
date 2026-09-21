<?php
// TETAP: seluruh file ini sama dengan proyek Rental, tidak ada yang diganti.
session_start();
require __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$noPenyewa = trim($_POST['no_penyewa'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
if ($noPenyewa === '') {
    $errors[] = "No. Penyewa wajib diisi.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO penyewa (nama, no_penyewa, alamat, no_hp)
         VALUES (:nama, :no_penyewa, :alamat, :no_hp)"
    );
    $stmt->execute([
        'nama' => $nama,
        'no_penyewa' => $noPenyewa,
        'alamat' => $alamat,
        'no_hp' => $noHp,
    ]);
} catch (PDOException $e) {
    // 23505 = pelanggaran kolom UNIQUE (no. penyewa sudah ada)
    if ($e->getCode() === '23505') {
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'No. Penyewa sudah terdaftar.'];
        header('Location: tambah.php');
        exit;
    }
    throw $e;
}

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Penyewa berhasil ditambahkan.'];
header('Location: list.php');
exit;
