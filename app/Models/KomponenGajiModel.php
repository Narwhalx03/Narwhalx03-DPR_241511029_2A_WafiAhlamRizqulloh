<?php
namespace App\Models;
use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen_gaji';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_komponen_gaji', 'nama_komponen', 'kategori', 
        'jabatan', 'nominal', 'satuan'
    ];

    public function search($keyword)
    {
        return $this->like('nama_komponen', $keyword)
                    ->orLike('kategori', $keyword)
                    ->orLike('jabatan', $keyword)
                    ->orLike('nominal', $keyword)
                    ->orLike('satuan', $keyword)
                    ->orLike('id_komponen_gaji', $keyword)
                    ->findAll();
    }
}