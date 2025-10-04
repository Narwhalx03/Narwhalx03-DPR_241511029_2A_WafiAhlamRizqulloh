<?php
namespace App\Models;
use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table            = 'anggota';
    protected $primaryKey       = 'id_anggota';
    protected $useAutoIncrement = false; // Karena kita menggunakan ID manual
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_anggota', 'nama_depan', 'nama_belakang', 'gelar_depan', 
        'gelar_belakang', 'jabatan', 'status_pernikahan', 'jumlah_anak'
    ];

    /**
     * Fungsi untuk pencarian multi-kolom
     */
    public function search($keyword)
    {
        $builder = $this->table('anggota');
        $builder->like('nama_depan', $keyword);
        $builder->orLike('nama_belakang', $keyword);
        $builder->orLike('jabatan', $keyword);
        $builder->orLike('id_anggota', $keyword);
        return $builder->get()->getResultArray();
    }
}