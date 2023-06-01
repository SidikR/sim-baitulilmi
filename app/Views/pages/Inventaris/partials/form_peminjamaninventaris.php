<div class="tab-pane" id="tab-2">
    <div class="container">
        <div class="row">
            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>
            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
            <div class="col">
                <form action="./peminjaman/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-4">
                        <label for="" class="form-label">Pilih Barang</label>
                        <select class="form-select <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Pilih Inventaris" name="nama_inventaris">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="" selected>--Pilih--</option>
                            <?php foreach ($daftar_inventaris as $jb) : ?>
                                <option value=<?= $jb->id_inventaris; ?>><?= $jb->nama_inventaris; ?></option>
                            <?php endforeach ?>
                        </select>

                        <?php if ($validation->hasError('nama_inventaris')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_inventaris'); ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="qty" class="form-label">Quantitas Peminjaman</label>
                        <input type="number" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Jumlah yang ingin dipinjam" name="qty">

                        <?php if ($validation->hasError('qty')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('qty'); ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="instansi_peminjam" class="form-label">Instansi Peminjam</label>
                        <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3">

                        <?php if ($validation->hasError('instansi_peminjam')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('instansi_peminjam'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="nama_penanggungjawab" class="form-label">Nama Penanggung Jawab</label>
                        <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Penanggung Jawab" name="nama_penanggungjawab" rows="3">

                        <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_penanggungjawab'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                        <input type="date" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3">

                        <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_dipinjam'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
            </div>

            <div class="col">

                <div class="mb-4">
                    <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control <?= $validation->hasError('tanggal_kembali') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal Kembali" name="tanggal_kembali" rows="3">

                    <?php if ($validation->hasError('tanggal_kembali')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal_kembali'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="infaq" class="form-label">Infaq</label>
                    <input type="number" class="form-control <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Jumlah Infaq Anda" name="infaq" rows="3">

                    <?php if ($validation->hasError('infaq')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('infaq'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                    <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="">
                        <option value="" selected>--Pilih--</option>
                        <option value="COD">COD</option>
                        <option value="COD">TRANSFER</option>
                    </select>

                    <?php if ($validation->hasError('metode_infaq')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('metode_infaq'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="foto_identitas" class="form-label">Foto KTP</label>
                    <input type="file" class="form-control" id="formFile" name="foto_identitas" required>
                </div>

                <div class="mb-4">
                    <input type="checkbox" name="agreement" value='true' class="form-check-input" required><a href="" target="_blank"> Saya Setuju dengan Peraturan Peminjaman Inventaris Masjid</a>
                </div>

            </div>



            <div class="modal-footer m-3">
                <a href="<?= base_url('peminjaman'); ?>"><button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button></a>
                <button type="submit" class="btn btn-primary ">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Tab Content 2 -->