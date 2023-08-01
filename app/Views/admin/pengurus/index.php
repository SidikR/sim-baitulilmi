<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="bi bi-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="container table-responsive">
                        <a href="pengurus/tambah"><button type="button" class="btn btn-tambah my-3" data-bs-toggle="modal">
                                <i class="bi bi-plus"></i> Tambah
                            </button></a>

                        <button type="button" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-database-add"></i> Import
                        </button>

                        <!-- Notifikasi berhasil ditambah -->
                        <?php if (session('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('success'); ?>
                            </div>
                        <?php endif ?>

                        <table id="admin_pengurus" class="display table-striped" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th><input type="checkbox" id="selectAllCheckbox" /></th> -->
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($daftar_pengurus as $dp) : ?>
                                    <tr>
                                        <!-- <td><input type="checkbox" class="row-select-checkbox" data-id="<?= $dp->id_pengurus; ?>" /></td> -->
                                        <td><?= $no++; ?></td>
                                        <td><?= $dp->nama_lengkap; ?></td>
                                        <td><?= $dp->jenis_kelamin; ?></td>
                                        <td><?= $dp->jabatan; ?></td>
                                        <td><?= $dp->alamat_pengurus; ?></td>
                                        <td style="width: 15%;">
                                            <a href="<?= 'pengurus/detail/' . $dp->slug_pengurus; ?>"><button type="button" class="btn btn-read btn-sm mb-2"><i class="bi bi-book-fill"></i></button></a>
                                            <a href="<?= 'pengurus/edit/' . $dp->slug_pengurus; ?>"><button type="button" class="btn btn-edit btn-sm mb-2"><i class="bi bi-pencil-square"></i></button></a>
                                            <button type="button" class="btn btn-delete btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $dp->id_pengurus; ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- <button type="button" id="deleteButton" class="btn btn-danger my-3"><i class="bi bi-trash"></i> Hapus Terpilih</button> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal Hapus -->
<?php foreach ($daftar_pengurus as $dp) : ?>
    <div class="modal fade" id="hapusModal<?= $dp->id_pengurus; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Pengurus</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form action="pengurus/hapus/<?= $dp->id_pengurus; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data Pengurus <b><?= $dp->nama_lengkap; ?></b> akan dihapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-delete btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-read btn-sm">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Hapus -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-database-add"></i> Import Data Pengurus</h5>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="pengurus-import" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Unggah File Anda Seperti <a href="<?= base_url('assets/template/Import_Pengurus_Masjid.xlsx'); ?>">Template</a></label>
                        <input class="form-control" type="file" id="formFile" name="import_pengurus" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-delete btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-read btn-sm">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Inisialisasi array selectedRowsData saat halaman dimuat
        let selectedRowsData = [];

        // Handler untuk checkbox "select all"
        $('#selectAllCheckbox').on('change', function() {
            const isChecked = this.checked;
            $('.row-select-checkbox').prop('checked', isChecked);

            // Perbarui array selectedRowsData sesuai dengan pilihan checkbox
            if (isChecked) {
                // Ambil ID dari semua baris yang dicek
                selectedRowsData = $('.row-select-checkbox:checked').map(function() {
                    return $(this).data('id');
                }).get();
            } else {
                // Jika checkbox "select all" tidak dicek, hapus semua data terpilih
                selectedRowsData = [];
            }
        });

        // Handler untuk checkbox pada setiap baris
        $('#admin_pengurus').on('change', '.row-select-checkbox', function() {
            const rowDataId = $(this).data('id');
            if (this.checked) {
                // Jika checkbox pada baris dipilih, tambahkan ID ke dalam selectedRowsData
                selectedRowsData.push(rowDataId);
            } else {
                // Jika checkbox pada baris tidak dipilih, hapus ID dari selectedRowsData
                selectedRowsData = selectedRowsData.filter(id => id !== rowDataId);
            }

            // Perbarui status checkbox "select all" berdasarkan jumlah checkbox yang dipilih
            $('#selectAllCheckbox').prop('checked', $('.row-select-checkbox:checked').length === $('.row-select-checkbox').length);
        });

        // Handler untuk tombol hapus atau aksi penghapusan banyak baris
        $('#deleteButton').on('click', function() {
            // Pastikan ada baris yang dipilih sebelum melakukan penghapusan
            if (selectedRowsData.length > 0) {
                // Konfirmasi pengguna sebelum melakukan penghapusan
                const confirmDelete = confirm("Apakah Anda yakin ingin menghapus data terpilih?");

                if (confirmDelete) {
                    // Kirim data ke server untuk penghapusan data menggunakan AJAX
                    $.ajax({
                        url: 'pengurus/hapus-multiple',
                        method: 'POST',
                        data: {
                            ids: selectedRowsData,
                            <?= csrf_token() ?>: '<?= csrf_hash() ?>' // Tambahkan baris ini jika menggunakan CSRF protection
                        },
                        success: function(response) {
                            console.log(response); // Tambahkan ini untuk melihat respons dari server

                            // Cek apakah penghapusan berhasil berdasarkan respons dari server
                            if (response.status === 'success') {
                                alert('Data terpilih berhasil dihapus.');
                                // Perbarui tampilan DataTable setelah penghapusan berhasil
                                $('#admin_pengurus').DataTable().ajax.reload();
                            } else {
                                alert('Terjadi kesalahan saat menghapus data terpilih.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText); // Tambahkan ini untuk melihat pesan kesalahan dari server
                            alert('Terjadi kesalahan saat menghubungi server.');
                        }
                    });
                }
            } else {
                // Jika tidak ada baris yang dipilih, tampilkan pesan bahwa tidak ada data yang dihapus
                alert('Tidak ada data terpilih untuk dihapus.');
            }
        });
    });
</script>

<?= $this->endSection() ?>