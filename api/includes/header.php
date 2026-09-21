<?php
session_start();

// Menampilkan teks dengan aman di HTML (mencegah XSS).
function e($teks)
{
    return htmlspecialchars((string) $teks, ENT_QUOTES, 'UTF-8');
}

// BARU: penanda halaman aktif untuk menu. Membaca $page_title yang diisi tiap halaman.
function kelasAktif($judul)
{
    global $page_title;                           // BARU: judul halaman yang sedang dibuka
    return (isset($page_title) && $page_title === $judul) ? ' class="aktif" aria-current="page"' : ''; // BARU
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
                <li class="nav-seg"> <?php /* BARU: wadah segmented untuk tiga tautan */ ?>
                    <ul> <?php /* BARU: daftar tiga tautan di dalam wadah */ ?>
                        <li><a<?php echo kelasAktif('Beranda'); ?> href="<?php echo $base; ?>index.php">Beranda</a></li> <?php /* DIUBAH: ditambah penanda halaman aktif */ ?>
                        <li><a<?php echo kelasAktif('Daftar Konsol'); ?> href="<?php echo $base; ?>konsol/list.php">Daftar Konsol</a></li> <?php /* DIUBAH: ditambah penanda halaman aktif */ ?>
                        <li><a<?php echo kelasAktif('Daftar Penyewa'); ?> href="<?php echo $base; ?>penyewa/list.php">Daftar Penyewa</a></li> <?php /* DIUBAH: ditambah penanda halaman aktif */ ?>
                    </ul>
                </li>
                <li class="nav-sep" aria-hidden="true"></li> <?php /* TETAP: garis pemisah antara tautan dan tombol */ ?>
                <li><a class="nav-btn" href="<?php echo $base; ?>konsol/tambah.php">+ Konsol</a></li> <?php /* TETAP: tombol + Konsol */ ?>
                <li><a class="nav-btn" href="<?php echo $base; ?>penyewa/tambah.php">+ Penyewa</a></li> <?php /* TETAP: tombol + Penyewa */ ?>
            </ul>
        </nav>
    </header>

    <main>