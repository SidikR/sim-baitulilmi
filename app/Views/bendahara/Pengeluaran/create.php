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
                    <?php if (session('failed')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('failed'); ?>
                        </div>
                    <?php endif ?>
                    <form action="./pengeluaran-save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-xl-6">
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
                                    <label for="akunkeuangan" class="form-label">Akun keuangan</label>

                                    <select class="form-select <?= $validation->hasError('akunkeuangan') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Pilih Akun keuangan" name="akunkeuangan">
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
                                    <label for="akseskeuangan" class="form-label">Akses keuangan</label>

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
                            <div class="col-12 col-xl-6">
                                <div class="mb-4">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="keterangan" rows="3">

                                    <?php if ($validation->hasError('keterangan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-4">
                                    <label for="keluar" class="form-label">Dana Keluar</label>
                                    <input type="text" class="form-control <?= $validation->hasError('keluar') ? 'is-invalid' : null; ?>" id="formFile" placeholder="Isikan Besarnya Pengeluaran" name="keluar">

                                    <?php if ($validation->hasError('keluar')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keluar'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label for="foto_bukti" class="form-label">Foto Bukti</label>
                                    <p class="image_upload">
                                        <label for="userImage">
                                            <a class="btn btn-secondary bg-primary" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                                        </label>
                                        <input type="file" id="userImage" name="foto_bukti" onchange="readURL(this);" />
                                    </p>
                                    <img class="rounded" id="image" width="30%" height="30%" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="/keuangan"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-success ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>