<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey        = 'id';
    protected $useAutoIncrement  = true;
    protected $returnType        = 'array';
    protected $useSoftDeletes    = false;
    protected $protectFields     = true;
    protected $allowedFields     = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'role',
        'spesialisasi',
        'telepon',
        'alamat',
        'status_aktif',
        'login_terakhir'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diperbarui_pada';

    /**
     * Verify user login credentials
     */
    public function verifyUser($username, $password)
    {
        // Cari user berdasarkan username dan aktif
        $user = $this->where('username', $username)
                     ->where('status_aktif', 1)
                     ->first();

        // Jika user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Update last login
            $this->update($user['id'], [
                'login_terakhir' => date('Y-m-d H:i:s')
            ]);
            return $user;
        }

        return false;
    }

    /**
     * Create user dengan password hash
     */
    public function createUser($data)
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->insert($data);
    }

    /**
     * Get user by username
     */
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Get active users
     */
    public function getActiveUsers()
    {
        return $this->where('status_aktif', 1)->findAll();
    }

    /**
     * Get users by role
     */
    public function getUsersByRole($role)
    {
        return $this->where('role', $role)
                    ->where('status_aktif', 1)
                    ->findAll();
    }

    /**
     * Get user statistics
     */
    public function getUserStats()
    {
        $stats = [];
        
        // Total users
        $stats['total_users'] = $this->countAll();
        
        // Active users
        $stats['active_users'] = $this->where('status_aktif', 1)->countAllResults();
        
        // Users by role
        $roles = ['admin', 'admisi', 'perawat', 'dokter', 'farmasi', 'kasir', 'manajemen'];
        foreach ($roles as $role) {
            $stats['role_' . $role] = $this->where('role', $role)
                                           ->where('status_aktif', 1)
                                           ->countAllResults();
        }
        
        return $stats;
    }

    /**
     * Check user permission
     */
    public function hasPermission($userId, $permission)
    {
        $user = $this->find($userId);
        if (!$user) {
            return false;
        }

        $permissions = [
            'admin' => ['all'],
            'manajemen' => ['view_reports', 'manage_users', 'view_statistics'],
            'dokter' => ['view_patients', 'manage_patients', 'view_medical_records'],
            'perawat' => ['view_patients', 'update_patients', 'manage_care'],
            'admisi' => ['manage_admissions', 'view_patients'],
            'farmasi' => ['manage_pharmacy', 'view_medications'],
            'kasir' => ['manage_billing', 'view_payments']
        ];

        $userRole = $user['role'];
        
        if (isset($permissions[$userRole])) {
            return in_array('all', $permissions[$userRole]) || 
                   in_array($permission, $permissions[$userRole]);
        }

        return false;
    }

    /**
     * Get available specializations for doctors
     */
    public function getSpecializations()
    {
        return [
            'Umum' => 'Dokter Umum',
            'Anak' => 'Anak',
            'Jantung' => 'Jantung',
            'Mata' => 'Mata',
            'Kandungan' => 'Kandungan',
            'Bedah' => 'Bedah',
            'Kulit dan Kelamin' => 'Kulit dan Kelamin',
            'Gigi' => 'Gigi',
            'Ortopedi' => 'Ortopedi',
            'Saraf' => 'Saraf',
            'Penyakit Dalam' => 'Penyakit Dalam',
            'THT' => 'THT',
            'Psikiatri' => 'Psikiatri',
            'Radiologi' => 'Radiologi',
            'Anestesi' => 'Anestesi'
        ];
    }

    /**
     * Get doctors by specialization
     */
    public function getDoctorsBySpecialization($specialization = null)
    {
        $builder = $this->where('role', 'dokter')->where('status_aktif', 1);
        
        if ($specialization) {
            $builder->where('spesialisasi', $specialization);
        }
        
        return $builder->orderBy('spesialisasi', 'ASC')
                      ->orderBy('nama_lengkap', 'ASC')
                      ->findAll();
    }

    /**
     * Get unique specializations from database
     */
    public function getActiveSpecializations()
    {
        return $this->select('spesialisasi')
                   ->where('role', 'dokter')
                   ->where('status_aktif', 1)
                   ->whereNotNull('spesialisasi')
                   ->groupBy('spesialisasi')
                   ->orderBy('spesialisasi', 'ASC')
                   ->findAll();
    }
}
