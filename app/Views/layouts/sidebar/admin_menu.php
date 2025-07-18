<!-- Admin Menu -->

<!-- Sub Header - Divisi Admisi -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;">Pendaftaran Pasien</li>

<!-- Dashboard Admisi dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="<?= base_url('admisi/dashboard') ?>" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Admisi">
        <i class="fas fa-user-plus nav-icon"></i>
        <span class="nav-text">Dashboard Admisi</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Pendaftaran Pasien -->
        <li class="submenu-item">
            <a href="<?= base_url('admisi/registrasipasien') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Pendaftaran Pasien">
                <i class="fas fa-user-plus submenu-icon"></i>
                <span class="submenu-text">Pendaftaran Pasien</span>
            </a>
        </li>
        
        <!-- Data Pasien -->
        <li class="submenu-item">
            <a href="<?= base_url('admisi/datapasien') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Pasien">
                <i class="fas fa-user-injured submenu-icon"></i>
                <span class="submenu-text">Data Pasien</span>
            </a>
        </li>
        <!-- Pasien Terdaftar Hari Ini -->
        <li class="submenu-item">
            <a href="<?= base_url('admisi/pasien-hari-ini') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Pasien Terdaftar Hari Ini">
                <i class="fas fa-calendar-day submenu-icon"></i>
                <span class="submenu-text">Pasien Terdaftar Hari Ini</span>
            </a>
        </li>
    </ul>
</li>


<!-- Sub Header - Divisi Perawat -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;"> Nurs Station</li>

<!-- Dashboard Perawat dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="#" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Perawat">
        <i class="fas fa-user-nurse nav-icon"></i>
        <span class="nav-text">Dashboard Perawat</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Data Pasien -->
        <li class="submenu-item">
            <a href="<?= base_url('patients') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Pasien">
                <i class="fas fa-user-injured submenu-icon"></i>
                <span class="submenu-text">Data Pasien</span>
            </a>
        </li>
        
        <!-- Perawatan Pasien -->
        <li class="submenu-item">
            <a href="<?= base_url('patient-care') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Perawatan Pasien">
                <i class="fas fa-user-nurse submenu-icon"></i>
                <span class="submenu-text">Perawatan Pasien</span>
            </a>
        </li>
        
        <!-- Jadwal Shift -->
        <li class="submenu-item">
            <a href="<?= base_url('nurse-schedule') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Jadwal Shift">
                <i class="fas fa-clock submenu-icon"></i>
                <span class="submenu-text">Jadwal Shift</span>
            </a>
        </li>
    </ul>
</li>


<!-- Sub Header - Divisi Dokter -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;"> SOAP Dokter</li>

<!-- Dashboard Dokter dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="#" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Dokter">
        <i class="fas fa-user-md nav-icon"></i>
        <span class="nav-text">Dashboard Dokter</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Data Pasien -->
        <li class="submenu-item">
            <a href="<?= base_url('patients') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Pasien">
                <i class="fas fa-user-injured submenu-icon"></i>
                <span class="submenu-text">Data Pasien</span>
            </a>
        </li>
        
        <!-- Jadwal Dokter -->
        <li class="submenu-item">
            <a href="<?= base_url('doctor-schedule') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Jadwal Dokter">
                <i class="fas fa-calendar-alt submenu-icon"></i>
                <span class="submenu-text">Jadwal Dokter</span>
            </a>
        </li>
    </ul>
</li>

<!-- Sub Header - Divisi Farmasi -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;">Farmasi</li>

<!-- Dashboard Farmasi dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="#" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Farmasi">
        <i class="fas fa-pills nav-icon"></i>
        <span class="nav-text">Dashboard Farmasi</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Stok Obat -->
        <li class="submenu-item">
            <a href="<?= base_url('farmasi/stok-obat') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Stok Obat">
                <i class="fas fa-boxes submenu-icon"></i>
                <span class="submenu-text">Stok Obat</span>
            </a>
        </li>
        
        <!-- Resep Obat -->
        <li class="submenu-item">
            <a href="<?= base_url('farmasi/resep-obat') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Resep Obat">
                <i class="fas fa-prescription submenu-icon"></i>
                <span class="submenu-text">Resep Obat</span>
            </a>
        </li>
        
        <!-- Laporan Farmasi -->
        <li class="submenu-item">
            <a href="<?= base_url('farmasi/laporan') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan Farmasi">
                <i class="fas fa-chart-line submenu-icon"></i>
                <span class="submenu-text">Laporan Farmasi</span>
            </a>
        </li>
    </ul>
</li>

<!-- Sub Header - Divisi Kasir -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;">Kasir</li>

<!-- Dashboard Kasir dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="#" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Kasir">
        <i class="fas fa-cash-register nav-icon"></i>
        <span class="nav-text">Dashboard Kasir</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Kasir -->
        <li class="submenu-item">
            <a href="<?= base_url('cashier') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Kasir">
                <i class="fas fa-cash-register submenu-icon"></i>
                <span class="submenu-text">Kasir</span>
            </a>
        </li>
        
        <!-- Pembayaran -->
        <li class="submenu-item">
            <a href="<?= base_url('payments') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Pembayaran">
                <i class="fas fa-credit-card submenu-icon"></i>
                <span class="submenu-text">Pembayaran</span>
            </a>
        </li>
        
        <!-- Tagihan -->
        <li class="submenu-item">
            <a href="<?= base_url('billing') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Tagihan">
                <i class="fas fa-file-invoice submenu-icon"></i>
                <span class="submenu-text">Tagihan</span>
            </a>
        </li>
        
        <!-- Laporan Keuangan -->
        <li class="submenu-item">
            <a href="<?= base_url('financial-reports') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan Keuangan">
                <i class="fas fa-chart-pie submenu-icon"></i>
                <span class="submenu-text">Laporan Keuangan</span>
            </a>
        </li>
    </ul>
</li>


<!-- Sub Header - Divisi Manajemen -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;">Manajemen</li>

<!-- Dashboard Manajemen dengan Dropdown -->
<li class="nav-item has-submenu">
    <a href="#" class="nav-link submenu-toggle" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Manajemen">
        <i class="fas fa-chart-line nav-icon"></i>
        <span class="nav-text">Dashboard Manajemen</span>
        <i class="fas fa-chevron-down submenu-arrow"></i>
    </a>
    <ul class="submenu">
        <!-- Laporan -->
        <li class="submenu-item">
            <a href="<?= base_url('reports') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan">
                <i class="fas fa-chart-bar submenu-icon"></i>
                <span class="submenu-text">Laporan</span>
            </a>
        </li>
        
        <!-- Statistik -->
        <li class="submenu-item">
            <a href="<?= base_url('statistics') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Statistik">
                <i class="fas fa-chart-pie submenu-icon"></i>
                <span class="submenu-text">Statistik</span>
            </a>
        </li>
        
        <!-- Laporan Keuangan -->
        <li class="submenu-item">
            <a href="<?= base_url('management-financial-reports') ?>" class="submenu-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan Keuangan">
                <i class="fas fa-money-bill-wave submenu-icon"></i>
                <span class="submenu-text">Laporan Keuangan</span>
            </a>
        </li>
    </ul>
</li>

<!-- Sub Header - Administrasi Sistem -->
<li class="nav-header" style="font-size: 0.85em; color: #6c757d;"> Admin Master Data Sistem</li>

<!-- User Management -->
<li class="nav-item">
    <a href="<?= base_url('admin/users') ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen User">
        <i class="fas fa-users-cog nav-icon"></i>
        <span class="nav-text">Manajemen User</span>
    </a>
</li>

<!-- Database Management -->
<li class="nav-item">
    <a href="<?= base_url('admin/database') ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Database">
        <i class="fas fa-database nav-icon"></i>
        <span class="nav-text">Database</span>
    </a>
</li>
