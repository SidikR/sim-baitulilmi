<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Kegiatan Masjid </h1>
        <h2><span>Baitul Ilmi ITERA</span></h2>
    </div>
</section>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="row gy-5 d-flex align-items-start justify-content-start">

            <?php foreach ($daftar_kegiatan as $dk) : ?>
                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="service-item">
                        <div class="img">
                            <img src="<?php echo base_url('/assets-admin/img/kegiatan/' . $dk->foto_kegiatan); ?>" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="<?= base_url('detail-kegiatan-' . $dk->slug_kegiatan); ?>">
                                <h3 class="color-primary"><?= $dk->nama_kegiatan; ?></h3>
                            </a>
                            <div class="d-flex flex-column align-items-center justify-content-start">
                                <p>Penyelenggara : <?= $dk->penyelenggara_kegiatan; ?></p>
                                <p>Waktu : <?= $dk->waktu_mulai_kegiatan; ?></p>
                            </div>

                        </div>
                    </div>
                </div><!-- End Service Item -->
            <?php endforeach ?>
        </div>
</section><!-- End Team Section -->


<?= $this->endSection(); ?>