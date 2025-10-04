<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <style>
        .action-btn a, .action-btn button { display: inline-block; padding: 5px 10px; color: white; text-decoration: none; border-radius: 4px; font-size: 0.9em; margin-right: 5px; border: none; cursor: pointer; }
        .btn-update { background-color: #ffc107; color: #000; }
        .btn-delete { background-color: #dc3545; }
        .btn-add { background-color: #198754; color:white; }
        .alert { padding: 1rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .375rem; }
        .alert-success { color: #0f5132; background-color: #d1e7dd; border-color: #badbcc; }
    </style>

    <div class="header"><h1>Kelola Anggota DPR</h1></div>

    <div class="card">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <a href="<?= site_url('admin/anggota/new') ?>" class="btn btn-add">Tambah Anggota Baru</a>
        <form action="<?= site_url('admin/anggota') ?>" method="get" style="float:right; display:flex; gap:10px;">
            <input type="text" name="search" placeholder="Cari..." class="form-control" value="<?= esc($search ?? '') ?>">
            <button type="submit" class="btn">Cari</button>
        </form>
        <br><br>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Status Pernikahan</th> 
            <th>Jumlah Anak</th>       
            <th>Aksi</th>
            </tr>
        </thead>
            <tbody>
                <?php if (!empty($anggota)): ?>
                    <?php foreach($anggota as $item): ?>
                    <tr>
                        <td><?= esc($item['id_anggota']) ?></td>
                        <td><?= esc(trim($item['gelar_depan'].' '.$item['nama_depan'].' '.$item['nama_belakang'].', '.$item['gelar_belakang'], ' ,')) ?></td>
                        <td><?= esc($item['jabatan']) ?></td>
                        <td><?= esc($item['status_pernikahan']) ?></td> 
                        <td><?= esc($item['jumlah_anak']) ?></td>
                        <td class="action-btn">
                            <!-- LINK UPDATE YANG BENAR -->
                            <a href="<?= site_url('admin/anggota/'.$item['id_anggota'].'/edit') ?>" class="btn-update">Update</a>
                            
                            <!-- FORM DELETE YANG BENAR -->
                            <form action="<?= site_url('admin/anggota/'.$item['id_anggota']) ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">Data tidak ditemukan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>