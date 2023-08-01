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
                            <div class="col">
                                <div class="card-body">
                                    <form id="editPost" action="./<?= $daftar_post->id_post; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <fieldset>
                                            <legend class="text-center">Edit Data Post Judul : <h1><?= $daftar_post->nama_post; ?></h1>
                                            </legend>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="col mt-auto mb-auto">
                                                        <div class="col-md-12 mt-auto mb-auto ">
                                                            <div class="inventaris container-fluid mt-auto mb-auto" style="width : 100% ; height : 100% ;  ">
                                                                <div class="inventaris-item">
                                                                    <img src="<?php echo base_url('assets-admin/img/foto-post/' . $daftar_post->foto_post); ?>" class="img-fluid rounded float-center ms-auto me-auto d-block mb-3" alt="">
                                                                    <div class="inventaris-info">
                                                                        <h4><?= $daftar_post->nama_post; ?></h4>
                                                                        <a href="<?php echo base_url('assets-admin/img/foto-post/' . $daftar_post->foto_post); ?>" title="<?= $daftar_post->nama_post; ?>" data-gallery="inventaris-gallery" class="glightbox preview-link pe-3"><i class="bi bi-zoom-in"></i></a>
                                                                        <a title="Edit" class="details-link" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="nama_post" class="form-label">Nama Post</label>
                                                    <input type="text" class="form-control <?= $validation->hasError('nama_post') ? 'is-invalid' : null; ?>" id="nama_post" placeholder="Nama Post" value="<?= $daftar_post->nama_post; ?>" name="nama_post" required>

                                                    <?php if ($validation->hasError('nama_post')) : ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('nama_post'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="invalid-feedback" id="nama_post-error"></div>
                                                    <div class="valid-feedback" id="nama_post-success"></div>
                                                </div>
                                                <div class="row d-flex mb-3 mx-0 px-0 ">
                                                    <div class="col-md-12 col-xl-7">
                                                        <div class="input-group">
                                                            <label class="input-group-text text-black" for="kategori_ck">Kategori</label>
                                                            <select class="form-select" id="kategori_ck" name="kategori_ck">
                                                                <option selected><?= $daftar_post->kategori; ?></option>
                                                                <option value="--Tambah Kategori Baru--">--Tambah Kategori Baru--</option>
                                                                <?php foreach ($daftar_kategori as $kt) : ?>
                                                                    <?php if ($kt->kategori != $daftar_post->kategori) : ?>
                                                                        <option value="<?= $kt->kategori; ?>"><?= $kt->kategori; ?></option>
                                                                    <?php endif ?>
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
                                                    <label for="deskripsi_post" class="form-label">Deskripsi Post</label>
                                                    <textarea type="text" id="ckeditor" class="ckeditor form-control <?= $validation->hasError('deskripsi_post') ? 'is-invalid' : null; ?>" id="deskripsi_post" placeholder="Deskripsi Post" name="deskripsi_post" cols="30" rows="50" required><?= $daftar_post->deskripsi_post; ?></textarea>

                                                    <?php if ($validation->hasError('deskripsi_post')) : ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('deskripsi_post'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="invalid-feedback" id="deskripsi_post-error"></div>
                                                    <div class="valid-feedback" id="deskripsi_post-success"></div>
                                                </div>


                                            </div>
                                        </fieldset>
                                        <div class="modal-footer p-0 m-0 py-2">
                                            <a href="<?php echo base_url('post'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                            <button type="submit" class="btn btn-success" id="editSubmitButtonPost">Simpan</button>
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
<div class="modal fade" id="updateGambar" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Gambar</h1>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="./foto/<?= $daftar_post->id_post; ?>" method="post" enctype="multipart/form-data">
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success" id="editFotoSubmitButtonPost">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            $('#editSubmitButtonPost').prop('disabled', hasInvalidElements);
        }

        // Panggil fungsi pertama kali saat halaman dimuat untuk menonaktifkan tombol submit jika ada elemen "is-invalid"
        checkInvalidElements();

        // Panggil fungsi checkInvalidElements setiap kali terjadi perubahan pada input form
        $('#editPost :input').on('input', function() {
            checkInvalidElements();
        });

        // Caching elemen kategori_ck dan kategori_br
        var kategori_ck = $("#kategori_ck");
        var kategori_br = $("input[name='kategori_br']");

        // Fungsi untuk mengatur disable/enable kategori_br berdasarkan nilai kategori_ck
        function setFilterBrState() {
            if (kategori_ck.val() === "--Tambah Kategori Baru--") {
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
    $("#editFotoSubmitButtonPost").prop("disabled", true);
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
        $("#editFotoSubmitButtonPost").prop("disabled", false);
    });

    document.getElementById('userImage').addEventListener('change', function(e) {
        document.getElementById('croppingArea').style.display = 'block';
        $("#editFotoSubmitButtonPost").prop("disabled", true);
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