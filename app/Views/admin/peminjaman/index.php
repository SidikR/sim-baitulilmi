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
                    <a href="pengurus/tambah"><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal">
                            <i class="fas fa-plus"></i> Tambah
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
                                <th>Nama Barang</th>
                                <th>Nama Penanggungjawab</th>
                                <th>Instansi Peminjam</th>
                                <th>Quantitas</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Aksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_peminjaman_inventaris as $dpi) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dpi->nama_inventaris; ?></td>
                                    <td><?= $dpi->nama_penanggungjawab; ?></td>
                                    <td><?= $dpi->instansi_peminjam; ?></td>
                                    <td><?= $dpi->qty; ?></td>
                                    <td><?= $dpi->tanggal_dipinjam; ?></td>
                                    <td><?= $dpi->tanggal_pengembalian; ?></td>
                                    <td style="width: 15%;">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#lihatModal<?= $dpi->id_peminjaman; ?>"><i class="fas fa-file-alt"></i> Lihat</button>

                                        <?php if ($dpi->status_peminjaman == 'pending') : ?>

                                            <a href="<?= 'list-peminjaman-ok/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-warning btn-sm glightbox preview-link" title="Terima Permohonan"><span class="bi bi-check-circle"></span> Terima</button></a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolakModal<?= $dpi->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i> Tolak</button>


                                        <?php elseif ($dpi->status_peminjaman == 'accepted') :  ?>
                                            <a href="<?= 'list-peminjaman-done/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-secondary btn-sm glightbox preview-link" title="Konfirmasi Pengembalian"><i class="far fa-clock"></i> Konfirmasi Kembali</button></a>

                                        <?php endif ?>
                                    </td>
                                    <td style="width: 15%;">
                                        <?php if ($dpi->status_peminjaman == 'pending') : ?>
                                            <button type="button" class="btn btn-warning btn-sm"><i class="far fa-clock"></i> Sedang ditinjau</button>

                                        <?php elseif ($dpi->status_peminjaman == 'accepted') :  ?>
                                            <button type="button" class="btn btn-secondary btn-sm"><i class="far fa-clock"></i> Belum dikembalikan</button>

                                        <?php elseif ($dpi->status_peminjaman == 'done') :  ?>
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Proses Selesai</button>

                                        <?php elseif ($dpi->status_peminjaman == 'rejected') :  ?>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Proses ditolak</button>

                                        <?php elseif ($dpi->status_peminjaman == 'batal') :  ?>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i> Dibatalkan</button>

                                        <?php endif ?>
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
<?php foreach ($daftar_peminjaman_inventaris as $dpi) : ?>
    <div class="modal fade" id="hapusModal<?= $dpi->id_peminjaman; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Hapus Data Pengurus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="pengurus/hapus/<?= $dpi->id_peminjaman; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data Peminjaman dari <b><?= $dpi->instansi_peminjam; ?></b> akan dihapus ?</p>
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

<!-- Modal Detail Pengajuan Peminjaman Inventaris -->
<?php foreach ($daftar_peminjaman_inventaris as $dpi) : ?>
    <div class="modal fade" id="lihatModal<?= $dpi->id_peminjaman; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Detail Permohonan Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <fieldset disabled>
                            <legend>Detail Permohonan dari <b><?= $dpi->nama_penanggungjawab; ?></b></legend>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Instansi Pemohon</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->instansi_peminjam; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Quantitas</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->qty; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Tanggal Dipinjam</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->tanggal_dipinjam; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Tanggal Pengembalian</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->tanggal_pengembalian; ?>'>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Infaq</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->infaq; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Metode Infaq</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->metode_infaq; ?>'>
                                        </div>
                                        <div class="row mb-3" style="width: 50%; height : 50%">
                                            <a href="<?= base_url('assets-admin/img/peminjaman/foto-identitas/' . $dpi->foto_identitas); ?>" target="_blank"><img src="<?= base_url('assets-admin/img/peminjaman/foto-identitas/' . $dpi->foto_identitas); ?>" class="img-fluid glightbox preview-link" alt="Foto Identitas"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Tolak Modaal -->
<?php foreach ($daftar_peminjaman_inventaris as $dpi) : ?>
    <div class="modal fade" id="tolakModal<?= $dpi->id_peminjaman; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Detail Permohonan Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Pesan Penolakan Permohonan</h2>
                    <form action="<?= 'list-peminjaman-no/' . $dpi->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <!-- <input type="hidden" class="form-control" id="exampleFormControlInput1" name="nama_inventaris" required> -->

                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="textarea" class="form-control" placeholder="Isikan Alasan Penolakan" name="pesan" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection() ?>