<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<section class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src=<?= base_url('assets/img/hero-carousel/baim-hero.webp'); ?> class="img-fluid animated">
        <h1>Sistem Informasi Manajemen </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
        <p>Jln. Terusan Ryacudu, Desa Way Hui, Kec. Jati Agung, Lampung Selatan, Institut Teknologi Sumatera</p>
        <div class="d-flex">
            <a href="https://youtu.be/pvatqsfi6mg" class="glightbox btn-watch-video d-flex align-items-center text-primary" data-gallery="videoHero"><i class="bi bi-play-circle"></i><span class="color-primary">Watch Video</span></a>
        </div>
    </div>
</section>

<!-- Our Service -->
<section class="services">
    <div class="container" data-aos="fade-up">
        <div class="row d-flex flex-column">

            <div class="col-12 pb-5 mb-5">
                <div class="section-header">
                    <h2 class="color-primary ">Layanan</h2>
                    <p>Silakan pilih layanan yang kami sediakan.</p>
                </div>
            </div>

            <div class="row d-flex">

                <div class="col-12 col-xl-4 col-md-12 mb-5 mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="details box bg-primary pb-3 mb-0">
                            <div class="icon">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>
                            <div>
                                <h3>Peminjaman Aset</h3>
                                <p>Anda dapat melakukan peminjaman inventaris dan masjid Baitul Ilmi ITERA..</p>
                                <hr>
                            </div>
                            <div class="p-0 m-0">
                                <a href="<?= base_url('peminjaman'); ?>" class="btn btn-success btn-sm px-3 rounded-3" role="button">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-12 col-xl-4 col-md-12 mb-5 pb-5 mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details box bg-primary pb-3 mb-0">
                            <div class="icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div>
                                <h3>Transparansi Keuangan</h3>
                                <p>Anda dapat melihat rekapitulasi keuangan masjid Baitul Ilmi ITERA...</p>
                                <hr>
                            </div>
                            <div class="p-0 m-0">
                                <a href="<?= base_url('guest-keuangan'); ?>" class="btn btn-success btn-sm px-3 rounded-3" role="button">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-12 col-xl-4 col-md-12 mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details box bg-primary pb-3 mb-0">
                            <div class="icon">
                                <i class="bi bi-envelope-heart-fill"></i>
                            </div>
                            <div>
                                <h3>Amal</h3>
                                <p>Salurkan amal anda melalui masjid Baitul ilmi ITERA...</p>
                                <hr>
                            </div>
                            <div class="p-0 m-0">
                                <a href="<?= base_url('/'); ?>" class="btn btn-success btn-sm px-3 rounded-3" role="button">Selengkapnya</a>
                            </div>
                            <!-- <p>Provident nihil minus qui.</p> -->
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>
</section>
<!-- End Our Service -->

<!-- ======= KEuanagan Section ======= -->
<section class="keuangan mt-5 bg-img-primary">
    <div class="container text-center" data-aos="zoom-out">
        <div class="row g-5">
            <div class="col-lg-12 col-md-12 col-12 d-flex flex-column ">

                <div class="section-header">
                    <h2>Keuangan Masjid</h2>
                    <p> Keuangan Masjid Baitul Ilmi ITERA dibagi menjadi tiga bagian yang berbeda, sesuai dengan ketentuan akad dengan donatur, berikut total keuangan masjid pada setaip akun keuangan</p>
                </div>

                <div class="row mt-3">
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4">
                            <div class="card-body">
                                <h4>Pembangunan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_pem, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4">
                            <div class="card-body">
                                <h4>Sarana Prasarana</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_prs, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4">
                            <div class="card-body">
                                <h4>Operasional</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_op, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card bg-primary text-white mb-4 rounded-4">
                            <div class="card-body">
                                <h2 class="text-white"><b>Total Keuangan</b></h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_kas, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                        <div class="p-2">
                            <a href="<?= base_url('guest-keuangan'); ?>" class="btn btn-lihat-selengkapnya">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End KEuanagan Section -->

<!-- ======= Services Section ======= -->
<section class="kegiatan">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2 class="color-primary">Kegiatan</h2>
            <p>Berikut ini Beberapa Kegiatan di Masjid Baitul Ilmi</p>
        </div>

        <div class="row gy-3 d-flex justify-content-center">

            <div class="col-12 col-xl-3 col-md-6 rounded-3" data-aos="zoom-in" data-aos-delay="600">
                <div class="service-item">
                    <div class="img">
                        <div class="image-container">
                            <img src="<?php echo base_url('/assets-admin/img/petugas-jumat/' . $petugas_jumat[0]->poster); ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="details position-relative d-flex align-items-center justify-content-center" style="height: 250px;">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <div class="row d-flex align-items-center justify-content-center">
                            <?php if ($petugas_jumat[0]->nama_imam == "-") : ?>
                                <a href="<?php echo base_url('/assets-admin/img/petugas-jumat/' . $petugas_jumat[0]->poster); ?>" class="glightbox stretched-link" data-gallery="posterJumat">
                                    <h3 class="color-primary">Sholat Jumat dipusatkan dimasjid Raya At-Tanwir</h3>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo base_url('/assets-admin/img/petugas-jumat/' . $petugas_jumat[0]->poster); ?>" class="glightbox stretched-link" data-gallery="posterJumat">
                                    <h3 class="color-primary"><?= "Sholat Jumat " . "<br>" . date("d-M-Y", strtotime($petugas_jumat[0]->tanggal)); ?></h3>
                                </a>
                                <div class="d-flex flex-column align-items-center justify-content-start">
                                    <p>Imam : <?= $petugas_jumat[0]->nama_imam; ?></p>
                                    <p>Khatib : <?= $petugas_jumat[0]->nama_khatib; ?></p>
                                    <p>Muadzin : <?= $petugas_jumat[0]->nama_muadzin; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <?php foreach ($daftar_kegiatan as $dk) : ?>
                <div class="col-12 col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="service-item">
                        <div class="img">
                            <div class="image-container">
                                <img src="<?php echo base_url('/assets-admin/img/foto-kegiatan/' . $dk->foto_kegiatan); ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="details position-relative d-flex align-items-center justify-content-center" style="height: 250px;">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <div class="row d-flex align-items-center justify-content-center">
                                <a href="<?= base_url('detail-kegiatan-' . $dk->slug_kegiatan); ?>" class="stretched-link ">
                                    <h3 class="color-primary"><?= $dk->nama_kegiatan; ?></h3>
                                </a>
                                <a href="<?= base_url('detail-kegiatan-' . $dk->slug_kegiatan); ?>" class="stretched-link"></a>
                                <div class="d-flex flex-column align-items-center justify-content-start">
                                    <p>Penyelenggara : <?= $dk->penyelenggara_kegiatan; ?></p>
                                    <p>Waktu : <?= $dk->waktu_mulai_kegiatan; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- End Service Item -->
            <?php endforeach ?>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-3 mt-3 col-xl-2 d-flex justify-content-center align-items-center">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('kegiatan-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

<section class="tabs bg-img-primary">
    <div class="container-fluid" data-aos="fade-up">

        <div class="">
            <ul class="nav nav-tabs row gy-4">
                <?php $no = 0; ?>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="section-header">
                        <h2>Galeri Kegiatan Masjid</h2>
                        <p>Berikut ini beberapa dokumentasi dari kegiatan di Masjid Baitul Ilmi ITERA</p>
                    </div>
                    <?php foreach ($daftar_filter as $df) : ?>
                        <li class="nav-item  col-6 col-md-3 col-lg-2">
                            <a class="nav-link tab-galeri rounded-2 px-1 py-1 m-0 text-center <?= $no == 0 ? 'active' : null; ?> show" data-bs-toggle="tab" data-bs-target="<?= '#' . $df->filter; ?>">
                                <h4 class="m-0"><?= ucwords(str_replace('_', ' ', $df->filter)); ?></h4>
                            </a>
                        </li><!-- End Tab 1 Nav -->
                        <?php $no++ ?>
                    <?php endforeach ?>
                </div>
            </ul>
        </div>

        <div class="tab-content">
            <?php $indx = 0 ?>
            <!-- Perulangan untuk Banyaknya Tab -->
            <?php foreach ($daftar_filter as $df) : ?>
                <div class="tab-pane <?= $indx == 0 ? 'active' : null; ?> show" id="<?= $df->filter; ?>">
                    <div class="carousel carousel-lg">
                        <div id="carouselExampleCaptions<?= $df->filter; ?>" class="carousel slide d-flex align-items-center justify-content-center" data-bs-ride="carousel">
                            <div class="carousel-inner rounded-3">
                                <?php $no = 0 ?>
                                <?php foreach ($daftar_program as $dp) : ?>
                                    <?php if ($dp->filter == $df->filter) : ?>
                                        <div class="carousel-item <?= $no == 0 ? 'active' : null; ?>" data-bs-interval="5000">
                                            <?php $no++ ?>
                                            <img src="<?= base_url('assets-admin/img/program/' . $dp->foto); ?>" class="d-block w-100" alt="<?= $dp->nama_program; ?>">
                                            <div class="carousel-caption d-sm-none d-md-block d-flex align-items-center justify-content-center">
                                                <div class="opacity-100 d-none d-md-block">
                                                    <h2><?= $dp->nama_program; ?></h2>
                                                    <p><?= $dp->deskripsi_program; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions<?= $df->filter; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions<?= $df->filter; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div><!-- End Tab Content 1 -->
                <?php $indx++ ?>
            <?php endforeach ?>
        </div>
    </div>
</section><!-- End Features Section -->

<section class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2 class="color-primary">Pengurus Masjid</h2>
            <p>Pengurus Masjid Baitul Ilmi ITERA, terdiri dari Mahasiswa dan Dosen di Lingkungan Institut Teknologi Sumatera</p>
        </div>

        <div class="row gy-5 d-flex align-items-center justify-content-center">

            <div class="col-xl-4 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="200">
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

            <div class="col-xl-4 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="400">
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

            <div class="col-xl-4 col-md-6 d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="600">
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
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-3 mt-3 col-xl-2 d-flex justify-content-center align-items-center">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('pengurus-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>
</section><!-- End Team Section -->

<!-- ======= Services Section ======= -->
<section class="inventaris bg-img-primary" data-aos="fade-up">

    <div class="container">
        <div class="section-header">
            <h2 class="color-primary">Daftar Inventaris</h2>
            <p>Berikut ini beberapa Invenntaris di Masjid Baitul Ilmi</p>
        </div>

        <div class="row d-flex align-items-center justify-content-center">
            <?php foreach ($daftar_inventaris as $di) :  ?>
                <div class="col-xl-3 g-4 col-lg-4 col-md-6 inventaris-item filter-app rounded" style="width: 300px; height : 300px">
                    <img src="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" class="img-fluid rounded" alt="Foto Inventaris">
                    <div class="inventaris-info">
                        <h4><?= $di->nama_inventaris; ?></h4>
                        <h4> <?php if ($di->stok_inventaris == 0) {
                                    echo 'Stok : Habis';
                                } else {
                                    echo 'Stok : ' . $di->stok_inventaris;
                                }
                                ?></h4>
                        <a href="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" title="<?= $di->nama_inventaris; ?>" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End inventaris Item -->
            <?php endforeach ?>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-3 mt-3 col-xl-2 d-flex justify-content-center align-items-center">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('peminjaman'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>
    </div><!-- End Portfolio Container -->
</section><!-- End Portfolio Section -->

<!-- ======= Recent Blog Posts Section ======= -->
<section class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Post</h2>
            <p>Belikut ini beberapa post masjid Baitul Ilmi ITERA</p>
        </div>

        <div class="row d-flex justify-content-center">
            <?php foreach ($daftar_post as $post) : ?>
                <div class="col-lg-4 p-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img src="<?= base_url('assets-admin/img/foto-post/' . $post->foto_post); ?>" class="img-fluid" alt=""></div>
                        <div class="meta">
                            <span class="post-date color-secondary"><i class="bi bi-clock"></i> <a><time>
                                        <?php $newFormat = date("d-M-Y", strtotime($post->created_at));
                                        echo $newFormat
                                        ?></time></a></span>
                        </div>
                        <h3 class="post-title"><?= $post->nama_post; ?></h3>
                        <p><?php
                            $content_news =  $post->deskripsi_post;

                            // Menghapus semua tag HTML
                            $strippedContent = strip_tags($content_news);

                            $news = substr($strippedContent, 0, 70) . "...";

                            // Memisahkan paragraf menjadi array
                            $paragraphs = explode("\n", $news);

                            // Menggabungkan setiap paragraf menjadi elemen <p>
                            $result = '';
                            foreach ($paragraphs as $paragraph) {
                                $result .= "<p>$paragraph</p>";
                            }

                            echo $result;
                            ?></p>
                        <a href="<?= base_url('detail/post-' . $post->slug_post); ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-3 mt-3 col-xl-2 d-flex justify-content-center align-items-center">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('post-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

</section><!-- End Recent Blog Posts Section -->

<!-- ======= Contact Section ======= -->
<section class="contact bg-img-primary">
    <div class="container">

        <div class="section-header">
            <h2>Contact Us</h2>
            <!-- <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p> -->
        </div>

    </div>

    <div class="container">

        <div class="row gy-5 gx-lg-5 d-flex justify-content-center align-items-center">

            <div class="col-lg-6">

                <div class="info">
                    <h3>Get in touch</h3>
                    <p>Dari Masjid Kita Bangkit, Dari Baim Untuk Ummat</p>

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>Jalan Terusan Ryacudu, Desa Way Hui, Kec. Jati Agung, Lampung Selatan. Institut Teknologi Sumatera</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>masjidbaitulilmi@itera.ac.id</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call / Whatsapp :</h4>
                            <p>+62 813 6652 7491</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-6">
                <div class="map p-0 m-0">
                    <iframe class="d-flex align-items-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.378277032061!2d105.3100171746343!3d-5.3591161946196575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c4a9dd27799f%3A0x93f2bd8e5315535!2sBaitul%20Ilmi%20Mosque!5e0!3m2!1sen!2sus!4v1684575604207!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe>
                </div><!-- End Google Maps -->
            </div><!-- End Contact Form -->

        </div>

    </div>
</section><!-- End Contact Section -->

<?= $this->endSection(); ?>