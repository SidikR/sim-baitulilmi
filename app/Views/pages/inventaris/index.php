<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Halaman Peminjaman</h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
    </div>
</section>

<!-- ======= tabs Section ======= -->
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

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link active show rounded" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <i class="bi bi-tools color-secondary"></i>
                    <h4>Daftar Inventaris</h4>
                </a>
            </li><!-- End Tab 1 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link rounded" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-cart-check color-secondary"></i>
                    <h4>Peminjaman Inventaris</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link rounded" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-cart-check color-secondary"></i>
                    <h4>Peminjaman Masjid</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

        </ul>

        <div class="tab-content">
            <?= $this->include('pages/inventaris/partials/daftar_inventaris'); ?>
            <?= $this->include('pages/inventaris/partials/form_peminjamaninventaris'); ?>
            <?= $this->include('pages/inventaris/partials/form_peminjamanmasjid'); ?>
            <?= $this->include('pages/inventaris/partials/modal_pinjaminventaris'); ?>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>