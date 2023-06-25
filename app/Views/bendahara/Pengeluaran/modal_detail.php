<?php foreach ($daftar_pengeluaran as $pengeluaran) : ?>

    <div class="modal fade" id="detailMasuk<?= $pengeluaran->id_keuangan; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="create_pengeluaranLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5 " id="create_pengeluaranLabel">Detail pengeluaran</h1>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <div class="mb-3 " style="max-width: 100%;">
                        <div class="row g-0 align-items-center offset-md-1 me-2 g-2">
                            <div class="col-md-4 mt-auto mb-auto">
                                <div class="col-md-12 mt-auto mb-auto ">
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="inventaris-item">
                                            <img src="<?php echo base_url('assets-bendahara/img/foto-bukti/' . $pengeluaran->foto_bukti); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <a href="<?php echo base_url('assets-bendahara/img/foto-bukti/' . $pengeluaran->foto_bukti); ?>" title="<?= $pengeluaran->keterangan; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <form>
                                    <fieldset disabled>
                                        <legend>Detail dari <b><?= $pengeluaran->keterangan; ?></b></legend>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Tanggal Transaksi</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->tanggal_transaksi; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Akun Keuangan</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->keterangan_akunkeuangan; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Akses Keuangan</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->keterangan_akseskeuangan; ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Nominal Pengeluaran</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= 'Rp. ' . number_format($pengeluaran->keluar); ?>'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Keterangan</label>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder='<?= $pengeluaran->keterangan; ?>'>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= 'pengeluaran/edit/' . $pengeluaran->id_keuangan; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>