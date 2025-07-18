<!-- Main Header/Navbar -->
<header class="main-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header-left">
                <button class="btn btn-outline-secondary d-md-none" id="mobileSidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title"><?= $pageTitle ?? 'Dashboard' ?></h1>
            </div>
            
            <!-- Real-time Clock (Center) -->
            <div class="header-center d-none d-lg-block">
                <div class="text-muted">
                    <i class="fas fa-clock me-1"></i>
                    <span id="navbar-clock"></span>
                </div>
            </div>
            
            <div class="header-right">
                <!-- Notification Icon -->
                <div class="dropdown me-3">
                    <button class="btn btn-outline-secondary position-relative" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        <li><h6 class="dropdown-header">Notifikasi</h6></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-user-plus text-primary me-2"></i>
                            Pasien baru terdaftar
                            <small class="text-muted d-block">2 menit yang lalu</small>
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-pills text-warning me-2"></i>
                            Stok obat menipis
                            <small class="text-muted d-block">15 menit yang lalu</small>
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-calendar text-info me-2"></i>
                            Jadwal pemeriksaan
                            <small class="text-muted d-block">1 jam yang lalu</small>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center" href="#">Lihat semua notifikasi</a></li>
                    </ul>
                </div>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar me-2">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="user-info d-none d-md-block text-start">
                            <span class="user-name"><?= session()->get('nama_lengkap') ?? 'User' ?></span>
                            <small class="user-role d-block text-muted"><?= ucfirst(session()->get('role') ?? 'Role') ?></small>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><h6 class="dropdown-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-circle me-2 fs-4"></i>
                                <div>
                                    <div><?= session()->get('nama_lengkap') ?? 'User' ?></div>
                                    <small class="text-muted"><?= ucfirst(session()->get('role') ?? 'Role') ?></small>
                                </div>
                            </div>
                        </h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('/profile') ?>">
                            <i class="fas fa-user-cog me-2"></i>Profile Saya
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('/logout') ?>">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
