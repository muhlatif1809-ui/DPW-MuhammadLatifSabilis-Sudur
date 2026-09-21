<?php
$page_title = "Tambah Konsol"; // DIGANTI: sebelumnya "Tambah Kendaraan"
include __DIR__ . '/../../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Konsol</h2> <?php /* DIGANTI: sebelumnya "Tambah Kendaraan" */ ?>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="proses_tambah.php">
                <p>
                    <label for="tipe">Tipe Konsol</label><br> <?php /* DIGANTI: sebelumnya label "Merek" */ ?>
                    <select id="tipe" name="tipe" required> <?php /* DIGANTI: sebelumnya <input type="text" id="merek" name="merek"> menjadi dropdown */ ?>
                        <option value="PS3">PS3</option> <?php /* BARU */ ?>
                        <option value="PS4">PS4</option> <?php /* BARU */ ?>
                        <option value="PS5">PS5</option> <?php /* BARU */ ?>
                    </select>
                </p>
                <p>
                    <label for="no_unit">No. Unit (contoh: PS-01)</label><br> <?php /* DIGANTI: sebelumnya label "Plat Nomor" */ ?>
                    <input type="text" id="no_unit" name="no_unit" required> <?php /* DIGANTI: sebelumnya id/name "plat_nomor" */ ?>
                </p>
                <p>
                    <label for="jumlah_stik">Jumlah Stik</label><br> <?php /* DIGANTI: sebelumnya label "Tahun" */ ?>
                    <input type="number" id="jumlah_stik" name="jumlah_stik" min="1" max="4" required> <?php /* DIGANTI: sebelumnya id/name "tahun" min 1990 max tahun ini */ ?>
                </p>
                <p>
                    <label for="tarif_per_jam">Tarif per Jam (Rp)</label><br> <?php /* DIGANTI: sebelumnya "Tarif per Hari (Rp)" */ ?>
                    <input type="number" id="tarif_per_jam" name="tarif_per_jam" min="0" required> <?php /* DIGANTI: sebelumnya id/name "tarif" */ ?>
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
