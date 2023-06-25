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
                    <form action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="mb-4">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap">

                                        <?php if ($validation->hasError('nama_lengkap')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>

                                        <select class="form-select <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Jenis Kelamin" name="jenis_kelamin">
                                            <!-- <option selected>Open this select menu</option> -->
                                            <option value="" selected>--pilih--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <?php if ($validation->hasError('jenis_kelamin')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_kelamin'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="nama_jabatan" class="form-label">Jabatan</label>

                                        <input type="text" class="form-control <?= $validation->hasError('nama_jabatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Jabatan" name="nama_jabatan">

                                        <?php if ($validation->hasError('nama_jabatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_jabatan'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="mb-4">
                                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nomor_telepon') ? 'is-invalid' : null; ?>" id="formFile" placeholder="Isikan Nomor Telepon  ex.0895...." name="nomor_telepon">

                                        <?php if ($validation->hasError('nomor_telepon')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nomor_telepon'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="alamat_pengurus" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control <?= $validation->hasError('alamat_pengurus') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="alamat_pengurus" rows="5"></textarea>

                                        <?php if ($validation->hasError('alamat_pengurus')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat_pengurus'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-4">
                                    <div class="mb-4">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Url Instagram" name="instagram">
                                    </div>

                                    <div class="mb-4">
                                        <label for="linkedin" class="form-label">linkedin</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Url Linkedin" name="linkedin">
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto_pengurus" class="form-label">Foto Pengurus</label>
                                        <input type="file" class="form-control" id="formFile" placeholder="Nama Lengkap" name="foto_pengurus" onchange="readURL(this);" required>
                                    </div>

                                    <div class="mb-4">
                                        <img id="image" width="30%" height="30%" class="rounded" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="<?= base_url('pengurus'); ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-success ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>