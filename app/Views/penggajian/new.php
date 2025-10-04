<?= $this->extend('layout/admin_template_dpr') ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Buat Data Penggajian Baru</h3>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/penggajian') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">1. Pilih Anggota</label>
                        <select name="id_anggota" id="id_anggota" class="form-select" required>
                            <option value="">-- Pilih Anggota --</option>
                            <?php foreach ($anggota as $item): ?>
                                <option value="<?= $item['id_anggota'] ?>" data-jabatan="<?= $item['jabatan'] ?>">
                                    <?= esc($item['nama_depan'] . ' ' . $item['nama_belakang']) ?> (<?= esc($item['jabatan']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="komponen-gaji-wrapper" class="mt-4" style="display: none;">
                        <label class="form-label">2. Pilih Komponen Gaji yang Akan Ditambahkan</label>
                        <div id="komponen-gaji-list" class="border p-3 rounded">
                            <p class="text-muted">Pilih anggota terlebih dahulu.</p>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <button type="submit" class="btn btn-primary">Simpan Penggajian</button>
                    <a href="<?= site_url('admin/penggajian') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const anggotaSelect = document.getElementById('id_anggota');
    const komponenWrapper = document.getElementById('komponen-gaji-wrapper');
    const komponenList = document.getElementById('komponen-gaji-list');

    anggotaSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const anggotaId = this.value;

        if (anggotaId) {
            const jabatan = selectedOption.dataset.jabatan;
            komponenList.innerHTML = '<p>Memuat...</p>';
            komponenWrapper.style.display = 'block';

            fetch(`<?= site_url('admin/penggajian/get_komponen/') ?>${jabatan}/${anggotaId}`)
                .then(response => response.json())
                .then(data => {
                    komponenList.innerHTML = ''; // Kosongkan daftar
                    if(data.success && data.komponen.length > 0) {
                        data.komponen.forEach(item => {
                            const checkboxDiv = document.createElement('div');
                            checkboxDiv.className = 'form-check';
                            checkboxDiv.innerHTML = `
                                <input class="form-check-input" type="checkbox" name="komponen_ids[]" value="${item.id_komponen_gaji}" id="komp-${item.id_komponen_gaji}">
                                <label class="form-check-label" for="komp-${item.id_komponen_gaji}">
                                    ${item.nama_komponen}
                                </label>
                            `;
                            komponenList.appendChild(checkboxDiv);
                        });
                    } else {
                        komponenList.innerHTML = '<p class="text-muted">Tidak ada komponen gaji yang bisa ditambahkan untuk jabatan ini atau semua komponen sudah ditambahkan.</p>';
                    }
                });
        } else {
            komponenWrapper.style.display = 'none';
        }
    });
});
</script>
<?= $this->endSection() ?>