<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <?php if (session('failed')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('failed'); ?>
                        </div>
                    <?php endif ?>
                    <form action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="nama_post" class="form-label">Nama Post</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_post') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Post" name="nama_post">

                                        <?php if ($validation->hasError('nama_post')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_post'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="deskripsi_post" class="form-label">Deskripsi Post</label>
                                        <textarea type="text" id="ckeditor" class="ckeditor form-control <?= $validation->hasError('deskripsi_post') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Deskripsi Post" name="deskripsi_post" rows="10"></textarea>

                                        <?php if ($validation->hasError('deskripsi_post')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_post'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-md-12 col-xl-7">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text text-black" for="inputGroupSelect01">Kategori</label>
                                                <select class="form-select" id="inputGroupSelect01" name="kategori_ck">
                                                    <option selected>Pilih Kategori</option>
                                                    <?php foreach ($kategori as $kt) : ?>
                                                        <option value="<?= $kt->kategori; ?>"><?= $kt->kategori; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-5">
                                            <div class="input-group">
                                                <span class="input-group-text text-black">Tambah Kategori Baru</span>
                                                <input type="text" name="kategori_br" aria-label="First name" class="form-control" placeholder="Tambahkan Kategori Baru Jika Tidak tersedia">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto_post" class="form-label">Foto Post</label>
                                        <input type="file" class="form-control" id="formFile" name="foto_post" onchange="readURL(this);" required>
                                    </div>

                                    <div class="mb-4">
                                        <img id="image" width="30%" height="30%" class="rounded" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer m-3">
                            <button type="button" class="btn btn-secondary m-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>