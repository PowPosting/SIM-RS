<?php

namespace App\Controllers;

class Manajemen extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has manajemen role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'manajemen' && $userRole !== 'admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Manajemen - SIMRS',
            'pageTitle' => 'Dashboard Manajemen',
            'stats' => [
                'monthly_revenue' => 'Rp 125,000,000',
                'patient_satisfaction' => '92%',
                'staff_count' => 45,
                'occupancy_rate' => '78%'
            ]
        ];

        return view('manajemen/dashboard', $data);
    }

    public function reports()
    {
        $data = [
            'title' => 'Laporan - SIMRS',
            'pageTitle' => 'Laporan Manajemen'
        ];

        return view('manajemen/reports', $data);
    }

    public function statistics()
    {
        $data = [
            'title' => 'Statistik - SIMRS',
            'pageTitle' => 'Statistik Rumah Sakit'
        ];

        return view('manajemen/statistics', $data);
    }
}
