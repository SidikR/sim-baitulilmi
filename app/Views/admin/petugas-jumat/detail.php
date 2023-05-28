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
                        <div class="row">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="portfolio container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="portfolio-item">
                                            <img style="max-width : 400px ; max-height : 400px ;  " src="<?php echo base_url('assets-admin/img/petugas-jumat/' . $petugasjumat->poster); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="portfolio-info">
                                                <h4><?= $petugasjumat->nama_imam; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/petugas-jumat/' . $petugasjumat->poster); ?>" title="<?= $petugasjumat->nama_imam; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $petugasjumat->nama_imam; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Tanggal</label>
                                                        <input type="date" id="disabledTextInput" class="form-control" value='<?= $petugasjumat->tanggal; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Imam</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->nama_imam; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Jabatan Imam</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->jabatan_imam; ?>'>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Khatib</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->nama_khatib; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Jabatan Khatib</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->jabatan_khatib; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Muadzin</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->nama_muadzin; ?>'>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Jabatan Muadzin</label>
                                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $petugasjumat->jabatan_muadzin; ?>'>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('petugas-jumat'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                        <a href="<?= '.././edit/' . $petugasjumat->id_petugas; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
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