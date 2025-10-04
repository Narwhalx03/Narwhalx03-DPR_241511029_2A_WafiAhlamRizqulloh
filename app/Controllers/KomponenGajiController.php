<?php
namespace App\Controllers;

use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    /**
     * Menampilkan daftar komponen gaji & hasil pencarian
     */
    public function index()
    {
        $model = new KomponenGajiModel();
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $data['komponen'] = $model->search($keyword);
        } else {
            $data['komponen'] = $model->findAll();
        }

        $data['title'] = 'Kelola Komponen Gaji';
        $data['search'] = $keyword;
        return view('komponen_gaji/index', $data);
    }

    /**
     * Menampilkan detail satu komponen (INI YANG HILANG)
     */
    public function show($id = null)
    {
        $model = new KomponenGajiModel();
        $data = [
            'title'    => 'Detail Komponen Gaji',
            'komponen' => $model->find($id)
        ];
        if (empty($data['komponen'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        return view('komponen_gaji/show', $data); // Perlu file view baru
    }

    /**
     * Menampilkan form tambah komponen gaji
     */
    public function new()
    {
        return view('komponen_gaji/new', ['title' => 'Tambah Komponen Gaji']);
    }

    /**
     * Memproses form tambah komponen gaji
     */
    public function create()
    {
        $model = new KomponenGajiModel();
        $rules = [
            'id_komponen_gaji' => 'required|is_unique[komponen_gaji.id_komponen_gaji]',
            'nama_komponen'    => 'required',
            'nominal'          => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save($this->request->getPost());
        return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit komponen gaji
     */
    public function edit($id = null)
{
    $model = new \App\Models\KomponenGajiModel();
    $data = [
        'title'    => 'Edit Komponen Gaji',
        'komponen' => $model->find($id)
    ];

    // Jika data dengan ID tersebut tidak ada, tampilkan error 404
    if (empty($data['komponen'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data komponen gaji tidak ditemukan.');
    }

    return view('komponen_gaji/edit', $data);
}

    /**
     * Memproses form edit komponen gaji
     */
    public function update($id = null)
    {
    $model = new KomponenGajiModel();
    $rules = [
        'nama_komponen'    => 'required',
        'nominal'          => 'required|numeric',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $model->update($id, $this->request->getPost());
    return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil diupdate.');
}

    /**
     * Menghapus data komponen gaji
     */
    public function delete($id = null)
    {
        $model = new KomponenGajiModel();
        $model->delete($id);
        return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil dihapus.');
    }
}