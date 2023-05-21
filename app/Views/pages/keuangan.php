<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <!-- <img src="assets/img/hero-carousel/baim-hero.png" class="img-fluid animated"> -->
        <h1>Transparansi Keuangan </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <!-- <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://youtu.be/pvatqsfi6mg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div> -->
    </div>
</section>

<section id="cta" class="cta mt-5">
    <div class="container text-center" data-aos="zoom-out">
        <div class="row g-5">
            <div class="col-lg-12 col-md-6 content d-flex flex-column ">
                <h3>Keuangan Masjid</h3>
                <p> Keuangan Masjid Baitul Ilmi ITERA dibagi menjadi tiga bagian yang berbeda, sesuai dengan ketentuan akad dengan donatur, berikut total keuangan masjid pada setaip akun keuangan</p>
                <div class="container mb-6">
                    <div class="row g-5 ">
                        <div class="col-xl-4 ">
                            <h2>Pembangunan</h2>
                            <h4>Rp. 100.000.000</h4>
                        </div>
                        <div class="col-xl-4 ">
                            <h2>Sarana Prasarana</h2>
                            <h4>Rp. 100.000.000</h4>
                        </div>
                        <div class="col-xl-4 ">
                            <h2>Operasional</h2>
                            <h4>Rp. 100.000.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 content d-flex flex-column ">
                    <div class="row">
                        <div class="col-5">
                            <h3 class="mt-6">Total : </h3>
                        </div>
                        <div class="col-7">
                            <h3 class="mt-6">Rp. 100.000.000 </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Call To Action Section -->

<div class="container">
    <div class="row">
        <div class="col">
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

<?= $this->endSection(); ?>