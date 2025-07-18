<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-tachometer-alt"></i> <?= $pageTitle ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Statistik -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Pendaftaran Hari Ini</h6>
                                            <h4><?= $stats['new_registrations'] ?></h4>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-user-plus fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Pasien</h6>
                                            <h4><?= $stats['total_patients'] ?></h4>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Bulan Ini</h6>
                                            <h4><?= $stats['this_month'] ?></h4>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-calendar-alt fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Tahun Ini</h6>
                                            <h4><?= $stats['this_year'] ?></h4>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-chart-line fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu Navigasi -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="text-muted mb-3">Menu Utama</h6>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                                    <h6 class="card-title">Pendaftaran Pasien</h6>
                                    <p class="card-text text-muted">Daftarkan pasien baru</p>
                                    <a href="<?= base_url('admisi/registrasipasien') ?>" class="btn btn-primary">Akses</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                                    <h6 class="card-title">Data Pasien</h6>
                                    <p class="card-text text-muted">Lihat data pasien</p>
                                    <a href="<?= base_url('admisi/datapasien') ?>" class="btn btn-success">Akses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
