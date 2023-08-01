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
                                    <div class="inventaris container-fluid mt-auto mb-auto" style="width : 90% ; height : 90% ;  ">
                                        <div class="inventaris-item">
                                            <img style="max-width : 90% ; max-height : 90% ;  " src="<?php echo base_url('assets-admin/img/foto-pengurus/' . $daftar_pengurus->foto_pengurus); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="text-white">Foto <?= $daftar_pengurus->nama_lengkap; ?></span>
                                                    </div>
                                                    <div class="col-4 g-2">
                                                        <a href="<?php echo base_url('assets-admin/img/foto-pengurus/' . $daftar_pengurus->foto_pengurus); ?>" data-gallery="pengurus-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                        <a style="cursor: pointer;" title="Edit Foto" class="details-link g-2" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form id="editPengurus" action="./<?= $daftar_pengurus->id_pengurus; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_pengurus->nama_lengkap; ?></b></legend>
                                            <div class="row">
                                                <div class="col-lg-6 col-12">

                                                    <div class="mb-3">
                                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $daftar_pengurus->nama_lengkap; ?>" required>
                                                        <?php if ($validation->hasError('nama_lengkap')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nama_lengkap'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="nama_lengkap-error"></div>
                                                        <div class="valid-feedback" id="nama_lengkap-success"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="exampleFormControlInput1" class="form-select" value="<?= $daftar_pengurus->jenis_kelamin; ?>" required>
                                                            <!-- <option selected>--Jenis Kelamin--</option> -->
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Jabatan</label>
                                                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= $daftar_pengurus->jabatan; ?>" required>
                                                        <?php if ($validation->hasError('nama_jabatan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nama_jabatan'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="nama_jabatan-error"></div>
                                                        <div class="valid-feedback" id="nama_jabatan-success"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $daftar_pengurus->nomor_telepon; ?>" required>
                                                        <?php if ($validation->hasError('nomor_telepon')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nomor_telepon'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="nomor_telepon-error"></div>
                                                        <div class="valid-feedback" id="nomor_telepon-success"></div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="instagram" class="form-label">Instagram</label>
                                                        <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $daftar_pengurus->instagram; ?>">
                                                        <?php if ($validation->hasError('instagram')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('instagram'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="instagram-error"></div>
                                                        <div class="valid-feedback" id="instagram-success"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="linkedin" class="form-label">Linkedin</label>
                                                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= $daftar_pengurus->linkedin; ?>">
                                                        <?php if ($validation->hasError('linkedin')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('linkedin'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="linkedin-error"></div>
                                                        <div class="valid-feedback" id="linkedin-success"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="alamat_pengurus" class="form-label">Alamat Pengurus</label>
                                                        <textarea rows="5" type="text" class="form-control" id="alamat_pengurus" name="alamat_pengurus" required><?= $daftar_pengurus->alamat_pengurus; ?></textarea>
                                                        <?php if ($validation->hasError('alamat_pengurus')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('alamat_pengurus'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="invalid-feedback" id="alamat_pengurus-error"></div>
                                                        <div class="valid-feedback" id="alamat_pengurus-success"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('pengurus'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success sb3" id="editSubmitButtonPengurus">Simpan</button>
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
<div class="modal fade" id="updateGambar" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Foto <?= $daftar_pengurus->nama_lengkap; ?></h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_pengurus->id_pengurus; ?>" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonPengurus">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            $('#editSubmitButtonPengurus').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editPengurus :input').on('input', function() {
            checkInvalidElements();
        });
    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
    $("#editFotoSubmitButtonPengurus").prop("disabled", true);
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
        $("#editSubmitButtonPengurus").prop("disabled", false);
        $("#editFotoSubmitButtonPengurus").prop("disabled", false);
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editSubmitButtonPengurus").prop("disabled", true);
        $("#editFotoSubmitButtonPengurus").prop("disabled", true);
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