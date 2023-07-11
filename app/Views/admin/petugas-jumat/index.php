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
                    <a href="petugas-jumat/tambah"><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal">
                            <i class="bi bi-plus"></i> Tambah
                        </button></a>

                    <!-- ini notifikasi Berhasil ditambah -->
                    <?php if (session('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success'); ?>
                        </div>
                    <?php endif ?>

                    <table id="admin_petugasjumat" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Imam</th>
                                <th>Asal/Prodi/Jabatan Imam</th>
                                <th>Nama Khatib</th>
                                <th>Asal/Prodi/Jabatan Khatib</th>
                                <th>Nama Muadzin</th>
                                <th>Asal/Prodi/Jabatan Muadzin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_petugasjumat as $dk) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dk->tanggal; ?></td>
                                    <td><?= $dk->nama_imam; ?></td>
                                    <td><?= $dk->jabatan_imam; ?></td>
                                    <td><?= $dk->nama_khatib; ?></td>
                                    <td><?= $dk->jabatan_khatib; ?></td>
                                    <td><?= $dk->nama_muadzin; ?></td>
                                    <td><?= $dk->jabatan_muadzin; ?></td>
                                    <td style="width: 15%;">
                                        <a href="<?= 'petugas-jumat/detail/' . $dk->id_petugas; ?>"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-book-fill"></i></button></a>
                                        <a href="<?= 'petugas-jumat/edit/' . $dk->id_petugas; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $dk->id_petugas; ?>"><i class="bi bi-trash3-fill"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</div>

<!-- Modal Hapus -->
<?php foreach ($daftar_petugasjumat as $dk) : ?>
    <div class="modal fade" id="hapusModal<?= $dk->id_petugas; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Petugas-jumat</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form action="petugas-jumat/hapus/<?= $dk->id_petugas; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data Petugas-jumat <b><?= $dk->nama_imam; ?></b> akan dihapus ?</p>
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

<?= $this->endSection() ?>