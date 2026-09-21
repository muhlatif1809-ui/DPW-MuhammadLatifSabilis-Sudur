<?php
$page_title = "Beranda";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$totalKonsol = $pdo->query("SELECT COUNT(*) FROM konsol")->fetchColumn(); // DIGANTI: $totalKendaraan -> $totalKonsol, tabel kendaraan -> konsol
$totalPenyewa = $pdo->query("SELECT COUNT(*) FROM penyewa")->fetchColumn();
?>
        <section>
            <h2>Selamat Datang di Rental PS</h2> <?php /* DIGANTI: sebelumnya "Selamat Datang di Rental" */ ?>
            <p>Aplikasi sederhana untuk mengelola data konsol PlayStation dan penyewa.</p> <?php /* DIGANTI: sebelumnya "data kendaraan dan penyewa" */ ?>
        </section>

        <section>
            <h2>Ringkasan</h2>
            <article>
                <h3>Total Konsol</h3> <?php /* DIGANTI: sebelumnya "Total Kendaraan" */ ?>
                <p><?php echo (int) $totalKonsol; ?></p> <?php /* DIGANTI: sebelumnya $totalKendaraan */ ?>
            </article>
            <article>
                <h3>Total Penyewa</h3>
                <p><?php echo (int) $totalPenyewa; ?></p>
            </article>
            <article>
                <h3>Sedang Disewa</h3>
                <p>0</p>
            </article>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
