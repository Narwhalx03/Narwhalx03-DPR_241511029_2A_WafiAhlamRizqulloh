<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Kelola Komponen Gaji & Tunjangan</h3>
                <form action="<?= site_url('admin/komponengaji') ?>" method="get" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari..." value="<?= esc($search ?? '') ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <a href="<?= site_url('admin/komponengaji/new') ?>" class="btn btn-success mb-3">Tambah Komponen Baru</a>
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Komponen</th>
                                <th>Kategori</th>
                                <th>Jabatan</th>
                                <th>Nominal</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($komponen)): ?>
                                <?php foreach ($komponen as $item): ?>
                                <tr>
                                    <td><?= esc($item['id_komponen_gaji']) ?></td>
                                    <td><?= esc($item['nama_komponen']) ?></td>
                                    <td><?= esc($item['kategori']) ?></td>
                                    <td><?= esc($item['jabatan']) ?></td>
                                    <td>Rp <?= number_format($item['nominal'], 2, ',', '.') ?></td>
                                    <td><?= esc($item['satuan']) ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/komponengaji/'.$item['id_komponen_gaji'].'/edit') ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?= site_url('admin/komponengaji/'.$item['id_komponen_gaji']) ?>" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>