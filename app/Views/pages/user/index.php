<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Halaman Anda </h1>
        <h2><span><?= user()->nama_lengkap; ?></span></h2>
    </div>
</section>

<!-- ======= Tabs Section ======= -->
<section id="tabs" class="tabs">
    <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row gy-4 d-flex">

            <!-- Session Ketika Sukses -->
            <?php if (session('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                </div>
            <?php endif ?>

            <!-- Seccion Ketika Gagal -->
            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>

            <li class="nav-item col-12 col-md-12 col-lg-4">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <i class="bi bi-cart-plus color-secondary"></i>
                    <h4>Log Peminjaman</h4>
                </a>
            </li><!-- End Tab 1 Nav -->

            <li class="nav-item col-12 col-md-12 col-lg-4 log_masjid">
                <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-cart-plus color-secondary"></i>
                    <h4>Peminjaman Masjid</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-12 col-md-12 col-lg-4">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-person color-secondary"></i>
                    <h4>Edit Profil</h4>
                </a>
            </li><!-- End Tab 3 Nav -->

        </ul>

        <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                    <section id="portfolo" class="portfolo" data-aos="fade-up">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table id="datatables_logpeminjaman" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Quantitas</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Pesan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($daftar_peminjaman as $di) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $di->nama_inventaris; ?></td>
                                                    <td><?= $di->qty; ?></td>
                                                    <td><?= $di->tanggal_dipinjam; ?></td>
                                                    <td><?= $di->tanggal_pengembalian; ?></td>
                                                    <td><?= $di->pesan; ?></td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <span class="badge bg-warning"><i class="bi bi-clock-history"> Sedang ditinjau</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'accepted') :  ?>
                                                            <span class="badge bg-secondary-light"><i class="bi bi-clock-history"> Belum dikembalikan</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'done') :  ?>
                                                            <span class="badge bg-success"><i class="bi bi-check2-circle"> Proses selesai</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'rejected') :  ?>
                                                            <span class="badge bg-danger"><i class="bi bi-x-circle"> Proses ditolak</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'batal') :  ?>
                                                            <span class="badge bg-danger"><i class="bi bi-x-circle"> Dibatalkan</i></span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#batalModal<?= $di->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i> Batal</button>
                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 3%;">
                                                        <a href="<?= base_url("invoice-peminjaman-inventaris/$di->id_peminjaman"); ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-receipt"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section><!-- End Portfolio Section -->
                </div>
            </div><!-- End Tab Content 1 -->

            <div class="tab-pane show" id="tab-2">
                <div class="row gy-4">
                    <section id="portfolo" class="portfolo" data-aos="fade-up">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table id="datatables_logpeminjaman_masjid" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Infaq</th>
                                                <th>Pesan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($daftar_peminjaman_masjid as $di) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $di->nama_kegiatan; ?></td>
                                                    <td><?= $di->tanggal_dipinjam; ?></td>
                                                    <td><?= $di->tanggal_selesai; ?></td>
                                                    <td><?= "Rp. " . number_format($di->infaq, 0, '.', '.'); ?></td>
                                                    <td><?= $di->pesan; ?></td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <span class="badge bg-warning"><i class="bi bi-clock-history"> Sedang ditinjau</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'accepted') :  ?>
                                                            <span class="badge bg-success"><i class="bi bi-clock-history"> Sedang ditinjau</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'done') :  ?>
                                                            <span class="badge bg-success"><i class="bi bi-check2-circle"> Proses selesai</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'rejected') :  ?>
                                                            <span class="badge bg-danger"><i class="bi bi-x-circle"> Proses ditolak</i></span>
                                                        <?php elseif ($di->status_peminjaman == 'batal') :  ?>
                                                            <span class="badge bg-danger"><i class="bi bi-x-circle"> Dibatalkan</i></span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <a><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#batalModal<?= $di->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i> Batal</button></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 3%;">
                                                        <a href="<?= base_url("invoice-peminjaman-masjid/$di->id_peminjaman"); ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-receipt"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?= $this->include('pages/user/partials/profil'); ?>
        </div>
    </div>
</section>


<!-- Tolak Modaal -->
<?php foreach ($daftar_peminjaman_masjid as $di) : ?>
    <div class="modal fade" id="batalModal<?= $di->id_peminjaman; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Detail Permohonan Peminjaman</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Pesan Pembatalan Permohonan</h2>
                    <form action="<?= 'peminjaman-masjid/batal/' . $di->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-4">
                            <label for="pesan" class="form-label">Pesan Penolakan</label>
                            <textarea class="form-control" rows="4" type="textarea" class="form-control" placeholder="Isikan Alasan Pembatalan Permohonan " name="pesan" required></textarea>
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

<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 color-white" id="exampleModalLabel">Update Foto <?= user()->nama_lengkap; ?></h1>
                <button data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle-fill"></i></button>
            </div>
            <div class="modal-body">
                <form action="akun/foto/<?= user()->id; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary bg-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto_user" onchange="readURL(this);" />
                    </p>
                    <img id="image" width="50%" height="50%" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>