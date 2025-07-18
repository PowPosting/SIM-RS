<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'email'      => 'admin@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Administrator',
                'role'       => 'admin',
                'phone'      => '081234567890',
                'address'    => 'Jl. Admin No. 1',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admisi1',
                'email'      => 'admisi@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Petugas Admisi',
                'role'       => 'admisi',
                'phone'      => '081234567891',
                'address'    => 'Jl. Admisi No. 2',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'perawat1',
                'email'      => 'perawat@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Suster Maria',
                'role'       => 'perawat',
                'phone'      => '081234567892',
                'address'    => 'Jl. Perawat No. 3',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'dokter1',
                'email'      => 'dokter@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Dr. Ahmad Subandi',
                'role'       => 'dokter',
                'phone'      => '081234567893',
                'address'    => 'Jl. Dokter No. 4',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'farmasi1',
                'email'      => 'farmasi@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Apoteker Sari',
                'role'       => 'farmasi',
                'phone'      => '081234567894',
                'address'    => 'Jl. Farmasi No. 5',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'kasir1',
                'email'      => 'kasir@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Kasir Budi',
                'role'       => 'kasir',
                'phone'      => '081234567895',
                'address'    => 'Jl. Kasir No. 6',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'manajemen1',
                'email'      => 'manajemen@simrs.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'full_name'  => 'Manager Operasional',
                'role'       => 'manajemen',
                'phone'      => '081234567896',
                'address'    => 'Jl. Manajemen No. 7',
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
