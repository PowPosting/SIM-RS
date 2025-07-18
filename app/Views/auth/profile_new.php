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
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="alert-heading"><i class="fas fa-check-circle me-2"></i>Berhasil!</h6>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan!</h6>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

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

    <!-- Profile Form -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-cog me-2"></i>Profile Saya
                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('profile/update') ?>" method="post" id="profileForm">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
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
                                    <label for="full_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="full_name" name="full_name" 
                                           value="<?= old('full_name', $user['full_name']) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control form-control-sm" id="phone" name="phone" 
                                           value="<?= old('phone', $user['phone']) ?>" placeholder="0812xxxxxxxx">
                                </div>
                            </div>

                            <!-- Role & Status Info -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control form-control-sm" id="role" 
                                           value="<?= ucfirst($user['role']) ?>" readonly>
                                    <small class="form-text text-muted">Ditentukan oleh administrator</small>
                                </div>

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

                                <?php if (isset($user['specialization']) && $user['role'] === 'dokter'): ?>
                                <div class="mb-3">
                                    <label for="specialization" class="form-label">Spesialisasi</label>
                                    <input type="text" class="form-control form-control-sm" id="specialization" 
                                           value="<?= $user['specialization'] ?>" readonly>
                                    <small class="form-text text-muted">Hubungi admin untuk mengubah</small>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Address & Actions -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control form-control-sm" id="address" name="address" rows="4" 
                                              placeholder="Alamat lengkap"><?= old('address', $user['address']) ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="last_login" class="form-label">Login Terakhir</label>
                                    <input type="text" class="form-control form-control-sm" id="last_login" 
                                           value="<?= $user['last_login'] ? date('d/m/Y H:i', strtotime($user['last_login'])) : 'Belum pernah login' ?>" readonly>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                                    </button>
                                    <a href="/dashboard" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Kembali
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

// Form validation
document.getElementById('profileForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
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
});
</script>

<?= $this->endSection() ?>
