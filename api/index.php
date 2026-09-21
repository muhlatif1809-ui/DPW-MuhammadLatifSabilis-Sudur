<?php
$page_title = "Beranda";
$sembunyikan_header = true;     // BARU: Beranda tidak memakai header biasa, menunya ada di halaman ini
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalKonsol = $pdo->query("SELECT COUNT(*) FROM konsol")->fetchColumn(); // DIGANTI: $totalKendaraan -> $totalKonsol, tabel kendaraan -> konsol
$totalPenyewa = $pdo->query("SELECT COUNT(*) FROM penyewa")->fetchColumn();
?>
        <section class="mu"> <?php /* DIGANTI: sebelumnya dua <section> (banner dan Ringkasan). Kini satu bagian bergaya menu utama game */ ?>
            <h1 class="mu-judul">Rental PS</h1> <?php /* BARU: judul besar seperti layar judul game */ ?>
            <p class="mu-sub">&#9654; Press Start</p> <?php /* BARU: teks "PRESS START" */ ?>
            <div class="mu-grid"> <?php /* BARU: dua kolom, menu di kiri dan statistik di kanan */ ?>
                <nav class="mu-menu" aria-label="Menu utama"> <?php /* BARU: daftar menu utama */ ?>
                    <a class="mu-item aktif" href="<?php echo $base; ?>index.php">&#9654; Beranda</a>
                    <a class="mu-item" href="<?php echo $base; ?>konsol/list.php">Daftar Konsol</a>
                    <a class="mu-item" href="<?php echo $base; ?>penyewa/list.php">Daftar Penyewa</a>
                    <a class="mu-item" href="<?php echo $base; ?>konsol/tambah.php">+ Tambah Konsol</a>
                    <a class="mu-item" href="<?php echo $base; ?>penyewa/tambah.php">+ Tambah Penyewa</a>
                </nav>
                <div class="mu-stat"> <?php /* DIGANTI: sebelumnya tiga kartu Ringkasan. Kini panel statistik berbaris */ ?>
                    <div class="mu-baris"><span>Total Konsol</span><strong><?php echo (int) $totalKonsol; ?></strong></div>
                    <div class="mu-baris"><span>Total Penyewa</span><strong><?php echo (int) $totalPenyewa; ?></strong></div>
                    <div class="mu-baris"><span>Sedang Disewa</span><strong>0</strong></div>
                </div>
            </div>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>