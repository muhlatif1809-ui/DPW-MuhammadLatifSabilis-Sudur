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
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental PS<?php echo isset($page_title) ? ' | ' . e($page_title) : ''; ?></title> <?php /* DIGANTI: sebelumnya "Rental" */ ?>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>Rental PS</h1> <?php /* DIGANTI: sebelumnya "Rental" */ ?>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>konsol/list.php">Daftar Konsol</a></li> <?php /* DIUBAH: urutan pindah ke atas (tautan biasa dikelompokkan dulu) */ ?>
                <li><a href="<?php echo $base; ?>penyewa/list.php">Daftar Penyewa</a></li> <?php /* DIUBAH: urutan pindah ke atas */ ?>
                <li class="nav-sep" aria-hidden="true"></li> <?php /* BARU: garis pemisah antara tautan dan tombol */ ?>
                <li><a class="nav-btn" href="<?php echo $base; ?>konsol/tambah.php">+ Konsol</a></li> <?php /* DIGANTI: sebelumnya tautan "Tambah Konsol", kini tombol "+ Konsol" (class nav-btn) */ ?>
                <li><a class="nav-btn" href="<?php echo $base; ?>penyewa/tambah.php">+ Penyewa</a></li> <?php /* DIGANTI: sebelumnya tautan "Tambah Penyewa", kini tombol "+ Penyewa" (class nav-btn) */ ?>
            </ul>
        </nav>
    </header>

    <main>