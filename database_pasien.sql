-- Database: simrs_hamori
-- Tabel: pasien
-- Dibuat berdasarkan form registrasi 5 langkah yang akurat

-- Pastikan database yang benar
CREATE DATABASE IF NOT EXISTS simrs;
USE simrs;

-- Tabel untuk data pasien
CREATE TABLE IF NOT EXISTS pasien (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    
    -- Step 1: Informasi Utama
    title VARCHAR(10) NOT NULL,                    -- Tn, Ny, Nn, An, By
    nama_lengkap VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,         -- L = Laki-laki, P = Perempuan
    tempat_lahir VARCHAR(50) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    nomor_identitas VARCHAR(20) NOT NULL UNIQUE,   -- KTP/SIM/Passport
    email VARCHAR(100) NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    status_perkawinan ENUM('menikah', 'belum_menikah', 'janda', 'duda') NOT NULL,
    catatan TEXT NULL,
    
    -- Step 2: Informasi Alamat
    alamat_lengkap TEXT NOT NULL,
    kode_pos VARCHAR(10) NULL,
    kelurahan VARCHAR(50) NOT NULL,
    kecamatan VARCHAR(50) NOT NULL,
    kabupaten_kota VARCHAR(50) NOT NULL,
    provinsi VARCHAR(50) NOT NULL,
    
    -- Step 3: Informasi Penunjang
    nama_marga VARCHAR(50) NULL,
    agama VARCHAR(30) NULL,
    golongan_darah VARCHAR(5) NULL,
    alergi TEXT NULL,
    pendidikan_terakhir VARCHAR(20) NULL,
    kewarganegaraan VARCHAR(30) DEFAULT 'Indonesia',
    suku VARCHAR(30) NULL,
    nama_di_kartu_pasien VARCHAR(100) NULL,
    no_telepon_rumah VARCHAR(15) NULL,
    status_pasien ENUM('Siaga 1', 'Siaga 2', 'Normal') NULL,
    pekerjaan VARCHAR(50) NULL,
    
    -- Step 4: Kontak Darurat/Keluarga
    nama_kontak_darurat VARCHAR(100) NOT NULL,
    hubungan_keluarga ENUM('ayah', 'ibu', 'suami', 'istri', 'anak', 'saudara_kandung', 'kakek', 'nenek', 'paman', 'bibi', 'sepupu', 'lainnya') NOT NULL,
    karyawan_rs INT(11) NULL,                      -- FK ke tabel users
    telp_rumah VARCHAR(15) NULL,
    nomor_hp_kontak VARCHAR(15) NOT NULL,
    alamat_kontak TEXT NOT NULL,
    kelurahan_kontak VARCHAR(50) NOT NULL,
    kecamatan_kontak VARCHAR(50) NOT NULL,
    kota_kontak VARCHAR(50) NOT NULL,
    provinsi_kontak VARCHAR(50) NOT NULL,
    
    -- Step 5: Konfirmasi Akhir (data sistem)
    persetujuan_data TINYINT(1) DEFAULT 0,
    
    -- Data tambahan sistem
    no_rekam_medis VARCHAR(20) UNIQUE,
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_aktif ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    
    -- Indexes untuk performa
    INDEX idx_nama (nama_lengkap),
    INDEX idx_nomor_identitas (nomor_identitas),
    INDEX idx_no_rm (no_rekam_medis),
    INDEX idx_tanggal_daftar (tanggal_daftar),
    INDEX idx_nomor_hp (nomor_hp)
);

-- Tabel untuk riwayat kunjungan pasien
CREATE TABLE IF NOT EXISTS kunjungan_pasien (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pasien_id INT(11) NOT NULL,
    tanggal_kunjungan DATE NOT NULL,
    waktu_kunjungan TIME NOT NULL,
    jenis_kunjungan ENUM('rawat jalan', 'rawat inap', 'ugd') NOT NULL,
    keluhan_utama TEXT NOT NULL,
    dokter_id INT(11) NULL,
    poli_id INT(11) NULL,
    status_kunjungan ENUM('menunggu', 'sedang dilayani', 'selesai', 'batal') DEFAULT 'menunggu',
    biaya_administrasi DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (pasien_id) REFERENCES pasien(id) ON DELETE CASCADE,
    INDEX idx_pasien (pasien_id),
    INDEX idx_tanggal (tanggal_kunjungan),
    INDEX idx_status (status_kunjungan)
);

-- Tabel untuk data dokter (referensi)
CREATE TABLE IF NOT EXISTS dokter (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_dokter VARCHAR(100) NOT NULL,
    spesialisasi VARCHAR(50) NOT NULL,
    no_str VARCHAR(20) NOT NULL UNIQUE,
    no_telepon VARCHAR(15) NOT NULL,
    jadwal_praktik TEXT NULL,
    status_aktif ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk data poli/unit (referensi)
CREATE TABLE IF NOT EXISTS poli (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_poli VARCHAR(50) NOT NULL,
    kode_poli VARCHAR(10) NOT NULL UNIQUE,
    lokasi VARCHAR(100) NOT NULL,
    jadwal_buka TIME NOT NULL,
    jadwal_tutup TIME NOT NULL,
    status_aktif ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel users (untuk referensi karyawan_rs)
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    role ENUM('admin', 'dokter', 'perawat', 'farmasi', 'kasir', 'admisi', 'manajemen') NOT NULL,
    email VARCHAR(100) NULL,
    no_telepon VARCHAR(15) NULL,
    status_aktif ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data contoh untuk poli
INSERT INTO poli (nama_poli, kode_poli, lokasi, jadwal_buka, jadwal_tutup) VALUES
('Poli Umum', 'PU001', 'Lantai 1 Ruang A', '08:00:00', '16:00:00'),
('Poli Gigi', 'PG001', 'Lantai 1 Ruang B', '08:00:00', '15:00:00'),
('Poli Anak', 'PA001', 'Lantai 2 Ruang A', '08:00:00', '16:00:00'),
('Poli Mata', 'PM001', 'Lantai 2 Ruang B', '08:00:00', '14:00:00'),
('Poli Kandungan', 'PK001', 'Lantai 3 Ruang A', '08:00:00', '16:00:00');

-- Insert data contoh untuk dokter
INSERT INTO dokter (nama_dokter, spesialisasi, no_str, no_telepon) VALUES
('dr. Ahmad Fauzi, Sp.PD', 'Penyakit Dalam', 'STR001234567', '081234567890'),
('dr. Siti Nurhaliza, Sp.A', 'Anak', 'STR002345678', '081234567891'),
('dr. Budi Santoso, Sp.OG', 'Kandungan', 'STR003456789', '081234567892'),
('dr. Maya Sari, Sp.M', 'Mata', 'STR004567890', '081234567893'),
('drg. Rizky Pratama', 'Gigi', 'STR005678901', '081234567894');

-- Insert data contoh untuk users
INSERT INTO users (username, password, nama_lengkap, role, email, no_telepon) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin', 'admin@hamori.com', '081234567890'),
('dokter1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dr. Ahmad Fauzi', 'dokter', 'ahmad@hamori.com', '081234567891'),
('perawat1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Siti Perawat', 'perawat', 'siti@hamori.com', '081234567892'),
('farmasi1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Budi Farmasi', 'farmasi', 'budi@hamori.com', '081234567893'),
('kasir1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Maya Kasir', 'kasir', 'maya@hamori.com', '081234567894'),
('admisi1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Rizky Admisi', 'admisi', 'rizky@hamori.com', '081234567895');

-- Foreign Key untuk karyawan_rs
ALTER TABLE pasien ADD CONSTRAINT fk_pasien_karyawan_rs FOREIGN KEY (karyawan_rs) REFERENCES users(id) ON DELETE SET NULL;

-- Trigger untuk generate nomor rekam medis otomatis
DELIMITER $$
CREATE TRIGGER generate_no_rm 
BEFORE INSERT ON pasien
FOR EACH ROW 
BEGIN
    DECLARE last_rm INT DEFAULT 0;
    
    -- Ambil nomor rekam medis terakhir
    SELECT COALESCE(MAX(CAST(SUBSTRING(no_rekam_medis, 3) AS UNSIGNED)), 0) INTO last_rm
    FROM pasien 
    WHERE no_rekam_medis REGEXP '^RM[0-9]+$';
    
    -- Generate nomor rekam medis baru
    SET NEW.no_rekam_medis = CONCAT('RM', LPAD(last_rm + 1, 6, '0'));
END$$
DELIMITER ;

-- View untuk laporan pasien hari ini
CREATE VIEW pasien_hari_ini AS
SELECT 
    p.id,
    p.title,
    p.nama_lengkap,
    p.no_rekam_medis,
    p.nomor_hp,
    p.tanggal_daftar,
    COUNT(k.id) as total_kunjungan
FROM pasien p
LEFT JOIN kunjungan_pasien k ON p.id = k.pasien_id
WHERE DATE(p.tanggal_daftar) = CURDATE()
GROUP BY p.id, p.title, p.nama_lengkap, p.no_rekam_medis, p.nomor_hp, p.tanggal_daftar;

-- View untuk statistik dashboard
CREATE VIEW dashboard_stats AS
SELECT 
    (SELECT COUNT(*) FROM pasien WHERE status_aktif = 'aktif') as total_pasien,
    (SELECT COUNT(*) FROM pasien WHERE DATE(tanggal_daftar) = CURDATE()) as pasien_hari_ini,
    (SELECT COUNT(*) FROM kunjungan_pasien WHERE DATE(tanggal_kunjungan) = CURDATE()) as kunjungan_hari_ini,
    (SELECT COUNT(*) FROM dokter WHERE status_aktif = 'aktif') as total_dokter,
    (SELECT COUNT(*) FROM poli WHERE status_aktif = 'aktif') as total_poli;
