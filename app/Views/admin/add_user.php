<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users">Manajemen User</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ol>
                    </nav>
                </div>
                <a href="/admin/users" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan:</h6>
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Add User Form -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-plus me-2"></i>Form Tambah User
                    </h5>
                </div>
                <div class="card-body">
                    <form action="/admin/users/save" method="post" id="addUserForm">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" 
                                           value="<?= old('username') ?>" required>
                                    <small class="form-text text-muted">Min. 3 karakter</small>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" 
                                           value="<?= old('email') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" 
                                           value="<?= old('nama_lengkap') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control form-control-sm" id="telepon" name="telepon" 
                                           value="<?= old('telepon') ?>" placeholder="0812xxxxxxxx">
                                </div>
                            </div>

                            <!-- Security & Role -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                            <i class="fas fa-eye" id="password-icon"></i>
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">Min. 6 karakter</small>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_password')">
                                            <i class="fas fa-eye" id="confirm_password-icon"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="role" name="role" required>
                                        <option value="">Pilih Role</option>
                                        <?php foreach ($roles as $role): ?>
                                            <option value="<?= $role ?>" <?= old('role') == $role ? 'selected' : '' ?>>
                                                <?= ucfirst($role) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Spesialisasi Dokter - Hidden by default -->
                                <div class="mb-3" id="specializationField" style="display: none;">
                                    <label for="spesialisasi" class="form-label">Spesialisasi Dokter <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="spesialisasi" name="spesialisasi">
                                        <option value="">Pilih Spesialisasi</option>
                                        <?php foreach ($specializations as $specialization): ?>
                                            <option value="<?= $specialization ?>" <?= old('spesialisasi') == $specialization ? 'selected' : '' ?>>
                                                <?= $specialization ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-muted">Wajib untuk dokter</small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="status_aktif" name="status_aktif" 
                                               value="1" <?= old('status_aktif') ? 'checked' : 'checked' ?>>
                                        <label class="form-check-label" for="status_aktif">
                                            User Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Address & Actions -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="4" 
                                              placeholder="Alamat lengkap pengguna"><?= old('alamat') ?></textarea>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan User
                                    </button>
                                    <a href="/admin/users" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.className = 'fas fa-eye-slash';
    } else {
        field.type = 'password';
        icon.className = 'fas fa-eye';
    }
}

// Role information update
document.getElementById('role').addEventListener('change', function() {
    const role = this.value;
    const specializationField = document.getElementById('specializationField');
    const specializationSelect = document.getElementById('spesialisasi');
    
    // Show/hide specialization field based on role
    if (role === 'dokter') {
        specializationField.style.display = 'block';
        specializationSelect.required = true;
    } else {
        specializationField.style.display = 'none';
        specializationSelect.required = false;
        specializationSelect.value = ''; // Reset selection
    }
    
    const roleInfos = {
        'admin': 'Akses penuh ke semua fitur sistem termasuk manajemen user',
        'farmasi': 'Dapat mengelola obat, resep, inventori farmasi, dan laporan farmasi',
        'kasir': 'Dapat mengelola transaksi pembayaran, billing, dan laporan keuangan',
        'dokter': 'Dapat mengelola rekam medis, diagnosa, resep, dan jadwal praktik',
        'perawat': 'Dapat mengelola perawatan pasien, monitoring vital, dan administrasi obat',
        'admisi': 'Dapat mengelola pendaftaran pasien, BPJS, dan administrasi umum',
        'manajemen': 'Dapat mengakses laporan, analisis data, dan pengaturan rumah sakit'
    };
    
    const infoElement = document.getElementById('roleInfo');
    if (role && roleInfos[role]) {
        if (infoElement) {
            infoElement.innerHTML = `<li><strong>${role.charAt(0).toUpperCase() + role.slice(1)}:</strong> ${roleInfos[role]}</li>`;
        }
    } else {
        if (infoElement) {
            infoElement.innerHTML = `
                <li><strong>Admin:</strong> Akses penuh ke semua fitur sistem</li>
                <li><strong>Farmasi:</strong> Manajemen obat, resep, dan inventori</li>
                <li><strong>Kasir:</strong> Transaksi pembayaran dan laporan keuangan</li>
                <li><strong>Dokter:</strong> Rekam medis, diagnosa, dan resep</li>
                <li><strong>Perawat:</strong> Perawatan pasien dan monitoring</li>
                <li><strong>Admisi:</strong> Pendaftaran dan administrasi pasien</li>
                <li><strong>Manajemen:</strong> Laporan dan analisis data</li>
            `;
        }
    }
});

// Form validation
document.getElementById('addUserForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const role = document.getElementById('role').value;
    const specialization = document.getElementById('spesialisasi').value;
    
    if (password !== confirmPassword) {
        e.preventDefault();
        alert('Password dan konfirmasi password tidak sama!');
        return false;
    }
    
    if (password.length < 6) {
        e.preventDefault();
        alert('Password minimal 6 karakter!');
        return false;
    }
    
    // Validasi spesialisasi untuk dokter
    if (role === 'dokter' && !specialization) {
        e.preventDefault();
        alert('Spesialisasi dokter wajib dipilih!');
        return false;
    }
});
</script>

<?= $this->endSection() ?>
