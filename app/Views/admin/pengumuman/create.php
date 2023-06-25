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
                                <div class="col-12 col-xl-6">
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
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Pengumuman" name="judul">

                                        <?php if ($validation->hasError('judul')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('judul'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="mb-4">
                                        <label for="isi" class="form-label">Isi Pengumuman</label>
                                        <textarea type="text" class="form-control <?= $validation->hasError('isi') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Pengumuman" name="isi" rows="10"></textarea>

                                        <?php if ($validation->hasError('isi')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('isi'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- <div class="row d-flex justify-content-end"> -->
                                <div class="modal-footer">
                                    <a href="<?= base_url('pengumuman'); ?>" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-success ">Tambah</button>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>