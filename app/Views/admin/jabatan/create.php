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
                            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_jabatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama jabatan" name="nama_jabatan">

                            <?php if ($validation->hasError('nama_jabatan')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_jabatan'); ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="mb-4">
                            <label for="deskripsi_jabatan" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control <?= $validation->hasError('deskripsi_jabatan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan deskripsi Lengkap" name="deskripsi_jabatan" rows="3">

                            <?php if ($validation->hasError('deskripsi_jabatan')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi_jabatan'); ?>
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