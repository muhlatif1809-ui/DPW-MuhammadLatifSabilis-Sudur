<?php
session_start();

// Menampilkan teks dengan aman di HTML (mencegah XSS).
function e($teks)
{
    return htmlspecialchars((string) $teks, ENT_QUOTES, 'UTF-8');
}

// Prefix relatif ke root proyek ini (bukan root domain) — supaya
// /assets, /index.php, dst tetap benar walau proyek diakses lewat subfolder.
$__projectRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__projectRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);

// DIHAPUS: fungsi kelasAktif() (penanda halaman aktif untuk menu header). Menu header sudah tidak dipakai.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental PS<?php echo isset($page_title) ? ' | ' . e($page_title) : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body> <?php /* DIGANTI: sebelumnya <body class="..."> opsional. Latar gelap kini berlaku di semua halaman lewat CSS */ ?>
    <?php if (empty($sembunyikan_header)): ?> <?php /* TETAP: Beranda mengisi $sembunyikan_header = true agar bar ini tidak tampil */ ?>
    <header class="gbar"> <?php /* DIGANTI: sebelumnya header toska berisi nama aplikasi, menu navigasi, dan tombol hamburger. Kini bar tipis bergaya game */ ?>
        <a class="gbar-kembali" href="<?php echo $base; ?>index.php">&#9664; Menu Utama</a> <?php /* BARU: tautan kembali ke Beranda */ ?>
        <?php if (!empty($aksi_url)): ?> <?php /* BARU: tombol aksi muncul jika halaman mengisi $aksi_url */ ?>
        <a class="gbar-aksi" href="<?php echo $base . $aksi_url; ?>"><?php echo e($aksi_label ?? ''); ?></a> <?php /* BARU: contoh "+ Konsol" */ ?>
        <?php endif; ?>
    </header>
    <?php endif; ?>

    <main>