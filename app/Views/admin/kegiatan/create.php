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
                    <form id="addKegiatan" action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-3">
                                    <div class="mb-4">
                                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_kegiatan') ? 'is-invalid' : null; ?>" id="nama_kegiatan" placeholder="Nama Kegiatan" name="nama_kegiatan" required>

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
                                        <input type="text" class="form-control <?= $validation->hasError('penyelenggara_kegiatan') ? 'is-invalid' : null; ?>" id="penyelenggara_kegiatan" placeholder="Penyelenggara Kegiatan" name="penyelenggara_kegiatan" required>

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
                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_mulai_kegiatan') ? 'is-invalid' : null; ?>" id="waktu_mulai_kegiatan" placeholder="Waktu Mulai" name="waktu_mulai_kegiatan" required>

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
                                        <input type="datetime-local" class="form-control <?= $validation->hasError('waktu_berakhir_kegiatan') ? 'is-invalid' : null; ?>" id="waktu_berakhir_kegiatan" placeholder="Waktu Selesai" name="waktu_berakhir_kegiatan" required>

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
                                        <input type="text" class="form-control <?= $validation->hasError('tempat_kegiatan') ? 'is-invalid' : null; ?>" id="tempat_kegiatan" placeholder="Tempat Kegiatan" name="tempat_kegiatan" required>

                                        <?php if ($validation->hasError('tempat_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tempat_kegiatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="tempat_kegiatan-error"></div>
                                        <div class="valid-feedback" id="tempat_kegiatan-success"></div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-3">
                                    <div class="mb-4">
                                        <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                        <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="deskripsi_kegiatan" placeholder="Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="17" required></textarea>

                                        <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_kegiatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="deskripsi_kegiatan-error"></div>
                                        <div class="valid-feedback" id="deskripsi_kegiatan-success"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6">
                                    <div class="mb-3 mt-2">
                                        <label for="poster" class="form-label">Poster Kegiatan</label>
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
                        </div>

                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="<?= base_url('kegiatan'); ?>" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success" id="addSubmitButtonKegiatan">Tambah</button>
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
            $('#addSubmitButtonKegiatan').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addKegiatan :input').on('input', function() {
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
        $("#addSubmitButtonKegiatan").prop("disabled", false);
    });

    document.getElementById('imageForm').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        document.getElementById('images').style.display = 'block';
        $("#addSubmitButtonKegiatan").prop("disabled", true);
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