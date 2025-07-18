-- Membuat database dan tabel pasien yang diperlukan
CREATE DATABASE IF NOT EXISTS simrs;
USE simrs;

-- Tabel untuk data pasien
CREATE TABLE IF NOT EXISTS pasien (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    
    -- Step 1: Informasi Utama
    title VARCHAR(10) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    tempat_lahir VARCHAR(50) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    nomor_identitas VARCHAR(20) NOT NULL UNIQUE,
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
    karyawan_rs INT(11) NULL,
    telp_rumah VARCHAR(15) NULL,
    nomor_hp_kontak VARCHAR(15) NOT NULL,
    alamat_kontak TEXT NOT NULL,
    kelurahan_kontak VARCHAR(50) NOT NULL,
    kecamatan_kontak VARCHAR(50) NOT NULL,
    kota_kontak VARCHAR(50) NOT NULL,
    provinsi_kontak VARCHAR(50) NOT NULL,
    
    -- Step 5: Konfirmasi Akhir
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

-- Tabel users untuk referensi karyawan_rs
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

-- Insert sample users
INSERT INTO users (username, password, nama_lengkap, role, email, no_telepon) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin', 'admin@hamori.com', '081234567890'),
('admisi1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Petugas Admisi', 'admisi', 'admisi@hamori.com', '081234567891')
ON DUPLICATE KEY UPDATE username=username;

-- Trigger untuk generate nomor rekam medis otomatis
DELIMITER $$
CREATE TRIGGER IF NOT EXISTS generate_no_rm 
BEFORE INSERT ON pasien
FOR EACH ROW 
BEGIN
    DECLARE last_rm INT DEFAULT 0;
    
    -- Ambil nomor rekam medis terakhir
    SELECT COALESCE(MAX(CAST(SUBSTRING(no_rekam_medis, 3) AS UNSIGNED)), 0) INTO last_rm
    FROM pasien 
    WHERE no_rekam_medis REGEXP '^RM[0-9]+$';
    
    -- Generate nomor rekam medis baru jika belum ada
    IF NEW.no_rekam_medis IS NULL THEN
        SET NEW.no_rekam_medis = CONCAT('RM', LPAD(last_rm + 1, 6, '0'));
    END IF;
END$$
DELIMITER ;
