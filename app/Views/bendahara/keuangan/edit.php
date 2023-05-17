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
                    <div class="card mb-3 " style="max-width: 100%;">
                        <div class="row g-0 align-items-center offset-md-1 me-2 g-2">
                            <div class="col-md-4 px-3">
                                <img style="max-width : 350px ; max-height : 350px ;  " src="<?php echo base_url('assets-bendahara/img/foto-bukti/' . $pengeluaran->foto_bukti); ?>" class="img-fluid rounded float-start float-center ms-auto d-block " alt="foto <?= $pengeluaran->keterangan_pengeluaran; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $pengeluaran->id_pengeluaran; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $pengeluaran->keterangan_pengeluaran; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Tanggal Transaksi</label>
                                                <input name="tanggal_transaksi" type="date" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->tanggal_transaksi; ?>' value="<?= $pengeluaran->tanggal_transaksi; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akun Keuangan</label>
                                                <select class="form-select" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih Akun Keuangan" name="akunkeuangan">
                                                    <option value="<?= $pengeluaran->id_akunkeuangan; ?>" selected><?= $pengeluaran->keterangan_akunkeuangan; ?></option>
                                                    <?php foreach ($daftar_akunkeuangan as $dak) : ?>
                                                        <option value=<?= $dak->id_akunkeuangan; ?>><?= $dak->keterangan_akunkeuangan; ?></option>
                                                    <?php endforeach ?>
                                                </select required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akses Keuangan</label>
                                                <select class="form-select" aria-label=" Default select example" id="exampleFormControlInput1" placeholder="Pilih akses Keuangan" name="akseskeuangan">
                                                    <option value="<?= $pengeluaran->id_akseskeuangan; ?>" selected><?= $pengeluaran->keterangan_akseskeuangan; ?></option>
                                                    <?php foreach ($daftar_akseskeuangan as $dak) : ?>
                                                        <option value=<?= $dak->id_akseskeuangan; ?>><?= $dak->keterangan_akseskeuangan; ?></option>
                                                    <?php endforeach ?>
                                                </select required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nominal Pengeluaran</label>
                                                <input name="nominal_pengeluaran" type="text" id="disabledTextInput" class="form-control" value="<?= $pengeluaran->nominal_pengeluaran; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Keterangan</label>
                                                <input name="keterangan_pengeluaran" type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->keterangan_pengeluaran; ?>' value="<?= $pengeluaran->keterangan_pengeluaran; ?>">
                                            </div>

                                            <div class="mb-4">
                                                <label for="foto_bukti" class="form-label">Foto Bukti</label>
                                                <input type="file" class="form-control" id="formFile" name="foto_bukti" value="<?= $pengeluaran->foto_bukti; ?>" required>
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