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
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                        <div class="inventaris-item">
                                            <img src="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $daftar_inventaris->nama_inventaris; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/foto-inventaris/' . $daftar_inventaris->foto_inventaris); ?>" title="<?= $daftar_inventaris->nama_inventaris; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" type="button" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form id="editInventaris" action="./<?= $daftar_inventaris->id_inventaris; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_inventaris->nama_inventaris; ?></b></legend>

                                            <div class="row">
                                                <div class="col-12 col-xl-6">

                                                    <div class="mb-3 mt-2">
                                                        <label for="nama_inventaris" class="form-label">Nama Inventaris</label>
                                                        <input type="text" class="form-control <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>" id="nama_inventaris" placeholder="Tuliskan nama inventaris" name="nama_inventaris" value="<?= $daftar_inventaris->nama_inventaris; ?>" required>
                                                        <?php if ($validation->hasError('nama_inventaris')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nama_inventaris'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="nama_inventaris-error"></div>
                                                        <div class="valid-feedback" id="nama_inventaris-success"></div>
                                                    </div>

                                                    <div class="mb-3 mt-2">
                                                        <label for="asal_inventaris" class="form-label">Asal Inventaris</label>
                                                        <input type="text" class="form-control <?= $validation->hasError('asal_inventaris') ? 'is-invalid' : null; ?>" id="asal_inventaris" placeholder="Tuliskan asal inventaris" name="asal_inventaris" value="<?= $daftar_inventaris->asal_inventaris; ?>" required>

                                                        <?php if ($validation->hasError('asal_inventaris')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('asal_inventaris'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="asal_inventaris-error"></div>
                                                        <div class="valid-feedback" id="asal_inventaris-success"></div>
                                                    </div>

                                                    <div class="mb-3 mt-2">
                                                        <label for="stok_inventaris" class="form-label">Stok</label>
                                                        <input type="number" class="form-control <?= $validation->hasError('stok_inventaris') ? 'is-invalid' : null; ?>" id="stok_inventaris" placeholder="Isikan stok inventaris" name="stok_inventaris" value="<?= $daftar_inventaris->stok_inventaris; ?>" required>

                                                        <?php if ($validation->hasError('stok_inventaris')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('stok_inventaris'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="stok_inventaris-error"></div>
                                                        <div class="valid-feedback" id="stok_inventaris-success"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <div class="mb-3 mt-2">
                                                        <label for="deskripsi_inventaris" class="form-label">Deskripsi Inventaris</label>

                                                        <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_inventaris') ? 'is-invalid' : null; ?>" id="deskripsi_inventaris" placeholder="Isikan Deskripsi Inventaris" name="deskripsi_inventaris" rows="9" value="<?= $daftar_inventaris->deskripsi_inventaris; ?>"><?= $daftar_inventaris->deskripsi_inventaris; ?></textarea>

                                                        <?php if ($validation->hasError('deskripsi_inventaris')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('deskripsi_inventaris'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="deskripsi_inventaris-error"></div>
                                                        <div class="valid-feedback" id="deskripsi_inventaris-success"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('inventaris'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success" id="editSubmitButtonInventaris">Simpan</button>
                                    </form>
                                </div>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Foto Inventaris</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_inventaris->id_inventaris; ?>" method="post" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonInventaris">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Script untuk Validasi Form -->
<script>
    $(document).ready(function() {
        $('#nama_inventaris').on('input', function() {
            let nama_inventaris = $(this).val().trim();
            validateRequired(nama_inventaris, 'nama_inventaris');
        });

        $('#asal_inventaris').on('input', function() {
            let asal_inventaris = $(this).val().trim();
            validateRequired(asal_inventaris, 'asal_inventaris');
        });

        $('#stok_inventaris').on('input', function() {
            let stok_inventaris = $(this).val().trim();
            validateNumber(stok_inventaris, 'stok_inventaris');
        });

        $('#deskripsi_inventaris').on('input', function() {
            let deskripsi_inventaris = $(this).val().trim();
            validateDescribe(deskripsi_inventaris, 'deskripsi_inventaris');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#editSubmitButtonInventaris').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editInventaris :input').on('input', function() {
            checkInvalidElements();
        });
    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
    $("#editFotoSubmitButtonInventaris").prop("disabled", true);
    var cropper;
    document.getElementById('cropButton').addEventListener('click', function() {
        var canvas = cropper.getCroppedCanvas();
        // Simpan data gambar yang di-crop sebagai file
        canvas.toBlob(function(blob) {
            // Convert the blob to WebP format and split the data URL
            var webpDataURL = canvas.toDataURL('image/webp', 1.0).split(',')[1];

            // Create a new Blob with the WebP data
            var webpBlob = new Blob([blob], {
                type: 'image/webp'
            });

            // Create FormData object to send the file to the server
            var formData = new FormData();
            formData.append('croppedImage', webpBlob);
        }, 'image/jpeg');


        // Ganti src gambar yang di-crop dengan URL gambar yang di-crop
        var croppedImageView = document.getElementById('croppedImageView');
        croppedImageView.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageView'
        var inputValue = document.getElementById("croppedImageInput");
        inputValue.value = canvas.toDataURL('image/jpeg');

        // Tampilkan kontainer preview dan gambar yang di-crop
        document.getElementById('previewContainer').style.display = 'block';

        // Sembunyikan gambar preview
        document.getElementById('previewImage').style.display = 'none';
        $("#editSubmitButtonInventaris").prop("disabled", false);
        $("#editFotoSubmitButtonInventaris").prop("disabled", false);
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editSubmitButtonInventaris").prop("disabled", true);
        $("#editFotoSubmitButtonInventaris").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        var files = e.target.files;
        var reader = new FileReader();
        reader.onload = function() {
            var image = document.getElementById('previewImage');
            image.src = reader.result;

            cropper = new Cropper(image, {
                aspectRatio: 1, // Set rasio 16:9
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