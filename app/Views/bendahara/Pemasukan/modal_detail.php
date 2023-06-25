<?php foreach ($daftar_pemasukan as $pemasukan) : ?>

    <div class="modal fade" id="detailMasuk<?= $pemasukan->id_keuangan; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="create_pemasukanLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5 " id="create_pemasukanLabel">Detail Pemasukan</h1>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form>
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-xl-6">
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
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Nominal Pemasukan</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= 'Rp. ' . number_format($pemasukan->masuk); ?>'>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Keterangan</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pemasukan->keterangan; ?>'>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= 'pemasukan/edit/' . $pemasukan->id_keuangan; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>