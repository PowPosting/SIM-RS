<?php

namespace App\Controllers;

class Dokter extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has dokter role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'dokter' && $userRole !== 'admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Dokter - SIMRS',
            'pageTitle' => 'Dashboard Dokter',
            'stats' => [
                'today_patients' => 8,
                'pending_consultations' => 3,
                'completed_consultations' => 12,
                'next_appointment' => '14:30'
            ]
        ];

        return view('dokter/dashboard', $data);
    }

    public function patients()
    {
        $data = [
            'title' => 'Data Pasien - SIMRS',
            'pageTitle' => 'Data Pasien'
        ];

        return view('dokter/patients', $data);
    }

    public function schedule()
    {
        $data = [
            'title' => 'Jadwal Dokter - SIMRS',
            'pageTitle' => 'Jadwal Praktik'
        ];

        return view('dokter/schedule', $data);
    }
}
