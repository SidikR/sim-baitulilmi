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
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form>
                                        <fieldset disabled>
                                            <legend>Detail dari <b><?= $pemasukan->keterangan; ?></b></legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Tanggal Transaksi</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pemasukan->tanggal_transaksi; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akun Keuangan</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pemasukan->keterangan_akunkeuangan; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Akses Keuangan</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pemasukan->keterangan_akseskeuangan; ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nominal Pemasukan</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= 'Rp. ' . number_format($pemasukan->masuk); ?>'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Keterangan</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pemasukan->keterangan; ?>'>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <a href="<?php echo base_url('pemasukan'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                    <a href="<?= '.././edit/' . $pemasukan->id_keuangan; ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
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