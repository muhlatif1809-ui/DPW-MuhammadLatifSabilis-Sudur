<?php
$page_title = "Daftar Penyewa";
$aksi_url = "penyewa/tambah.php"; // BARU: tombol aksi di bar atas, menuju halaman Tambah Penyewa
$aksi_label = "+ Penyewa";        // BARU: tulisan tombol aksi
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarPenyewa = $pdo->query("SELECT * FROM penyewa ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
        <section>
            <h2>Daftar Penyewa</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Nama Penyewa</label>
                <input type="text" id="search-input" placeholder="Ketik nama penyewa...">
            </div>

            <div class="daftar-menu"> <?php /* DIGANTI: sebelumnya <div class="table-responsive"> berisi <table>. Kini daftar berbaris seperti menu game */ ?>
                <?php if (empty($daftarPenyewa)): ?>
                    <p class="kosong">Belum ada data penyewa. Silakan tambah lewat tombol "+ Penyewa".</p> <?php /* DIGANTI: sebelumnya baris tabel dengan colspan="5" */ ?>
                <?php else: ?>
                    <?php foreach ($daftarPenyewa as $penyewa): ?>
                    <div class="baris"> <?php /* DIGANTI: sebelumnya <tr> dengan lima <td> */ ?>
                        <div class="baris-info"> <?php /* BARU: bagian kiri baris berisi nama dan detail */ ?>
                            <p class="baris-nama"><?php echo e($penyewa['no_penyewa']); ?> &middot; <?php echo e($penyewa['nama']); ?></p> <?php /* DIGANTI: sebelumnya kolom No. Penyewa dan Nama terpisah */ ?>
                            <p class="baris-detail"><?php echo e($penyewa['alamat'] ?: '-'); ?> &middot; <?php echo e($penyewa['no_hp'] ?: '-'); ?></p> <?php /* DIGANTI: sebelumnya kolom Alamat dan No. HP terpisah. Tanda "-" jika kosong */ ?>
                        </div>
                        <div class="baris-aksi"> <?php /* DIGANTI: sebelumnya <td> berisi tombol */ ?>
                            <button type="button">Edit</button>
                            <button type="button" class="btn-hapus"
                                data-id="<?php echo (int) $penyewa['id']; ?>"
                                data-nama="<?php echo e($penyewa['nama']); ?>"
                                data-action="hapus.php">Hapus</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
