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
                    <form action="./pemasukan-save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label for="tanggal_transaksi" class="form-label">Tanggal Tansaksi</label>
                                    <input type="date" class="form-control <?= $validation->hasError('tanggal_transaksi') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="tanggal_transaksi">

                                    <?php if ($validation->hasError('tanggal_transaksi')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_transaksi'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="akunkeuangan" class="form-label">Akun Keuangan</label>

                                    <select class="form-select <?= $validation->hasError('akunkeuangan') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Pilih Akun Keuangan" name="akunkeuangan">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <option value="" selected>--Pilih--</option>
                                        <?php foreach ($daftar_akunkeuangan as $dak) : ?>
                                            <option value=<?= $dak->id_akunkeuangan; ?>><?= $dak->keterangan_akunkeuangan; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if ($validation->hasError('akunkeuangan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('akunkeuangan'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="akseskeuangan" class="form-label">Akses Keuangan</label>

                                    <select class="form-select <?= $validation->hasError('akseskeuangan') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Jenis Kelamin" name="akseskeuangan">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <option value="" selected>--Pilih--</option>
                                        <?php foreach ($daftar_akseskeuangan as $dak) : ?>
                                            <option value=<?= $dak->id_akseskeuangan; ?>><?= $dak->keterangan_akseskeuangan; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if ($validation->hasError('akseskeuangan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('akseskeuangan'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Keterangan Pemasukan" name="keterangan" rows="5"></textarea>

                                    <?php if ($validation->hasError('keterangan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="masuk" class="form-label">Nominal Pemasukan</label>
                                    <input type="number" class="form-control <?= $validation->hasError('masuk') ? 'is-invalid' : null; ?>" id="formFile" placeholder="Isikan Besarnya Pemasukan" name="masuk">

                                    <?php if ($validation->hasError('masuk')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('masuk'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="/keuangan"><button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>