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
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row g-0 align-items-center offset-md-1 me-2 g-2">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_jabatan->id_jabatan; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_jabatan->nama_jabatan; ?></b></legend>

                                            <div class="mb-3">
                                                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_jabatan" value="<?= $daftar_jabatan->nama_jabatan; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi_jabatan" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="deskripsi_jabatan" value="<?= $daftar_jabatan->deskripsi_jabatan; ?>" required>
                                            </div>


                                        </fieldset>
                                        <a href="<?php echo base_url('jabatan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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