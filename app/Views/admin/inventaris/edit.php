<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <?php if (session('failed')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('failed'); ?>
                        </div>
                    <?php endif ?>
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row m-3">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="portfolio container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="portfolio-item">
                                            <img style="max-width : 400px ; max-height : 400px ;  " src="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="portfolio-info">
                                                <h4><?= $daftar_inventaris->nama_inventaris; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" title="<?= $daftar_inventaris->nama_inventaris; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_inventaris->id_inventaris; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_inventaris->nama_inventaris; ?></b></legend>

                                            <div class="col-md-12 mb-3">
                                                <label for="disabledTextInput" class="form-label <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>">Nama Inventaris</label>
                                                <input name="nama_inventaris" type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->nama_inventaris; ?>' value="<?= $daftar_inventaris->nama_inventaris; ?>">

                                                <?php if ($validation->hasError('nama_inventaris')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama_inventaris'); ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="disabledTextInput" class="form-label <?= $validation->hasError('stok_inventaris') ? 'is-invalid' : null; ?>">Stok</label>
                                                <input type="number" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->stok_inventaris; ?>' value="<?= $daftar_inventaris->stok_inventaris; ?>" name="stok_inventaris">

                                                <?php if ($validation->hasError('stok_inventaris')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('stok_inventaris'); ?>
                                                    </div>

                                                <?php endif; ?>

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="disabledTextInput" class="form-label <?= $validation->hasError('asal_inventaris') ? 'is-invalid' : null; ?>">Asal</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->asal_inventaris; ?>' value="<?= $daftar_inventaris->asal_inventaris; ?>" name="asal_inventaris">

                                                <?php if ($validation->hasError('asal_inventaris')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('asal_inventaris'); ?>
                                                    </div>

                                                <?php endif; ?>

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="disabledTextInput" class="form-label <?= $validation->hasError('deskripsi_inventaris') ? 'is-invalid' : null; ?>">Deskripsi</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->deskripsi_inventaris; ?>' value="<?= $daftar_inventaris->deskripsi_inventaris; ?>" name="deskripsi_inventaris">

                                                <?php if ($validation->hasError('deskripsi_inventaris')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('deskripsi_inventaris'); ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>

                                        </fieldset>
                                        <a href="<?php echo base_url('inventaris'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
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


<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_inventaris->id_inventaris; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto_inventaris" onchange="readURL(this);" />
                    </p>
                    <img id="image" width="100%" height="100%" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>