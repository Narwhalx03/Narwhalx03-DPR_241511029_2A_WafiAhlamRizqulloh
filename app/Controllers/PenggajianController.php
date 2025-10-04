<?php
namespace App\Controllers;

use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    public function index()
    {
        $model = new PenggajianModel();
        $data = [
            'title'       => 'Data Penggajian Anggota',
            'penggajian'  => $model->getGajiAnggota()
        ];
        return view('penggajian/index', $data);
    }
}