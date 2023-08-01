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
                                    <div class="foto d-flex justify-content-center align-items-center container-fluid mt-auto mb-auto" style="width : 70% ; height : 70% ;  ">
                                        <div class="foto-item d-flex justify-content-center align-items-center">
                                            <img src="<?php echo base_url('assets-admin/img/petugas-jumat/' . $daftar_petugasjumat->poster); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="foto-info position-absolute top-50 start-50 translate-middle mx-auto my-auto ">
                                                <div class="col d-flex flex-row gap-5">
                                                    <a href="<?php echo base_url('assets-admin/img/petugas-jumat/' . $daftar_petugasjumat->poster); ?>" title="Lihat Poster Tanggal <?= $daftar_petugasjumat->tanggal; ?>" data-gallery="posterJumat" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>

                                                    <a class="details-link" style="cursor: pointer;" title="Update Foto" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form id="editPetugasJumat" action="./<?= $daftar_petugasjumat->id_petugas; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail Petugas Tanggal <b><?= date('d-F-Y', strtotime($daftar_petugasjumat->tanggal)); ?></b></legend>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for='tanggal' class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" value='<?= $daftar_petugasjumat->tanggal; ?>' name="tanggal">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for='nama_imam' class="form-label">Nama Imam</label>
                                                        <input id="nama_imam" type="text" class="form-control" value='<?= $daftar_petugasjumat->nama_imam; ?>' name="nama_imam">
                                                        <div class="invalid-feedback" id="nama_imam-error"></div>
                                                        <div class="valid-feedback" id="nama_imam-success"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for='jabatan_imam' class="form-label">Jabatan Imam</label>
                                                        <input id="jabatan_imam" type="text" class="form-control" value='<?= $daftar_petugasjumat->jabatan_imam; ?>' name="jabatan_imam">
                                                        <div class="invalid-feedback" id="jabatan_imam-error"></div>
                                                        <div class="valid-feedback" id="jabatan_imam-success"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for='nama_khatib' class="form-label">Nama Khatib</label>
                                                        <input id="nama_khatib" type="text" class="form-control" value='<?= $daftar_petugasjumat->nama_khatib; ?>' name="nama_khatib">
                                                        <div class="invalid-feedback" id="nama-khatib-error"></div>
                                                        <div class="valid-feedback" id="nama-khatib-success"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for='jabatan_khatib' class="form-label">Jabatan Khatib</label>
                                                        <input id="jabatan_khatib" type="text" class="form-control" value='<?= $daftar_petugasjumat->jabatan_khatib; ?>' name="jabatan_khatib">
                                                        <div class="invalid-feedback" id="jabatan_khatib-error"></div>
                                                        <div class="valid-feedback" id="jabatan_khatib-success"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for='nama_muadzin' class="form-label">Nama Muadzin</label>
                                                        <input id="nama_muadzin" type="text" class="form-control" value='<?= $daftar_petugasjumat->nama_muadzin; ?>' name="nama_muadzin">
                                                        <div class="invalid-feedback" id="nama_muadzin-error"></div>
                                                        <div class="valid-feedback" id="nama_muadzin-success"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for='jabatan_muadzin' class="form-label">Jabatan Muadzin</label>
                                                        <input itemid="jabatan_muadzin" type="text" id='' class="form-control" value='<?= $daftar_petugasjumat->jabatan_muadzin; ?>' name="jabatan_muadzin">
                                                        <div class="invalid-feedback" id="jabatan_muadzin-error"></div>
                                                        <div class="valid-feedback" id="jabatan_muadzin-success"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('petugas-jumat'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success" id="editSubmitButtonJumat">Simpan</button>
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
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Gambar Poster</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_petugasjumat->id_petugas; ?>" method="post" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonJumat">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
            $('#editSubmitButtonJumat').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editPetugasJumat :input').on('input', function() {
            checkInvalidElements();
        });
    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
    $("#editFotoSubmitButtonJumat").prop("disabled", true);
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
        $("#editSubmitButtonJumat").prop("disabled", false);
        $("#editFotoSubmitButtonJumat").prop("disabled", false);
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editSubmitButtonJumat").prop("disabled", true);
        $("#editFotoSubmitButtonJumat").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        var files = e.target.files;
        var reader = new FileReader();
        reader.onload = function() {
            var image = document.getElementById('previewImage');
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


<?= $this->endSection() ?>