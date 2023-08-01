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

                    <!-- ini notifikasi Berhasil ditambah -->
                    <?php if (session('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success'); ?>
                        </div>
                    <?php endif ?>

                    <table id="admin_peminjamanmasjid" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Nama Penanggungjawab</th>
                                <th>Instansi Peminjam</th>
                                <th>Infaq</th>
                                <th>Metode Infaq</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Selesai</th>
                                <th>Aksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_peminjaman_masjid as $dpi) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dpi->nama_kegiatan; ?></td>
                                    <td><?= $dpi->nama_penanggungjawab; ?></td>
                                    <td><?= $dpi->instansi_peminjam; ?></td>
                                    <td><?= 'Rp. ' . number_format($dpi->infaq); ?></td>
                                    <td><?= $dpi->metode_infaq; ?></td>
                                    <td><?= $dpi->tanggal_dipinjam; ?></td>
                                    <td><?= $dpi->tanggal_selesai; ?></td>
                                    <td style="width: 15%;">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#lihatModal<?= $dpi->id_peminjaman; ?>"><i class="bi bi-book"></i></button>

                                        <?php if ($dpi->status_peminjaman == 'pending') : ?>
                                            <a href="<?= 'peminjaman-masjid-ok/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-warning btn-sm" title="Terima Permohonan"><span class="bi bi-check-circle"></span></button></a>
                                            <button type="button" class="btn btn-danger btn-sm" title="Tolak Permohonan" data-bs-toggle="modal" data-bs-target="#tolakModal<?= $dpi->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i></button>

                                        <?php elseif ($dpi->status_peminjaman == 'accepted' && $dpi->status_infaq == 'belum bayar') :  ?>
                                            <a href="<?= 'peminjaman-masjid-done/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-secondary btn-sm" title="Konfirmasi Pengembalian"><i class="far fa-clock"></i> Konfirmasi Selesai</button></a>
                                            <a href="<?= 'peminjaman-masjid-infaq-ok/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-success btn-sm" title="Infaq"><i class="fas fa-check-double"></i> Konfirmasi Infaq</button></a>

                                        <?php elseif ($dpi->status_peminjaman == 'accepted' && $dpi->status_infaq != 'belum bayar') : ?>
                                            <a href="<?= 'peminjaman-masjid-done/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-secondary btn-sm" title="Konfirmasi Pengembalian"><i class="far fa-clock"></i> Konfirmasi Selesai</button></a>

                                        <?php elseif ($dpi->status_peminjaman == 'done' && $dpi->status_infaq == 'belum bayar') : ?>
                                            <a href="<?= 'peminjaman-masjid-infaq-ok/' . $dpi->id_peminjaman; ?>"><button type="button" class="btn btn-secondary btn-sm" title="Konfirmasi Pengembalian"><i class="far fa-clock"></i> Konfirmasi Infaq</button></a>

                                        <?php endif ?>
                                    </td>
                                    <td style="width: 15%;">
                                        <?php if ($dpi->bukti_transfer != null && $dpi->status_infaq == 'belum bayar') : ?>
                                            <a><button type="button" class="btn btn-secondary btn-sm" title="Lihat Transfer" data-bs-toggle="modal" data-bs-target="#BuktiTransferModal<?= $dpi->id_peminjaman; ?>"><i class="far fa-clock"></i> Sudah Transfer</button></a>
                                        <?php elseif ($dpi->bukti_transfer != null && $dpi->status_infaq == 'belum bayar' && $dpi->status_peminjaman == 'accepted') : ?><a><button type="button" class="btn btn-secondary btn-sm" title="Lihat Transfer" data-bs-toggle="modal" data-bs-target="#BuktiTransferModal<?= $dpi->id_peminjaman; ?>"><i class="far fa-clock"></i> Sudah Transfer</button></a>
                                        <?php endif ?>

                                        <?php if ($dpi->status_peminjaman == 'pending') : ?>
                                            <button type="button" class="btn btn-warning btn-sm"><i class="far fa-clock"></i> Ditinjau</button>

                                        <?php elseif ($dpi->status_peminjaman == 'accepted' && $dpi->status_infaq != 'belum bayar') :  ?>
                                            <button type="button" class="btn btn-secondary btn-sm"><i class="far fa-clock"></i> Belum Selesai, sudah infaq</button>

                                        <?php elseif ($dpi->status_peminjaman == 'accepted' && $dpi->status_infaq == 'belum bayar') :  ?>
                                            <button type="button" class="btn btn-secondary btn-sm"><i class="far fa-clock"></i> Belum Selesai, belum infaq</button>

                                        <?php elseif ($dpi->status_peminjaman == 'done' && $dpi->status_infaq != 'belum bayar') :  ?>
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Proses Selesai</button>

                                        <?php elseif ($dpi->status_peminjaman == 'done' && $dpi->status_infaq == 'belum bayar') :  ?>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-check-double"></i> Proses Selesai Belum Bayar</button>

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
</div>

<!-- Modal Detail Pengajuan Peminjaman Inventaris -->
<?php foreach ($daftar_peminjaman_masjid as $dpi) : ?>
    <div class="modal fade" id="lihatModal<?= $dpi->id_peminjaman; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Detail Permohonan Peminjaman</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form>
                        <fieldset disabled>
                            <legend>Detail Permohonan Peminjaman Masjid Acara : <b><?= $dpi->nama_kegiatan; ?></b></legend>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Instansi Pemohon</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->instansi_peminjam; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Nama Penanggung Jawab</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->nama_penanggungjawab; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Deskripsi Kegiatan</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->deskripsi_kegiatan; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Waktu Dipinjam</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->tanggal_dipinjam; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Tanggal Selesai</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $dpi->tanggal_selesai; ?>'>
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
                                        <div class="row">
                                            <div class="row mb-3" style="width: 50%; height : 50%">
                                                <a href="<?= base_url('assets-admin/img/peminjaman-masjid/foto-identitas/' . $dpi->foto_identitas); ?>" target="_blank"><img src="<?= base_url('assets-admin/img/peminjaman-masjid/foto-identitas/' . $dpi->foto_identitas); ?>" class="img-fluid glightbox preview-link pe-3" alt="Foto Identitas"></a>
                                            </div>
                                            <div class="row mb-3" style="width: 50%; height : 50%">
                                                <a href="<?= base_url('assets-admin/img/foto-kegiatan/' . $dpi->foto_kegiatan); ?>" target="_blank"><img src="<?= base_url('assets-admin/img/foto-kegiatan/' . $dpi->foto_kegiatan); ?>" class="img-fluid glightbox preview-link pe-3" alt="Foto Kegiatan"></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Tolak Modaal -->
<?php foreach ($daftar_peminjaman_masjid as $dpi) : ?>
    <div class="modal fade" id="tolakModal<?= $dpi->id_peminjaman; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Tolak Permohonan Peminjaman</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Pesan Penolakan Permohonan</h2>
                    <form action="<?= 'peminjaman-masjid-no/' . $dpi->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="textarea" class="form-control" placeholder="Isikan Alasan Penolakan" name="pesan" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($daftar_peminjaman_masjid as $dpi) : ?>
    <div class="modal fade" id="BuktiTransferModal<?= $dpi->id_peminjaman; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Bukti Transfer Modal</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form action="<?= 'peminjaman-masjid-bukti-transfer/' . $dpi->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                            <div class="inventaris-item">
                                <img src=" <?= base_url(); ?>/assets-admin/img/peminjaman-masjid/bukti-transfer/<?= $dpi->bukti_transfer; ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                <div class="inventaris-info">
                                    <h4><?= $dpi->nama_kegiatan; ?></h4>
                                    <a href="<?php base_url(); ?>/assets-admin/img/peminjaman-masjid/bukti-transfer/<?= $dpi->bukti_transfer; ?>" title="<?= $dpi->nama_kegiatan; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection() ?>