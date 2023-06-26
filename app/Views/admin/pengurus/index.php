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
                        <a href="pengurus/tambah"><button type="button" class="btn btn-primary my-3" data-bs-toggle="modal">
                                <i class="bi bi-plus"></i> Tambah
                            </button></a>

                        <button type="button" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-database-add"></i> Import
                        </button>

                        <!-- ini notifikasi Berhasil ditambah -->
                        <?php if (session('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('success'); ?>
                            </div>
                        <?php endif ?>
                        <table id="admin_pengurus" class="display table-striped" width="100%">
                            <thead>
                                <tr>
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
                                        <td><?= $no++; ?></td>
                                        <td><?= $dp->nama_lengkap; ?></td>
                                        <td><?= $dp->jenis_kelamin; ?></td>
                                        <td><?= $dp->jabatan; ?></td>
                                        <td><?= $dp->alamat_pengurus; ?></td>
                                        <td style="width: 15%;">
                                            <a href="<?= 'pengurus/detail/' . $dp->slug_pengurus; ?>"><button type="button" class="btn btn-success btn-sm mb-2"><i class="bi bi-book-fill"></i></button></a>
                                            <a href="<?= 'pengurus/edit/' . $dp->slug_pengurus; ?>"><button type="button" class="btn btn-primary btn-sm mb-2"><i class="bi bi-pencil-square"></i></button></a>
                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $dp->id_pengurus; ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal Hapus -->
<?php foreach ($daftar_pengurus as $dp) : ?>
    <div class="modal fade" id="hapusModal<?= $dp->id_pengurus; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p>Yakin data Pengurus <b><?= $dp->nama_lengkap; ?></b> akan dihapus ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Hapus -->

<div class="modal fade" id="importModal" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Pengurus</h5>
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
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>