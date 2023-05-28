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
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Tanggal" name="tanggal">

                                        <?php if ($validation->hasError('tanggal')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="nama_imam" class="form-label">Nama Imam</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_imam') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="nama_imam">

                                        <?php if ($validation->hasError('nama_imam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_imam'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jabatan_imam" class="form-label">Jabatan Imam</label>
                                        <input type="text" class="form-control <?= $validation->hasError('jabatan_imam') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="jabatan_imam">

                                        <?php if ($validation->hasError('jabatan_imam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_imam'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="nama_khatib" class="form-label">Nama Khatib</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_khatib') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="nama_khatib">

                                        <?php if ($validation->hasError('nama_khatib')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_khatib'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jabatan_khatib" class="form-label">Jabatan Khatib</label>
                                        <input type="text" class="form-control <?= $validation->hasError('jabatan_khatib') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="jabatan_khatib">

                                        <?php if ($validation->hasError('jabatan_khatib')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_khatib'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="col">
                                        <div class="mb-4">
                                            <label for="nama_muadzin" class="form-label">Nama Khatib</label>
                                            <input type="text" class="form-control <?= $validation->hasError('nama_muadzin') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="nama_muadzin">

                                            <?php if ($validation->hasError('nama_muadzin')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_muadzin'); ?>
                                                </div>

                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-4">
                                            <label for="jabatan_muadzin" class="form-label">Jabatan Muadzin</label>
                                            <input type="text" class="form-control <?= $validation->hasError('jabatan_muadzin') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Petugas-jumat" name="jabatan_muadzin">

                                            <?php if ($validation->hasError('jabatan_muadzin')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jabatan_muadzin'); ?>
                                                </div>

                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-4">
                                            <label for="poster" class="form-label">Poster</label>
                                            <input type="file" class="form-control" id="formFile" placeholder="Nama Lengkap" name="poster" onchange="readURL(this);" required>
                                        </div>

                                        <div class="mb-4">
                                            <img id="image" width="30%" height="30%" class="rounded" />
                                        </div>
                                    </div>
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