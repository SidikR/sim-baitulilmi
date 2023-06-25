<div class="tab-pane" id="tab-3">
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
                        <div class="card mb-3 " style="max-width: 100%;">
                            <div class="row m-3">
                                <div class="col-md-4 mt-auto mb-auto">
                                    <div class="col-md-12 mt-auto mb-auto ">
                                        <div class="portfolio container-fluid mt-auto mb-auto" style="width : 90% ; height : 90% ;  ">
                                            <div class="portfolio-item">
                                                <img style="max-width : 90% ; max-height : 90% ;  " src=<?= base_url('assets/img/foto-user/' . user()->foto_user); ?> class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                                <div class="portfolio-info">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <span class="text-white">Foto <?= user()->nama_lengkap; ?></span>
                                                        </div>
                                                        <div class="col-4 g-2">
                                                            <a href="<?php echo base_url('assets/img/foto-user/' . user()->foto_user); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                            <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <form action="./akun/<?= user()->id; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <fieldset>
                                                <legend>Detail dari <b><?= user()->nama_lengkap; ?></b></legend>
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_lengkap" value="<?= user()->nama_lengkap; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="username" value="<?= user()->username; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" id="exampleFormControlInput1" class="form-select" value="<?= user()->jenis_kelamin; ?>" required>
                                                                <option selected><?= user()->jenis_kelamin; ?></option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <textarea type="text" class="form-control" id="exampleFormControlInput1" name="alamat" value="<?= user()->alamat; ?>" required rows="4"><?= user()->alamat; ?></textarea>
                                                        </div>
                                                        <div class="mb-3 pt-3">
                                                            <label for="nomor_hp" class="form-label">Nomor HP</label>
                                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="nomor_hp" value="<?= user()->nomor_hp; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <a href="<?php echo base_url('akun'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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
    </div>
</div><!-- End Tab Content 2 -->