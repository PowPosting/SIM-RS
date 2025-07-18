<?php

namespace App\Controllers;

class Farmasi extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has farmasi role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'farmasi' && $userRole !== 'admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Farmasi - SIMRS',
            'pageTitle' => 'Dashboard Farmasi',
            'stats' => [
                'pending_prescriptions' => 15,
                'low_stock_items' => 8,
                'daily_dispensed' => 45,
                'total_medicines' => 250
            ]
        ];

        return view('farmasi/dashboard', $data);
    }

   public function stokObat(){

        $data = [
            'title' => 'Stok Obat - SIMRS',
            'pageTitle' => 'Stok Obat',
        ];

        return view('farmasi/stok_obat', $data);
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Farmasi - SIMRS',
            'pageTitle' => 'Laporan Farmasi',
        ];

        return view('farmasi/laporan', $data);
   }
}
