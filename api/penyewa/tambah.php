<?php
// TETAP: seluruh file ini sama dengan proyek Rental, tidak ada yang diganti.
$page_title = "Tambah Penyewa";
include __DIR__ . '/../../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Penyewa</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="proses_tambah.php">
                <p>
                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama" required>
                </p>
                <p>
                    <label for="no_penyewa">No. Penyewa</label><br>
                    <input type="text" id="no_penyewa" name="no_penyewa" required>
                </p>
                <p>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" id="alamat" name="alamat">
                </p>
                <p>
                    <label for="no_hp">No. HP</label><br>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
