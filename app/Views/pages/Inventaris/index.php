<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <!-- <img src="assets/img/hero-carousel/baim-hero.png" class="img-fluid animated"> -->
        <h1>Peminjaman Inventaris </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
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
                <a class="nav-link active show rounded" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <i class="bi bi-binoculars color-cyan"></i>
                    <h4>Daftar Inventaris</h4>
                </a>
            </li><!-- End Tab 1 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link rounded" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Peminjaman Inventaris</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link rounded" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Peminjaman Masjid</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

        </ul>

        <div class="tab-content">
            <?= $this->include('pages/inventaris/partials/daftar_inventaris'); ?>
            <?= $this->include('pages/inventaris/partials/form_peminjamaninventaris'); ?>
            <?= $this->include('pages/inventaris/partials/form_peminjamanmasjid'); ?>
            <?= $this->include('pages/inventaris/partials/modal_pinjaminventaris'); ?>

            <?= $this->endSection(); ?>