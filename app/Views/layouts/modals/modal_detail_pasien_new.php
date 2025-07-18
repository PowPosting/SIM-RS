<!-- Modal Detail Pasien dengan Tab Navigation -->
<div class="modal fade" id="modalDetailPasien" tabindex="-1" aria-labelledby="modalDetailPasienLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title text-dark" id="modalDetailPasienLabel">
                    <i class="fas fa-user-circle me-2 text-primary"></i>
                    Detail Pasien
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="patientDetailTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-pane" type="button" role="tab">
                            <i class="fas fa-user me-2"></i>Informasi Utama
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="alamat-tab" data-bs-toggle="tab" data-bs-target="#alamat-pane" type="button" role="tab">
                            <i class="fas fa-map-marker-alt me-2"></i>Alamat
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="penunjang-tab" data-bs-toggle="tab" data-bs-target="#penunjang-pane" type="button" role="tab">
                            <i class="fas fa-clipboard-list me-2"></i>Info Penunjang
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="kontak-tab" data-bs-toggle="tab" data-bs-target="#kontak-pane" type="button" role="tab">
                            <i class="fas fa-phone me-2"></i>Kontak Darurat
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content p-4" id="patientDetailTabContent">
                    <!-- Informasi Utama Tab -->
                    <div class="tab-pane fade show active" id="info-pane" role="tabpanel" aria-labelledby="info-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">No. Rekam Medis</label>
                                    <div class="fw-bold fs-6 text-primary" id="detail_no_rekam_medis">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Titel</label>
                                    <div id="detail_title">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Nama Lengkap</label>
                                    <div class="fw-bold fs-5" id="detail_nama_lengkap">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Jenis Kelamin</label>
                                    <div id="detail_jenis_kelamin">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Tempat Lahir</label>
                                    <div id="detail_tempat_lahir">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Tanggal Lahir</label>
                                    <div id="detail_tanggal_lahir">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Umur</label>
                                    <div class="fw-bold" id="detail_umur">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Status Perkawinan</label>
                                    <div id="detail_status_perkawinan">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">No. Identitas</label>
                                    <div id="detail_nomor_identitas">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Email</label>
                                    <div id="detail_email">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">No. HP</label>
                                    <div id="detail_nomor_hp">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Status Aktif</label>
                                    <div id="detail_status_aktif">-</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Catatan</label>
                                    <div class="p-2 bg-light rounded" id="detail_catatan">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Tab -->
                    <div class="tab-pane fade" id="alamat-pane" role="tabpanel" aria-labelledby="alamat-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Alamat Lengkap</label>
                                    <div class="p-2 bg-light rounded" id="detail_alamat_lengkap">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kelurahan</label>
                                    <div id="detail_kelurahan">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kecamatan</label>
                                    <div id="detail_kecamatan">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kota/Kabupaten</label>
                                    <div id="detail_kabupaten_kota">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Provinsi</label>
                                    <div id="detail_provinsi">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kode Pos</label>
                                    <div id="detail_kode_pos">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info Penunjang Tab -->
                    <div class="tab-pane fade" id="penunjang-pane" role="tabpanel" aria-labelledby="penunjang-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Nama Marga</label>
                                    <div id="detail_nama_marga">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Agama</label>
                                    <div id="detail_agama">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Golongan Darah</label>
                                    <div class="fw-bold text-danger" id="detail_golongan_darah">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Alergi</label>
                                    <div class="text-warning fw-bold" id="detail_alergi">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Pendidikan Terakhir</label>
                                    <div id="detail_pendidikan_terakhir">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kewarganegaraan</label>
                                    <div id="detail_kewarganegaraan">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Suku</label>
                                    <div id="detail_suku">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Pekerjaan</label>
                                    <div id="detail_pekerjaan">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Telp. Rumah</label>
                                    <div id="detail_no_telepon_rumah">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Tanggal Daftar</label>
                                    <div class="text-muted" id="detail_tanggal_daftar">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Darurat Tab -->
                    <div class="tab-pane fade" id="kontak-pane" role="tabpanel" aria-labelledby="kontak-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Nama Kontak Darurat</label>
                                    <div class="fw-bold" id="detail_nama_kontak_darurat">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Hubungan Keluarga</label>
                                    <div id="detail_hubungan_keluarga">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">No. HP Kontak</label>
                                    <div id="detail_nomor_hp_kontak">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Telp. Rumah</label>
                                    <div id="detail_telp_rumah">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Alamat Kontak</label>
                                    <div class="p-2 bg-light rounded" id="detail_alamat_kontak">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kelurahan</label>
                                    <div id="detail_kelurahan_kontak">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kecamatan</label>
                                    <div id="detail_kecamatan_kontak">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Kota</label>
                                    <div id="detail_kota_kontak">-</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Provinsi</label>
                                    <div id="detail_provinsi_kontak">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="editPasien()">
                    <i class="fas fa-edit me-2"></i>Edit Data
                </button>
                <button type="button" class="btn btn-primary" onclick="buatKunjungan()">
                    <i class="fas fa-plus me-2"></i>Buat Kunjungan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
var currentPasienId = null;

function lihatDetail(pasienId) {
    currentPasienId = pasienId;
    console.log('lihatDetail called with ID:', pasienId);
    
    // Show modal using Bootstrap 5
    var modal = new bootstrap.Modal(document.getElementById('modalDetailPasien'));
    modal.show();
    
    // Show loading
    showLoading();
    
    // Build URL for fetch
    const url = '<?= base_url('admisi/get-detail-pasien') ?>/' + pasienId;
    console.log('Fetching URL:', url);
    
    // Fetch data pasien using native JavaScript
    fetch(url)
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response OK:', response.ok);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                populateModal(data.data);
                hideLoading();
            } else {
                console.error('API Error:', data.message);
                alert('Gagal mengambil data pasien: ' + data.message);
                modal.hide();
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('Error: ' + error);
            modal.hide();
        });
}

function populateModal(data) {
    console.log('populateModal called with data:', data);
    
    // Informasi Utama
    document.getElementById('detail_no_rekam_medis').textContent = data.no_rekam_medis || '-';
    document.getElementById('detail_title').textContent = data.title || '-';
    document.getElementById('detail_nama_lengkap').textContent = data.nama_lengkap || '-';
    
    const jenisKelaminElement = document.getElementById('detail_jenis_kelamin');
    jenisKelaminElement.innerHTML = data.jenis_kelamin == 'L' ? 
        '<span class="badge bg-info text-dark"><i class="fas fa-male"></i> Laki-laki</span>' : 
        '<span class="badge bg-warning text-dark"><i class="fas fa-female"></i> Perempuan</span>';
    
    document.getElementById('detail_tempat_lahir').textContent = data.tempat_lahir || '-';
    document.getElementById('detail_tanggal_lahir').textContent = data.tanggal_lahir_formatted || '-';
    document.getElementById('detail_umur').textContent = (data.umur ? data.umur + ' tahun' : '-');
    document.getElementById('detail_status_perkawinan').textContent = data.status_perkawinan || '-';
    document.getElementById('detail_nomor_identitas').textContent = data.nomor_identitas || '-';
    document.getElementById('detail_email').textContent = data.email || '-';
    
    const nomorHpElement = document.getElementById('detail_nomor_hp');
    nomorHpElement.innerHTML = data.nomor_hp ? 
        '<a href="tel:' + data.nomor_hp + '" class="text-primary text-decoration-none"><i class="fas fa-phone me-1"></i>' + data.nomor_hp + '</a>' : '-';
    
    // Informasi Alamat
    document.getElementById('detail_alamat_lengkap').textContent = data.alamat_lengkap || '-';
    document.getElementById('detail_kelurahan').textContent = data.kelurahan || '-';
    document.getElementById('detail_kecamatan').textContent = data.kecamatan || '-';
    document.getElementById('detail_kabupaten_kota').textContent = data.kabupaten_kota || '-';
    document.getElementById('detail_provinsi').textContent = data.provinsi || '-';
    document.getElementById('detail_kode_pos').textContent = data.kode_pos || '-';
    
    // Informasi Penunjang
    document.getElementById('detail_nama_marga').textContent = data.nama_marga || '-';
    document.getElementById('detail_agama').textContent = data.agama || '-';
    document.getElementById('detail_golongan_darah').textContent = data.golongan_darah || '-';
    document.getElementById('detail_alergi').textContent = data.alergi || 'Tidak ada';
    document.getElementById('detail_pendidikan_terakhir').textContent = data.pendidikan_terakhir || '-';
    document.getElementById('detail_kewarganegaraan').textContent = data.kewarganegaraan || '-';
    document.getElementById('detail_suku').textContent = data.suku || '-';
    document.getElementById('detail_pekerjaan').textContent = data.pekerjaan || '-';
    document.getElementById('detail_no_telepon_rumah').textContent = data.no_telepon_rumah || '-';
    
    // Kontak Darurat
    document.getElementById('detail_nama_kontak_darurat').textContent = data.nama_kontak_darurat || '-';
    document.getElementById('detail_hubungan_keluarga').textContent = data.hubungan_keluarga || '-';
    
    const nomorHpKontakElement = document.getElementById('detail_nomor_hp_kontak');
    nomorHpKontakElement.innerHTML = data.nomor_hp_kontak ? 
        '<a href="tel:' + data.nomor_hp_kontak + '" class="text-primary text-decoration-none"><i class="fas fa-phone me-1"></i>' + data.nomor_hp_kontak + '</a>' : '-';
    
    document.getElementById('detail_telp_rumah').textContent = data.telp_rumah || '-';
    document.getElementById('detail_alamat_kontak').textContent = data.alamat_kontak || '-';
    document.getElementById('detail_kelurahan_kontak').textContent = data.kelurahan_kontak || '-';
    document.getElementById('detail_kecamatan_kontak').textContent = data.kecamatan_kontak || '-';
    document.getElementById('detail_kota_kontak').textContent = data.kota_kontak || '-';
    document.getElementById('detail_provinsi_kontak').textContent = data.provinsi_kontak || '-';
    
    // Informasi Sistem
    document.getElementById('detail_tanggal_daftar').textContent = data.tanggal_daftar_formatted || '-';
    
    const statusAktifElement = document.getElementById('detail_status_aktif');
    statusAktifElement.innerHTML = data.status_aktif == 'aktif' ? 
        '<span class="badge bg-success">Aktif</span>' : 
        '<span class="badge bg-secondary">Nonaktif</span>';
    
    document.getElementById('detail_catatan').textContent = data.catatan || 'Tidak ada catatan';
}

function showLoading() {
    // Show loading di semua field
    const detailElements = document.querySelectorAll('[id^="detail_"]');
    detailElements.forEach(element => {
        element.innerHTML = '<i class="fas fa-spinner fa-spin text-muted"></i> <span class="text-muted">Loading...</span>';
    });
}

function hideLoading() {
    // Hide loading setelah data ter-load
}

function editPasien() {
    if (currentPasienId) {
        window.location.href = '<?= base_url('admisi/edit-pasien') ?>/' + currentPasienId;
    }
}

function buatKunjungan() {
    if (currentPasienId) {
        window.location.href = '<?= base_url('admisi/buat-kunjungan') ?>/' + currentPasienId;
    }
}
</script>
