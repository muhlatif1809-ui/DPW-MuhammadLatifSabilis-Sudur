<?php
// TETAP: seluruh file ini sama dengan proyek Rental, tidak ada yang diganti.
session_start();
require __DIR__ . '/../../includes/koneksi.php';

// Hanya menerima permintaan POST (bukan lewat alamat di browser).
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'ID penyewa tidak valid.'];
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM penyewa WHERE id = :id");
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Penyewa berhasil dihapus.'];
} else {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Data penyewa tidak ditemukan.'];
}

header('Location: list.php');
exit;
