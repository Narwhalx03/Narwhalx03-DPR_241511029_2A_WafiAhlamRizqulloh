<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="header">
        <h1>Tambah Anggota Baru</h1>
    </div>

    <div class="card">
        <?php if(session()->has('errors')): ?>
            <div class="alert alert-error">
                <ul style="margin:0; padding-left:20px;">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= site_url('admin/anggota') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="id_anggota">ID Anggota</label>
                <input type="text" name="id_anggota" id="id_anggota" value="<?= old('id_anggota') ?>">
            </div>

            <div class="form-group">
                <label for="gelar_depan">Gelar Depan</label>
                <input type="text" name="gelar_depan" id="gelar_depan" value="<?= old('gelar_depan') ?>">
            </div>

            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" value="<?= old('nama_depan') ?>">
            </div>

            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" value="<?= old('nama_belakang') ?>">
            </div>

            <div class="form-group">
                <label for="gelar_belakang">Gelar Belakang</label>
                <input type="text" name="gelar_belakang" id="gelar_belakang" value="<?= old('gelar_belakang') ?>">
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan">
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status_pernikahan">Status Pernikahan</label>
                <select name="status_pernikahan" id="status_pernikahan">
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_anak">Jumlah Anak</label>
                <input type="number" name="jumlah_anak" id="jumlah_anak" min="0" value="<?= old('jumlah_anak', 0) ?>">
            </div>
            
            <br>
            <button type="submit" class="btn">Simpan</button>
            <a href="<?= site_url('admin/anggota') ?>" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
<?= $this->endSection() ?>