<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        
        // Check if logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userRole = $session->get('role');
        $userModel = new UserModel();
        
        
        $data = [
            'title' => 'Dashboard - SIMRS',
            'pageTitle' => $this->getPageTitle($userRole),
            'userName' => $session->get('nama_lengkap') ?? 'User',
            'userRole' => ucfirst($userRole ?? 'Role'),
            'currentRole' => $userRole,
            
        ];
        
        return view('dashboard', $data);
    }
    
    private function getPageTitle($role)
    {
        $titles = [
            'admin' => 'Dashboard Admin',
            'dokter' => 'Dashboard Dokter',
            'perawat' => 'Dashboard Perawat',
            'farmasi' => 'Dashboard Farmasi',
            'kasir' => 'Dashboard Kasir',
            'admisi' => 'Dashboard Admisi',
            'manajemen' => 'Dashboard Manajemen'
        ];
        
        return $titles[$role] ?? 'Dashboard';
    }
    
}
