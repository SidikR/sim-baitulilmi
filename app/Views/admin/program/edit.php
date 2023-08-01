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
                                            <img src="<?php echo base_url('assets-admin/img/program/' . $daftar_program->foto); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                            <div class="inventaris-info">
                                                <h4><?= $daftar_program->nama_program; ?></h4>
                                                <a href="<?php echo base_url('assets-admin/img/program/' . $daftar_program->foto); ?>" title="<?= $daftar_program->nama_program; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="./<?= $daftar_program->id; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend>Detail dari <b><?= $daftar_program->nama_program; ?></b></legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Nama Program</label>
                                                        <input type="text" class="form-control" value='<?= $daftar_program->nama_program; ?>' name="nama_program" id="nama_program">
                                                        <div class="invalid-feedback" id="nama_program-error"></div>
                                                        <div class="valid-feedback" id="nama_program-success"></div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="">
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text text-black" for="inputGroupSelect01">Filter</label>
                                                                <select class="form-select" id="inputGroupSelect01" name="filter_op">
                                                                    <option selected><?= $daftar_program->filter; ?></option>
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
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="textAreaExample" class="form-label">Deskripsi Program</label>
                                                        <textarea type="text" class="form-control overflow-y: scroll" value='<?= $daftar_program->deskripsi_program; ?>' rows="8" id="deskripsi_program" name="deskripsi_program"><?= $daftar_program->deskripsi_program; ?></textarea>
                                                        <div class="invalid-feedback" id="deskripsi_program-error"></div>
                                                        <div class="valid-feedback" id="deskripsi_program-success"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('program'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
<div class="modal fade" id="updateGambar" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Gambar Galeri Program</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_program->id; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="mb-3">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonGaleri">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Awal Script untuk Validasi Form -->
<script>
    $(document).ready(function() {
        $('#nama_program').on('input', function() {
            let nama_program = $(this).val().trim();
            validateRequired(nama_program, 'nama_program');
        });

        $('#deskripsi_program').on('input', function() {
            let deskripsi_program = $(this).val().trim();
            validateDescribe(deskripsi_program, 'deskripsi_program');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#editSubmitButtonGaleri').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editGaleri :input').on('input', function() {
            checkInvalidElements();
        });

        // Caching elemen filter_op dan filter_br
        var filter_op = $("#inputGroupSelect01");
        var filter_br = $("input[name='filter_br']");

        // Fungsi untuk mengatur disable/enable filter_br berdasarkan nilai filter_op
        function setFilterBrState() {
            if (filter_op.val() === "Pilih Filter") {
                filter_br.prop("disabled", false);
            } else {
                filter_br.prop("disabled", true);
            }
        }
        setFilterBrState();
        filter_op.on("change", function() {
            setFilterBrState();
        });


    });
</script>
<!-- Akhir Script untuk Validasi Form -->

<!-- Awal Script untuk Cropping Gambar -->
<script>
    $("#editFotoSubmitButtonGaleri").prop("disabled", true);
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
        $("#editFotoSubmitButtonGaleri").prop("disabled", false);

        // Hilangkan tombol Crop
        // this.style.display = 'none';
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editFotoSubmitButtonGaleri").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        var files = e.target.files;
        var reader = new FileReader();
        reader.onload = function() {
            var image = document.getElementById('previewImage');
            image.src = reader.result;

            cropper = new Cropper(image, {
                aspectRatio: 16 / 6, // Set rasio 16:9
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