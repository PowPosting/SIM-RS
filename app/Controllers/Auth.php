<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login - SIMRS'
        ];

        return view('auth/login', $data);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Verify user credentials
        $user = $this->userModel->verifyUser($username, $password);

        if ($user) {
            // Check if user is active
            if (!$user['status_aktif']) {
                return redirect()->back()->withInput()->with('error', 'Akun Anda telah dinonaktifkan.');
            }

            // Set session data
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'nama_lengkap' => $user['nama_lengkap'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ];

            $this->session->set($sessionData);

            return redirect()->to('/dashboard')->with('success', 'Login berhasil!');

        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil.');
    }

    public function profile()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        $data = [
            'title' => 'Profile - SIMRS',
            'pageTitle' => 'Profile Saya',
            'user' => $user
        ];

        return view('auth/profile', $data);
    }

    public function updateProfile()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to('/profile')->with('error', 'User tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        
        $rules = [
            'username' => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$userId}]",
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'telepon' => 'permit_empty|min_length[10]|max_length[15]',
            'alamat' => 'permit_empty|max_length[255]'
        ];

        // Add password validation only if password is provided
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
            $rules['confirm_password'] = 'matches[password]';
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $updateData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat')
        ];

        // Update password only if provided
        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($this->userModel->update($userId, $updateData)) {
            // Update session data with new information
            $this->session->set([
                'username' => $updateData['username'],
                'email' => $updateData['email'],
                'nama_lengkap' => $updateData['nama_lengkap']
            ]);

            return redirect()->to('/profile')->with('success', 'Profile berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate profile');
        }
    }
}
