<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body mt-auto mb-auto">
                    <div class="card ms-4" style="max-width: 100%;">
                        <div class="row ms-3">
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
                                                        <a href="<?php echo base_url('assets-admin/img/foto-pengurus/' . $pengurus->foto_pengurus); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
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
                                            <legend>Detail dari <b><?= $pengurus->nama_lengkap; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nama_lengkap; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->jenis_kelamin; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->jenis_kelamin; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nomor Telepon</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nomor_telepon; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Alamat</label>
                                                <textarea type="text" id="disabledTextInput" class="form-control" rows="5" placeholder='<?= $pengurus->alamat_pengurus; ?>'></textarea>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <a href="<?php echo base_url('pengurus'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                    <a href="<?= '.././edit/' . $pengurus->slug_pengurus; ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>


<?= $this->endSection() ?>