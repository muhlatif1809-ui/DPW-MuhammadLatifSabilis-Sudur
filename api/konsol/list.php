<?php
$page_title = "Daftar Konsol";
$aksi_url = "konsol/tambah.php"; // BARU: tombol aksi di bar atas, menuju halaman Tambah Konsol
$aksi_label = "+ Konsol";        // BARU: tulisan tombol aksi
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarKonsol = $pdo->query("SELECT * FROM konsol ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
        <section>
            <h2>Daftar Konsol</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Konsol</label>
                <input type="text" id="search-input" placeholder="Ketik tipe atau nomor unit...">
            </div>

            <div class="daftar-menu"> <?php /* DIGANTI: sebelumnya <div class="table-responsive"> berisi <table>. Kini daftar berbaris seperti menu game */ ?>
                <?php if (empty($daftarKonsol)): ?>
                    <p class="kosong">Belum ada data konsol. Silakan tambah lewat tombol "+ Konsol".</p> <?php /* DIGANTI: sebelumnya baris tabel dengan colspan="5" */ ?>
                <?php else: ?>
                    <?php foreach ($daftarKonsol as $konsol): ?>
                    <div class="baris"> <?php /* DIGANTI: sebelumnya <tr> dengan lima <td> */ ?>
                        <div class="baris-info"> <?php /* BARU: bagian kiri baris berisi nama dan detail */ ?>
                            <p class="baris-nama"><?php echo e($konsol['no_unit']); ?> &middot; <?php echo e($konsol['tipe']); ?></p> <?php /* DIGANTI: sebelumnya kolom Tipe dan No. Unit terpisah */ ?>
                            <p class="baris-detail"><?php echo e($konsol['jumlah_stik']); ?> stik &middot; Rp <?php echo number_format((int) $konsol['tarif_per_jam'], 0, ',', '.'); ?> / jam</p> <?php /* DIGANTI: sebelumnya kolom Jumlah Stik dan Tarif / Jam terpisah */ ?>
                        </div>
                        <div class="baris-aksi"> <?php /* DIGANTI: sebelumnya <td> berisi tombol */ ?>
                            <button type="button">Edit</button>
                            <button type="button" class="btn-hapus"
                                data-id="<?php echo (int) $konsol['id']; ?>"
                                data-nama="<?php echo e($konsol['tipe'] . ' (' . $konsol['no_unit'] . ')'); ?>"
                                data-action="hapus.php">Hapus</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>