<?= $this->extend('bendahara/layout/template'); ?>
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
                    <a href="keuangan/tambah-pengeluaran"><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal">
                            <i class="fas fa-plus"></i> Pengeluaran
                        </button></a>
                    <a href="keuangan/tambah-pemasukan"><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal">
                            <i class="fas fa-plus"></i> Pemasukan
                        </button></a>

                    <!-- ini notifikasi Berhasil ditambah -->
                    <?php if (session('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success'); ?>
                        </div>
                    <?php endif ?>

                    <table id="datatablesSimple" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Akun Keuangan</th>
                                <th>Akses Keuangan</th>
                                <th>Keterangan</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_keuangan as $dp) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dp->tanggal_transaksi; ?></td>
                                    <td><?= $dp->keterangan_akunkeuangan; ?></td>
                                    <td><?= $dp->keterangan_akseskeuangan; ?></td>
                                    <td><?= $dp->keterangan; ?></td>
                                    <td><?php if ($dp->masuk != null) : ?>
                                            <?= 'Rp. ' . number_format($dp->masuk); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php if ($dp->keluar != null) : ?>
                                            <?= 'Rp. ' . number_format($dp->keluar); ?>
                                        <?php endif; ?>
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

<!-- Modal Hapus -->
<?php foreach ($daftar_keuangan as $dp) : ?>
    <div class="modal fade" id="hapusModal<?= $dp->id_keuangan; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Hapus Data Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="keuangan/hapus/<?= $dp->id_keuangan; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data keuangan <b><?= $dp->keterangan; ?></b> akan dihapus ?</p>
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