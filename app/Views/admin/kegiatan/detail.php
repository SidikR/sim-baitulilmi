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
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="inventaris-item">
                                            <img src="<?php echo base_url('assets-admin/img/kegiatan/' . $kegiatan->foto_kegiatan); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $kegiatan->nama_kegiatan; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/kegiatan/' . $kegiatan->foto_kegiatan); ?>" title="<?= $kegiatan->nama_kegiatan; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $kegiatan->nama_kegiatan; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Kegiatan</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $kegiatan->nama_kegiatan; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Waktu Mulai</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $kegiatan->waktu_mulai_kegiatan; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Waktu Selesai</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $kegiatan->waktu_berakhir_kegiatan; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Penyelenggara Kegiatan</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $kegiatan->penyelenggara_kegiatan; ?>'>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Tempat Kegiatan</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $kegiatan->tempat_kegiatan; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Kegiatan</label>
                                                        <textarea type="text" id="textAreaExample1" class="form-control overflow-y: scroll" placeholder='<?= $kegiatan->deskripsi_kegiatan; ?>' rows="8"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('kegiatan'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                            <a href="<?= '.././edit/' . $kegiatan->slug_kegiatan; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        </div>
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