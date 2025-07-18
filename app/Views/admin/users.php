<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 mb-0"></h2>
                <a href="/admin/users/add" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah User
                </a>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Filter dan Search -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Cari User</label>
                    <input type="text" class="form-control" id="searchUser" placeholder="Username, Email, Nama...">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" id="filterRole">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="farmasi">Farmasi</option>
                        <option value="kasir">Kasir</option>
                        <option value="dokter">Dokter</option>
                        <option value="perawat">Perawat</option>
                        <option value="admisi">Admisi</option>
                        <option value="manajemen">Manajemen</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Spesialisasi</label>
                    <select class="form-select" id="filterSpecialization">
                        <option value="">Semua Spesialisasi</option>
                        <?php if (isset($specializations) && !empty($specializations)): ?>
                            <?php foreach ($specializations as $spec): ?>
                                <option value="<?= esc($spec) ?>"><?= esc($spec) ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="Umum">Umum</option>
                            <option value="Anak">Anak</option>
                            <option value="Jantung">Jantung</option>
                            <option value="Mata">Mata</option>
                            <option value="Kandungan">Kandungan</option>
                            <option value="Bedah">Bedah</option>
                            <option value="Kulit dan Kelamin">Kulit dan Kelamin</option>
                            <option value="Gigi">Gigi</option>
                            <option value="Ortopedi">Ortopedi</option>
                            <option value="Saraf">Saraf</option>
                            <option value="Penyakit Dalam">Penyakit Dalam</option>
                            <option value="THT">THT</option>
                            <option value="Radiologi">Radiologi</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select class="form-select" id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Daftar User</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="usersTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Spesialisasi</th>
                            <th>Status</th>
                            <th>Terakhir Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($users as $user): ?>
                        <tr data-role="<?= $user['role'] ?>" data-status="<?= $user['status_aktif'] ?>" data-specialization="<?= $user['spesialisasi'] ?? '' ?>">
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="fw-medium"><?= esc($user['username']) ?></span>
                            </td>
                            <td><?= esc($user['nama_lengkap']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td>
                                <span class="badge bg-<?= getRoleColor($user['role']) ?>"><?= ucfirst($user['role']) ?></span>
                            </td>
                            <td>
                                <?php if ($user['role'] === 'dokter' && !empty($user['spesialisasi'])): ?>
                                    <span class="badge bg-info text-white">
                                        <i class="fas fa-stethoscope me-1"></i><?= esc($user['spesialisasi']) ?>
                                    </span>
                                <?php elseif ($user['role'] === 'dokter'): ?>
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-user-md me-1"></i>Umum
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($user['status_aktif']): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($user['login_terakhir']): ?>
                                    <?= date('d/m/Y H:i', strtotime($user['login_terakhir'])) ?>
                                <?php else: ?>
                                    <span class="text-muted">Belum pernah login</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/admin/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-<?= $user['status_aktif'] ? 'warning' : 'success' ?>" 
                                            onclick="toggleUserStatus(<?= $user['id'] ?>)" 
                                            title="<?= $user['status_aktif'] ? 'Nonaktifkan' : 'Aktifkan' ?>">
                                        <i class="fas fa-<?= $user['status_aktif'] ? 'ban' : 'check' ?>"></i>
                                    </button>
                                    <?php if ($user['id'] != session()->get('user_id')): ?>
                                    <button class="btn btn-sm btn-outline-danger" 
                                            onclick="confirmDelete(<?= $user['id'] ?>, '<?= esc($user['username']) ?>')" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus user <strong id="deleteUsername"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<style>
/* Stabilize badges to prevent text movement */
.badge {
    display: inline-block;
    min-width: 70px;
    text-align: center;
    font-weight: 500;
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    line-height: 1;
    white-space: nowrap;
    border-radius: 0.375rem;
}

/* Special styling for success badges */
.badge.bg-success {
    background-color: #198754 !important;
    color: #fff !important;
    border: 1px solid #198754;
    font-weight: 600;
}

/* Special styling for secondary badges */
.badge.bg-secondary {
    background-color: #6c757d !important;
    color: #fff !important;
    border: 1px solid #6c757d;
    font-weight: 600;
}

/* Special styling for dark badges */
.badge.bg-dark {
    background-color: #212529 !important;
    color: #fff !important;
    border: 1px solid #212529;
    font-weight: 600;
}

/* Ensure consistent button sizing */
.btn-group .btn-sm {
    min-width: 32px;
    height: 32px;
    padding: 4px 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Prevent table cell content from shifting */
#usersTable td {
    vertical-align: middle;
    padding: 12px 8px;
}

/* Stable text in cells */
#usersTable .fw-medium,
#usersTable .text-muted {
    display: block;
    line-height: 1.4;
}
</style>

<script>
// Toggle specialization filter visibility based on role selection
function toggleSpecializationFilter() {
    const roleFilter = document.getElementById('filterRole');
    const specializationFilter = document.getElementById('filterSpecialization').parentElement;
    
    if (roleFilter.value === 'dokter') {
        specializationFilter.style.display = 'block';
    } else {
        specializationFilter.style.display = 'none';
        document.getElementById('filterSpecialization').value = ''; // Reset filter
    }
}

function filterUsers() {
    const searchTerm = document.getElementById('searchUser').value.toLowerCase();
    const roleFilter = document.getElementById('filterRole').value;
    const specializationFilter = document.getElementById('filterSpecialization').value;
    const statusFilter = document.getElementById('filterStatus').value;
    const rows = document.querySelectorAll('#usersTable tbody tr');

    let visibleCount = 1;
    rows.forEach(row => {
        const username = row.cells[1].textContent.toLowerCase();
        const fullName = row.cells[2].textContent.toLowerCase();
        const email = row.cells[3].textContent.toLowerCase();
        const role = row.getAttribute('data-role');
        const specialization = row.getAttribute('data-specialization');
        const status = row.getAttribute('data-status');

        const matchesSearch = username.includes(searchTerm) || 
                            fullName.includes(searchTerm) || 
                            email.includes(searchTerm);
        const matchesRole = !roleFilter || role === roleFilter;
        const matchesSpecialization = !specializationFilter || specialization === specializationFilter;
        const matchesStatus = statusFilter === '' || status === statusFilter;

        if (matchesSearch && matchesRole && matchesSpecialization && matchesStatus) {
            row.style.display = '';
            row.cells[0].textContent = visibleCount++; // Update sequential number
        } else {
            row.style.display = 'none';
        }
    });
}

function confirmDelete(userId, username) {
    document.getElementById('deleteUsername').textContent = username;
    document.getElementById('confirmDeleteBtn').href = '/admin/users/delete/' + userId;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

function toggleUserStatus(userId) {
    fetch('/admin/users/toggle-status/' + userId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengubah status user');
    });
}

// Auto filter on search input
document.getElementById('searchUser').addEventListener('input', filterUsers);
document.getElementById('filterRole').addEventListener('change', function() {
    toggleSpecializationFilter();
    filterUsers();
});
document.getElementById('filterSpecialization').addEventListener('change', filterUsers);
document.getElementById('filterStatus').addEventListener('change', filterUsers);

// Initialize specialization filter visibility
document.addEventListener('DOMContentLoaded', function() {
    toggleSpecializationFilter();
});
</script>

<?php
function getRoleColor($role) {
    $colors = [
        'admin' => 'dark',
        'farmasi' => 'primary',
        'kasir' => 'success',
        'dokter' => 'info',
        'perawat' => 'warning',
        'admisi' => 'secondary',
        'manajemen' => 'primary'
    ];
    return $colors[$role] ?? 'secondary';
}

?>

<?= $this->endSection() ?>
