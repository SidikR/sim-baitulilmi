<?= $this->extend('layout/template'); ?>
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
                                    <div class="portfolio container-fluid mt-auto mb-auto" style="width : 90% ; height : 90% ;  ">
                                        <div class="portfolio-item">
                                            <img style="max-width : 90% ; max-height : 90% ;  " src="<?php echo base_url('assets-admin/img/foto-pengurus/' . $daftar_pengurus->foto_pengurus); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="portfolio-info">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="text-white">Foto <?= $daftar_pengurus->nama_lengkap; ?></span>
                                                    </div>
                                                    <div class="col-4 g-2">
                                                        <a href="<?php echo base_url('assets-admin/img/foto-pengurus/' . $daftar_pengurus->foto_pengurus); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                        <a title="Edit Foto" class="details-link g-2" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_pengurus->id_pengurus; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pengurus->nama_lengkap; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_lengkap" value="<?= $daftar_pengurus->nama_lengkap; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="exampleFormControlInput1" class="form-select" value="<?= $daftar_pengurus->jenis_kelamin; ?>" required>
                                                    <!-- <option selected>--Jenis Kelamin--</option> -->
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_jabatan" value="<?= $daftar_pengurus->jabatan; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nomor_telepon" value="<?= $daftar_pengurus->nomor_telepon; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_pengurus" class="form-label">Alamat Pengurus</label>
                                                <textarea rows="5" type="text" class="form-control" id="exampleFormControlInput1" name="alamat_pengurus" required><?= $daftar_pengurus->alamat_pengurus; ?></textarea>
                                            </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('pengurus'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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
</div>

<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Foto <?= $daftar_pengurus->nama_lengkap; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_pengurus->id_pengurus; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto_pengurus" onchange="readURL(this);" />
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