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
                    <form>
                        <fieldset disabled>
                            <legend>Detail dari <b><?= $daftar_pengumuman->judul; ?></b></legend>
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Tanggal</label>
                                        <input type="date" id="disabledTextInput" class="form-control" value='<?= $daftar_pengumuman->tanggal; ?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Judul</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_pengumuman->judul; ?>'>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Isi Pengumuman</label>
                                        <textarea type="text" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_pengumuman->isi; ?>' rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('pengumuman'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                            <a href="<?= '.././edit/' . $daftar_pengumuman->id_pengumuman; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>


<?= $this->endSection() ?>