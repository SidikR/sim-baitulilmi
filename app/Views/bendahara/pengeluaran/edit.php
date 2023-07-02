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
                    <div class="row g-0 align-items-center offset-md-1 me-2 g-2">
                        <div class="col-md-4 mt-auto mb-auto">
                            <div class="col-md-12 mt-auto mb-auto ">
                                <div class="inventaris container-fluid mt-auto mb-auto" style="width : 80% ; height : 80% ;  ">
                                    <div class="inventaris-item">
                                        <img src="<?php echo base_url('assets-bendahara/img/foto-bukti/' . $daftar_pengeluaran->foto_bukti); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                        <div class="inventaris-info">
                                            <h4><?= $daftar_pengeluaran->keterangan; ?></h4>
                                            <a href="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_pengeluaran->foto_bukti); ?>" title="<?= $daftar_pengeluaran->keterangan; ?>" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                            <a title="Edit" class="details-link" type="button" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <input name="keluar" type="number" id="disabledTextInput" class="form-control <?= $validation->hasError('keluar') ? 'is-invalid' : null; ?>" value="<?= $daftar_pengeluaran->keluar; ?>">

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

                                    </fieldset>
                                    <div class="modal-footer p-0 m-0 py-2">
                                        <a href="<?php echo base_url('keuangan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Foto Bukti</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_pengeluaran->id_keuangan; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <p class="image_upload">
                        <label for="userImage">
                            <a class="btn btn-secondary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                        </label>
                        <input type="file" id="userImage" name="foto_bukti" onchange="readURL(this);" required />
                    </p>
                    <img id="image" width="50%" height="50%" />
                    <div class="modal-footer p-0 m-0 py-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>