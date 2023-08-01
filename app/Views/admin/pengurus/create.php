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
                    <form id="addPengurus" action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="mb-4">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ? 'is-invalid' : null; ?>" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" required>

                                        <?php if ($validation->hasError('nama_lengkap')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="nama_lengkap-error"></div>
                                        <div class="valid-feedback" id="nama_lengkap-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>

                                        <select class="form-select <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="exampleFormControlInput1" placeholder="Jenis Kelamin" name="jenis_kelamin" required>
                                            <!-- <option selected>Open this select menu</option> -->
                                            <option value="" selected>--pilih--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>

                                        <?php if ($validation->hasError('jenis_kelamin')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_kelamin'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="nama_jabatan" class="form-label">Jabatan</label>

                                        <input type="text" class="form-control <?= $validation->hasError('nama_jabatan') ? 'is-invalid' : null; ?>" id="nama_jabatan" placeholder="Jabatan" name="nama_jabatan" required>

                                        <?php if ($validation->hasError('nama_jabatan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_jabatan'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="invalid-feedback" id="nama_jabatan-error"></div>
                                        <div class="valid-feedback" id="nama_jabatan-success"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" placeholder="Url Instagram" name="instagram">
                                        <div class="invalid-feedback" id="instagram-error"></div>
                                        <div class="valid-feedback" id="instagram-success"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6">
                                    <div class="mb-4">
                                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nomor_telepon') ? 'is-invalid' : null; ?>" id="nomor_telepon" placeholder="Isikan Nomor Telepon  ex.0895...." name="nomor_telepon" required>

                                        <?php if ($validation->hasError('nomor_telepon')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nomor_telepon'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="invalid-feedback" id="nomor_telepon-error"></div>
                                        <div class="valid-feedback" id="nomor_telepon-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="alamat_pengurus" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control <?= $validation->hasError('alamat_pengurus') ? 'is-invalid' : null; ?>" id="alamat_pengurus" placeholder="Isikan Alamat Lengkap" name="alamat_pengurus" rows="5" required></textarea>

                                        <?php if ($validation->hasError('alamat_pengurus')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat_pengurus'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="alamat_pengurus-error"></div>
                                        <div class="valid-feedback" id="alamat_pengurus-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="linkedin" class="form-label">linkedin</label>
                                        <input type="text" class="form-control" id="linkedin" placeholder="Url Linkedin" name="linkedin">
                                        <div class="invalid-feedback" id="linkedin-error"></div>
                                        <div class="valid-feedback" id="linkedin-success"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="foto_pengurus" class="form-label">Foto Pengurus</label>
                                        <input type="file" class="form-control" id="imageForm" placeholder="Nama Lengkap" required>
                                    </div>
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
                            <a href="<?= base_url('pengurus'); ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-success " id="addSubmitButtonPengurus">Tambah</button>
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
        $('#nama_lengkap').on('input', function() {
            let nama_lengkap = $(this).val().trim();
            validateNama(nama_lengkap, 'nama_lengkap');
        });

        $('#nama_jabatan').on('input', function() {
            let nama_jabatan = $(this).val().trim();
            validateNama(nama_jabatan, 'nama_jabatan');
        });

        $('#nomor_telepon').on('input', function() {
            let nomor_telepon = $(this).val().trim();
            validateNumber(nomor_telepon, 'nomor_telepon');
        });

        $('#alamat_pengurus').on('input', function() {
            let alamat_pengurus = $(this).val().trim();
            validateDescribe(alamat_pengurus, 'alamat_pengurus');
        });

        $('#instagram').on('input', function() {
            let instagram = $(this).val().trim();
            validateInstagramUrl(instagram, 'instagram');
        });

        $('#linkedin').on('input', function() {
            let linkedin = $(this).val().trim();
            validateLinkedinUrl(linkedin, 'linkedin');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#addSubmitButtonPengurus').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addPengurus :input').on('input', function() {
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
        $("#addSubmitButtonPengurus").prop("disabled", false);
    });

    document.getElementById('imageForm').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        document.getElementById('images').style.display = 'block';
        $("#addSubmitButtonPengurus").prop("disabled", true);
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