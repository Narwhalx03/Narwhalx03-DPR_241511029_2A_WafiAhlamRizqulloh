<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Tambah Komponen Gaji Baru</h3>
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

                <form action="<?= site_url('admin/komponengaji') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="id_komponen_gaji" class="form-label">ID Komponen</label>
                        <input type="text" class="form-control" name="id_komponen_gaji" id="id_komponen_gaji" value="<?= old('id_komponen_gaji') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nama_komponen" class="form-label">Nama Komponen</label>
                        <input type="text" class="form-control" name="nama_komponen" id="nama_komponen" value="<?= old('nama_komponen') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="Gaji Pokok">Gaji Pokok</option>
                            <option value="Tunjangan Melekat">Tunjangan Melekat</option>
                            <option value="Tunjangan Lain">Tunjangan Lain</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select">
                            <option value="Semua">Semua</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal (Rp)</label>
                        <input type="number" class="form-control" name="nominal" id="nominal" step="1000" value="<?= old('nominal') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" id="satuan" class="form-select">
                            <option value="Bulan">Bulan</option>
                            <option value="Hari">Hari</option>
                            <option value="Periode">Periode</option>
                        </select>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/komponengaji') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>