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
                        <div class="row g-0 align-items-center me-2">
                            <div class="col-md-4 align-items-center px-3">
                                <img style="max-width : 350px ; max-height : 350px ;  " src="<?php echo base_url('assets-admin/img/pengurus/' . $pengurus->foto_pengurus); ?>" class="img-fluid rounded float-start float-center ms-auto d-block " alt="foto <?= $pengurus->nama_lengkap; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $pengurus->nama_lengkap; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nama_lengkap; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->jenis_kelamin; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nomor Telepon</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->nomor_telepon; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Alamat</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengurus->alamat_pengurus; ?>'>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <a href="<?= '.././edit/' . $pengurus->slug_pengurus; ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
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