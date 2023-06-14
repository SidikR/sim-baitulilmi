<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Pengurus Masjid </h1>
        <h2><span>Baitul Ilmi ITERA</span></h2>
    </div>
</section>

<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="row gy-5 d-flex align-items-center justify-content-center">

            <?php foreach ($daftar_pengurus as $dp) : ?>
                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="<?php echo base_url(); ?>/assets-admin/img/foto-pengurus/<?= $dp->foto_pengurus; ?>" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/fc_alam/" target="_blank"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/firdha-cahya-alam" target="_blank"><i class="bi bi-linkedin"></i></a>
                            </div>
                            <a href="<?= base_url('detail-pengurus-' . $dp->slug_pengurus); ?>">
                                <h4><?= $dp->nama_lengkap; ?></h4>
                            </a>
                            <span><?= $dp->jabatan; ?></span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            <?php endforeach ?>
        </div>
</section><!-- End Team Section -->


<?= $this->endSection(); ?>