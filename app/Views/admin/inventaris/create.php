<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <div class="card mb-3 mt-4">
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
                    <form id="addInventaris" action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-3 mt-2">
                                    <label for="nama_inventaris" class="form-label">Nama Inventaris</label>
                                    <input type="text" class="form-control <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>" id="nama_inventaris" placeholder="Tuliskan nama inventaris" name="nama_inventaris" required>

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
                                    <input type="text" class="form-control <?= $validation->hasError('asal_inventaris') ? 'is-invalid' : null; ?>" id="asal_inventaris" placeholder="Tuliskan asal inventaris" name="asal_inventaris" required>

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
                                    <input type="number" class="form-control <?= $validation->hasError('stok_inventaris') ? 'is-invalid' : null; ?>" id="stok_inventaris" placeholder="Isikan stok inventaris" name="stok_inventaris" required>

                                    <?php if ($validation->hasError('stok_inventaris')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('stok_inventaris'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="invalid-feedback" id="stok_inventaris-error"></div>
                                    <div class="valid-feedback" id="stok_inventaris-success"></div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-3 mt-2">
                                    <label for="deskripsi_inventaris" class="form-label">Deskripsi Inventaris</label>

                                    <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_inventaris') ? 'is-invalid' : null; ?>" id="deskripsi_inventaris" placeholder="Isikan Deskripsi Inventaris" name="deskripsi_inventaris" rows="9"></textarea>

                                    <?php if ($validation->hasError('deskripsi_inventaris')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('deskripsi_inventaris'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="invalid-feedback" id="deskripsi_inventaris-error"></div>
                                    <div class="valid-feedback" id="deskripsi_inventaris-success"></div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="mb-3 mt-2">
                                    <label for="poster" class="form-label">Poster</label>
                                    <input type="file" class="form-control" id="imageForm" onchange="readURL(this);" required>
                                    <div id="images" style="display: none;">
                                        <div class="row d-flex flex-column mb-3 mt-3 gap-3">
                                            <div class=" col-12 col-xl-6">
                                                <div class="box" style="height: 300px; width:570px">
                                                    <img src="" id="previewImage" alt="Preview Image" style="display: none;">
                                                </div>
                                                <button class="btn btn-primary mt-3" id="cropButton" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                            </div>
                                            <div class="col-12 col-xl-6" id="croppingArea" style="display: none;">
                                                <div id="previewContainer" style="height: 300px; width:auto; display: none;" class="mb-3">
                                                    <img id="croppedImageView" style="height: 300px; width:auto;" class=" img-thumbnail" alt="Cropped Image">
                                                    <input type="hidden" id="croppedImageInput" name="croppedImage">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="/inventaris"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-success" id="addSubmitButtonInventaris">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
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
            $('#addSubmitButtonInventaris').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addInventaris :input').on('input', function() {
            checkInvalidElements();
        });
    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
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
        $("#addSubmitButtonInventaris").prop("disabled", false);
    });

    document.getElementById('imageForm').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        document.getElementById('images').style.display = 'block';
        $("#addSubmitButtonInventaris").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        let files = e.target.files;
        let reader = new FileReader();
        reader.onload = function() {
            let image = document.getElementById('previewImage');
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