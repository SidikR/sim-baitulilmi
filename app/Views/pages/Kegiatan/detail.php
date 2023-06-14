<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Detail Data Dari</h1>
        <h2><span><?= $kegiatan->nama_kegiatan; ?></span></h2>
    </div>
</section>

<div class="container-fluid p-4">
    <div class="row m-3" style="max-width: 100%;">
        <div class="col-md-4 mt-auto mb-auto">
            <div class="col-md-12">
                <div class="portfolio container-fluid" style="width : 90% ; height : 90% ;  ">
                    <div class="portfolio-item ">
                        <img style="max-width : 90% ; max-height : 90% ;  " src="<?php echo base_url('assets-admin/img/kegiatan/' . $kegiatan->foto_kegiatan); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                        <div class="portfolio-info container-fluid">
                            <div class="row ">
                                <div class="col">
                                    <span class="text-white">Foto <?= $kegiatan->nama_kegiatan; ?></span>
                                </div>
                                <div class="col">
                                    <a href="<?php echo base_url('assets-admin/img/kegiatan/' . $kegiatan->foto_kegiatan); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-auto mb-auto ms-auto mx-auto">
            <div class=" card-body">
                <form>
                    <fieldset disabled>
                        <legend>Detail dari <b><?= $kegiatan->nama_kegiatan; ?></b></legend>
                        <div class="row">
                            <div class="col-md-12 col-xl-6">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Nama Kegiatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $kegiatan->nama_kegiatan; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Penyelenggara</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $kegiatan->penyelenggara_kegiatan; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Tempat Kegiatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $kegiatan->tempat_kegiatan; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Waktu Mulai</label>
                                    <input type="datetime local" id="disabledTextInput" class="form-control" value='<?= $kegiatan->waktu_mulai_kegiatan; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Waktu Berakhir</label>
                                    <input type="datetime local" id="disabledTextInput" class="form-control" value='<?= $kegiatan->waktu_berakhir_kegiatan; ?>'>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Deskripsi</label>
                                    <textarea type="text" id="disabledTextInput" class="form-control" rows="15"><?= $kegiatan->deskripsi_kegiatan; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <a href="<?php echo base_url('kegiatan-guest'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>