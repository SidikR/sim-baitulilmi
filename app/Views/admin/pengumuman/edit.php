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
                    <form action="./<?= $daftar_pengumuman->id_pengumuman; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <fieldset>
                            <legend>Detail dari <b><?= $daftar_pengumuman->judul; ?></b></legend>
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="mb-3">
                                        <label for='' class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" value='<?= $daftar_pengumuman->tanggal; ?>' name="tanggal">
                                    </div>
                                    <div class="mb-3">
                                        <label for='' class="form-label">Judul</label>
                                        <input type="text" class="form-control" value='<?= $daftar_pengumuman->judul; ?>' name="judul">
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="mb-3">
                                        <label for='' class="form-label">Isi Pengumuman</label>
                                        <textarea type="text" class="form-control" value='<?= $daftar_pengumuman->isi; ?>' name="isi" rows="10"><?= $daftar_pengumuman->isi; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('pengumuman'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</div>
<?= $this->endSection() ?>