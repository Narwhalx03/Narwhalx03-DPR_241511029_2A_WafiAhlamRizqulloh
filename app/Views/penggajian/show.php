<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Kelola Gaji untuk: <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?></h3>
                <p class="text-muted mb-0">Jabatan: <?= esc($anggota['jabatan']) ?></p>
            </div>
            <div class="card-body">
                <h4>Komponen Gaji Saat Ini</h4>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nama Komponen</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($komponen_dimiliki)): ?>
                            <?php foreach($komponen_dimiliki as $komponen): ?>
                            <tr>
                                <td><?= esc($komponen['nama_komponen']) ?></td>
                                <td>Rp <?= number_format($komponen['nominal'], 2, ',', '.') ?></td>
                                <td>
                                    <form action="#" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="3" class="text-center">Belum ada komponen gaji yang ditambahkan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <hr>
                
                <h4>Tambah Komponen Gaji</h4>
                <form action="#" method="post">
                    <p>Fitur tambah komponen akan dibuat selanjutnya.</p>
                </form>

            </div>
        </div>
    </div>
<?= $this->endSection() ?>