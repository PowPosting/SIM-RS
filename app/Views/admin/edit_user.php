<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h3 mb-0"><?= $pageTitle ?></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users">Manajemen User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </nav>
                </div>
                <a href="/admin/users" class="btn btn-outline-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6 class="alert-heading">Terjadi Kesalahan:</h6>
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Edit User Form -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-edit me-2"></i>Edit User: <?= esc($user['username']) ?>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="/admin/users/update/<?= $user['id'] ?>" method="post" id="editUserForm">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" 
                                           value="<?= old('username', $user['username']) ?>" required>
                                    <small class="form-text text-muted">Min. 3 karakter</small>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" 
                                           value="<?= old('email', $user['email']) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" 
                                           value="<?= old('nama_lengkap', $user['nama_lengkap']) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control form-control-sm" id="telepon" name="telepon" 
                                           value="<?= old('telepon', $user['telepon']) ?>" placeholder="0812xxxxxxxx">
                                </div>
                            </div>

                            <!-- Security & Role -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                            <i class="fas fa-eye" id="password-icon"></i>
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">Kosongkan jika tidak mengubah</small>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
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
                                            <option value="<?= $role ?>" <?= (old('role', $user['role']) == $role) ? 'selected' : '' ?>>
                                                <?= ucfirst($role) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Spesialisasi Dokter - Show/hide based on role -->
                                <div class="mb-3" id="specializationField" style="display: <?= ($user['role'] == 'dokter') ? 'block' : 'none' ?>;">
                                    <label for="spesialisasi" class="form-label">Spesialisasi Dokter <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="spesialisasi" name="spesialisasi">
                                        <option value="">Pilih Spesialisasi</option>
                                        <?php foreach ($specializations as $specialization): ?>
                                            <option value="<?= $specialization ?>" <?= (old('spesialisasi', $user['spesialisasi']) == $specialization) ? 'selected' : '' ?>>
                                                <?= $specialization ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-muted">Wajib untuk dokter</small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="status_aktif" name="status_aktif" 
                                               value="1" <?= old('status_aktif', $user['status_aktif']) ? 'checked' : '' ?>>
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
                                              placeholder="Alamat lengkap pengguna"><?= old('alamat', $user['alamat']) ?></textarea>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update User
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

// Role change handler for specialization field
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
});

// Form validation
document.getElementById('editUserForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const role = document.getElementById('role').value;
    const specialization = document.getElementById('specialization').value;
    
    // Only validate password if it's provided
    if (password || confirmPassword) {
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
    }
    
    // Validate specialization for dokter role
    if (role === 'dokter' && !specialization) {
        e.preventDefault();
        alert('Spesialisasi dokter wajib dipilih!');
        return false;
    }
});

// Disable form submission for current user deactivation
<?php if ($user['id'] == session()->get('user_id')): ?>
document.getElementById('is_active').addEventListener('change', function() {
    if (!this.checked) {
        this.checked = true;
        alert('Anda tidak dapat menonaktifkan akun sendiri!');
    }
});
<?php endif; ?>
</script>

<?= $this->endSection() ?>
