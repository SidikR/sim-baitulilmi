<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src=<?= base_url('assets/img/hero-carousel/baim-hero.webp'); ?> class="img-fluid animated">
        <h1>Sistem Informasi Manajemen </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
        <p>Jln. Terusan Ryacudu, Desa Way Hui, Kec. Jati Agung, Lampung Selatan, Institut Teknologi Sumatera</p>
        <div class="d-flex">
            <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
            <a href="https://youtu.be/pvatqsfi6mg" class="glightbox btn-watch-video d-flex align-items-center text-primary"><i class="bi bi-play-circle"></i><span class="color-primary">Watch Video</span></a>
        </div>
    </div>
</section>

<!-- Our Service -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row d-flex flex-column">

            <div class="col-12 pb-5 mb-5">
                <div class="section-header">
                    <h2 class="color-primary ">Layanan</h2>
                    <p>Silakan pilih layanan yang kami sediakan.</p>
                </div>
            </div>

            <div class="row d-flex">

                <div class="col-12 col-xl-4 col-md-12 mb-5 pb-5  mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="details box position-relative bg-primary">
                            <div class="icon">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>
                            <a href="<?= base_url('peminjaman'); ?>" class="stretched-link">
                                <h3>Peminjaman Aset</h3>
                            </a>
                            <!-- <p>Provident nihil minus qui.</p> -->
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-12 col-xl-4 col-md-12 mb-5 pb-5 mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details box position-relative bg-primary">
                            <div class="icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <a href="<?= base_url('guest-keuangan'); ?>" class="stretched-link">
                                <h3>Transparansi Keuangan</h3>
                            </a>
                            <!-- <p>Provident nihil minus qui.</p> -->
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-12 col-xl-4 col-md-12 mt-5 pb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details box position-relative bg-primary">
                            <div class="icon">
                                <i class="bi bi-envelope-heart-fill"></i>
                            </div>
                            <a href="<?= base_url('/'); ?>" class="stretched-link">
                                <h3>Amal</h3>
                            </a>
                            <!-- <p>Provident nihil minus qui.</p> -->
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>
</section>
<!-- End Our Service -->

<!-- ======= Call To Action Section ======= -->
<section id="cta" class="cta mt-5 bg-img-primary">
    <div class="container text-center" data-aos="zoom-out">
        <div class="row g-5">
            <div class="col-lg-12 col-md-12 col-12 d-flex flex-column ">
                <div class="section-header">
                    <h2 class="p-3 color-primary">Keuangan Masjid</h2>
                    <p> Keuangan Masjid Baitul Ilmi ITERA dibagi menjadi tiga bagian yang berbeda, sesuai dengan ketentuan akad dengan donatur, berikut total keuangan masjid pada setaip akun keuangan</p>
                </div>

                <div class="row mt-3">
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4>Pembangunan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_pem, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4>Sarana Prasarana</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_prs, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4>Operasional</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_op, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4 class="text-white"><b>Total Keuangan</b></h4>
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
</section><!-- End Call To Action Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2 class="color-primary">Kegiatan</h2>
            <p>Berikut ini Beberapa Kegiatan di Masjid Baitul Ilmi</p>
        </div>

        <div class="row gy-3 d-flex justify-content-center">
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
                            <a href="#" class="stretched-link">
                                <h3><?= $dk->nama_kegiatan; ?></h3>
                            </a>
                            <a href="#" class="stretched-link"></a>
                            <div class="d-flex flex-column align-items-center justify-content-start">
                                <p>Penyelenggara : <?= $dk->penyelenggara_kegiatan; ?></p>
                                <p>Waktu : <?= $dk->waktu_mulai_kegiatan; ?></p>
                            </div>

                        </div>
                    </div>
                </div><!-- End Service Item -->
            <?php endforeach ?>

            <div class="row pt-3 mt-3 col-xl-4 ">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('kegiatan-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="program" data-aos="fade-up">

    <div class="container">

        <div class="section-header">
            <h2>Program Masjid</h2>
            <p>Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p>
        </div>

    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

            <ul class="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-product">Product</li>
                <li data-filter=".filter-branding">Branding</li>
                <li data-filter=".filter-books">Books</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row g-0 portfolio-container">

                <div class="col-12 portfolio-item filter-app">
                    <div class="carousel carousel-lg">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active " data-bs-interval="1000">
                                    <img src="<?= base_url('assets/img/blog/blog-1.jpg'); ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="1000">
                                    <img src="..." class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="1000">
                                    <img src="..." class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

            </div><!-- End Portfolio Container -->

        </div>

    </div>
</section><!-- End Portfolio Section -->

<section id="team" class="team bg-img-primary">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2 class="color-primary">Pengurus Masjid</h2>
            <p>Pengurus Masjid Baitul Ilmi ITERA, terdiri dari Mahasiswa dan Dosen di Lingkungan Institut Teknologi Sumatera</p>
        </div>

        <div class="row gy-5 d-flex align-items-center justify-content-center">

            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/alam.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/fc_alam/" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/firdha-cahya-alam" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Firdha Cahya Alam</h4>
                        <span>Ketua DKM</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/selvi.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/selvi-gustiana-1aa564188" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Selvi Gustiana</h4>
                        <span>Bendahara</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?php echo base_url(); ?>/assets/img/pengurus/barra.png" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/4l.barra/" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/4lbarra" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <h4>Al Barra Harahap</h4>
                        <span>Sekretaris</span>
                    </div>
                </div>
            </div><!-- End Team Member -->
            <div class="row pt-3 mt-3 col-xl-4 ">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('pengurus-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>
</section><!-- End Team Section -->

<!-- ======= Services Section ======= -->
<section id="portfolio" class="portfolio" data-aos="fade-up">

    <div class="container">
        <div class="section-header">
            <h2 class="color-primary">Daftar Inventaris</h2>
            <p>Berikut ini beberapa Invenntaris di Masjid Baitul Ilmi</p>
        </div>

        <div class="row d-flex align-items-center justify-content-center">
            <?php foreach ($daftar_inventaris as $di) :  ?>
                <div class="col-xl-3 g-4 col-lg-4 col-md-6 portfolio-item filter-app rounded" style="width: 300px; height : 300px">
                    <img src="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" class="img-fluid rounded" alt="Foto Inventaris">
                    <div class="portfolio-info">
                        <h4><?= $di->nama_inventaris; ?></h4>
                        <h4> <?php if ($di->stok_inventaris == 0) {
                                    'Stok : Habis';
                                } else {
                                    echo 'Stok : ' . $di->stok_inventaris;
                                }
                                ?></h4>
                        <a href="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" title="<?= $di->nama_inventaris; ?>" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#pinjamModal<?= $di->id_inventaris; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->
            <?php endforeach ?>

            <div class="row pt-3 mt-3 col-xl-4 ">
                <a class="btn btn-lihat-selengkapnya" href="">Lihat Selengkapnya</a>
            </div>
        </div>
    </div><!-- End Portfolio Container -->
</section><!-- End Portfolio Section -->

<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts bg-img-primary">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Post</h2>
            <p>Belikut ini beberapa post masjid Baitul Ilmi ITERA</p>
        </div>

        <div class="row d-flex justify-content-center">
            <?php foreach ($daftar_post as $post) : ?>
                <div class="col-lg-4 p-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img src="<?= base_url('assets-admin/img/post/' . $post->foto_post); ?>" class="img-fluid" alt=""></div>
                        <div class="meta">
                            <span class="post-date"><i class="bi bi-clock"></i> <a><time>
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
                        <a href="<?= base_url('detail/post-' . $post->id_post); ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="row pt-3 mt-3 col-xl-4 ">
                <a class="btn btn-lihat-selengkapnya" href="<?= base_url('post-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

</section><!-- End Recent Blog Posts Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-header">
            <h2>Contact Us</h2>
            <!-- <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p> -->
        </div>

    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.378277032061!2d105.3100171746343!3d-5.3591161946196575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c4a9dd27799f%3A0x93f2bd8e5315535!2sBaitul%20Ilmi%20Mosque!5e0!3m2!1sen!2sus!4v1684575604207!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe>
    </div><!-- End Google Maps -->

    <div class="container">

        <div class="row gy-5 gx-lg-5">

            <div class="col-lg-4">

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

            <div class="col-lg-8">
                <form action="/send-feedback" method="post" class="">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control border-success rounded-2" name="name" id="name" placeholder="Isi Nama Anda" required>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 form-group mt-md-0">
                            <input type="text" name="no_telepon" class="form-control border-success rounded-2" id="no_telepon" placeholder="Misal. 0895 xxx xxx" required>
                        </div>
                        <div class="col-md-6 form-group mt-md-0">
                            <input type="email" name="email" class="form-control border-success rounded-2" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control border-success rounded-2" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control border-success rounded-2" name="feedback" placeholder="feedback" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button class="btn btn-lihat-selengkapnya" type="submit">Send Message</button></div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
</section><!-- End Contact Section -->

<!-- Modal pinjam-->
<?php foreach ($daftar_inventaris as $di) :  ?>
    <div class="modal fade modal-lg" id="pinjamModal<?= $di->id_inventaris; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Perhatian! Anda akan meminjam <b><?= $di->nama_inventaris; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form action="./peminjaman/save" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="nama_inventaris" value="<?= $di->id_inventaris; ?>" required>

                                    <div class="mb-4">
                                        <label for="qty" class="form-label">Quantitas</label>
                                        <input type="number" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" name="qty" placeholder="Maksimal <?= $di->stok_inventaris; ?>" required>

                                        <?php if ($validation->hasError('qty')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('qty'); ?>
                                            </div>

                                        <?php endif; ?>

                                    </div>

                                    <div class="mb-4">
                                        <label for="instansi_peminjam" class="form-label">Instansi Peminjam</label>
                                        <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3" required>

                                        <?php if ($validation->hasError('instansi_peminjam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('instansi_peminjam'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="nama_penanggungjawab" class="form-label">Nama Penanggung Jawab</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Penanggung Jawab" name="nama_penanggungjawab" rows="3" required>

                                        <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_penanggungjawab'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                                        <input type="date" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3" required>

                                        <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal_dipinjam'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control <?= $validation->hasError('tanggal_kembali') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal Kembali" name="tanggal_kembali" rows="3" required>

                                    <?php if ($validation->hasError('tanggal_kembali')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_kembali'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="infaq" class="form-label">Infaq</label>
                                    <input type="number" class="form-control <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Jumlah Infaq Anda" name="infaq" rows="3" required>

                                    <?php if ($validation->hasError('infaq')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('infaq'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                                    <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="" required>
                                        <option value="" selected>--Pilih--</option>
                                        <option value="COD">COD</option>
                                        <option value="COD">TRANSFER</option>
                                    </select>

                                    <?php if ($validation->hasError('metode_infaq')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('metode_infaq'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="foto_identitas" class="form-label">Foto KTP</label>
                                    <input type="file" class="form-control" id="formFile" name="foto_identitas" required>
                                </div>

                                <div class="mb-4">
                                    <input type="checkbox" name="agreement" value="true" class="form-check-input" required><a href="" target="_blank"> Saya Setuju dengan Peraturan Peminjaman Inventaris Masjid</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-lihat-selengkapnya">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection(); ?>