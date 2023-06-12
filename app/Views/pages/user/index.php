<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <!-- <img src="assets/img/hero-carousel/baim-hero.png" class="img-fluid animated"> -->
        <h1>Halaman Anda </h1>
        <h2><span><?= user()->nama_lengkap; ?></span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <!-- <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://youtu.be/pvatqsfi6mg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div> -->
    </div>
</section>

<!-- ======= Features Section ======= -->
<section id="features" class="features">
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

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <i class="bi bi-binoculars color-cyan"></i>
                    <h4>Log Peminjaman</h4>
                </a>
            </li><!-- End Tab 1 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Edit Profil</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4 log_masjid">
                <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Peminjaman Masjid</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

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
                                                            <button type="button" class="btn btn-warning btn-sm"><i class="far fa-clock"></i> Sedang ditinjau</button>

                                                        <?php elseif ($di->status_peminjaman == 'accepted') :  ?>
                                                            <button type="button" class="btn btn-secondary btn-sm"><i class="far fa-clock"></i> Belum dikembalikan</button>

                                                        <?php elseif ($di->status_peminjaman == 'done') :  ?>
                                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Proses Selesai</button>

                                                        <?php elseif ($di->status_peminjaman == 'rejected') :  ?>
                                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Proses ditolak</button>

                                                        <?php elseif ($di->status_peminjaman == 'batal') :  ?>
                                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Dibatalkan</button>

                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#batalModal<?= $di->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i> Batal</button>
                                                        <?php endif ?>
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

            <div class="tab-pane show" id="tab-3">
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
                                                    <td><?= $di->infaq; ?></td>
                                                    <td><?= $di->pesan; ?></td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <button type="button" class="btn btn-warning btn-sm"><i class="far fa-clock"></i> Sedang ditinjau</button>

                                                        <?php elseif ($di->status_peminjaman == 'accepted') :  ?>
                                                            <button type="button" class="btn btn-success btn-sm"><i class="far fa-clock"></i> Diizinkan</button>

                                                        <?php elseif ($di->status_peminjaman == 'done') :  ?>
                                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Proses Selesai</button>

                                                        <?php elseif ($di->status_peminjaman == 'rejected') :  ?>
                                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Proses ditolak</button>

                                                        <?php elseif ($di->status_peminjaman == 'batal') :  ?>
                                                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Dibatalkan</button>

                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <?php if ($di->status_peminjaman == 'pending') : ?>
                                                            <a><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#batalModal<?= $di->id_peminjaman; ?>"><i class="bi bi-x-square-fill"></i> Batal</button></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <a href="<?= base_url("invoice/$di->id_peminjaman"); ?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-receipt"></i></button></a>
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
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt "></i> Detail Permohonan Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Pesan Pembatalan Permohonan</h2>
                    <form action="<?= 'peminjaman-masjid/batal/' . $di->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-4">
                            <label for="pesan" class="form-label">Example textarea</label>
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
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Foto <?= user()->nama_lengkap; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="akun/foto/<?= user()->id; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
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