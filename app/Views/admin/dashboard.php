<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h2 class="h3 mb-4">Dashboard Administrator</h2>
        </div>
    </div>

    <!-- Statistik Sistem -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white shadow-soft" style="background: var(--soft-blue);">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Total Users</h5>
                            <h2 class="mb-0"><?= $stats['total_users'] ?? 0 ?></h2>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-users fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white shadow-soft" style="background: var(--soft-green);">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Active Users</h5>
                            <h2 class="mb-0"><?= $stats['active_users'] ?? 0 ?></h2>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-user-check fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white shadow-soft" style="background: var(--soft-orange);">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Total Dokter</h5>
                            <h2 class="mb-0"><?= $stats['total_doctors'] ?? 0 ?></h2>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-stethoscope fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-server fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white shadow-soft" style="background: var(--soft-cyan);">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Total Perawat</h5>
                            <h2 class="mb-0"><?= $stats['total_nurses'] ?? 0 ?></h2>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-heartbeat fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Administrasi -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-soft rounded-soft">
                <div class="card-body text-center">
                    <i class="fas fa-user-cog fa-3x text-soft-blue mb-3"></i>
                    <h5 class="card-title">Manajemen User</h5>
                    <p class="card-text">Kelola user dan role sistem</p>
                    <a href="<?= base_url('admin/users') ?>" class="btn btn-primary rounded-soft">
                        <i class="fas fa-users me-2"></i>Users
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-soft rounded-soft">
                <div class="card-body text-center">
                    <i class="fas fa-shield-alt fa-3x text-soft-green mb-3"></i>
                    <h5 class="card-title">Security & Permissions</h5>
                    <p class="card-text">Kelola keamanan dan hak akses</p>
                    <a href="<?= base_url('admin/security') ?>" class="btn btn-success rounded-soft">
                        <i class="fas fa-lock me-2"></i>Security
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-soft rounded-soft">
                <div class="card-body text-center">
                    <i class="fas fa-database fa-3x text-soft-orange mb-3"></i>
                    <h5 class="card-title">Database Management</h5>
                    <p class="card-text">Backup, restore, dan maintenance</p>
                    <a href="<?= base_url('admin/database') ?>" class="btn btn-warning rounded-soft">
                        <i class="fas fa-hdd me-2"></i>Database
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-soft rounded-soft">
                <div class="card-body text-center">
                    <i class="fas fa-chart-line fa-3x text-soft-cyan mb-3"></i>
                    <h5 class="card-title">System Monitor</h5>
                    <p class="card-text">Monitor performa dan logs</p>
                    <a href="<?= base_url('admin/monitor') ?>" class="btn btn-info rounded-soft">
                        <i class="fas fa-eye me-2"></i>Monitor
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- System Information -->
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-soft rounded-soft">
                <div class="card-header bg-soft-blue">
                    <h5 class="card-title mb-0">System Logs (Recent)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Level</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= date('Y-m-d H:i:s', strtotime('-5 minutes')) ?></td>
                                    <td><span class="badge" style="background: var(--soft-cyan); color: white;">INFO</span></td>
                                    <td>admin</td>
                                    <td>LOGIN</td>
                                    <td>User logged in successfully</td>
                                </tr>
                                <tr>
                                    <td><?= date('Y-m-d H:i:s', strtotime('-15 minutes')) ?></td>
                                    <td><span class="badge" style="background: var(--soft-green); color: white;">SUCCESS</span></td>
                                    <td>system</td>
                                    <td>BACKUP</td>
                                    <td>Database backup completed</td>
                                </tr>
                                <tr>
                                    <td><?= date('Y-m-d H:i:s', strtotime('-30 minutes')) ?></td>
                                    <td><span class="badge" style="background: var(--soft-orange); color: white;">WARNING</span></td>
                                    <td>dr_smith</td>
                                    <td>FAILED_LOGIN</td>
                                    <td>Failed login attempt</td>
                                </tr>
                                <tr>
                                    <td><?= date('Y-m-d H:i:s', strtotime('-1 hour')) ?></td>
                                    <td><span class="badge" style="background: var(--soft-cyan); color: white;">INFO</span></td>
                                    <td>nurse_jane</td>
                                    <td>DATA_UPDATE</td>
                                    <td>Patient record updated</td>
                                </tr>
                                <tr>
                                    <td><?= date('Y-m-d H:i:s', strtotime('-2 hours')) ?></td>
                                    <td><span class="badge" style="background: var(--soft-pink); color: white;">ERROR</span></td>
                                    <td>system</td>
                                    <td>DB_ERROR</td>
                                    <td>Database connection timeout</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 shadow-soft rounded-soft">
                <div class="card-header bg-soft-green">
                    <h5 class="card-title mb-0">System Status</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                            <span>Database</span>
                            <span class="badge" style="background: var(--soft-green); color: white;">Online</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                            <span>Web Server</span>
                            <span class="badge" style="background: var(--soft-green); color: white;">Running</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                            <span>Backup Service</span>
                            <span class="badge" style="background: var(--soft-green); color: white;">Active</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                            <span>Security Scan</span>
                            <span class="badge" style="background: var(--soft-orange); color: white;">Scheduled</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-soft rounded-soft">
                <div class="card-header bg-soft-purple">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary rounded-soft">
                            <i class="fas fa-plus me-2"></i>Add New User
                        </button>
                        <button class="btn btn-outline-success rounded-soft">
                            <i class="fas fa-download me-2"></i>Backup Database
                        </button>
                        <button class="btn btn-outline-warning rounded-soft">
                            <i class="fas fa-broom me-2"></i>Clear Cache
                        </button>
                        <button class="btn btn-outline-info rounded-soft">
                            <i class="fas fa-sync me-2"></i>Refresh System
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
