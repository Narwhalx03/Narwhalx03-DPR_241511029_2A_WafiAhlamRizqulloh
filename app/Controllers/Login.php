<?php
namespace App\Controllers;

// 1. Panggil Model yang benar
use App\Models\PenggunaModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login_view'); // Pastikan Anda punya view login untuk proyek ini
    }

    public function process()
    {
        // 2. Gunakan Model yang benar
        $model = new PenggunaModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // 3. Gunakan kolom yang benar dari tabel 'pengguna'
            $session_data = [
                'id_pengguna' => $user['id_pengguna'],
                'username'    => $user['username'],
                'full_name'   => $user['nama_depan'] . ' ' . $user['nama_belakang'], // Gabungkan nama
                'role'        => $user['role'],
                'isLoggedIn'  => true,
            ];
            session()->set($session_data);
            
            // 4. Arahkan sesuai role 'Admin' atau 'Public'
            if ($user['role'] === 'Admin') {
                return redirect()->to('/admin/dashboard'); 
            } else {
                return redirect()->to('/public/dashboard'); 
            }

        } else {
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}