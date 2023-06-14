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
        <div class="row">

            <div class="col-12 mb-5">
                <div class="section-header text-primary">
                    <h1 class="color-primary ">Layanan</h1>
                    <p>Silakan pilih layanan yang kami sediakan.</p>
                </div>
            </div>

            <div class="row mt-5 pt-5 gy-5 mb-5 pb-5">
                <div class="col-12 col-xl-4 col-md-6 mb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details position-relative bg-img-primary">
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
                <div class="col-12 col-xl-4 col-md-6 mb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details position-relative bg-img-primary">
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
                <div class="col-12 col-xl-4 col-md-6 mb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <div class="details position-relative bg-img-primary">
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
            <div class="col-lg-12 col-md-6 d-flex flex-column ">
                <div class="section-header">
                    <h2 class="p-3 color-primary">Keuangan Masjid</h2>
                    <p> Keuangan Masjid Baitul Ilmi ITERA dibagi menjadi tiga bagian yang berbeda, sesuai dengan ketentuan akad dengan donatur, berikut total keuangan masjid pada setaip akun keuangan</p>
                </div>

                <div class="row mt-3">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4>Pembangunan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_pem, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4>Sarana Prasarana</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_prs, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
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
                            <a href="<?= base_url('guest-keuangan'); ?>" class="btn btn-primary">Lihat Selengkapnya</a>
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

        <div class="row gy-3 d-flex align-items-center justify-content-center">
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
                <a class="btn btn-primary" href="<?= base_url('kegiatan-guest'); ?>">Lihat Selengkapnya</a>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

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
                <a class="btn btn-primary" href="<?= base_url('pengurus-guest'); ?>">Lihat Selengkapnya</a>
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
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
        <div class="portfolio-isotope">
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
                    <a class="btn btn-primary" href="">Lihat Selengkapnya</a>
                </div>
            </div><!-- End Portfolio Container -->
        </div>
    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact bg-img-primary">
    <div class="container">

        <div class="section-header">
            <h2>Contact Us</h2>
            <!-- <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p> -->
        </div>

    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
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
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control border-success rounded-2" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control border-success rounded-2" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control border-success rounded-2" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control border-success rounded-2" name="message" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection(); ?>