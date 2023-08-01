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
                    <form action="./save" method="post" id="addPetugasJumat" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-4">

                                    <div class="mb-4">
                                        <label for="nama_imam" class="form-label">Nama Imam</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_imam') ? 'is-invalid' : null; ?>" id="nama_imam" placeholder="Tuliskan nama imam sholat" name="nama_imam">

                                        <?php if ($validation->hasError('nama_imam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_imam'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="nama_imam-error"></div>
                                        <div class="valid-feedback" id="nama_imam-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jabatan_imam" class="form-label">Jabatan/Status/Prodi Imam</label>
                                        <input type="text" class="form-control <?= $validation->hasError('jabatan_imam') ? 'is-invalid' : null; ?>" id="jabatan_imam" placeholder="Tuliskan Jabatan/Status/Prodi Imam" name="jabatan_imam">

                                        <?php if ($validation->hasError('jabatan_imam')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_imam'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="jabatan_imam-error"></div>
                                        <div class="valid-feedback" id="jabatan_imam-success"></div>
                                    </div>

                                </div>
                                <div class="col-12 col-xl-4">

                                    <div class="mb-4">
                                        <label for="nama_khatib" class="form-label">Nama Khatib</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_khatib') ? 'is-invalid' : null; ?>" id="nama_khatib" placeholder="Tuliskan nama khatib jum'at" name="nama_khatib">

                                        <?php if ($validation->hasError('nama_khatib')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_khatib'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="nama_khatib-error"></div>
                                        <div class="valid-feedback" id="nama_khatib-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jabatan_khatib" class="form-label">Jabatan/Status/Prodi Khatib</label>
                                        <input type="text" class="form-control <?= $validation->hasError('jabatan_khatib') ? 'is-invalid' : null; ?>" id="jabatan_khatib" placeholder="Tuliskan Jabatan/Status/Prodi Khatib Jum'at" name="jabatan_khatib">

                                        <?php if ($validation->hasError('jabatan_khatib')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_khatib'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="jabatan_khatib-error"></div>
                                        <div class="valid-feedback" id="jabatan_khatib-success"></div>
                                    </div>

                                </div>
                                <div class="col-12 col-xl-4">

                                    <div class="col">
                                        <div class="mb-4">
                                            <label for="nama_muadzin" class="form-label">Nama Muadzin</label>
                                            <input type="text" class="form-control <?= $validation->hasError('nama_muadzin') ? 'is-invalid' : null; ?>" id="nama_muadzin" placeholder="Tuliskan nama muadzin" name="nama_muadzin">

                                            <?php if ($validation->hasError('nama_muadzin')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_muadzin'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="nama_muadzin-error"></div>
                                            <div class="valid-feedback" id="nama_muadzin-success"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jabatan_muadzin" class="form-label">Jabatan/Status/Prodi Muadzin</label>
                                        <input type="text" class="form-control <?= $validation->hasError('jabatan_muadzin') ? 'is-invalid' : null; ?>" id="jabatan_muadzin" placeholder="Tuliskan Jabatan/Status/Prodi muadzin" name="jabatan_muadzin">

                                        <?php if ($validation->hasError('jabatan_muadzin')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_muadzin'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="jabatan_muadzin-error"></div>
                                        <div class="valid-feedback" id="jabatan_muadzin-success"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : null; ?>" id="exampleFormControlInput1" placeholder="Tanggal" name="tanggal" required>

                                        <?php if ($validation->hasError('tanggal')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-4">
                                        <label for="poster" class="form-label">Poster</label>
                                        <input type="file" class="form-control" id="imageForm" onchange="readURL(this);" required>
                                    </div>
                                </div>
                                <div id="images" style="display: none;">
                                    <div class="row d-flex mb-3">
                                        <div class=" col-12 col-xl-6">
                                            <div class="box" style="height: 300px; width:550px">
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

                            <div class="modal-footer p-0 m-0 py-2">
                                <a href="<?= base_url('petugas-jumat'); ?>" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-success" id="addSubmitButtonJumat">Tambah</button>
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
        $('#nama_imam').on('input', function() {
            let nama_imam = $(this).val().trim();
            validateNama(nama_imam, 'nama_imam');
        });

        $('#jabatan_imam').on('input', function() {
            let jabatan_imam = $(this).val().trim();
            validateNama(jabatan_imam, 'jabatan_imam');
        });
        $('#nama_khatib').on('input', function() {
            let nama_khatib = $(this).val().trim();
            validateNama(nama_khatib, 'nama_khatib');
        });

        $('#jabatan_khatib').on('input', function() {
            let jabatan_khatib = $(this).val().trim();
            validateNama(jabatan_khatib, 'jabatan_khatib');
        });
        $('#nama_muadzin').on('input', function() {
            let nama_muadzin = $(this).val().trim();
            validateNama(nama_muadzin, 'nama_muadzin');
        });

        $('#jabatan_muadzin').on('input', function() {
            let jabatan_muadzin = $(this).val().trim();
            validateNama(jabatan_muadzin, 'jabatan_muadzin');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#addSubmitButtonJumat').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addPetugasJumat :input').on('input', function() {
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
        $("#addSubmitButtonJumat").prop("disabled", false);
    });

    document.getElementById('imageForm').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        document.getElementById('images').style.display = 'block';
        $("#addSubmitButtonJumat").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        let files = e.target.files;
        let reader = new FileReader();
        reader.onload = function() {
            let image = document.getElementById('previewImage');
            image.src = reader.result;

            cropper = new Cropper(image, {
                aspectRatio: 9 / 16, // Set rasio 16:9
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