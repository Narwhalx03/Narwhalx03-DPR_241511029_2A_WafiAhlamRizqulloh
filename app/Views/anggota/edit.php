<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Edit Anggota</h3>
            </div>
            <div class="card-body">
                <?php if(session()->has('errors')): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

               <form action="<?= site_url('admin/anggota/'.$anggota['id_anggota']) ?>" method="post">
                 <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">ID Anggota</label>
                        <input type="text" class="form-control" name="id_anggota" id="id_anggota" value="<?= old('id_anggota', $anggota['id_anggota']) ?>" readonly>
                        <small class="text-muted">ID Anggota tidak dapat diubah.</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gelar_depan" class="form-label">Gelar Depan</label>
                            <input type="text" class="form-control" name="gelar_depan" id="gelar_depan" value="<?= old('gelar_depan', $anggota['gelar_depan']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                            <input type="text" class="form-control" name="gelar_belakang" id="gelar_belakang" value="<?= old('gelar_belakang', $anggota['gelar_belakang']) ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?= old('nama_depan', $anggota['nama_depan']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="<?= old('nama_belakang', $anggota['nama_belakang']) ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-select">
                                <option value="Ketua" <?= old('jabatan', $anggota['jabatan']) == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                                <option value="Wakil Ketua" <?= old('jabatan', $anggota['jabatan']) == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                                <option value="Anggota" <?= old('jabatan', $anggota['jabatan']) == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                            <select name="status_pernikahan" id="status_pernikahan" class="form-select">
                                <option value="Kawin" <?= old('status_pernikahan', $anggota['status_pernikahan']) == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                                <option value="Belum Kawin" <?= old('status_pernikahan', $anggota['status_pernikahan']) == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                <option value="Cerai Hidup" <?= old('status_pernikahan', $anggota['status_pernikahan']) == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                                <option value="Cerai Mati" <?= old('status_pernikahan', $anggota['status_pernikahan']) == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                            <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" min="0" value="<?= old('jumlah_anak', $anggota['jumlah_anak']) ?>">
                        </div>
                    </div>
                    
                    <hr>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('admin/anggota') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>