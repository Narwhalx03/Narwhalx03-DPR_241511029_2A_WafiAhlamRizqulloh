<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Edit Komponen Gaji</h3>
            </div>
            <div class="card-body">
                <?php if(session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form action="<?= site_url('admin/komponengaji/'.$komponen['id_komponen_gaji']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="mb-3">
                        <label for="id_komponen_gaji" class="form-label">ID Komponen</label>
                        <input type="text" class="form-control" name="id_komponen_gaji" value="<?= old('id_komponen_gaji', $komponen['id_komponen_gaji']) ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_komponen" class="form-label">Nama Komponen</label>
                        <input type="text" class="form-control" name="nama_komponen" value="<?= old('nama_komponen', $komponen['nama_komponen']) ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="Gaji Pokok" <?= old('kategori', $komponen['kategori']) == 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
                                <option value="Tunjangan Melekat" <?= old('kategori', $komponen['kategori']) == 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
                                <option value="Tunjangan Lain" <?= old('kategori', $komponen['kategori']) == 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
                            <select name="jabatan" class="form-select">
                                <option value="Semua" <?= old('jabatan', $komponen['jabatan']) == 'Semua' ? 'selected' : '' ?>>Semua</option>
                                <option value="Ketua" <?= old('jabatan', $komponen['jabatan']) == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                                <option value="Wakil Ketua" <?= old('jabatan', $komponen['jabatan']) == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                                <option value="Anggota" <?= old('jabatan', $komponen['jabatan']) == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
                            </select>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nominal" class="form-label">Nominal (Rp)</label>
                            <input type="number" class="form-control" name="nominal" step="1000" value="<?= old('nominal', $komponen['nominal']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select name="satuan" class="form-select">
                                <option value="Bulan" <?= old('satuan', $komponen['satuan']) == 'Bulan' ? 'selected' : '' ?>>Bulan</option>
                                <option value="Hari" <?= old('satuan', $komponen['satuan']) == 'Hari' ? 'selected' : '' ?>>Hari</option>
                                <option value="Periode" <?= old('satuan', $komponen['satuan']) == 'Periode' ? 'selected' : '' ?>>Periode</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('admin/komponengaji') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>