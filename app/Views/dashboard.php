<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
.text-gray-300 {
    color: #dddfeb !important;
}
.hero-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
}
.stats-card {
    transition: transform 0.3s ease;
}
.stats-card:hover {
    transform: translateY(-5px);
}
.quick-action-btn {
    transition: all 0.3s ease;
    border-radius: 10px;
}
.quick-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Welcome Hero Section -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm mb-4 hero-gradient">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="text-white">
                            <h1 class="display-4 fw-bold mb-3 text-white">
                                Selamat Datang di SIMRS 
                                <span class="text-warning">RS HAMORI</span>
                            </h1>
                            <p class="lead mb-4 text-white">
                                Sistem Informasi Manajemen Rumah Sakit yang terintegrasi untuk memberikan 
                                pelayanan kesehatan terbaik bagi pasien dan masyarakat.
                            </p>
                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-user-md fa-2x text-warning me-3"></i>
                                        <div>
                                            <h5 class="mb-0 text-white">Dokter Profesional</h5>
                                            <small class="text-white-50">Tim medis berpengalaman</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-heartbeat fa-2x text-warning me-3"></i>
                                        <div>
                                            <h5 class="mb-0 text-white">Pelayanan 24/7</h5>
                                            <small class="text-white-50">Siap melayani sepanjang waktu</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-shield-alt fa-2x text-warning me-3"></i>
                                        <div>
                                            <h5 class="mb-0 text-white">Fasilitas Lengkap</h5>
                                            <small class="text-white-50">Teknologi medis terkini</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <img src="<?= base_url('img/hero.png') ?>" 
                             alt="Medical Illustration" 
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
