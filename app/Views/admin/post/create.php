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
                    <form id="addPost" action="./save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="nama_post" class="form-label">Nama Post</label>
                                        <input type="text" class="form-control <?= $validation->hasError('nama_post') ? 'is-invalid' : null; ?>" id="nama_post" placeholder="Nama Post" name="nama_post" required>

                                        <?php if ($validation->hasError('nama_post')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_post'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="nama_post-error"></div>
                                        <div class="valid-feedback" id="nama_post-success"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="deskripsi_post" class="form-label">Deskripsi Post</label>
                                        <textarea type="text" id="ckeditor" class="ckeditor form-control <?= $validation->hasError('deskripsi_post') ? 'is-invalid' : null; ?>" id="deskripsi_post" placeholder="Deskripsi Post" name="deskripsi_post" rows="10" required></textarea>

                                        <?php if ($validation->hasError('deskripsi_post')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_post'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="invalid-feedback" id="deskripsi_post-error"></div>
                                        <div class="valid-feedback" id="deskripsi_post-success"></div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-md-12 col-xl-7">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text text-black" for="kategori_ck">Kategori</label>
                                                <select class="form-select" id="kategori_ck" name="kategori_ck">
                                                    <option selected>--Pilih Kategori--</option>
                                                    <?php foreach ($daftar_kategori as $kt) : ?>
                                                        <option value="<?= $kt->kategori; ?>"><?= $kt->kategori; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-5">
                                            <div class="input-group">
                                                <span class="input-group-text text-black">Tambah Kategori Baru</span>
                                                <input type="text" name="kategori_br" id="kategori_br" aria-label="First name" class="form-control" placeholder="Tambahkan Kategori Baru Jika Tidak tersedia">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto_post" class="form-label">Foto Post</label>
                                        <input type="file" class="form-control" id="formFile" name="foto_post" onchange="readURL(this);" required>
                                        <div id="images" style="display: none;">
                                            <div class="row d-flex flex-row mb-3 mt-3 gap-3">
                                                <div class="col">
                                                    <div class="box" style="height: 300px; width:570px">
                                                        <img src="" id="previewImage" alt="Preview Image" style="display: none;">
                                                    </div>
                                                    <button class="btn btn-primary mt-3" id="cropButton" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                                </div>
                                                <div class="col" id="croppingArea" style="display: none;">
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
                            <a href="<?= base_url('post'); ?>" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success" id="addSubmitButtonPost">Tambah</button>
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
        $('#nama_post').on('input', function() {
            let nama_post = $(this).val().trim();
            validateRequired(nama_post, 'nama_post');
        });

        $('#deskripsi_post').on('input', function() {
            let deskripsi_post = $(this).val().trim();
            validateDescribe(deskripsi_post, 'deskripsi_post');
        });

        // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
        function checkInvalidElements() {
            let hasInvalidElements = $('.is-invalid').length > 0;
            $('#addSubmitButtonKegiatan').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#addPost :input').on('input', function() {
            checkInvalidElements();
        });

        // Caching elemen kategori_ck dan kategori_br
        var kategori_ck = $("#kategori_ck");
        var kategori_br = $("input[name='kategori_br']");

        // Fungsi untuk mengatur disable/enable kategori_br berdasarkan nilai kategori_ck
        function setFilterBrState() {
            if (kategori_ck.val() === "--Pilih Kategori--") {
                kategori_br.prop("disabled", false);
            } else {
                kategori_br.prop("disabled", true);
            }
        }
        setFilterBrState();
        kategori_ck.on("change", function() {
            setFilterBrState();
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
        $("#addSubmitButtonPost").prop("disabled", false);
    });

    document.getElementById('formFile').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        document.getElementById('images').style.display = 'block';
        $("#addSubmitButtonPost").prop("disabled", true);
        if (cropper) {
            cropper.destroy();
        }

        let files = e.target.files;
        let reader = new FileReader();
        reader.onload = function() {
            let image = document.getElementById('previewImage');
            image.src = reader.result;


            cropper = new Cropper(image, {
                aspectRatio: 16 / 9, // Set rasio 16:9
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