<?php
namespace App\Models;
use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    
    // Kita set false karena ID di data awal Anda diisi manual
    protected $useAutoIncrement = false; 
    
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_pengguna', 
        'username', 
        'password', 
        'email', 
        'nama_depan', 
        'nama_belakang', 
        'role'
    ];
}