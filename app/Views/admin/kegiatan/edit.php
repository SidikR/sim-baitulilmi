<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

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
                                    <div class="foto container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="foto-item">
                                            <img src="<?php echo base_url('assets-admin/img/foto-kegiatan/' . $daftar_kegiatan->foto_kegiatan); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="foto-info">
                                                <h4><?= $daftar_kegiatan->nama_kegiatan; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/foto-kegiatan/' . $daftar_kegiatan->foto_kegiatan); ?>" title="<?= $daftar_kegiatan->nama_kegiatan; ?>" data-gallery="foto-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form id="editKegiatan" action="./<?= $daftar_kegiatan->id_kegiatan; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_kegiatan->nama_kegiatan; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                        <input type="text" class="form-control <?= $validation->hasError('nama_kegiatan') ? 'is-invalid' : null; ?>" id="nama_kegiatan" placeholder="Nama Kegiatan" name="nama_kegiatan" value="<?= $daftar_kegiatan->nama_kegiatan; ?>" required>

                                                        <?php if ($validation->hasError('nama_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nama_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="nama_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="nama_kegiatan-success"></div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="penyelenggara_kegiatan" class="form-label">Penyelenggara Kegiatan</label>
                                                        <input type="text" class="form-control <?= $validation->hasError('penyelenggara_kegiatan') ? 'is-invalid' : null; ?>" id="penyelenggara_kegiatan" placeholder="Penyelenggara Kegiatan" name="penyelenggara_kegiatan" value="<?= $daftar_kegiatan->penyelenggara_kegiatan; ?>" required>

                                                        <?php if ($validation->hasError('penyelenggara_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('penyelenggara_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="penyelenggara_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="penyelenggara_kegiatan-success"></div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="waktu_mulai_kegiatan" class="form-label">Waktu Mulai</label>
                                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_mulai_kegiatan') ? 'is-invalid' : null; ?>" id="waktu_mulai_kegiatan" placeholder="Waktu Mulai" name="waktu_mulai_kegiatan" value="<?= $daftar_kegiatan->waktu_mulai_kegiatan; ?>" required>

                                                        <?php if ($validation->hasError('waktu_mulai_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('waktu_mulai_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="waktu_mulai_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="waktu_mulai_kegiatan-success"></div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="waktu_berakhir_kegiatan" class="form-label">Waktu Selesai</label>
                                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_berakhir_kegiatan') ? 'is-invalid' : null; ?>" id="waktu_berakhir_kegiatan" placeholder="Waktu Selesai" name="waktu_berakhir_kegiatan" value="<?= $daftar_kegiatan->waktu_berakhir_kegiatan; ?>" required>

                                                        <?php if ($validation->hasError('waktu_berakhir_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('waktu_berakhir_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="waktu_berakhir_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="waktu_berakhir_kegiatan-success"></div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan</label>
                                                        <input type="text" class="form-control <?= $validation->hasError('tempat_kegiatan') ? 'is-invalid' : null; ?>" id="tempat_kegiatan" placeholder="Tempat Kegiatan" name="tempat_kegiatan" value="<?= $daftar_kegiatan->tempat_kegiatan; ?>" required>

                                                        <?php if ($validation->hasError('tempat_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('tempat_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="tempat_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="tempat_kegiatan-success"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                                        <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="deskripsi_kegiatan" placeholder="Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="17" required><?= $daftar_kegiatan->deskripsi_kegiatan; ?></textarea>

                                                        <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('deskripsi_kegiatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="deskripsi_kegiatan-error"></div>
                                                        <div class="valid-feedback" id="deskripsi_kegiatan-success"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('kegiatan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success" id="editSubmitButtonKegiatan">Simpan</button>
                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Poster Kegiatan</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_kegiatan->id_kegiatan; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="mb-3">
                            <p class="image_upload">
                                <label for="userImage">
                                    <a class="btn btn-primary btn-lg" rel="nofollow"><span class=''><i class="bi bi-upload"></i></span> Pilih Gambar</a>
                                </label>
                                <input type="file" id="userImage" onchange="readURL(this);" />
                            </p>
                        </div>
                        <div class="col" id="croppingArea" style="display: none;">

                            <div class="mb-3">
                                <div class="box" style="height: 300px; width:auto">
                                    <img src="" id="previewImage" alt="Preview Image" style="display: none;">
                                </div>
                                <button class="btn btn-primary mt-3" id="cropButton" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                            </div>

                            <div id="previewContainer" style="display: none;" class="mb-3">
                                <h5>Gambar yang di-crop:</h5>
                                <img id="croppedImageView" class="img-thumbnail" alt="Cropped Image">
                                <input type="hidden" id="croppedImageInput" name="croppedImage">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 m-0 py-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonKegiatan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Script untuk Validasi Form -->
<script>
    $(document).ready(function() {
        $('#nama_kegiatan').on('input', function() {
            let nama_kegiatan = $(this).val().trim();
            validateRequired(nama_kegiatan, 'nama_kegiatan');
        });

        $('#penyelenggara_kegiatan').on('input', function() {
            let penyelenggara_kegiatan = $(this).val().trim();
            validateRequired(penyelenggara_kegiatan, 'penyelenggara_kegiatan');
        });

        $('#tempat_kegiatan').on('input', function() {
            let tempat_kegiatan = $(this).val().trim();
            validateRequired(tempat_kegiatan, 'tempat_kegiatan');
        });

        $('#deskripsi_kegiatan').on('input', function() {
            let deskripsi_kegiatan = $(this).val().trim();
            validateDescribe(deskripsi_kegiatan, 'deskripsi_kegiatan');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#editSubmitButtonKegiatan').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editKegiatan :input').on('input', function() {
            checkInvalidElements();
        });
    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
    $("#editFotoSubmitButtonKegiatan").prop("disabled", true);
    let cropper;
    document.getElementById('cropButton').addEventListener('click', function() {
        let canvas = cropper.getCroppedCanvas();
        // Simpan data gambar yang di-crop sebagai file
        canvas.toBlob(function(blob) {
            // Convert the blob to WebP format and split the data URL
            let webpDataURL = canvas.toDataURL('image/webp', 1.0).split(',')[1];

            // Create a new Blob with the WebP data
            let webpBlob = new Blob([blob], {
                type: 'image/webp'
            });

            // Create FormData object to send the file to the server
            let formData = new FormData();
            formData.append('croppedImage', webpBlob);
        }, 'image/jpeg');


        // Ganti src gambar yang di-crop dengan URL gambar yang di-crop
        let croppedImageView = document.getElementById('croppedImageView');
        croppedImageView.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageView'
        let inputValue = document.getElementById("croppedImageInput");
        inputValue.value = canvas.toDataURL('image/jpeg');

        // Tampilkan kontainer preview dan gambar yang di-crop
        document.getElementById('previewContainer').style.display = 'block';

        // Sembunyikan gambar preview
        document.getElementById('previewImage').style.display = 'none';
        $("#editFotoSubmitButtonKegiatan").prop("disabled", false);
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editFotoSubmitButtonKegiatan").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        let files = e.target.files;
        let reader = new FileReader();
        reader.onload = function() {
            let image = document.getElementById('previewImage');
            image.src = reader.result;
            let aspectRatio = image.naturalWidth / image.naturalHeight;

            cropper = new Cropper(image, {
                aspectRatio: aspectRatio, // Set rasio 16:9
                viewMode: 1 // Sesuaikan mode tampilan sesuai kebutuhan Anda
            });

            // Tampilkan tombol Crop
            document.getElementById('cropButton').style.display = 'block';
        };
        reader.readAsDataURL(files[0]);
    });
</script>
<!-- Akhir Script Cropping Gambar  -->


<?= $this->endSection() ?>