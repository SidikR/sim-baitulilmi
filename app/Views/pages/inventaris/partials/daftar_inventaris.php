<div class="tab-pane active show" id="tab-1">
    <div class="row gy-4">

        <section id="inventaris" class="inventaris" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h2 class="color-primary">Daftar Inventaris</h2>
                </div>
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
                <div class="inventaris-isotope" data-inventaris-filter="*" data-inventaris-layout="masonry" data-inventaris-sort="original-order">
                    <div class="row g-0 inventaris-container">
                        <?php foreach ($daftar_inventaris as $di) :  ?>
                            <div class="col-xl-3 g-4 col-lg-4 col-md-6 inventaris-item filter-app rounded" style="width: 300px; height : 300px">
                                <img src="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" class="img-fluid rounded" alt="Foto Inventaris">
                                <div class="inventaris-info">
                                    <h4><?= $di->nama_inventaris; ?></h4>
                                    <h4> <?php if ($di->stok_inventaris == 0) {
                                                'Stok : Habis';
                                            } else {
                                                echo 'Stok : ' . $di->stok_inventaris;
                                            }
                                            ?></h4>
                                    <a href="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" title="<?= $di->nama_inventaris; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#pinjamModal<?= $di->id_inventaris; ?>" title="Pinjam Inventaris" class="details-link"><i class="bi bi-cart-plus"></i></a>
                                </div>
                            </div><!-- End inventaris Item -->
                        <?php endforeach ?>
                    </div><!-- End Portfolio Container -->
                </div>
            </div>
        </section><!-- End Portfolio Section -->
    </div>
</div><!-- End Tab Content 1 -->