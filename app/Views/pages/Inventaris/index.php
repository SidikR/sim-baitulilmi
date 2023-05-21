<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <!-- <img src="assets/img/hero-carousel/baim-hero.png" class="img-fluid animated"> -->
        <h1>Peminjaman Inventaris </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <!-- <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://youtu.be/pvatqsfi6mg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div> -->
    </div>
</section>

<!-- ======= Features Section ======= -->
<section id="features" class="features">
    <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row gy-4 d-flex">
            <?php if (session('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                </div>
            <?php endif ?>

            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <i class="bi bi-binoculars color-cyan"></i>
                    <h4>Daftar Inventaris</h4>
                </a>
            </li><!-- End Tab 1 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Peminjaman Inventaris</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-4">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Peminjaman Masjid</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

        </ul>

        <div class="tab-content">

            <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                    <section id="portfolio" class="portfolio" data-aos="fade-up">

                        <div class="container">

                            <div class="section-header">
                                <h2>Daftar Inventaris</h2>
                                <!-- <p>Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p> -->
                            </div>

                        </div>

                        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

                            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                                <div class="row g-0 portfolio-container">

                                    <?php foreach ($daftar_inventaris as $di) :  ?>
                                        <div class="col-xl-3 g-4 col-lg-4 col-md-6 portfolio-item filter-app" style="width: 300px; height : 300px">
                                            <img src="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" class="img-fluid" alt="Foto Inventaris">
                                            <div class="portfolio-info">
                                                <h4><?= $di->nama_inventaris; ?></h4>
                                                <h4><?= 'Stok : ' . $di->stok_inventaris; ?></h4>
                                                <a href="<?= base_url('assets-admin/img/foto-inventaris/' . $di->foto_inventaris); ?>" title="<?= $di->nama_inventaris; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#pinjamModal<?= $di->id_inventaris; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                            </div>
                                        </div><!-- End Portfolio Item -->
                                    <?php endforeach ?>


                                </div><!-- End Portfolio Container -->
                            </div>
                        </div>
                    </section><!-- End Portfolio Section -->
                </div>
            </div><!-- End Tab Content 1 -->

            <div class="tab-pane" id="tab-2">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php if (session('failed')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('failed'); ?>
                                </div>
                            <?php endif ?>
                            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
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
                                    <label for="qty" class="form-label">Quantitas</label>
                                    <input type="number" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Isikan Stok Inventaris" name="qty">

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
                                    <input type="checkbox" name="agreement" value="true" class="form-check-input" required><a href="" target="_blank"> Saya Setuju dengan Peraturan Peminjaman Inventaris Masjid</a>
                                </div>

                                <div class="modal-footer m-3">
                                    <a href="<?= base_url('peminjaman'); ?>"><button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button></a>
                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div><!-- End Tab Content 2 -->


            <div class="tab-pane" id="tab-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php if (session('failed')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('failed'); ?>
                                </div>
                            <?php endif ?>
                            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Masjid</h2>
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
                                    <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                    <input type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="3">

                                    <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('deskripsi_kegiatan'); ?>
                                        </div>

                                    <?php endif; ?>
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
                                    <input type="datetime-local" class="form-control <?= $validation->hasError('tanggal_selesai') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal selesai" name="tanggal_selesai" rows="3">

                                    <?php if ($validation->hasError('tanggal_selesai')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_selesai'); ?>
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
                                    <label for="foto_identitas" class="form-label">Foto Identitas</label>
                                    <input type="file" class="form-control" id="formFile" name="foto_identitas" required>
                                </div>


                                <div class="mb-4">
                                    <input type="checkbox" name="agreement" value="true" class="form-check-input" required><a href="" target="_blank"> Saya Setuju dengan Peraturan Peminjaman Masjid</a>
                                </div>

                                <div class="modal-footer m-3">
                                    <a href="<?= base_url('peminjaman'); ?>"><button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button></a>
                                    <button type="submit" class="btn btn-primary ">Kirim</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div><!-- End Tab Content 3 -->
        </div>
    </div>
</section><!-- End Features Section -->

<!-- Modal -->
<?php foreach ($daftar_inventaris as $di) :  ?>

    <div class="modal fade" id="pinjamModal<?= $di->id_inventaris; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Perhatian! Anda akan meminjam <b><?= $di->nama_inventaris; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
                    <form action="./peminjaman/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="nama_inventaris" value="<?= $di->id_inventaris; ?>" required>

                        <div class="mb-4">
                            <label for="qty" class="form-label">Quantitas</label>
                            <input type="number" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Isikan Stok Inventaris" name="qty" required>

                            <?php if ($validation->hasError('qty')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('qty'); ?>
                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="mb-4">
                            <label for="instansi_peminjam" class="form-label">Instansi Peminjam</label>
                            <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3" required>

                            <?php if ($validation->hasError('instansi_peminjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('instansi_peminjam'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="nama_penanggungjawab" class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Nama Penanggung Jawab" name="nama_penanggungjawab" rows="3" required>

                            <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_penanggungjawab'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                            <input type="date" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3" required>

                            <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_dipinjam'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control <?= $validation->hasError('tanggal_kembali') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Tanggal Kembali" name="tanggal_kembali" rows="3" required>

                            <?php if ($validation->hasError('tanggal_kembali')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_kembali'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="infaq" class="form-label">Infaq</label>
                            <input type="number" class="form-control <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Jumlah Infaq Anda" name="infaq" rows="3" required>

                            <?php if ($validation->hasError('infaq')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('infaq'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                            <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="" required>
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
                            <input type="checkbox" name="agreement" value="true" class="form-check-input" required><a href="" target="_blank"> Saya Setuju dengan Peraturan Peminjaman Inventaris Masjid</a>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>


<?= $this->endSection(); ?>