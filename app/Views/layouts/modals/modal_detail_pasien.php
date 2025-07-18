<!-- Modal Detail Pasien -->
<div class="modal fade" id="modalDetailPasien" tabindex="-1" aria-labelledby="modalDetailPasienLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-black">
                <h5 class="modal-title" id="modalDetailPasienLabel">
                    <i class="fas fa-user-circle me-2"></i>
                    Detail Pasien
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Informasi Utama -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-id-card me-2"></i>
                                    Informasi Utama
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4"><strong>No. Rekam Medis:</strong></div>
                                    <div class="col-sm-8" id="detail_no_rekam_medis">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Titel:</strong></div>
                                    <div class="col-sm-8" id="detail_title">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Nama Lengkap:</strong></div>
                                    <div class="col-sm-8" id="detail_nama_lengkap">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Jenis Kelamin:</strong></div>
                                    <div class="col-sm-8" id="detail_jenis_kelamin">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Tempat Lahir:</strong></div>
                                    <div class="col-sm-8" id="detail_tempat_lahir">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Tanggal Lahir:</strong></div>
                                    <div class="col-sm-8" id="detail_tanggal_lahir">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Umur:</strong></div>
                                    <div class="col-sm-8" id="detail_umur">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Status Perkawinan:</strong></div>
                                    <div class="col-sm-8" id="detail_status_perkawinan">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>No. Identitas:</strong></div>
                                    <div class="col-sm-8" id="detail_nomor_identitas">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Email:</strong></div>
                                    <div class="col-sm-8" id="detail_email">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>No. HP:</strong></div>
                                    <div class="col-sm-8" id="detail_nomor_hp">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Alamat -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    Informasi Alamat
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4"><strong>Alamat Lengkap:</strong></div>
                                    <div class="col-sm-8" id="detail_alamat_lengkap">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kelurahan:</strong></div>
                                    <div class="col-sm-8" id="detail_kelurahan">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kecamatan:</strong></div>
                                    <div class="col-sm-8" id="detail_kecamatan">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kota/Kabupaten:</strong></div>
                                    <div class="col-sm-8" id="detail_kabupaten_kota">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Provinsi:</strong></div>
                                    <div class="col-sm-8" id="detail_provinsi">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kode Pos:</strong></div>
                                    <div class="col-sm-8" id="detail_kode_pos">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Penunjang -->
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Informasi Penunjang
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4"><strong>Nama Marga:</strong></div>
                                    <div class="col-sm-8" id="detail_nama_marga">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Agama:</strong></div>
                                    <div class="col-sm-8" id="detail_agama">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Golongan Darah:</strong></div>
                                    <div class="col-sm-8" id="detail_golongan_darah">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Alergi:</strong></div>
                                    <div class="col-sm-8" id="detail_alergi">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Pendidikan:</strong></div>
                                    <div class="col-sm-8" id="detail_pendidikan_terakhir">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kewarganegaraan:</strong></div>
                                    <div class="col-sm-8" id="detail_kewarganegaraan">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Suku:</strong></div>
                                    <div class="col-sm-8" id="detail_suku">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Pekerjaan:</strong></div>
                                    <div class="col-sm-8" id="detail_pekerjaan">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Telp. Rumah:</strong></div>
                                    <div class="col-sm-8" id="detail_no_telepon_rumah">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Darurat -->
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-phone-alt me-2"></i>
                                    Kontak Darurat
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4"><strong>Nama:</strong></div>
                                    <div class="col-sm-8" id="detail_nama_kontak_darurat">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Hubungan:</strong></div>
                                    <div class="col-sm-8" id="detail_hubungan_keluarga">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>No. HP:</strong></div>
                                    <div class="col-sm-8" id="detail_nomor_hp_kontak">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Telp. Rumah:</strong></div>
                                    <div class="col-sm-8" id="detail_telp_rumah">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Alamat:</strong></div>
                                    <div class="col-sm-8" id="detail_alamat_kontak">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kelurahan:</strong></div>
                                    <div class="col-sm-8" id="detail_kelurahan_kontak">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kecamatan:</strong></div>
                                    <div class="col-sm-8" id="detail_kecamatan_kontak">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Kota:</strong></div>
                                    <div class="col-sm-8" id="detail_kota_kontak">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><strong>Provinsi:</strong></div>
                                    <div class="col-sm-8" id="detail_provinsi_kontak">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Sistem -->
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-cogs me-2"></i>
                                    Informasi Sistem
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2"><strong>Tanggal Daftar:</strong></div>
                                    <div class="col-sm-4" id="detail_tanggal_daftar">-</div>
                                    <div class="col-sm-2"><strong>Status:</strong></div>
                                    <div class="col-sm-4" id="detail_status_aktif">-</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2"><strong>Catatan:</strong></div>
                                    <div class="col-sm-10" id="detail_catatan">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>
                    Tutup
                </button>
                <button type="button" class="btn btn-primary" onclick="editPasien()">
                    <i class="fas fa-edit me-2"></i>
                    Edit Data
                </button>
                <button type="button" class="btn btn-success" onclick="buatKunjungan()">
                    <i class="fas fa-plus me-2"></i>
                    Buat Kunjungan
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
    
    console.log('Setting nama_lengkap to:', data.nama_lengkap);
    
    const jenisKelaminElement = document.getElementById('detail_jenis_kelamin');
    jenisKelaminElement.innerHTML = data.jenis_kelamin == 'L' ? 
        '<span class="badge bg-info"><i class="fas fa-male"></i> Laki-laki</span>' : 
        '<span class="badge bg-warning"><i class="fas fa-female"></i> Perempuan</span>';
    
    document.getElementById('detail_tempat_lahir').textContent = data.tempat_lahir || '-';
    document.getElementById('detail_tanggal_lahir').textContent = data.tanggal_lahir_formatted || '-';
    document.getElementById('detail_umur').textContent = (data.umur ? data.umur + ' tahun' : '-');
    document.getElementById('detail_status_perkawinan').textContent = data.status_perkawinan || '-';
    document.getElementById('detail_nomor_identitas').textContent = data.nomor_identitas || '-';
    document.getElementById('detail_email').textContent = data.email || '-';
    
    const nomorHpElement = document.getElementById('detail_nomor_hp');
    nomorHpElement.innerHTML = data.nomor_hp ? 
        '<a href="tel:' + data.nomor_hp + '" class="text-primary">' + data.nomor_hp + '</a>' : '-';
    
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
    document.getElementById('detail_alergi').textContent = data.alergi || '-';
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
        '<a href="tel:' + data.nomor_hp_kontak + '" class="text-primary">' + data.nomor_hp_kontak + '</a>' : '-';
    
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
        '<span class="badge bg-danger">Nonaktif</span>';
    
    document.getElementById('detail_catatan').textContent = data.catatan || '-';
}

function showLoading() {
    // Show loading di semua field
    const detailElements = document.querySelectorAll('[id^="detail_"]');
    detailElements.forEach(element => {
        element.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
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
