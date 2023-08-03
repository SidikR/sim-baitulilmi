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

        <div class="row gy-5 d-flex align-items-start justify-content-center">
            <div class="col-xl-3 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/alam.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href="https://www.instagram.com/fc_alam/" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/firdha-cahya-alam" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Firdha Cahya Alam</h4>
                        <span>Ketua DKM</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-3 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/selvi.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/selvi-gustiana-1aa564188" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Selvi Gustiana</h4>
                        <span>Bendahara</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-3 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="600">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/barra.png" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href="https://www.instagram.com/4l.barra/" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/4lbarra" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Al Barra Harahap</h4>
                        <span>Sekretaris</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <?php foreach ($daftar_pengurus as $dp) : ?>
                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img img-box" style="width: 300px; height:300px">
                            <img src=" <?php echo base_url(); ?>/assets-admin/img/foto-pengurus/<?= $dp->foto_pengurus; ?>" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <div class="social">
                                <a href="<?= $dp->instagram; ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                                <a href="<?= $dp->linkedin; ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
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