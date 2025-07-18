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

.section-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #007bff;
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
                                    <div class="step active">
                                        <div class="step-number">4</div>
                                        <div class="step-title">Kontak Darurat</div>
                                    </div>
                                    <div class="step-line"></div>
                                    <div class="step">
                                        <div class="step-number">5</div>
                                        <div class="step-title">Konfirmasi Akhir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body pt-0">
                    <form action="<?= base_url('admisi/registrasipasien/step4/save') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <!-- Kontak Darurat/Keluarga -->
                        <h5 class="section-title"><i class="fas fa-user-friends mr-2"></i>Kontak Darurat/Keluarga</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kontak_darurat">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_kontak_darurat" name="nama_kontak_darurat" 
                                           value="<?= old('nama_kontak_darurat') ?>" required>
                                    <?php if (isset($errors['nama_kontak_darurat'])): ?>
                                        <div class="text-danger"><?= $errors['nama_kontak_darurat'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hubungan_keluarga">Hubungan Keluarga <span class="text-danger">*</span></label>
                                    <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
                                        <option value="">Pilih Hubungan</option>
                                        <option value="ayah" <?= old('hubungan_keluarga') == 'ayah' ? 'selected' : '' ?>>Ayah</option>
                                        <option value="ibu" <?= old('hubungan_keluarga') == 'ibu' ? 'selected' : '' ?>>Ibu</option>
                                        <option value="suami" <?= old('hubungan_keluarga') == 'suami' ? 'selected' : '' ?>>Suami</option>
                                        <option value="istri" <?= old('hubungan_keluarga') == 'istri' ? 'selected' : '' ?>>Istri</option>
                                        <option value="anak" <?= old('hubungan_keluarga') == 'anak' ? 'selected' : '' ?>>Anak</option>
                                        <option value="saudara_kandung" <?= old('hubungan_keluarga') == 'saudara_kandung' ? 'selected' : '' ?>>Saudara Kandung</option>
                                        <option value="kakek" <?= old('hubungan_keluarga') == 'kakek' ? 'selected' : '' ?>>Kakek</option>
                                        <option value="nenek" <?= old('hubungan_keluarga') == 'nenek' ? 'selected' : '' ?>>Nenek</option>
                                        <option value="paman" <?= old('hubungan_keluarga') == 'paman' ? 'selected' : '' ?>>Paman</option>
                                        <option value="bibi" <?= old('hubungan_keluarga') == 'bibi' ? 'selected' : '' ?>>Bibi</option>
                                        <option value="sepupu" <?= old('hubungan_keluarga') == 'sepupu' ? 'selected' : '' ?>>Sepupu</option>
                                        <option value="lainnya" <?= old('hubungan_keluarga') == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                    </select>
                                    <?php if (isset($errors['hubungan_keluarga'])): ?>
                                        <div class="text-danger"><?= $errors['hubungan_keluarga'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="karyawan_rs">Karyawan Rumah Sakit?</label>
                                    <select class="form-control" id="karyawan_rs" name="karyawan_rs">
                                        <option value="">Pilih Karyawan</option>
                                        <?php if (isset($users) && !empty($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= $user['id'] ?>" <?= old('karyawan_rs') == $user['id'] ? 'selected' : '' ?>>
                                                    <?= $user['nama_lengkap'] ?> - <?= $user['role'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (isset($errors['karyawan_rs'])): ?>
                                        <div class="text-danger"><?= $errors['karyawan_rs'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp_rumah">Telp. Rumah</label>
                                    <input type="tel" class="form-control" id="telp_rumah" name="telp_rumah" 
                                           value="<?= old('telp_rumah') ?>" placeholder="Contoh: 021-1234567">
                                    <?php if (isset($errors['telp_rumah'])): ?>
                                        <div class="text-danger"><?= $errors['telp_rumah'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" 
                                           value="<?= old('nomor_hp') ?>" required placeholder="Contoh: 08123456789">
                                    <?php if (isset($errors['nomor_hp'])): ?>
                                        <div class="text-danger"><?= $errors['nomor_hp'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_kontak">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="alamat_kontak" name="alamat_kontak" 
                                              rows="3" required placeholder="Alamat lengkap"><?= old('alamat_kontak') ?></textarea>
                                    <?php if (isset($errors['alamat_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['alamat_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelurahan_kontak">Kelurahan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kelurahan_kontak" name="kelurahan_kontak" 
                                           value="<?= old('kelurahan_kontak') ?>" required>
                                    <?php if (isset($errors['kelurahan_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['kelurahan_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kecamatan_kontak">Kecamatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kecamatan_kontak" name="kecamatan_kontak" 
                                           value="<?= old('kecamatan_kontak') ?>" required>
                                    <?php if (isset($errors['kecamatan_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['kecamatan_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kabupaten_kontak">Kabupaten <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kabupaten_kontak" name="kabupaten_kontak" 
                                           value="<?= old('kabupaten_kontak') ?>" required>
                                    <?php if (isset($errors['kabupaten_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['kabupaten_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi_kontak">Provinsi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="provinsi_kontak" name="provinsi_kontak" 
                                           value="<?= old('provinsi_kontak') ?>" required>
                                    <?php if (isset($errors['provinsi_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['provinsi_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_pos_kontak">Kode Pos <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kode_pos_kontak" name="kode_pos_kontak" 
                                           value="<?= old('kode_pos_kontak') ?>" required maxlength="5" pattern="[0-9]{5}">
                                    <?php if (isset($errors['kode_pos_kontak'])): ?>
                                        <div class="text-danger"><?= $errors['kode_pos_kontak'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Orang Tua -->
                        <h5 class="section-title mt-4"><i class="fas fa-heart mr-2"></i>Informasi Orang Tua</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" 
                                           value="<?= old('nama_ayah') ?>" required>
                                    <?php if (isset($errors['nama_ayah'])): ?>
                                        <div class="text-danger"><?= $errors['nama_ayah'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" 
                                           value="<?= old('pekerjaan_ayah') ?>" required>
                                    <?php if (isset($errors['pekerjaan_ayah'])): ?>
                                        <div class="text-danger"><?= $errors['pekerjaan_ayah'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" 
                                           value="<?= old('nama_ibu') ?>" required>
                                    <?php if (isset($errors['nama_ibu'])): ?>
                                        <div class="text-danger"><?= $errors['nama_ibu'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" 
                                           value="<?= old('pekerjaan_ibu') ?>" required>
                                    <?php if (isset($errors['pekerjaan_ibu'])): ?>
                                        <div class="text-danger"><?= $errors['pekerjaan_ibu'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url('admisi/registrasipasien/step3') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Selanjutnya
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>