<?= $this->extend('layout/template'); ?>
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
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="portfolio container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="portfolio-item">
                                            <img style="max-width : 400px ; max-height : 400px ;  " src="<?php echo base_url('assets-admin/img/program/' . $program->foto); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="portfolio-info">
                                                <h4><?= $program->nama_program; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/program/' . $program->foto); ?>" title="<?= $program->nama_program; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $program->nama_program; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Program</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $program->nama_program; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Filter</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $program->filter; ?>'>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Program</label>
                                                        <textarea type="text" id="textAreaExample1" class="form-control overflow-y: scroll" placeholder='<?= $program->deskripsi_program; ?>' rows="8"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('program'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                        <a href="<?= '.././edit/' . $program->id; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                                    </form>
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