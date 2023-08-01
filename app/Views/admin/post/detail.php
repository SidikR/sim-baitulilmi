<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="bi bi-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <form>
                                        <fieldset>
                                            <legend class="text-center">Detail dari <h1><?= $post->nama_post; ?></h1>
                                            </legend>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <div class="col mt-auto mb-auto">
                                                        <div class="col-md-12 mt-auto mb-auto ">
                                                            <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                                                <div class="inventaris-item">
                                                                    <img src="<?php echo base_url('assets-admin/img/foto-post/' . $post->foto_post); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                                                    <div class="inventaris-info">
                                                                        <h4><?= $post->nama_post; ?></h4>
                                                                        <a href="<?php echo base_url('assets-admin/img/foto-post/' . $post->foto_post); ?>" title="<?= $post->nama_post; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Post</label>
                                                        <input type="text" class="form-control" placeholder='<?= $post->nama_post; ?>' disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Post</label>
                                                        <div class="content-post border rounded-2 p-2">
                                                            <?= $post->deskripsi_post; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('post'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                            <a href="<?= '.././edit/' . $post->slug_post; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                    </form>
                                </div>
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