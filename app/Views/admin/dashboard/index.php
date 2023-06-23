<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <hr>
            <h2>Kelola Data</h2>
            <div class="row pt-2 ">
                <!-- Data Pengurus -->
                <?php foreach ($data_card as $card) : ?>
                    <div class="col-xl-3 col-md-6 p-3">
                        <div class="card card-dashboard <?= $card['color_card'] ?> text-white">
                            <div class="card-body row d-flex align-items-center justify-content-between mx-0 my-0 px-1 py-0">
                                <div class="col-4 mx-0">
                                    <i class="<?= $card['icon']; ?>" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-8 mx-0">
                                    <h1><?= $card['count'] ?></h1>
                                    <span><?= $card['title_card'] ?></span>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="<?= base_url($card['link']) ?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- End Data Pengurus -->
                <div class="container text-center pt-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 content d-flex flex-column">
                            <h2 class="text-start">Ringkasan Keuangan</h2>
                            <div class="row mt-3">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-dashboard bg-secondary text-white mb-4">
                                        <div class="card-body">
                                            <h4>Pembangunan</h4>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-center">
                                            <h2><?= 'Rp. ' . number_format($total_pem, 0, '.', '.'); ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-dashboard bg-secondary text-white mb-4">
                                        <div class="card-body">
                                            <h4>Sarana Prasarana</h4>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-center">
                                            <h2><?= 'Rp. ' . number_format($total_prs, 0, '.', '.'); ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-dashboard bg-secondary text-white mb-4">
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
                                    <div class="card card-dashboard bg-primary text-white mb-4">
                                        <div class="card-body">
                                            <h4 class="text-white"><b>Total Keuangan</b></h4>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-center">
                                            <h2><?= 'Rp. ' . number_format($total_kas, 0, '.', '.'); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>
</div>
<?= $this->endSection() ?>