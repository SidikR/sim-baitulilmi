<div class="tab-pane active show" id="tab-1">
    <div class="row gy-4">
        <section id="portfolio" class="portfolio" data-aos="fade-up">

            <div class="container">

                <div class="section-header">
                    <h2 class="color-primary">Daftar Inventaris</h2>
                    <!-- <p>Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p> -->
                </div>

            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                    <div class="row g-0 portfolio-container">

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
                                    <a href="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" title="<?= $di->nama_inventaris; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#pinjamModal<?= $di->id_inventaris; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div><!-- End Portfolio Item -->
                        <?php endforeach ?>
                    </div><!-- End Portfolio Container -->
                </div>
            </div>
        </section><!-- End Portfolio Section -->
    </div>
</div><!-- End Tab Content 1 -->