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
                    <?php if (session('failed')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('failed'); ?>
                        </div>
                    <?php endif ?>
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row m-3">

                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="inventaris-item">
                                            <img style="max-width : 400px ; max-height : 400px ;  " src="<?php echo base_url('assets-admin/img/kegiatan/' . $daftar_kegiatan->foto_kegiatan); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $daftar_kegiatan->nama_kegiatan; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/kegiatan/' . $daftar_kegiatan->foto_kegiatan); ?>" title="<?= $daftar_kegiatan->nama_kegiatan; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_kegiatan->id_kegiatan; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_kegiatan->nama_kegiatan; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Kegiatan</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_kegiatan->nama_kegiatan; ?>' name="nama_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Waktu Mulai</label>
                                                        <input type="datetime-local" class="form-control" value='<?= $daftar_kegiatan->waktu_mulai_kegiatan; ?>' name="waktu_mulai_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Waktu Selesai</label>
                                                        <input type="datetime-local" class="form-control" value='<?= $daftar_kegiatan->waktu_berakhir_kegiatan; ?>' name="waktu_berakhir_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Penyelenggara Kegiatan</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_kegiatan->penyelenggara_kegiatan; ?>' name="penyelenggara_kegiatan">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Tempat Kegiatan</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_kegiatan->tempat_kegiatan; ?>' name="tempat_kegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Kegiatan</label>
                                                        <textarea type="text" class="form-control overflow-y: scroll" value='<?= $daftar_kegiatan->deskripsi_kegiatan; ?>' rows="8" name="deskripsi_kegiatan"><?= $daftar_kegiatan->deskripsi_kegiatan; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('kegiatan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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

<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_kegiatan->id_kegiatan; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto_kegiatan" onchange="readURL(this);" />
                    </p>
                    <img id="image" width="50%" height="50%" />
                    <div class="modal-footer p-0 m-0 py-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>