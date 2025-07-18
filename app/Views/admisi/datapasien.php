<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-2"></i>
                        Data Pasien
                    </h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Cari pasien...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>TTL</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pasien) && !empty($pasien)): ?>
                                <?php $no = 1; foreach ($pasien as $p): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($p['nama_lengkap']) ?></td>
                                        <td><?= esc($p['tempat_lahir']) ?>, <?= tanggal_indonesia($p['tanggal_lahir']) ?></td>
                                        <td><?= esc($p['nomor_hp']) ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" onclick="lihatDetail(<?= $p['id'] ?>)" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="editPasien(<?= $p['id'] ?>)" title="Edit Data">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="hapusPasien(<?= $p['id'] ?>, '<?= esc($p['nama_lengkap']) ?>')" title="Hapus Data">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data pasien</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Modal Detail Pasien -->
<?= $this->include('layouts/modals/modal_detail_pasien_new') ?>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="modalDeletePasien" tabindex="-1" aria-labelledby="modalDeletePasienLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title text-danger" id="modalDeletePasienLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Konfirmasi Hapus Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-user-times fa-3x text-danger mb-3"></i>
                    <h6>Apakah Anda yakin ingin menghapus data pasien?</h6>
                    <p class="text-muted mb-3">
                        <strong>Nama:</strong> <span id="delete_nama_pasien">-</span><br>
                        <small class="text-warning">
                            <i class="fas fa-warning me-1"></i>
                            Data yang dihapus tidak dapat dikembalikan!
                        </small>
                    </p>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="button" class="btn btn-danger" id="btnConfirmDelete">
                    <i class="fas fa-trash me-2"></i>Ya, Hapus Data
                </button>
            </div>
        </div>
    </div>
</div>

<script>
var deletePasienId = null;

function editPasien(pasienId) {
    // Redirect ke halaman edit
    window.location.href = '<?= base_url('admisi/edit-pasien') ?>/' + pasienId;
}

function hapusPasien(pasienId, namaPasien) {
    deletePasienId = pasienId;
    
    // Set nama pasien di modal
    document.getElementById('delete_nama_pasien').textContent = namaPasien;
    
    // Show modal konfirmasi
    var modal = new bootstrap.Modal(document.getElementById('modalDeletePasien'));
    modal.show();
}

// Event listener untuk tombol konfirmasi delete
document.getElementById('btnConfirmDelete').addEventListener('click', function() {
    if (deletePasienId) {
        // Show loading
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menghapus...';
        this.disabled = true;
        
        // Send delete request
        fetch('<?= base_url('admisi/delete-pasien') ?>/' + deletePasienId, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide modal
                bootstrap.Modal.getInstance(document.getElementById('modalDeletePasien')).hide();
                
                // Show success message
                alert('Data pasien berhasil dihapus!');
                
                // Reload page
                window.location.reload();
            } else {
                alert('Gagal menghapus data: ' + data.message);
                
                // Reset button
                document.getElementById('btnConfirmDelete').innerHTML = '<i class="fas fa-trash me-2"></i>Ya, Hapus Data';
                document.getElementById('btnConfirmDelete').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
            
            // Reset button
            document.getElementById('btnConfirmDelete').innerHTML = '<i class="fas fa-trash me-2"></i>Ya, Hapus Data';
            document.getElementById('btnConfirmDelete').disabled = false;
        });
    }
});
</script>

<?= $this->endSection() ?>
