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
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="nama_program" class="form-label">Nama Program</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_program') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Nama Program" name="nama_program">

                                        <?php if ($validation->hasError('nama_program')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_program'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <div class="">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text text-black" for="inputGroupSelect01">Filter</label>
                                                <select class="form-select" id="inputGroupSelect01" name="filter_op">
                                                    <option selected>Pilih Filter</option>
                                                    <?php foreach ($daftar_filter as $kt) : ?>
                                                        <option value="<?= $kt->filter; ?>"><?= $kt->filter; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="input-group">
                                                <span class="input-group-text text-black">Tambah Filter Baru</span>
                                                <input type="text" name="filter_br" aria-label="First name" class="form-control" placeholder="Tambahkan Filter Baru Jika Tidak tersedia">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="deskripsi_program" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control <?= $validation->hasError('deskripsi_program') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Tempat Program" name="deskripsi_program">

                                        <?php if ($validation->hasError('deskripsi_program')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_program'); ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="mb-4">
                                        <label for="foto" class="form-label">Foto Program</label>
                                        <input type="file" class="form-control" id="formFile" placeholder="Nama Lengkap" name="foto" onchange="readURL(this);" required>
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