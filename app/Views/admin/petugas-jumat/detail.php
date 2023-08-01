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
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="inventaris container-fluid mt-3 mb-3" style="width : 80% ; height : 80% ;  ">
                                        <div class="inventaris-item">
                                            <img src="<?php echo base_url('assets-admin/img/petugas-jumat/' . $petugasjumat->poster); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <div class="row d-flex ">
                                                    <div class="col justify-content-between m-0 p-0">
                                                        <h4 class="m-0 p-0"><?= $petugasjumat->nama_imam; ?></h4>
                                                        <a href="<?php echo base_url('assets-admin/img/petugas-jumat/' . $petugasjumat->poster); ?>" title="<?= $petugasjumat->nama_imam; ?>" data-gallery="jadwal_jumat" class="glightbox preview-link m-0 p-0"><i class="bi bi-zoom-in"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail Petugas Tanggal <b><?= date('d-F-Y', strtotime($petugasjumat->tanggal)); ?></b></legend>
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
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('petugas-jumat'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                            <a href="<?= '.././edit/' . $petugasjumat->id_petugas; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<?= $this->endSection() ?>