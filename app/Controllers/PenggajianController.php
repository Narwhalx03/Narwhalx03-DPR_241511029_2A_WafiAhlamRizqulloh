<?php
namespace App\Controllers;

use App\Models\PenggajianModel;
use App\Models\AnggotaModel; // <-- Tambahkan baris ini
use App\Models\KomponenGajiModel; // <-- Tambahkan baris ini juga

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
    public function new()
    {
        $anggotaModel = new AnggotaModel();
        $data = [
            'title'   => 'Buat Penggajian Baru',
            'anggota' => $anggotaModel->findAll()
        ];
        return view('penggajian/new', $data);
    }

    /**
     * Mengambil komponen gaji yang relevan untuk seorang anggota (AJAX)
     */
    public function getKomponenByAnggota($jabatan, $anggotaId)
    {
        $komponenModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        // Ambil ID komponen yang sudah dimiliki anggota
        $existingKomponen = $penggajianModel->where('id_anggota', $anggotaId)->findColumn('id_komponen_gaji') ?? [];

        // Ambil komponen yang sesuai jabatan ('Semua' atau jabatan spesifik)
        $builder = $komponenModel->whereIn('jabatan', ['Semua', $jabatan]);
        
        // Filter agar tidak menampilkan komponen yang sudah ada
        if (!empty($existingKomponen)) {
            $builder->whereNotIn('id_komponen_gaji', $existingKomponen);
        }
        
        $komponen = $builder->findAll();
        return $this->response->setJSON(['success' => true, 'komponen' => $komponen]);
    }

    /**
     * Menyimpan data penggajian baru
     */
    public function create()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaId = $this->request->getPost('id_anggota');
        $komponenIds = $this->request->getPost('komponen_ids');

        if (empty($anggotaId) || empty($komponenIds)) {
            return redirect()->back()->with('error', 'Anggota dan minimal satu komponen gaji harus dipilih.');
        }

        foreach ($komponenIds as $komponenId) {
            $data = [
                'id_anggota'       => $anggotaId,
                'id_komponen_gaji' => $komponenId
            ];
            $penggajianModel->insert($data);
        }
        
        return redirect()->to('/admin/penggajian')->with('success', 'Komponen gaji berhasil ditambahkan untuk anggota.');
    }

}