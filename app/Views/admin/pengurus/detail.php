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
                <div class="card-body mt-auto mb-auto">
                    <div class="card ms-4" style="max-width: 100%;">
                        <div class="row ms-3">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12">
                                    <div class="inventaris container-fluid" style="width : 90% ; height : 90% ;  ">
                                        <div class="inventaris-item ">
                                            <img style="max-width : 90% ; max-height : 90% ;  " src="<?php echo base_url('assets-admin/img/foto-pengurus/' . $pengurus->foto_pengurus); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info container-fluid">
                                                <div class="row ">
                                                    <div class="col">
                                                        <span class="text-white">Foto <?= $pengurus->nama_lengkap; ?></span>
                                                    </div>
                                                    <div class="col">
                                                        <a href="<?php echo base_url('assets-admin/img/foto-pengurus/' . $pengurus->foto_pengurus); ?>" data-gallery="pengurus-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
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
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nama_lengkap; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->jenis_kelamin; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Jabatan</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->jabatan; ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Alamat</label>
                                                        <textarea type="text" id="disabledTextInput" class="form-control" rows="5" placeholder='<?= $pengurus->alamat_pengurus; ?>'></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nomor Telepon</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nomor_telepon; ?>'>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div class="modal-footer p-0 m-0 py-2">
                                        <a href="<?php echo base_url('pengurus'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                        <a href="<?= '.././edit/' . $pengurus->slug_pengurus; ?>"><button type="submit" class="btn btn-success">Edit</button></a>
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