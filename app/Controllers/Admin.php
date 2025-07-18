<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has admin role
        if (!$this->session->get('isLoggedIn') || $this->session->get('role') !== 'admin') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin - SIMRS',
            'pageTitle' => 'Dashboard Admin',
            'stats' => [
                'total_users' => $this->userModel->countAll(),
                'active_users' => $this->userModel->where('status_aktif', 1)->countAllResults(),
                'total_doctors' => $this->userModel->where('role', 'dokter')->countAllResults(),
                'total_nurses' => $this->userModel->where('role', 'perawat')->countAllResults()
            ]
        ];

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $users = $this->userModel->findAll();
        
        // Ambil daftar spesialisasi unik untuk filter
        $specializations = $this->userModel->select('spesialisasi')
                                          ->where('role', 'dokter')
                                          ->where('spesialisasi IS NOT NULL')
                                          ->distinct()
                                          ->findAll();
        
        $data = [
            'title' => 'Manajemen User - SIMRS',
            'pageTitle' => 'Manajemen User',
            'users' => $users,
            'specializations' => array_column($specializations, 'spesialisasi')
        ];

        return view('admin/users', $data);
    }

    public function addUser()
    {
        $data = [
            'title' => 'Tambah User - SIMRS',
            'pageTitle' => 'Tambah User Baru',
            'roles' => ['admin', 'farmasi', 'kasir', 'dokter', 'perawat', 'admisi', 'manajemen'],
            'specializations' => [
                'Umum',
                'Anak', 
                'Jantung', 
                'Mata', 
                'Kandungan', 
                'Bedah', 
                'Kulit dan Kelamin', 
                'Gigi', 
                'Ortopedi', 
                'Saraf', 
                'Penyakit Dalam', 
                'THT', 
                'Radiologi'
            ]
        ];

        return view('admin/add_user', $data);
    }

    public function saveUser()
    {
        $validation = \Config\Services::validation();
        
        // Base validation rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'role' => 'required|in_list[admin,farmasi,kasir,dokter,perawat,admisi,manajemen]'
        ];
        
        // Add specialization validation if role is dokter
        $role = $this->request->getPost('role');
        if ($role === 'dokter') {
            $rules['spesialisasi'] = 'required|in_list[Umum,Anak,Jantung,Mata,Kandungan,Bedah,Kulit dan Kelamin,Gigi,Ortopedi,Saraf,Penyakit Dalam,THT,Radiologi]';
        }
        
        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role' => $this->request->getPost('role'),
            'status_aktif' => $this->request->getPost('status_aktif') ? 1 : 0,
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat')
        ];
        
        // Add specialization if role is dokter
        if ($role === 'dokter') {
            $userData['spesialisasi'] = $this->request->getPost('spesialisasi');
        }

        if ($this->userModel->save($userData)) {
            $this->session->setFlashdata('success', 'User berhasil ditambahkan');
        } else {
            $this->session->setFlashdata('error', 'Gagal menambahkan user');
        }

        return redirect()->to('/admin/users');
    }

    public function editUser($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        $data = [
            'title' => 'Edit User - SIMRS',
            'pageTitle' => 'Edit User',
            'user' => $user,
            'roles' => ['admin', 'farmasi', 'kasir', 'dokter', 'perawat', 'admisi', 'manajemen'],
            'specializations' => [
                'Umum',
                'Anak', 
                'Jantung', 
                'Mata', 
                'Kandungan', 
                'Bedah', 
                'Kulit dan Kelamin', 
                'Gigi', 
                'Ortopedi', 
                'Saraf', 
                'Penyakit Dalam', 
                'THT', 
                'Radiologi'
            ]
        ];

        return view('admin/edit_user', $data);
    }

    public function updateUser($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        
        $rules = [
            'username' => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'role' => 'required|in_list[admin,farmasi,kasir,dokter,perawat,admisi,manajemen]'
        ];

        // Add password validation only if password is provided
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
            $rules['confirm_password'] = 'matches[password]';
        }
        
        // Add specialization validation if role is dokter
        $role = $this->request->getPost('role');
        if ($role === 'dokter') {
            $rules['spesialisasi'] = 'required|in_list[Umum,Anak,Jantung,Mata,Kandungan,Bedah,Kulit dan Kelamin,Gigi,Ortopedi,Saraf,Penyakit Dalam,THT,Radiologi]';
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role' => $this->request->getPost('role'),
            'status_aktif' => $this->request->getPost('status_aktif') ? 1 : 0,
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat')
        ];

        // Update password only if provided
        if ($this->request->getPost('password')) {
            $userData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
        
        // Add specialization if role is dokter, or clear it if not
        if ($role === 'dokter') {
            $userData['spesialisasi'] = $this->request->getPost('spesialisasi');
        } else {
            $userData['spesialisasi'] = null;
        }

        if ($this->userModel->update($id, $userData)) {
            $this->session->setFlashdata('success', 'User berhasil diupdate');
        } else {
            $this->session->setFlashdata('error', 'Gagal mengupdate user');
        }

        return redirect()->to('/admin/users');
    }

    public function deleteUser($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            $this->session->setFlashdata('error', 'User tidak ditemukan');
            return redirect()->to('/admin/users');
        }

        // Prevent deleting current admin user
        if ($id == $this->session->get('user_id')) {
            $this->session->setFlashdata('error', 'Tidak dapat menghapus akun sendiri');
            return redirect()->to('/admin/users');
        }

        if ($this->userModel->delete($id)) {
            $this->session->setFlashdata('success', 'User berhasil dihapus');
        } else {
            $this->session->setFlashdata('error', 'Gagal menghapus user');
        }

        return redirect()->to('/admin/users');
    }

    public function toggleUserStatus($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return $this->response->setJSON(['success' => false, 'message' => 'User tidak ditemukan']);
        }

        // Prevent deactivating current admin user
        if ($id == $this->session->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Tidak dapat menonaktifkan akun sendiri']);
        }

        $newStatus = $user['status_aktif'] ? 0 : 1;
        
        if ($this->userModel->update($id, ['status_aktif' => $newStatus])) {
            $statusText = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
            return $this->response->setJSON(['success' => true, 'message' => "User berhasil {$statusText}", 'new_status' => $newStatus]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal mengubah status user']);
        }
    }

    

    public function database()
    {
        $data = [
            'title' => 'Database Management - SIMRS',
            'pageTitle' => 'Database Management'
        ];

        return view('admin/database', $data);
    }

    // Admin access to other role dashboards
    public function farmasi()
    {
        // Redirect to farmasi dashboard with admin privileges
        return redirect()->to('/farmasi');
    }

    public function kasir()
    {
        // Redirect to kasir dashboard with admin privileges
        return redirect()->to('/kasir');
    }

    public function dokter()
    {
        // Redirect to dokter dashboard with admin privileges
        return redirect()->to('/dokter');
    }

    public function perawat()
    {
        // Redirect to perawat dashboard with admin privileges
        return redirect()->to('/perawat');
    }

    public function admisi()
    {
        // Redirect to admisi dashboard with admin privileges
        return redirect()->to('/admisi');
    }

    public function manajemen()
    {
        // Redirect to manajemen dashboard with admin privileges
        return redirect()->to('/manajemen');
    }
    
}
