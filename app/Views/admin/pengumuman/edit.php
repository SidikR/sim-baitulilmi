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
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row m-3">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_pengumuman->id_pengumuman; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pengumuman->judul; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for='' class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" value='<?= $daftar_pengumuman->tanggal; ?>' name="tanggal">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for='' class="form-label">Judul</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_pengumuman->judul; ?>' name="judul">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for='' class="form-label">Isi Pengumuman</label>
                                                        <textarea type="text" class="form-control" value='<?= $daftar_pengumuman->isi; ?>' name="isi" rows="10"><?= $daftar_pengumuman->isi; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('pengumuman'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?= $this->endSection() ?>