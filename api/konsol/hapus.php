<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

// Hanya menerima permintaan POST (bukan lewat alamat di browser).
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'ID konsol tidak valid.']; // DIGANTI: sebelumnya "ID kendaraan tidak valid."
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM konsol WHERE id = :id"); // DIGANTI: sebelumnya tabel kendaraan
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Konsol berhasil dihapus.']; // DIGANTI: sebelumnya "Kendaraan berhasil dihapus."
} else {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Data konsol tidak ditemukan.']; // DIGANTI: sebelumnya "Data kendaraan tidak ditemukan."
}

header('Location: list.php');
exit;
