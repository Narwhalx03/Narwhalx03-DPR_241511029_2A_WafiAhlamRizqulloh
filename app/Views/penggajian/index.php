<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Data Penggajian Anggota</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Take Home Pay (Bulanan)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($penggajian)): ?>
                                <?php foreach ($penggajian as $item): ?>
                                <tr>
                                    <td><?= esc($item['id_anggota']) ?></td>
                                    <td><?= esc(trim($item['gelar_depan'].' '.$item['nama_depan'].' '.$item['nama_belakang'].', '.$item['gelar_belakang'], ' ,')) ?></td>
                                    <td><?= esc($item['jabatan']) ?></td>
                                    <td>Rp <?= number_format($item['take_home_pay'], 2, ',', '.') ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/anggota/'.$item['id_anggota']) ?>" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center">Data penggajian tidak tersedia.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>