<?php

namespace App\Controllers;

class Kasir extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has kasir role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'kasir' && $userRole !== 'admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Access denied');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Kasir - SIMRS',
            'pageTitle' => 'Dashboard Kasir',
            'stats' => [
                'daily_revenue' => 'Rp 2,500,000',
                'pending_payments' => 12,
                'completed_transactions' => 28,
                'outstanding_bills' => 5
            ]
        ];

        return view('kasir/dashboard', $data);
    }

    public function payments()
    {
        $data = [
            'title' => 'Pembayaran - SIMRS',
            'pageTitle' => 'Proses Pembayaran'
        ];

        return view('kasir/payments', $data);
    }

    public function billing()
    {
        $data = [
            'title' => 'Tagihan - SIMRS',
            'pageTitle' => 'Kelola Tagihan'
        ];

        return view('kasir/billing', $data);
    }

    public function reports()
    {
        $data = [
            'title' => 'Laporan Keuangan - SIMRS',
            'pageTitle' => 'Laporan Keuangan'
        ];

        return view('kasir/reports', $data);
    }
}
