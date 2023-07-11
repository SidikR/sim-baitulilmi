<div class="tab-pane" id="tab-3">
    <div class="container">
        <div class="row">
            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>
            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Masjid</h2>
            <div class="col">
                <form action="./peminjaman/save-masjid" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-4">
                        <label for="instansi_peminjam" class="form-label">Instansi Peminjam</label>
                        <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3" value="<?= old('instansi_peminjam'); ?>">

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
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control <?= $validation->hasError('nama_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Kegiatan" name="nama_kegiatan" rows="3">

                        <?php if ($validation->hasError('nama_kegiatan')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_kegiatan'); ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="foto_kegiatan" class="form-label">Poster Kegiatan</label>
                        <input type="file" class="form-control" id="formFile" name="foto_kegiatan" required>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_dipinjam" class="form-label">Tanggal & Waktu Peminjaman</label>
                        <input type="datetime-local" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3">

                        <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_dipinjam'); ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_selesai" class="form-label">Tanggal & Waktu Selesai</label>
                        <input type="datetime-local" class="form-control <?= $validation->hasError('tanggal_selesai') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal selesai" name="tanggal_selesai" rows="2">

                        <?php if ($validation->hasError('tanggal_selesai')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_selesai'); ?>
                            </div>

                        <?php endif; ?>
                    </div>



            </div>

            <div class="col">
                <div class="mb-4">
                    <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                    <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="9" rows="10"></textarea>

                    <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_kegiatan'); ?>
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
                        <option value="TRANSFER">TRANSFER</option>
                    </select>

                    <?php if ($validation->hasError('metode_infaq')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('metode_infaq'); ?>
                        </div>

                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="foto_identitas" class="form-label">Foto Identitas Penanggung Jawab</label>
                    <input type="file" class="form-control" id="formFile" name="foto_identitas" required>
                </div>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="<?= base_url('peminjaman'); ?>"><button class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div><!-- End Tab Content 3 -->
</div>
</div>
</section><!-- End Features Section -->