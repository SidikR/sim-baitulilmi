<?= $this->extend('bendahara/layout/template'); ?>
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
                            <div class="col-md-4 px-3">
                                <img style="max-width : 350px ; max-height : 350px ;  " src="<?php echo base_url('assets-bendahara/img/foto-bukti/' . $daftar_pengeluaran->foto_bukti); ?>" class="img-fluid rounded float-start float-center ms-auto d-block " alt="foto <?= $daftar_pengeluaran->keterangan; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_pengeluaran->id_keuangan; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pengeluaran->keterangan; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label <?= $validation->hasError('tanggal_transaksi') ? 'is-invalid' : null; ?>">Tanggal Transaksi</label>
                                                <input name="tanggal_transaksi" type="date" id="disabledTextInput" class="form-control" placeholder='<?= $daftar_pengeluaran->tanggal_transaksi; ?>' value="<?= $daftar_pengeluaran->tanggal_transaksi; ?>">

                                                <?php if ($validation->hasError('tanggal_transaksi')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tanggal_transaksi'); ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akun Keuangan</label>
                                                <select class="form-select <?= $validation->hasError('akunkeuangan') ? 'is-invalid' : null; ?>" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih Akun Keuangan" name="akunkeuangan">
                                                    <option value="<?= $daftar_pengeluaran->id_akunkeuangan; ?>" selected><?= $daftar_pengeluaran->keterangan_akunkeuangan; ?></option>
                                                    <?php foreach ($daftar_akunkeuangan as $dak) : ?>
                                                        <option value=<?= $dak->id_akunkeuangan; ?>><?= $dak->keterangan_akunkeuangan; ?></option>
                                                    <?php endforeach ?>
                                                </select required>

                                                <?php if ($validation->hasError('akunkeuangan')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('akunkeuangan'); ?>
                                                    </div>

                                                <?php endif; ?>

                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akses Keuangan</label>
                                                <select class="form-select <?= $validation->hasError('akseskeuangan') ? 'is-invalid' : null; ?>" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih akses Keuangan" name="akseskeuangan">
                                                    <option value="<?= $daftar_pengeluaran->id_akseskeuangan; ?>" selected><?= $daftar_pengeluaran->keterangan_akseskeuangan; ?></option>
                                                    <?php foreach ($daftar_akseskeuangan as $dak) : ?>
                                                        <option value=<?= $dak->id_akseskeuangan; ?>><?= $dak->keterangan_akseskeuangan; ?></option>
                                                    <?php endforeach ?>
                                                </select required>

                                                <?php if ($validation->hasError('akseskeuangan')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('akseskeuangan'); ?>
                                                    </div>

                                                <?php endif; ?>

                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nominal Pengeluaran</label>
                                                <input name="keluar" type="text" id="disabledTextInput" class="form-control <?= $validation->hasError('keluar') ? 'is-invalid' : null; ?>" value="<?= $daftar_pengeluaran->keluar; ?>">

                                                <?php if ($validation->hasError('keluar')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('keluar'); ?>
                                                    </div>

                                                <?php endif; ?>


                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Keterangan</label>
                                                <input name="keterangan" type="text" id="disabledTextInput" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null; ?>" placeholder='<?= $daftar_pengeluaran->keterangan; ?>' value="<?= $daftar_pengeluaran->keterangan; ?>">

                                                <?php if ($validation->hasError('keterangan')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('keterangan'); ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>

                                            <div class="mb-4">
                                                <label for="foto_bukti" class="form-label">Foto Bukti</label>
                                                <input type="file" class="form-control" id="formFile" name="foto_bukti" required>
                                            </div>

                                        </fieldset>
                                        <a href="<?php echo base_url('pengeluaran'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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