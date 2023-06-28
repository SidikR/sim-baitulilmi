<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detail dari <?= $pengurus->nama_lengkap; ?></h2>
            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li><a href="<?= base_url('pengurus-guest'); ?>">Pengurus</a></li>
                <li><?= $pengurus->nama_lengkap; ?></li>
            </ol>
        </div>

    </div>
</div><!-- End Breadcrumbs -->

<div class="container-fluid p-4">
    <div class="row m-3" style="max-width: 100%;">
        <div class="col-md-4 mt-auto mb-auto">
            <div class="col-md-12">
                <div class="portfolio container-fluid" style="width : 90% ; height : 90% ;  ">
                    <div class="portfolio-item ">
                        <img style="max-width : 90% ; max-height : 90% ;  " src="<?php echo base_url('assets-admin/img/foto-pengurus/' . $pengurus->foto_pengurus); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                        <div class="portfolio-info container-fluid">
                            <div class="row ">
                                <div class="col">
                                    <span class="text-white">Foto <?= $pengurus->nama_lengkap; ?></span>
                                </div>
                                <div class="col">
                                    <a href="<?php echo base_url('assets-admin/img/foto-pengurus/' . $pengurus->foto_pengurus); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
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
                        <div class="row">
                            <div class="col-md-12 col-xl-6">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $pengurus->nama_lengkap; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $pengurus->jenis_kelamin; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Jabatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $pengurus->jabatan; ?>'>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Nomor Telepon</label>
                                    <input type="text" id="disabledTextInput" class="form-control" value='<?= $pengurus->nomor_telepon; ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Alamat</label>
                                    <textarea type="text" id="disabledTextInput" class="form-control" rows="5"><?= $pengurus->alamat_pengurus; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <a href="<?php echo base_url('pengurus-guest'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>