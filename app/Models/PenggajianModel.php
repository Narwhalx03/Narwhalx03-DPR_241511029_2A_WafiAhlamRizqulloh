<?php
namespace App\Models;
use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    protected $primaryKey       = ['id_komponen_gaji', 'id_anggota'];
    protected $allowedFields    = ['id_komponen_gaji', 'id_anggota'];

    /**
     * Fungsi utama untuk mengambil daftar anggota beserta kalkulasi Take Home Pay.
     * Logika perhitungan dipindahkan sepenuhnya ke SQL untuk keakuratan.
     */
    public function getGajiAnggota()
    {
        $sql = "
            SELECT
                a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan,
                SUM(
                    CASE
                        -- Aturan Tunjangan Istri/Suami: hanya jika status 'Kawin'
                        WHEN kg.nama_komponen = 'Tunjangan Istri/Suami' AND a.status_pernikahan = 'Kawin'
                            THEN kg.nominal
                        WHEN kg.nama_komponen = 'Tunjangan Istri/Suami' AND a.status_pernikahan != 'Kawin'
                            THEN 0
                        
                        -- Aturan Tunjangan Anak: hanya jika punya anak, maksimal 2
                        WHEN kg.nama_komponen = 'Tunjangan Anak' AND a.jumlah_anak > 0
                            THEN kg.nominal * LEAST(a.jumlah_anak, 2)
                        WHEN kg.nama_komponen = 'Tunjangan Anak' AND (a.jumlah_anak = 0 OR a.jumlah_anak IS NULL)
                            THEN 0

                        -- Aturan untuk komponen bulanan lainnya
                        WHEN kg.satuan = 'Bulan'
                            THEN kg.nominal
                        
                        -- Komponen non-bulanan tidak dihitung
                        ELSE 0
                    END
                ) as take_home_pay
            FROM
                anggota a
            LEFT JOIN
                penggajian p ON a.id_anggota = p.id_anggota
            LEFT JOIN
                komponen_gaji kg ON p.id_komponen_gaji = kg.id_komponen_gaji
            GROUP BY
                a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan
        ";

        return $this->db->query($sql)->getResultArray();
    }
}