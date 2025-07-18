<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
.progress-steps {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 15px 0;
}

.step-container {
    display: flex;
    align-items: center;
    width: 80%;
    max-width: 600px;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1;
    position: relative;
}

.step-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 13px;
    margin-bottom: 6px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.step-title {
    font-size: 11px;
    color: #6c757d;
    font-weight: 500;
    line-height: 1.2;
}

.step.active .step-number {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
    transform: scale(1.1);
}

.step.active .step-title {
    color: #007bff;
    font-weight: bold;
}

.step.completed .step-number {
    background-color: #28a745;
    color: white;
    border-color: #28a745;
}

.step.completed .step-title {
    color: #28a745;
    font-weight: 600;
}

.step-line {
    height: 2px;
    background-color: #e9ecef;
    flex: 1;
    margin: 0 8px;
    margin-bottom: 26px;
    border-radius: 1px;
}

.step.completed ~ .step-line {
    background-color: #28a745;
}

.step.completed + .step-line {
    background-color: #28a745;
}

.step.active ~ .step-line {
    background-color: #e9ecef;
}

.step.active + .step-line {
    background-color: #e9ecef;
}

.section-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #007bff;
}

.confirmation-card {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    margin-bottom: 20px;
}

.confirmation-card .card-header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    border-bottom: none;
    border-radius: 7px 7px 0 0;
}

.confirmation-item {
    padding: 8px 0;
    border-bottom: 1px solid #e9ecef;
}

.confirmation-item:last-child {
    border-bottom: none;
}

.confirmation-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 4px;
}

.confirmation-value {
    color: #6c757d;
    font-size: 14px;
}

.final-confirmation {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 20px;
    margin: 20px 0;
}

.final-confirmation .form-check-input {
    transform: scale(1.2);
    margin-right: 12px;
}

.final-confirmation .form-check-label {
    font-size: 16px;
    font-weight: 500;
}

@media (max-width: 768px) {
    .step-container {
        width: 95%;
    }
    
    .step-title {
        font-size: 9px;
    }
    
    .step-number {
        width: 26px;
        height: 26px;
        font-size: 11px;
    }
    
    .step-line {
        margin: 0 4px;
        margin-bottom: 22px;
    }
}

@media (max-width: 480px) {
    .step-title {
        font-size: 8px;
        max-width: 60px;
    }
    
    .step-number {
        width: 24px;
        height: 24px;
        font-size: 10px;
    }
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Progress Steps -->
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="progress-steps mb-4">
                                <div class="step-container">
                                    <div class="step completed">
                                        <div class="step-number">1</div>
                                        <div class="step-title">Informasi Utama</div>
                                    </div>
                                    <div class="step-line"></div>
                                    <div class="step completed">
                                        <div class="step-number">2</div>
                                        <div class="step-title">Informasi Alamat</div>
                                    </div>
                                    <div class="step-line"></div>
                                    <div class="step completed">
                                        <div class="step-number">3</div>
                                        <div class="step-title">Informasi Penunjang</div>
                                    </div>
                                    <div class="step-line"></div>
                                    <div class="step completed">
                                        <div class="step-number">4</div>
                                        <div class="step-title">Kontak Darurat</div>
                                    </div>
                                    <div class="step-line"></div>
                                    <div class="step active">
                                        <div class="step-number">5</div>
                                        <div class="step-title">Konfirmasi Akhir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body pt-0">
                    <div class="alert alert-info">
                        <h5><i class="fas fa-info-circle mr-2"></i>Mohon periksa kembali data yang telah diisi</h5>
                        <p class="mb-0">Pastikan semua informasi yang Anda masukkan sudah benar sebelum menyimpan data.</p>
                    </div>

                    <!-- Informasi Utama -->
                    <h5 class="section-title"><i class="fas fa-user mr-2"></i>Informasi Utama</h5>
                    <div class="confirmation-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama Lengkap</div>
                                        <div class="confirmation-value"><?= $step1['nama_lengkap'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Jenis Kelamin</div>
                                        <div class="confirmation-value"><?= ($step1['jenis_kelamin'] ?? '') == 'L' ? 'Laki-laki' : (($step1['jenis_kelamin'] ?? '') == 'P' ? 'Perempuan' : '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Tempat Lahir</div>
                                        <div class="confirmation-value"><?= $step1['tempat_lahir'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Tanggal Lahir</div>
                                        <div class="confirmation-value"><?= $step1['tanggal_lahir'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Status Perkawinan</div>
                                        <div class="confirmation-value">
                                            <?php 
                                                // Gunakan status_perkawinan atau fallback ke status
                                                $status = $step1['status_perkawinan'] ?? $step1['status'] ?? '';
                                                if (empty($status)) {
                                                    echo '<span class="text-danger">Tidak diisi</span>';
                                                } else {
                                                    echo str_replace('_', ' ', ucfirst($status));
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">NIK</div>
                                        <div class="confirmation-value"><?= $step1['nomor_identitas'] ?? '-' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Alamat -->
                    <h5 class="section-title"><i class="fas fa-map-marker-alt mr-2"></i>Informasi Alamat</h5>
                    <div class="confirmation-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Alamat Lengkap</div>
                                        <div class="confirmation-value"><?= $step2['alamat_lengkap'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kode Pos</div>
                                        <div class="confirmation-value"><?= $step2['kode_pos'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kelurahan</div>
                                        <div class="confirmation-value"><?= $step2['kelurahan'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kecamatan</div>
                                        <div class="confirmation-value"><?= $step2['kecamatan'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kabupaten</div>
                                        <div class="confirmation-value"><?= $step2['kabupaten_kota'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Provinsi</div>
                                        <div class="confirmation-value"><?= $step2['provinsi'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">No. Telepon/HP</div>
                                        <div class="confirmation-value"><?= $step1['nomor_hp'] ?? '-' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Penunjang -->
                    <h5 class="section-title"><i class="fas fa-clipboard-list mr-2"></i>Informasi Penunjang</h5>
                    <div class="confirmation-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama di Kartu Pasien</div>
                                        <div class="confirmation-value"><?= $step3['nama_di_kartu_pasien'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Agama</div>
                                        <div class="confirmation-value"><?= ucfirst($step3['agama'] ?? '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Golongan Darah</div>
                                        <div class="confirmation-value"><?= strtoupper($step3['golongan_darah'] ?? '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Pendidikan Terakhir</div>
                                        <div class="confirmation-value"><?= ucfirst($step3['pendidikan_terakhir'] ?? '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kewarganegaraan</div>
                                        <div class="confirmation-value"><?= $step3['kewarganegaraan'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Pekerjaan</div>
                                        <div class="confirmation-value"><?= $step3['pekerjaan'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Status Pasien</div>
                                        <div class="confirmation-value"><?= ucfirst($step3['status_pasien'] ?? '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Suku</div>
                                        <div class="confirmation-value"><?= $step3['suku'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <?php if (!empty($step3['nama_marga'])): ?>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama Marga</div>
                                        <div class="confirmation-value"><?= $step3['nama_marga'] ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($step3['no_telepon_rumah'])): ?>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">No. Telepon Rumah</div>
                                        <div class="confirmation-value"><?= $step3['no_telepon_rumah'] ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($step3['alergi'])): ?>
                                <div class="col-md-12">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Alergi</div>
                                        <div class="confirmation-value"><?= $step3['alergi'] ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Darurat/Keluarga -->
                    <h5 class="section-title"><i class="fas fa-user-friends mr-2"></i>Kontak Darurat/Keluarga</h5>
                    <div class="confirmation-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama</div>
                                        <div class="confirmation-value"><?= $step4['nama_kontak_darurat'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Hubungan Keluarga</div>
                                        <div class="confirmation-value"><?= ucfirst($step4['hubungan_keluarga'] ?? '-') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nomor HP</div>
                                        <div class="confirmation-value"><?= $step4['nomor_hp'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Telepon Rumah</div>
                                        <div class="confirmation-value"><?= $step4['telp_rumah'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Alamat</div>
                                        <div class="confirmation-value"><?= $step4['alamat_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kelurahan</div>
                                        <div class="confirmation-value"><?= $step4['kelurahan_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kecamatan</div>
                                        <div class="confirmation-value"><?= $step4['kecamatan_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kabupaten</div>
                                        <div class="confirmation-value"><?= $step4['kabupaten_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Provinsi</div>
                                        <div class="confirmation-value"><?= $step4['provinsi_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Kode Pos</div>
                                        <div class="confirmation-value"><?= $step4['kode_pos_kontak'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <?php if (!empty($step4['karyawan_rs'])): ?>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Karyawan RS</div>
                                        <div class="confirmation-value">Ya</div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Orang Tua -->
                    <h5 class="section-title"><i class="fas fa-heart mr-2"></i>Informasi Orang Tua</h5>
                    <div class="confirmation-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama Ayah</div>
                                        <div class="confirmation-value"><?= $step4['nama_ayah'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Pekerjaan Ayah</div>
                                        <div class="confirmation-value"><?= $step4['pekerjaan_ayah'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Nama Ibu</div>
                                        <div class="confirmation-value"><?= $step4['nama_ibu'] ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirmation-item">
                                        <div class="confirmation-label">Pekerjaan Ibu</div>
                                        <div class="confirmation-value"><?= $step4['pekerjaan_ibu'] ?? '-' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Konfirmasi Final -->
                    <div class="final-confirmation">
                        <form action="<?= base_url('admisi/registrasipasien/final-save') ?>" method="post" id="finalForm">
                            <?= csrf_field() ?>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="konfirmasi_data" name="konfirmasi_data" required>
                                <label class="form-check-label" for="konfirmasi_data">
                                    Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan.
                                </label>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url('admisi/registrasipasien/step4') ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-success ml-2">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan Data Pasien
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('finalForm');
    const checkbox = document.getElementById('konfirmasi_data');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Disable submit button initially
    submitBtn.disabled = true;
    
    // Enable/disable submit button based on checkbox
    checkbox.addEventListener('change', function() {
        submitBtn.disabled = !this.checked;
    });
    
    // Form submission confirmation
    form.addEventListener('submit', function(e) {
        if (!checkbox.checked) {
            e.preventDefault();
            alert('Mohon centang konfirmasi data terlebih dahulu');
            return false;
        }
        
        if (!confirm('Apakah Anda yakin ingin menyimpan data pasien ini?')) {
            e.preventDefault();
            return false;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
    });
});
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
