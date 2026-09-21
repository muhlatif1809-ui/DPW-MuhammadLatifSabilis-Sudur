<?php
$page_title = "Daftar Konsol"; // DIGANTI: sebelumnya "Daftar Kendaraan"
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarKonsol = $pdo->query("SELECT * FROM konsol ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC); // DIGANTI: $daftarKendaraan -> $daftarKonsol, tabel kendaraan -> konsol
?>
        <section>
            <h2>Daftar Konsol</h2> <?php /* DIGANTI: sebelumnya "Daftar Kendaraan" */ ?>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Konsol</label> <?php /* DIGANTI: sebelumnya "Cari Kendaraan" */ ?>
                <input type="text" id="search-input" placeholder="Ketik tipe atau nomor unit..."> <?php /* DIGANTI: sebelumnya "Ketik merek atau plat nomor..." */ ?>
            </div>

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Tipe</th> <?php /* DIGANTI: sebelumnya "Merek" */ ?>
                        <th>No. Unit</th> <?php /* DIGANTI: sebelumnya "Plat Nomor" */ ?>
                        <th>Jumlah Stik</th> <?php /* DIGANTI: sebelumnya "Tahun" */ ?>
                        <th>Tarif / Jam</th> <?php /* DIGANTI: sebelumnya "Tarif / Hari" */ ?>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarKonsol)): ?> <?php /* DIGANTI: sebelumnya $daftarKendaraan */ ?>
                    <tr>
                        <td colspan="5">Belum ada data konsol. Silakan tambah lewat menu "Tambah Konsol".</td> <?php /* DIGANTI: sebelumnya "data kendaraan" dan "Tambah Kendaraan" */ ?>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($daftarKonsol as $konsol): ?> <?php /* DIGANTI: sebelumnya $daftarKendaraan as $kendaraan */ ?>
                        <tr>
                            <td><?php echo e($konsol['tipe']); ?></td> <?php /* DIGANTI: sebelumnya $kendaraan['merek'] */ ?>
                            <td><?php echo e($konsol['no_unit']); ?></td> <?php /* DIGANTI: sebelumnya $kendaraan['plat_nomor'] */ ?>
                            <td><?php echo e($konsol['jumlah_stik']); ?></td> <?php /* DIGANTI: sebelumnya $kendaraan['tahun'] */ ?>
                            <td>Rp <?php echo number_format((int) $konsol['tarif_per_jam'], 0, ',', '.'); ?></td> <?php /* DIGANTI: sebelumnya $kendaraan['tarif'] */ ?>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus"
                                    data-id="<?php echo (int) $konsol['id']; ?>" <?php /* DIGANTI: sebelumnya $kendaraan['id'] */ ?>
                                    data-nama="<?php echo e($konsol['tipe'] . ' (' . $konsol['no_unit'] . ')'); ?>" <?php /* DIGANTI: sebelumnya merek + plat_nomor */ ?>
                                    data-action="hapus.php">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
