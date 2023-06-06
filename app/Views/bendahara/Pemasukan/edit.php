<?= $this->extend('layout/template'); ?>
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
                        <div class="row g-0 align-items-center offset-md-1 me-2 g-2">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_pemasukan->id_keuangan; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pemasukan->keterangan; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label <?= $validation->hasError('tanggal_transaksi') ? 'is-invalid' : null; ?>">Tanggal Transaksi</label>
                                                        <input name="tanggal_transaksi" type="date" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_pemasukan->tanggal_transaksi; ?>' value="<?= $daftar_pemasukan->tanggal_transaksi; ?>">

                                                        <?php if ($validation->hasError('tanggal_transaksi')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('tanggal_transaksi'); ?>
                                                            </div>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Akun Keuangan</label>
                                                        <select class="form-select" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih Akun Keuangan" name="akunkeuangan">
                                                            <option value="<?= $daftar_pemasukan->id_akunkeuangan; ?>" selected><?= $daftar_pemasukan->keterangan_akunkeuangan; ?></option>
                                                            <?php foreach ($daftar_akunkeuangan as $dak) : ?>
                                                                <option value=<?= $dak->id_akunkeuangan; ?>><?= $dak->keterangan_akunkeuangan; ?></option>
                                                            <?php endforeach ?>
                                                        </select required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Akses Keuangan</label>
                                                        <select class="form-select" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih akses Keuangan" name="akseskeuangan">
                                                            <option value="<?= $daftar_pemasukan->id_akseskeuangan; ?>" selected><?= $daftar_pemasukan->keterangan_akseskeuangan; ?></option>
                                                            <?php foreach ($daftar_akseskeuangan as $dak) : ?>
                                                                <option value=<?= $dak->id_akseskeuangan; ?>><?= $dak->keterangan_akseskeuangan; ?></option>
                                                            <?php endforeach ?>
                                                        </select required>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nominal Pemasukan</label>
                                                        <input name="masuk" type="text" id="disabledTextInput" class="form-control" value="<?= $daftar_pemasukan->masuk; ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" type="text" id="disabledTextInput" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null; ?>" placeholder='<?= $daftar_pemasukan->keterangan; ?>' value="<?= $daftar_pemasukan->keterangan; ?>" rows="5"><?= $daftar_pemasukan->keterangan; ?></textarea>

                                                        <?php if ($validation->hasError('keterangan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('keterangan'); ?>
                                                            </div>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <a href="<?php echo base_url('keuangan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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
</div>


<?= $this->endSection() ?>