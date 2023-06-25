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
                        <div class="row m-3">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="inventaris-item">
                                            <img src="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $daftar_inventaris->nama_inventaris; ?></h4>
                                                <a target="_blank" href="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" title="<?= $daftar_inventaris->nama_inventaris; ?>" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $daftar_inventaris->nama_inventaris; ?></b></legend>
                                            <div class="row">
                                                <div class="col-12 col-xl-6">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Inventaris</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->nama_inventaris; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Stok</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->stok_inventaris; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Asal</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_inventaris->asal_inventaris; ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Deskripsi</label>
                                                        <textarea type="text" id="disabledTextInput" class="form-control" name="deskripsi_inventaris" rows="9"><?= $daftar_inventaris->deskripsi_inventaris; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div class="modal-footer p-0 m-0 py-2">
                                        <a href="<?php echo base_url('inventaris'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                        <a href="<?= '.././edit/' . $daftar_inventaris->slug_inventaris; ?>"><button type="submit" class="btn btn-success">Edit</button></a>
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