<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        <i class="fas fa-plus"></i> Tambah
                    </button>

                    <!-- ini notifikasi Berhasil ditambah -->
                    <?php if (session('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success'); ?>
                        </div>
                    <?php endif ?>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
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
                                    <td style="width: 15%;">
                                        <a href="" class="btn btn-success btn-sm"><i class="fas fa-file-alt"></i> Lihat</a>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $dp->id_pengurus; ?>"><i class="fas fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $dp->id_pengurus; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus "></i> Tambah Pengurus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="pengurus/tambah" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($daftar_pengurus as $dp) : ?>
    <div class="modal fade" id="editModal<?= $dp->id_pengurus; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit "></i> Edit Data Pengurus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="pengurus/edit/<?= $dp->id_pengurus; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= $dp->nama_lengkap; ?>" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Hapus -->
<?php foreach ($daftar_pengurus as $dp) : ?>
    <div class="modal fade" id="hapusModal<?= $dp->id_pengurus; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Hapus Data Pengurus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="pengurus/hapus/<?= $dp->id_pengurus; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_DELETE">
                        <p>Yakin data Pengurus <?= $dp->nama_lengkap; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>