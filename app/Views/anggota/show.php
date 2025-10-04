<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Detail Anggota DPR</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($anggota)): ?>
                    <h4><?= esc(trim($anggota['gelar_depan'].' '.$anggota['nama_depan'].' '.$anggota['nama_belakang'].', '.$anggota['gelar_belakang'], ' ,')) ?></h4>
                    <hr>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">ID Anggota</th>
                                <td><?= esc($anggota['id_anggota']) ?></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td><?= esc($anggota['jabatan']) ?></td>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <td><?= esc($anggota['status_pernikahan']) ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Anak</th>
                                <td><?= esc($anggota['jumlah_anak']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning">Data anggota tidak ditemukan.</div>
                <?php endif; ?>
                <hr>
                <a href="<?= site_url('admin/anggota') ?>" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>