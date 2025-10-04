<?php
namespace App\Controllers;

use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    /**
     * Menampilkan daftar anggota & hasil pencarian
     */
    public function index()
    {
        $anggotaModel = new AnggotaModel();
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $anggota = $anggotaModel->search($keyword);
        } else {
            $anggota = $anggotaModel->findAll();
        }

        $data = [
            'title'   => 'Kelola Anggota DPR',
            'anggota' => $anggota,
            'search'  => $keyword
        ];
        return view('anggota/index', $data);
    }

    /**
     * Menampilkan form tambah anggota
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Anggota Baru'
        ];
        return view('anggota/new', $data);
    }

    /**
     * Memproses form tambah anggota
     */
    public function create()
    {
        $anggotaModel = new AnggotaModel();
        $rules = [
            'id_anggota' => 'required|is_unique[anggota.id_anggota]',
            'nama_depan' => 'required',
            'jabatan'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel->save($this->request->getPost());
        return redirect()->to('/admin/anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show($id = null)
    {
        $model = new \App\Models\AnggotaModel();
        $data = [
            'title'   => 'Detail Anggota DPR',
            'anggota' => $model->find($id)
        ];

        if (empty($data['anggota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data anggota tidak ditemukan.');
        }

        return view('anggota/show', $data);
    }
    
    /**
     * Menampilkan form edit anggota
     */
  public function edit($id = null)
    {
        $anggotaModel = new AnggotaModel();
        $anggota = $anggotaModel->find($id);
        if ($this->request->isAJAX()) {
            if ($anggota) {
                return $this->response->setJSON(['success' => true, 'anggota' => $anggota]);
            }
            return $this->response->setJSON(['success' => false])->setStatusCode(404);
        }
        // Fallback untuk non-AJAX
        return view('anggota/edit', ['anggota' => $anggota, 'title' => 'Edit Anggota']);
    }


    /**
     * Memproses form edit anggota
     */
    public function update($id = null)
    {
        $anggotaModel = new AnggotaModel();
        $rules = [
            'id_anggota' => "required|is_unique[anggota.id_anggota,id_anggota,{$id}]",
            'nama_depan' => 'required',
            'jabatan'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/anggota')->with('success', 'Anggota berhasil diupdate.');
    }

    public function delete($id = null)
    {
        $anggotaModel = new AnggotaModel();
        $anggotaModel->delete($id);
        return redirect()->to('/admin/anggota')->with('success', 'Anggota berhasil dihapus.');
    }
}