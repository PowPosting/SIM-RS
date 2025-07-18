<?php

namespace App\Controllers;

class Admisi extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in and has admisi role OR admin role
        $userRole = $this->session->get('role');
        if (!$this->session->get('isLoggedIn') || ($userRole !== 'admisi' && $userRole !== 'admin')) {
            // Redirect to login instead of throwing exception
            redirect()->to(base_url('login'))->send();
            exit();
        }
    }

    public function index()
    {
        // Load database
        $db = \Config\Database::connect();
        
        // Get real statistics from database
        $stats = [
            'new_registrations' => $db->table('pasien')
                                    ->where('DATE(tanggal_daftar)', date('Y-m-d'))
                                    ->countAllResults(),
            'total_patients' => $db->table('pasien')
                                  ->where('status_aktif', 1)
                                  ->countAllResults(),
            'this_month' => $db->table('pasien')
                              ->where('MONTH(tanggal_daftar)', date('m'))
                              ->where('YEAR(tanggal_daftar)', date('Y'))
                              ->countAllResults(),
            'this_year' => $db->table('pasien')
                             ->where('YEAR(tanggal_daftar)', date('Y'))
                             ->countAllResults()
        ];
        
        $data = [
            'title' => 'Dashboard Admisi - SIMRS',
            'pageTitle' => 'Dashboard Admisi',
            'stats' => $stats
        ];

        return view('admisi/dashboard', $data);
    }


    public function registrasipasien()
    {
        $data = [
            'title' => 'Pendaftaran Pasien - SIMRS',
            'pageTitle' => 'Pendaftaran Pasien Baru'
        ];

        return view('admisi/registrasi_pasien', $data);
    }

    public function registrasipasienStep2()
    {
        $data = [
            'title' => 'Pendaftaran Pasien Step 2 - SIMRS',
            'pageTitle' => 'Pendaftaran Pasien - Informasi Alamat'
        ];

        return view('admisi/registrasi_pasien_step2', $data);
    }

    public function registrasipasienStep3()
    {
        $data = [
            'title' => 'Pendaftaran Pasien Step 3 - SIMRS',
            'pageTitle' => 'Pendaftaran Pasien - Informasi Penunjang'
        ];

        return view('admisi/registrasi_pasien_step3', $data);
    }

    public function registrasipasienStep4()
    {
        // Load user data untuk dropdown karyawan RS
        $db = \Config\Database::connect();
        $users = $db->table('users')
                    ->select('id, nama_lengkap, role')
                    ->where('status_aktif', 1)
                    ->get()
                    ->getResultArray();

        $data = [
            'title' => 'Pendaftaran Pasien Step 4 - SIMRS',
            'pageTitle' => 'Pendaftaran Pasien - Kontak Darurat/Keluarga',
            'users' => $users
        ];

        return view('admisi/registrasi_pasien_step4', $data);
    }

    public function saveStep1()
    {
        // Perbaiki field status jika ada konflik
        $postData = $this->request->getPost();
        if (isset($postData['status']) && !isset($postData['status_perkawinan'])) {
            $postData['status_perkawinan'] = $postData['status'];
            unset($postData['status']);
        }

        // Validasi input dengan data yang sudah diperbaiki
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'nama_lengkap' => 'required|min_length[3]',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_perkawinan' => 'required',
            'nomor_identitas' => 'required',
            'nomor_hp' => 'required'
        ]);

        if (!$validation->run($postData)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke session untuk sementara (dengan perbaikan field)
        $this->session->set('pasien_step1', $postData);

        // Redirect ke step 2
        return redirect()->to(base_url('admisi/registrasipasien/step2'));
    }

    public function saveStep2()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'alamat_lengkap' => 'required|min_length[10]',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

                // Simpan data ke session untuk sementara
        $this->session->set('pasien_step2', $this->request->getPost());

        // Redirect ke step 3
        return redirect()->to(base_url('admisi/registrasipasien/step3'));
    }

    public function saveStep3()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pendidikan_terakhir' => 'required',
            'kewarganegaraan' => 'required',
            'status_pasien' => 'required',
            'pekerjaan' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke session untuk sementara
        $this->session->set('pasien_step3', $this->request->getPost());

        // Redirect ke step 4
        return redirect()->to(base_url('admisi/registrasipasien/step4'));
    }

    public function saveStep4()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kontak_darurat' => 'required|min_length[3]',
            'hubungan_keluarga' => 'required',
            'nomor_hp' => 'required|min_length[10]',
            'alamat_kontak' => 'required|min_length[10]',
            'kelurahan_kontak' => 'required',
            'kecamatan_kontak' => 'required',
            'kabupaten_kontak' => 'required',
            'provinsi_kontak' => 'required',
            'kode_pos_kontak' => 'required|exact_length[5]|numeric',
            'nama_ayah' => 'required|min_length[3]',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required|min_length[3]',
            'pekerjaan_ibu' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke session untuk sementara
        $this->session->set('pasien_step4', $this->request->getPost());

        // Redirect ke step 5
        return redirect()->to(base_url('admisi/registrasipasien/step5'));
    }

    public function registrasipasienStep5()
    {
        // Ambil data dari session
        $data_step1 = $this->session->get('pasien_step1');
        $data_step2 = $this->session->get('pasien_step2');
        $data_step3 = $this->session->get('pasien_step3');
        $data_step4 = $this->session->get('pasien_step4');

        // Pastikan semua data step tersedia
        if (!$data_step1 || !$data_step2 || !$data_step3 || !$data_step4) {
            return redirect()->to(base_url('admisi/registrasipasien/step1'))->with('error', 'Data tidak lengkap. Silakan ulangi dari awal.');
        }

        // Kirim data ke view
        $data = [
            'step1' => $data_step1,
            'step2' => $data_step2,
            'step3' => $data_step3,
            'step4' => $data_step4
        ];

        return view('admisi/registrasi_pasien_step5', $data);
    }

    public function finalSave()
    {
        // Validasi konfirmasi
        if (!$this->request->getPost('konfirmasi_data')) {
            return redirect()->back()->with('error', 'Mohon centang konfirmasi data terlebih dahulu');
        }

        // Ambil semua data dari session
        $step1 = $this->session->get('pasien_step1');
        $step2 = $this->session->get('pasien_step2');
        $step3 = $this->session->get('pasien_step3');
        $step4 = $this->session->get('pasien_step4');

        // Perbaiki field status_perkawinan jika menggunakan field status
        if (isset($step1['status']) && !isset($step1['status_perkawinan'])) {
            $step1['status_perkawinan'] = $step1['status'];
        }

        // Validasi jika ada step yang belum diisi
        if (!$step1 || !$step2 || !$step3 || !$step4) {
            return redirect()->to(base_url('admisi/registrasipasien'))->with('error', 'Data tidak lengkap, mohon ulangi pendaftaran');
        }

        // Load database
        $db = \Config\Database::connect();

        try {
            // Mulai transaksi
            $db->transStart();

            // Generate no_rekam_medis otomatis
            $lastRM = $db->query("SELECT MAX(CAST(SUBSTRING(no_rekam_medis, 3) AS UNSIGNED)) as max_rm FROM pasien WHERE no_rekam_medis LIKE 'RM%'")->getRow();
            $nextNumber = $lastRM ? $lastRM->max_rm + 1 : 1;
            $no_rekam_medis = 'RM' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Gabungkan semua data
            $dataPasien = [
                'no_rekam_medis' => $no_rekam_medis,
                'title' => $step1['title'],
                'nama_lengkap' => $step1['nama_lengkap'],
                'jenis_kelamin' => $step1['jenis_kelamin'],
                'tempat_lahir' => $step1['tempat_lahir'],
                'tanggal_lahir' => $step1['tanggal_lahir'],
                'status_perkawinan' => $step1['status_perkawinan'],
                'nomor_identitas' => $step1['nomor_identitas'],
                'email' => $step1['email'] ?? null,
                'nomor_hp' => $step1['nomor_hp'],
                'catatan' => $step1['catatan'] ?? null,
                'alamat_lengkap' => $step2['alamat_lengkap'],
                'kode_pos' => $step2['kode_pos'] ?? null,
                'kelurahan' => $step2['kelurahan'],
                'kecamatan' => $step2['kecamatan'],
                'kabupaten_kota' => $step2['kabupaten_kota'],
                'provinsi' => $step2['provinsi'],
                'nama_marga' => $step3['nama_marga'] ?? null,
                'agama' => $step3['agama'],
                'golongan_darah' => $step3['golongan_darah'],
                'alergi' => $step3['alergi'] ?? null,
                'pendidikan_terakhir' => $step3['pendidikan_terakhir'],
                'kewarganegaraan' => $step3['kewarganegaraan'],
                'suku' => $step3['suku'] ?? null,
                'nama_di_kartu_pasien' => $step3['nama_di_kartu_pasien'],
                'no_telepon_rumah' => $step3['no_telepon_rumah'] ?? null,
                'status_pasien' => $step3['status_pasien'],
                'pekerjaan' => $step3['pekerjaan'],
                'nama_kontak_darurat' => $step4['nama_kontak_darurat'],
                'hubungan_keluarga' => $step4['hubungan_keluarga'],
                'karyawan_rs' => $step4['karyawan_rs'] ?? null,
                'telp_rumah' => $step4['telp_rumah'] ?? null,
                'nomor_hp_kontak' => $step4['nomor_hp'],
                'alamat_kontak' => $step4['alamat_kontak'],
                'kelurahan_kontak' => $step4['kelurahan_kontak'],
                'kecamatan_kontak' => $step4['kecamatan_kontak'],
                'kota_kontak' => $step4['kabupaten_kontak'],
                'provinsi_kontak' => $step4['provinsi_kontak'],
                'persetujuan_data' => 1,
                'tanggal_daftar' => date('Y-m-d H:i:s'),
                'status_aktif' => 'aktif'
            ];

            // Simpan ke database
            $db->table('pasien')->insert($dataPasien);

            // Commit transaksi
            $db->transCommit();

            // Hapus data dari session
            $this->session->remove(['pasien_step1', 'pasien_step2', 'pasien_step3', 'pasien_step4']);

            // Redirect dengan pesan sukses
            return redirect()->to(base_url('admisi/datapasien'))->with('success', 'Data pasien berhasil disimpan dengan No. RM: ' . $no_rekam_medis);

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            $db->transRollback();
            
            // Log error
            log_message('error', 'Error saving data pasien: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function datapasien()
    {
        // Load database
        $db = \Config\Database::connect();
        
        // Get data pasien dengan id untuk modal, hanya yang aktif
        $pasien = $db->table('pasien')
                    ->select('id, nama_lengkap, tempat_lahir, tanggal_lahir, nomor_hp')
                    ->where('status_aktif', 'aktif')
                    ->orderBy('nama_lengkap', 'ASC')
                    ->get()
                    ->getResultArray();
        
        $data = [
            'title' => 'Data Pasien - SIMRS',
            'pageTitle' => 'Data Pasien',
            'pasien' => $pasien
        ];
        
        return view('admisi/datapasien', $data);
    }

    public function pasienHariIni()
    {
        // Load database
        $db = \Config\Database::connect();
        
        // Get pasien terdaftar hari ini dengan data lengkap
        $pasien_hari_ini = $db->table('pasien')
                    ->select('*')
                    ->where('DATE(tanggal_daftar)', date('Y-m-d'))
                    ->orderBy('tanggal_daftar', 'DESC')
                    ->get()
                    ->getResultArray();
        
        // Hitung statistik
        $total_pasien_hari_ini = count($pasien_hari_ini);
        $pasien_laki_laki = count(array_filter($pasien_hari_ini, function($p) { return $p['jenis_kelamin'] == 'L'; }));
        $pasien_perempuan = count(array_filter($pasien_hari_ini, function($p) { return $p['jenis_kelamin'] == 'P'; }));
        
        // Hitung rata-rata umur
        $total_umur = 0;
        foreach ($pasien_hari_ini as $pasien) {
            $tanggal_lahir = new \DateTime($pasien['tanggal_lahir']);
            $today = new \DateTime();
            $umur = $today->diff($tanggal_lahir)->y;
            $total_umur += $umur;
        }
        $rata_rata_umur = $total_pasien_hari_ini > 0 ? $total_umur / $total_pasien_hari_ini : 0;
        
        $data = [
            'title' => 'Pasien Terdaftar Hari Ini - SIMRS',
            'pageTitle' => 'Pasien Terdaftar Hari Ini',
            'pasien_hari_ini' => $pasien_hari_ini,
            'total_pasien_hari_ini' => $total_pasien_hari_ini,
            'pasien_laki_laki' => $pasien_laki_laki,
            'pasien_perempuan' => $pasien_perempuan,
            'rata_rata_umur' => $rata_rata_umur
        ];
        
        return view('admisi/pasien_terdaftar_hari_ini', $data);
    }

    public function pasienTerdaftarHariIni()
    {
        return $this->pasienHariIni();
    }

    /**
     * Get detail pasien untuk modal
     */
    public function getDetailPasien($id = null)
    {
        // Log untuk debugging
        log_message('info', 'getDetailPasien called with ID: ' . $id);
        
        if (!$id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'ID pasien tidak ditemukan'
            ]);
        }

        try {
            $db = \Config\Database::connect();
            
            // Get patient data
            $pasien = $db->table('pasien')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();

            log_message('info', 'Database query result: ' . json_encode($pasien));

            if (!$pasien) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Data pasien tidak ditemukan'
                ]);
            }

            // Format data untuk modal
            helper('tanggal');
            
            $pasien['tanggal_lahir_formatted'] = tanggal_indonesia($pasien['tanggal_lahir']);
            $pasien['tanggal_daftar_formatted'] = tanggal_indonesia($pasien['tanggal_daftar']);
            $pasien['umur'] = hitung_umur($pasien['tanggal_lahir']);

            log_message('info', 'Formatted data: ' . json_encode($pasien));

            return $this->response->setJSON([
                'success' => true,
                'data' => $pasien
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error in getDetailPasien: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Delete pasien
     */
    public function deletePasien($id = null)
    {
        // Log untuk debugging
        log_message('info', 'deletePasien called with ID: ' . $id);
        
        if (!$id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'ID pasien tidak ditemukan'
            ]);
        }

        try {
            $db = \Config\Database::connect();
            
            // Check if patient exists
            $pasien = $db->table('pasien')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();

            if (!$pasien) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Data pasien tidak ditemukan'
                ]);
            }

            // Start transaction
            $db->transStart();

            // Soft delete - update status_aktif instead of hard delete
            $result = $db->table('pasien')
                        ->where('id', $id)
                        ->update([
                            'status_aktif' => 'nonaktif',
                            'tanggal_hapus' => date('Y-m-d H:i:s')
                        ]);

            // Complete transaction
            $db->transComplete();

            if ($db->transStatus() === false) {
                log_message('error', 'Failed to delete patient with ID: ' . $id);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menghapus data pasien'
                ]);
            }

            log_message('info', 'Patient deleted successfully: ' . $pasien['nama_lengkap']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data pasien berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error in deletePasien: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
