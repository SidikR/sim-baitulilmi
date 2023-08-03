<div class="tab-pane" id="tab-3">
    <div class="container">
        <div class="row d-flex">
            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>
            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Masjid</h2>

            <form id="addPeminjamanMasjid-form" action="./peminjaman/save-masjid" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row d-flex">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="instansi_peminjam_masjid" class="form-label">Instansi Peminjam</label>
                            <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="instansi_peminjam_masjid" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3" value="<?= old('instansi_peminjam'); ?>">

                            <?php if ($validation->hasError('instansi_peminjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('instansi_peminjam'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="instansi_peminjam_masjid-error"></div>
                            <div class="valid-feedback" id="instansi_peminjam_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_dipinjam_masjid" class="form-label">Tanggal & Waktu Peminjaman</label>
                            <input type="datetime-local" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="tanggal_dipinjam_masjid" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3">

                            <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_dipinjam'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="tanggal_dipinjam_masjid-error"></div>
                            <div class="valid-feedback" id="tanggal_dipinjam_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="nama_kegiatan_masjid" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_kegiatan') ? 'is-invalid' : null; ?>" id="nama_kegiatan_masjid" placeholder="Isikan Nama Kegiatan" name="nama_kegiatan" rows="3">

                            <?php if ($validation->hasError('nama_kegiatan')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_kegiatan'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="nama_kegiatan_masjid-error"></div>
                            <div class="valid-feedback" id="nama_kegiatan_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="infaq_masjid" class="form-label">Infaq</label>
                            <input type="number" class="form-control <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="infaq_masjid" placeholder="Isikan Jumlah Infaq Anda" name="infaq" rows="3">

                            <?php if ($validation->hasError('infaq')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('infaq'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="infaq_masjid-error"></div>
                            <div class="valid-feedback" id="infaq_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                            <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="exampleFormControlTextarea1" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="">
                                <option value="" selected>--Pilih--</option>
                                <option value="COD">COD</option>
                                <option value="TRANSFER">TRANSFER</option>
                            </select>

                            <?php if ($validation->hasError('metode_infaq')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('metode_infaq'); ?>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="ktp" class="form-label">Foto KTP</label>
                            <input type="file" class="form-control" id="imageFormMasjidKTP" onchange="readURL(this);" required>
                            <div id="imagesMasjidKTP" style="display: none;">
                                <div class="row d-flex flex-column mb-3 mt-3 gap-3">
                                    <div class=" col-12 col-xl-6">
                                        <div class="box" style="height: 300px; width:570px">
                                            <img src="" id="previewImageMasjidKTP" alt="Preview Image" style="display: none;">
                                        </div>
                                        <button class="btn btn-primary mt-3" id="cropButtonMasjidKTP" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                    </div>
                                    <div class="col-12 col-xl-6" id="croppingAreaMasjidKTP" style="display: none;">
                                        <div id="previewContainerMasjidKTP" style="height: 300px; width:auto; display: none;" class="mb-3">
                                            <img id="croppedImageViewMasjidKTP" class=" img-thumbnail" alt="Cropped Image">
                                            <input type="hidden" id="croppedImageInputMasjidKTP" name="croppedImageMasjidKTP">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="nama_penanggungjawab_masjid" class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="nama_penanggungjawab_masjid" value="<?= user()->nama_lengkap; ?>" name="nama_penanggungjawab" rows="3">

                            <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_penanggungjawab'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="nama_penanggungjawab_masjid-error"></div>
                            <div class="valid-feedback" id="nama_penanggungjawab_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_selesai_masjid" class="form-label">Tanggal & Waktu Selesai</label>
                            <input type="datetime-local" class="form-control <?= $validation->hasError('tanggal_selesai') ? 'is-invalid' : null; ?>" id="tanggal_selesai_masjid" placeholder="Isikan Tanggal selesai" name="tanggal_selesai" rows="2">

                            <?php if ($validation->hasError('tanggal_selesai')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_selesai'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="tanggal_selesai_masjid-error"></div>
                            <div class="valid-feedback" id="tanggal_selesai_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi_kegiatan_masjid" class="form-label">Deskripsi Kegiatan</label>
                            <textarea type="text" class="form-control <?= $validation->hasError('deskripsi_kegiatan') ? 'is-invalid' : null; ?>" id="deskripsi_kegiatan_masjid" placeholder="Isikan Deskripsi Kegiatan" name="deskripsi_kegiatan" rows="9" rows="10"></textarea>

                            <?php if ($validation->hasError('deskripsi_kegiatan')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi_kegiatan'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="deskripsi_kegiatan_masjid-error"></div>
                            <div class="valid-feedback" id="deskripsi_kegiatan_masjid-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="poster" class="form-label">Poster Kegiatan</label>
                            <input type="file" class="form-control" id="imageFormMasjid" onchange="readURL(this);" required>
                            <div id="imagesMasjid" style="display: none;">
                                <div class="row d-flex flex-column mb-3 mt-3 gap-3">
                                    <div class=" col-12 col-xl-6">
                                        <div class="box" style="height: 300px; width:570px">
                                            <img src="" id="previewImageMasjid" alt="Preview Image" style="display: none;">
                                        </div>
                                        <button class="btn btn-primary mt-3" id="cropButtonMasjid" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                    </div>
                                    <div class="col-12 col-xl-6" id="croppingAreaMasjid" style="display: none;">
                                        <div id="previewContainerMasjid" style="height: 300px; width:auto; display: none;" class="mb-3">
                                            <img id="croppedImageViewMasjid" class=" img-thumbnail" alt="Cropped Image">
                                            <input type="hidden" id="croppedImageInputMasjid" name="croppedImageMasjid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="<?= base_url('peminjaman'); ?>"><button class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                            <button type="submit" class="btn btn-success" id="addSubmitButtonPeminjamanMasjid">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir Script untuk Validasi Form -->
    <script>
        $(document).ready(function() {

            $('#infaq_masjid').on('input', function() {
                let infaq_form = $(this).val().trim();
                validateNumber(infaq_form, 'infaq_masjid');
                checkInvalidElementsMasjid();
            });

            $('#nama_penanggungjawab_masjid').on('input', function() {
                let nama_penanggungjawab = $(this).val().trim();
                validateNama(nama_penanggungjawab, 'nama_penanggungjawab_masjid');
                checkInvalidElementsMasjid();
            });

            $('#instansi_peminjam_masjid').on('input', function() {
                let instansi_peminjam = $(this).val().trim();
                validateAlphabet(instansi_peminjam, 'instansi_peminjam_masjid');
                checkInvalidElementsMasjid();
            });
            $('#nama_kegiatan_masjid').on('input', function() {
                let nama_kegiatan = $(this).val().trim();
                validateRequired(nama_kegiatan, 'nama_kegiatan_masjid');
                checkInvalidElementsMasjid();
            });
            $('#deskripsi_kegiatan_masjid').on('input', function() {
                let deskripsi_kegiatan = $(this).val().trim();
                validateDescribe(deskripsi_kegiatan, 'deskripsi_kegiatan_masjid');
                checkInvalidElementsMasjid();
            });
            $('#tanggal_selesai_masjid').on('input', function() {
                let tanggal_selesai_masjid = new Date($(this).val().trim());
                let tanggal_dipinjam_masjid = new Date($('#tanggal_dipinjam_masjid').val().trim());
                validateDateRange(tanggal_selesai_masjid, 'tanggal_selesai_masjid', tanggal_dipinjam_masjid);
                checkInvalidElementsMasjid();
            });

            $('#tanggal_dipinjam_masjid').on('input', function() {
                let tanggal_dipinjam_masjid = new Date($(this).val().trim());
                validateDateStart(tanggal_dipinjam_masjid, 'tanggal_dipinjam_masjid');
                checkInvalidElementsMasjid();
            });


            // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
            function checkInvalidElementsMasjid() {
                // Cari elemen dengan kelas "is-invalid" atau "invalid-feedback"
                let hasInvalidElements = $('.is-invalid').length > 0;

                // Cari elemen dengan ID "addSubmitButtonPeminjamanMasjid-form"
                let submitButton = $('#addSubmitButtonPeminjamanMasjid');

                // Aktifkan atau nonaktifkan tombol "Kirim" berdasarkan hasil pengecekan
                if (hasInvalidElements) {
                    submitButton.prop('disabled', true);
                } else {
                    submitButton.prop('disabled', false);
                }
            }

            checkInvalidElementsMasjid();

            $('#addSubmitButtonPeminjamanMasjid :input').on('input change', function() {
                checkInvalidElementsMasjid();
            });

            let cropper;
            document.getElementById('cropButtonMasjid').addEventListener('click', function() {
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
                    formData.append('croppedImageMasjid', webpBlob);
                }, 'image/jpeg');


                // Ganti src gambar yang di-crop dengan URL gambar yang di-crop
                let croppedImageViewMasjid = document.getElementById('croppedImageViewMasjid');
                croppedImageViewMasjid.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageViewMasjid'
                let inputValue = document.getElementById("croppedImageInputMasjid");
                inputValue.value = canvas.toDataURL('image/jpeg');
                let submitButton = $('#addSubmitButtonPeminjamanMasjid');
                submitButton.prop('disabled', true);

                // Tampilkan kontainer preview dan gambar yang di-crop
                document.getElementById('previewContainerMasjid').style.display = 'block';

                // Sembunyikan gambar preview
                document.getElementById('previewImageMasjid').style.display = 'none';
                $("#addSubmitButtonPeminjamanInventaris").prop("disabled", false);
            });

            document.getElementById('imageFormMasjid').addEventListener('change', function(e) {
                document.getElementById('croppingAreaMasjid').style.display = 'block';
                document.getElementById('imagesMasjid').style.display = 'block';
                $("#addSubmitButtonPeminjamanInventaris").prop("disabled", true);
                if (cropper) {
                    cropper.destroy();
                }
                let submitButton = $('#addSubmitButtonPeminjamanMasjid');
                submitButton.prop('disabled', true);

                let files = e.target.files;
                let reader = new FileReader();
                reader.onload = function() {
                    let image = document.getElementById('previewImageMasjid');
                    image.src = reader.result;
                    let aspectRatio = image.naturalWidth / image.naturalHeight;

                    cropper = new Cropper(image, {
                        aspectRatio: aspectRatio, // Set rasio 16:9
                        viewMode: 1 // Sesuaikan mode tampilan sesuai kebutuhan Anda
                    });

                    // Tampilkan tombol Crop
                    document.getElementById('cropButtonMasjid').style.display = 'block';
                };
                reader.readAsDataURL(files[0]);
            });

            let cropperKTP;
            document.getElementById('cropButtonMasjidKTP').addEventListener('click', function() {
                let canvas = cropperKTP.getCroppedCanvas();
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
                    formData.append('croppedImageMasjidKTP', webpBlob);
                }, 'image/jpeg');


                // Ganti src gambar yang di-crop dengan URL gambar yang di-crop
                let croppedImageViewMasjidKTP = document.getElementById('croppedImageViewMasjidKTP');
                croppedImageViewMasjidKTP.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageViewMasjidKTP'
                let inputValue = document.getElementById("croppedImageInputMasjidKTP");
                inputValue.value = canvas.toDataURL('image/jpeg');
                let submitButton = $('#addSubmitButtonPeminjamanMasjid');
                submitButton.prop('disabled', true);

                // Tampilkan kontainer preview dan gambar yang di-crop
                document.getElementById('previewContainerMasjidKTP').style.display = 'block';

                // Sembunyikan gambar preview
                document.getElementById('previewImageMasjidKTP').style.display = 'none';
            });

            document.getElementById('imageFormMasjidKTP').addEventListener('change', function(e) {
                document.getElementById('croppingAreaMasjidKTP').style.display = 'block';
                document.getElementById('imagesMasjidKTP').style.display = 'block';
                if (cropperKTP) {
                    cropperKTP.destroy();
                }
                let submitButton = $('#addSubmitButtonPeminjamanMasjid');
                submitButton.prop('disabled', true);

                let files = e.target.files;
                let reader = new FileReader();
                reader.onload = function() {
                    let image = document.getElementById('previewImageMasjidKTP');
                    image.src = reader.result;
                    let aspectRatio = image.naturalWidth / image.naturalHeight;

                    cropperKTP = new Cropper(image, {
                        aspectRatio: aspectRatio, // Set rasio 16:9
                        viewMode: 1 // Sesuaikan mode tampilan sesuai kebutuhan Anda
                    });

                    // Tampilkan tombol Crop
                    document.getElementById('cropButtonMasjidKTP').style.display = 'block';
                };
                reader.readAsDataURL(files[0]);
            });
        });
    </script>

</div><!-- End Tab Content 3 -->