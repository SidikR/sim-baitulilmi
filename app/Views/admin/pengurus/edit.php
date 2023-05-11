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
                            <div class="col-md-4 px-3">
                                <img style="max-width : 350px ; max-height : 350px ;  " src="<?php echo base_url('assets-admin/img/pengurus/' . $daftar_pengurus->foto_pengurus); ?>" class="img-fluid rounded float-start float-center ms-auto d-block " alt="foto <?= $daftar_pengurus->nama_lengkap; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_pengurus->id_pengurus; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pengurus->nama_lengkap; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_lengkap" value="<?= $daftar_pengurus->nama_lengkap; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="exampleFormControlInput1" class="form-select" value="<?= $daftar_pengurus->jenis_kelamin; ?>" required>
                                                    <!-- <option selected>--Jenis Kelamin--</option> -->
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomor_telepon" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nomor_telepon" value="<?= $daftar_pengurus->nomor_telepon; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_pengurus" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat_pengurus" value="<?= $daftar_pengurus->alamat_pengurus; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_pengurus" class="form-label">Nama Lengkap</label>
                                                <input type="file" class="form-control" id="exampleFormControlInput1" name="foto_pengurus" required>
                                            </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('pengurus'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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