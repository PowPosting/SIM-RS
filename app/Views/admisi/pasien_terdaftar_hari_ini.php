<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-day mr-2"></i>
                        Pasien Terdaftar Hari Ini
                    </h3>
                    <div class="card-tools">
                        <span class="badge badge-info">
                            <i class="fas fa-clock mr-1"></i>
                            <?= tanggal_hari_ini() ?>
                        </span>
                    </div>
                </div>
                
                <!-- Summary Cards -->
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0"><?= isset($total_pasien_hari_ini) ? $total_pasien_hari_ini : 0 ?></h4>
                                            <small>Total Pasien Hari Ini</small>
                                        </div>
                                        <div class="text-right">
                                            <i class="fas fa-user-plus fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0"><?= isset($pasien_laki_laki) ? $pasien_laki_laki : 0 ?></h4>
                                            <small>Laki-laki</small>
                                        </div>
                                        <div class="text-right">
                                            <i class="fas fa-male fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0"><?= isset($pasien_perempuan) ? $pasien_perempuan : 0 ?></h4>
                                            <small>Perempuan</small>
                                        </div>
                                        <div class="text-right">
                                            <i class="fas fa-female fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0"><?= isset($rata_rata_umur) ? number_format($rata_rata_umur, 0) : 0 ?></h4>
                                            <small>Rata-rata Umur</small>
                                        </div>
                                        <div class="text-right">
                                            <i class="fas fa-birthday-cake fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter dan Search -->
                <div class="card-body pt-0">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchPasien" placeholder="Cari nama pasien, no. rekam medis, atau no. telepon...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btnSearch">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="filterJenisKelamin">
                                <option value="">Semua Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="filterUmur">
                                <option value="">Semua Umur</option>
                                <option value="0-17">0-17 tahun</option>
                                <option value="18-35">18-35 tahun</option>
                                <option value="36-55">36-55 tahun</option>
                                <option value="56-100">56+ tahun</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Pasien -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="tablePasien">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>No. Rekam Medis</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th>Waktu Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pasien_hari_ini) && !empty($pasien_hari_ini)): ?>
                                <?php $no = 1; foreach ($pasien_hari_ini as $p): ?>
                                    <?php 
                                    // Hitung umur
                                    $umur = hitung_umur($p['tanggal_lahir']);
                                    
                                    // Format tanggal Indonesia
                                    $tgl_lahir = tanggal_indonesia($p['tanggal_lahir']);
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <span class="badge badge-primary"><?= esc($p['no_rekam_medis']) ?></span>
                                        </td>
                                        <td>
                                            <strong><?= esc($p['title']) ?> <?= esc($p['nama_lengkap']) ?></strong>
                                        </td>
                                        <td>
                                            <?php if ($p['jenis_kelamin'] == 'L'): ?>
                                                <span class="badge badge-info">
                                                    <i class="fas fa-male mr-1"></i>Laki-laki
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-female mr-1"></i>Perempuan
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $umur ?> tahun</td>
                                        <td>
                                            <?= esc($p['tempat_lahir']) ?>, 
                                            <?= $tgl_lahir ?>
                                        </td>
                                        <td>
                                            <a href="tel:<?= esc($p['nomor_hp']) ?>" class="text-decoration-none">
                                                <i class="fas fa-phone mr-1"></i><?= esc($p['nomor_hp']) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <?= esc(substr($p['alamat_lengkap'], 0, 50)) ?>...
                                            </small>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <?= date('H:i', strtotime($p['tanggal_daftar'])) ?>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" onclick="lihatDetail(<?= $p['id'] ?>)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-success" onclick="buatKunjungan(<?= $p['id'] ?>)">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="editPasien(<?= $p['id'] ?>)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-calendar-times fa-3x mb-3"></i>
                                            <h5>Belum ada pasien yang terdaftar hari ini</h5>
                                            <p>Silakan lakukan registrasi pasien baru</p>
                                            <a href="<?= base_url('admisi/registrasipasien') ?>" class="btn btn-primary">
                                                <i class="fas fa-plus mr-2"></i>Registrasi Pasien Baru
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if (isset($pasien_hari_ini) && !empty($pasien_hari_ini)): ?>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <small class="text-muted">
                                    Menampilkan <?= count($pasien_hari_ini) ?> pasien yang terdaftar hari ini
                                </small>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="<?= base_url('admisi/datapasien') ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-list mr-2"></i>Lihat Semua Pasien
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pasien -->
<div class="modal fade" id="modalDetailPasien" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetailBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    // Search functionality
    $('#searchPasien').on('keyup', function() {
        filterTable();
    });
    
    $('#filterJenisKelamin, #filterUmur').on('change', function() {
        filterTable();
    });
    
    function filterTable() {
        var searchText = $('#searchPasien').val().toLowerCase();
        var filterJenisKelamin = $('#filterJenisKelamin').val();
        var filterUmur = $('#filterUmur').val();
        
        $('#tablePasien tbody tr').each(function() {
            var row = $(this);
            var nama = row.find('td:eq(2)').text().toLowerCase();
            var noRekamMedis = row.find('td:eq(1)').text().toLowerCase();
            var noTelepon = row.find('td:eq(6)').text().toLowerCase();
            var jenisKelamin = row.find('td:eq(3)').text().includes('Laki-laki') ? 'L' : 'P';
            var umur = parseInt(row.find('td:eq(4)').text());
            
            var matchSearch = nama.includes(searchText) || 
                             noRekamMedis.includes(searchText) || 
                             noTelepon.includes(searchText);
            
            var matchJenisKelamin = !filterJenisKelamin || jenisKelamin === filterJenisKelamin;
            
            var matchUmur = true;
            if (filterUmur) {
                var range = filterUmur.split('-');
                var minUmur = parseInt(range[0]);
                var maxUmur = range[1] === '100' ? 999 : parseInt(range[1]);
                matchUmur = umur >= minUmur && umur <= maxUmur;
            }
            
            if (matchSearch && matchJenisKelamin && matchUmur) {
                row.show();
            } else {
                row.hide();
            }
        });
    }
});

function lihatDetail(id) {
    // Load patient details
    $.ajax({
        url: '<?= base_url('admisi/detailpasien') ?>/' + id,
        type: 'GET',
        success: function(response) {
            $('#modalDetailBody').html(response);
            $('#modalDetailPasien').modal('show');
        },
        error: function() {
            alert('Gagal memuat detail pasien');
        }
    });
}

function buatKunjungan(id) {
    // Redirect to create new visit
    window.location.href = '<?= base_url('admisi/kunjungan/buat') ?>/' + id;
}

function editPasien(id) {
    // Redirect to edit patient
    window.location.href = '<?= base_url('admisi/editpasien') ?>/' + id;
}
</script>
<?= $this->endSection() ?>
