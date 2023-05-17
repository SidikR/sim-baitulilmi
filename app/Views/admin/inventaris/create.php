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
                            <label for="nama_inventaris" class="form-label">Nama Inventaris</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_inventaris">

                            <?php if ($validation->hasError('nama_inventaris')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_inventaris'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="asal_inventaris" class="form-label">Asal Inventaris</label>
                            <input type="text" class="form-control <?= $validation->hasError('asal_inventaris') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="asal_inventaris">

                            <?php if ($validation->hasError('asal_inventaris')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('asal_inventaris'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="stok_inventaris" class="form-label">Stok</label>
                            <input type="text" class="form-control <?= $validation->hasError('stok_inventaris') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Isikan Stok Inventaris" name="stok_inventaris">

                            <?php if ($validation->hasError('stok_inventaris')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok_inventaris'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi_inventaris" class="form-label">Deskripsi Inventaris</label>
                            <input type="text" class="form-control <?= $validation->hasError('deskripsi_inventaris') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="deskripsi_inventaris" rows="3">

                            <?php if ($validation->hasError('deskripsi_inventaris')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi_inventaris'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="foto_inventaris" class="form-label">Foto Inventaris</label>
                            <input type="file" class="form-control" id="formFile" name="foto_inventaris" required>
                        </div>

                        <div class="modal-footer m-3">
                            <a href="/inventaris"><button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>