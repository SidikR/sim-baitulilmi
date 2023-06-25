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
                                            <img style="max-width : 400px ; max-height : 400px ;  " src="<?php echo base_url('assets-admin/img/program/' . $daftar_program->foto); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $daftar_program->nama_program; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/program/' . $daftar_program->foto); ?>" title="<?= $daftar_program->nama_program; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_program->id; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_program->nama_program; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Program</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_program->nama_program; ?>' name="nama_program">
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="">
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text text-black" for="inputGroupSelect01">Filter</label>
                                                                <select class="form-select" id="inputGroupSelect01" name="filter_op">
                                                                    <option selected><?= $daftar_program->filter; ?></option>
                                                                    <?php foreach ($daftar_filter as $kt) : ?>
                                                                        <option value="<?= $kt->filter; ?>"><?= $kt->filter; ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="input-group">
                                                                <span class="input-group-text text-black">Tambah Filter Baru</span>
                                                                <input type="text" name="filter_br" aria-label="First name" class="form-control" placeholder="Tambahkan Filter Baru Jika Tidak tersedia">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Program</label>
                                                        <textarea type="text" class="form-control overflow-y: scroll" value='<?= $daftar_program->deskripsi_program; ?>' rows="8" name="deskripsi_program"><?= $daftar_program->deskripsi_program; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('program'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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
                <form action="./foto/<?= $daftar_program->id; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto" onchange="readURL(this);" />
                    </p>
                    <img id="image" width="50%" height="50%" />
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