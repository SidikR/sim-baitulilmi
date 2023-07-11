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
                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Kegiatan" name="nama_kegiatan">

                                        <?php if ($validation->hasError('nama_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_kegiatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="penyelenggara_kegiatan" class="form-label">Penyelenggara Kegiatan</label>
                                        <input type="text" class="form-control <?= $validation->hasError('penyelenggara_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Penyelenggara Kegiatan" name="penyelenggara_kegiatan">

                                        <?php if ($validation->hasError('penyelenggara_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('penyelenggara_kegiatan'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="waktu_mulai_kegiatan" class="form-label">Waktu Mulai</label>
                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_mulai_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Waktu Mulai" name="waktu_mulai_kegiatan">

                                        <?php if ($validation->hasError('waktu_mulai_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('waktu_mulai_kegiatan'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="waktu_berakhir_kegiatan" class="form-label">Waktu Selesai</label>
                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_berakhir_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Waktu Selesai" name="waktu_berakhir_kegiatan">

                                        <?php if ($validation->hasError('waktu_berakhir_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('waktu_berakhir_kegiatan'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan</label>
                                        <input type="text" class="form-control <?= $validation->hasError('tempat_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Tempat Kegiatan" name="tempat_kegiatan">

                                        <?php if ($validation->hasError('tempat_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tempat_kegiatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-4">
                                    <div class="mb-4">
                                        <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                        <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="17"></textarea>

                                        <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_kegiatan'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-4">
                                    <div class="mb-4">
                                        <label for="foto_kegiatan" class="form-label">Foto Kegiatan</label>
                                        <input type="file" class="form-control" id="formFile" placeholder="Nama Lengkap" name="foto_kegiatan" onchange="readURL(this);" required>
                                    </div>
                                    <div class="mb-4">
                                        <img id="image" width="30%" height="30%" class="rounded" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="<?= base_url('kegiatan'); ?>" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>