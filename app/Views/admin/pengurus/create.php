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
                    <form action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
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
                                <option selected>--Jenis Kelamin--</option>
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
                            <input type="text" class="form-control <?= $validation->hasError('alamat_pengurus') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="alamat_pengurus" rows="3">

                            <?php if ($validation->hasError('alamat_pengurus')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat_pengurus'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="foto_pengurus" class="form-label">Foto Pengurus</label>
                            <input type="file" class="form-control <?= $validation->hasError('foto_pengurus') ? 'is-invalid' : null; ?>" id="formFile" placeholder="Nama Lengkap" name="foto_pengurus">

                            <?php if ($validation->hasError('foto_pengurus')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto_pengurus'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                </div>
                <div class="modal-footer m-3">
                    <button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary ">Tambah</button>
                </div>
                </form>
            </div>
        </div>
</div>
</main>

</div>
<?= $this->endSection() ?>