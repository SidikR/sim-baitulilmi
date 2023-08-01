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
                    <p id="error-message" style="display: none; color: red;"></p>
                    <form id="addGaleri" action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="nama_program" class="form-label">Nama Program</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_program') ? 'is-invalid' : null; ?>" id="nama_program" placeholder="Nama Program" name="nama_program" required>

                                        <?php if ($validation->hasError('nama_program')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_program'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="invalid-feedback" id="nama_program-error"></div>
                                        <div class="valid-feedback" id="nama_program-success"></div>

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
                                                <input type="text" name="filter_br" aria-label="First name" class="form-control" placeholder="Tambahkan Filter Baru Jika Tidak tersedia ex. berbuka_puasa">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="deskripsi_program" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control <?= $validation->hasError('deskripsi_program') ? 'is-invalid' : null; ?>" id="deskripsi_program" placeholder="Tempat Program" name="deskripsi_program" required>

                                        <?php if ($validation->hasError('deskripsi_program')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_program'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="invalid-feedback" id="deskripsi_program-error"></div>
                                        <div class="valid-feedback" id="deskripsi_program-success"></div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto" class="form-label">Foto Program</label>
                                        <input type="file" class="form-control" id="imageForm" required>
                                    </div>

                                </div>

                                <div class="col" id="croppingArea" style="display: none;">

                                    <div id="previewContainer" style="display: none;" class="mb-3">
                                        <h5>Gambar yang di-crop:</h5>
                                        <img id="croppedImageView" class="img-thumbnail" alt="Cropped Image">
                                        <input type="hidden" id="croppedImageInput" name="croppedImage">
                                    </div>


                                    <div class="mb-4">
                                        <div class="box" style="height: 300px; width:550px">
                                            <img src="" id="previewImage" alt="Preview Image" style="display: none;">
                                        </div>
                                        <button class="btn btn-primary mt-3" id="cropButton" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer p-0 m-0 py-2">
                            <a href="<?= base_url('program'); ?>" class="btn btn-danger">Batal</a>
                            <button id="addSubmitButtonGaleri" type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
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
            $('#addSubmitButtonGaleri').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addGaleri :input').on('input', function() {
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
        $("#addSubmitButtonGaleri").prop("disabled", false);

        // Hilangkan tombol Crop
        // this.style.display = 'none';
    });

    document.getElementById('imageForm').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#addSubmitButtonGaleri").prop("disabled", true);
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