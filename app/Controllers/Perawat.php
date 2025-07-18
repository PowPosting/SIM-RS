<?php

namespace App\Controllers;

class Perawat extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has perawat role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'perawat' && $userRole !== 'admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Perawat - SIMRS',
            'pageTitle' => 'Dashboard Perawat',
            'stats' => [
                'assigned_patients' => 15,
                'critical_patients' => 2,
                'shift_hours' => '08:00 - 16:00',
                'pending_tasks' => 6
            ]
        ];

        return view('perawat/dashboard', $data);
    }

    public function patients()
    {
        $data = [
            'title' => 'Data Pasien - SIMRS',
            'pageTitle' => 'Data Pasien'
        ];

        return view('perawat/patients', $data);
    }

    public function patientCare()
    {
        $data = [
            'title' => 'Perawatan Pasien - SIMRS',
            'pageTitle' => 'Perawatan Pasien'
        ];

        return view('perawat/patient_care', $data);
    }

    public function schedule()
    {
        $data = [
            'title' => 'Jadwal Shift - SIMRS',
            'pageTitle' => 'Jadwal Shift'
        ];

        return view('perawat/schedule', $data);
    }
}
