<div class="tab-pane" id="tab-2">
    <div class="container">
        <div class="row d-flex">
            <?php if (session('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('failed'); ?>
                </div>
            <?php endif ?>
            <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
            <form id="addPeminjamanInventaris-form" action="./peminjaman/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row d-flex">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="nama_inventaris" class="form-label">Pilih Barang</label>
                            <select class="form-select <?= $validation->hasError('nama_inventaris') ? 'is-invalid' : null; ?>" aria-label="Default select example" id="nama_inventaris" placeholder="Pilih Inventaris" name="nama_inventaris" required>
                                <option selected>Pilih Inventaris</option>
                                <!-- <option value="" selected>--Pilih--</option> -->
                                <?php foreach ($daftar_inventaris as $jb) : ?>
                                    <option stok=<?= $jb->stok_inventaris; ?> value=<?= $jb->id_inventaris; ?>><?= $jb->nama_inventaris; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if ($validation->hasError('nama_inventaris')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_inventaris'); ?>
                                </div>
                            <?php endif; ?>
                            <div id="validationMessage" class="invalid-feedback" style="display: none;">Pilih barang inventaris </div>
                        </div>


                        <div class="mb-4">
                            <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                            <input type="date" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="tanggal_dipinjam" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" required>

                            <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_dipinjam'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="tanggal_dipinjam-error"></div>
                            <div class="valid-feedback" id="tanggal_dipinjam-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="instansi_peminjam-form" class="form-label">Instansi Peminjam</label>
                            <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="instansi_peminjam-form" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" required>

                            <?php if ($validation->hasError('instansi_peminjam')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('instansi_peminjam'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="instansi_peminjam-form-error"></div>
                            <div class="valid-feedback" id="instansi_peminjam-form-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="infaq-form" class="form-label">Infaq</label>
                            <input type="text" class="form-control <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="infaq-form" placeholder="Isikan Jumlah Infaq Anda" name="infaq" required>

                            <?php if ($validation->hasError('infaq')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('infaq'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="infaq-form-error"></div>
                            <div class="valid-feedback" id="infaq-form-success"></div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="qty-form" class="form-label">Quantitas</label>
                            <input type="text" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="qty-form" name="qty" required>

                            <?php if ($validation->hasError('qty')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('qty'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="invalid-feedback" id="qty-form-error"></div>
                            <div class="valid-feedback" id="qty-form-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control <?= $validation->hasError('tanggal_kembali') ? 'is-invalid' : null; ?>" id="tanggal_kembali" placeholder="Isikan Tanggal Kembali" name="tanggal_kembali" required>

                            <?php if ($validation->hasError('tanggal_kembali')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_kembali'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="tanggal_kembali-error"></div>
                            <div class="valid-feedback" id="tanggal_kembali-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="nama_penanggungjawab-form" class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="nama_penanggungjawab-form" placeholder="Isikan Nama Penanggung Jawab" name="nama_penanggungjawab" value="<?= user()->nama_lengkap; ?>" required>

                            <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_penanggungjawab'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="invalid-feedback" id="nama_penanggungjawab-form-error"></div>
                            <div class="valid-feedback" id="nama_penanggungjawab-form-success"></div>
                        </div>

                        <div class="mb-4">
                            <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                            <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="metode_infaq" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="" required>
                                <option value="" selected>--Pilih--</option>
                                <option value="COD">COD</option>
                                <option value="COD">TRANSFER</option>
                            </select>

                            <?php if ($validation->hasError('metode_infaq')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('metode_infaq'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="foto_identitas" class="form-label">Foto KTP</label>
                    <input type="file" class="form-control" id="imageFormPeminjamanInventaris-form" onchange="readURL(this);" required>
                    <div id="images-form" style="display: none;">
                        <div class="row d-flex mb-3 mt-3 gap-3">
                            <div class=" col">
                                <div class="box" style="height: 300px; width:500px">
                                    <img src="" id="previewImagePeminjamanInventaris_form" alt="Preview Image" style="display: none;">
                                </div>
                                <button class="btn btn-primary mt-3" id="cropButton_form" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                            </div>
                            <div class="col" id="croppingArea-form" style="display: none;">
                                <div id="previewContainer-form" style="height: 300px; width:auto; display: none;" class="mb-3">
                                    <img id="croppedImageView-form" class=" img-thumbnail" alt="Cropped Image">
                                    <input type="hidden" id="croppedImageInput-form" name="croppedImageInventaris">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="<?= base_url('peminjaman'); ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button></a>
                    <button type="submit" class="btn btn-success" id="addSubmitButtonPeminjamanInventaris-form">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Akhir Script untuk Validasi Form -->
    <script>
        $(document).ready(function() {

            const validationMessage = document.getElementById('validationMessage');

            $('#infaq-form').on('input', function() {
                let infaq_form = $(this).val().trim();
                validateNumber(infaq_form, 'infaq-form');
            });

            $('#nama_penanggungjawab-form').on('input', function() {
                let nama_penanggungjawab = $(this).val().trim();
                validateNama(nama_penanggungjawab, 'nama_penanggungjawab-form');
            });

            $('#instansi_peminjam-form').on('input', function() {
                let instansi_peminjam = $(this).val().trim();
                validateAlphabet(instansi_peminjam, 'instansi_peminjam-form');
            });

            $('#nama_inventaris').on('change', function() {
                console.log("Event handler berjalan!");
                let selectedOption = $(this).val().trim();
                let inputQty = document.getElementById("qty-form");
                let maxStok = $("option:selected", this).attr("stok"); // Ambil nilai atribut "stok" dari elemen option yang dipilih
                inputQty.placeholder = selectedOption !== "Pilih Inventaris" ? "Maksimal peminjaman " + maxStok + ' unit' : "Isi jumlah barang dipinjam";
                if (this.value === 'Pilih Inventaris' || this.value === '') {
                    // $("#addSubmitButtonPeminjamanInventaris-form").prop("disabled", true);
                    validationMessage.style.display = 'block';
                    inputQty.value = "";
                } else {
                    // $("#addSubmitButtonPeminjamanInventaris-form").prop("disabled", false);
                    validationMessage.style.display = 'none';
                }
                let qty_value = $('#qty-form').val();
                validateMax(qty_value, 'qty-form', maxStok);

            });

            // Event handler saat input "qty-form" berubah
            $('#qty-form').on('input', function() {
                let qty_value = $(this).val().trim();
                let maxStok = $('#nama_inventaris option:selected').attr('stok');
                validateMax(qty_value, 'qty-form', maxStok);
            });

            // Fungsi untuk memeriksa apakah ada elemen dengan kelas "is-invalid"
            function checkInvalidElements() {
                // Cari elemen dengan kelas "is-invalid" atau "invalid-feedback"
                let hasInvalidElements = $('.is-invalid').length > 0;

                // Cari elemen dengan ID "addSubmitButtonPeminjamanInventaris-form"
                let submitButton = $('#addSubmitButtonPeminjamanInventaris-form');

                // Aktifkan atau nonaktifkan tombol "Kirim" berdasarkan hasil pengecekan
                if (hasInvalidElements) {
                    submitButton.prop('disabled', true);
                } else {
                    submitButton.prop('disabled', false);
                }
            }

            checkInvalidElements();

            // Panggil fungsi checkInvalidElements() setiap kali terjadi perubahan pada input form
            // $('#addPeminjamanInventaris-form :input').on('input', function() {
            //     checkInvalidElements();
            // });

            // $('#addPeminjamanInventaris-form :select').on('change', function() {
            //     checkInvalidElements();
            // });
            $('#addPeminjamanInventaris-form :input, #addPeminjamanInventaris-form select').on('input change', function() {
                checkInvalidElements();
            });

        });
    </script>
    <!-- Akhir Script untuk Validasi Form -->

    <!-- Awal Script untuk Cropping Gambar -->
    <script>
        // let cropper;
        document.getElementById('cropButton_form').addEventListener('click', function() {
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
                formData.append('croppedImageInventaris', webpBlob);
            }, 'image/jpeg');


            // Ganti src gambar yang di-crop dengan URL gambar yang di-crop
            let croppedImageView_form = document.getElementById('croppedImageView-form');
            croppedImageView_form.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageView-form'
            let inputValue = document.getElementById("croppedImageInput-form");
            inputValue.value = canvas.toDataURL('image/jpeg');

            // Tampilkan kontainer preview dan gambar yang di-crop
            document.getElementById('previewContainer-form').style.display = 'block';

            // Sembunyikan gambar preview
            document.getElementById('previewImagePeminjamanInventaris_form').style.display = 'none';
            $("#addSubmitButtonPeminjamanInventaris-form").prop("disabled", false);
        });

        document.getElementById('imageFormPeminjamanInventaris-form').addEventListener('change', function(e) {
            document.getElementById('croppingArea-form').style.display = 'block';
            document.getElementById('images-form').style.display = 'block';
            // $("#addSubmitButtonPeminjamanInventaris-form").prop("disabled", true);
            if (cropper) {
                cropper.destroy();
            }

            let files = e.target.files;
            let reader = new FileReader();
            reader.onload = function() {
                let image = document.getElementById('previewImagePeminjamanInventaris_form');
                image.src = reader.result;

                cropper = new Cropper(image, {
                    aspectRatio: 16 / 9, // Set rasio 16:9
                    viewMode: 1 // Sesuaikan mode tampilan sesuai kebutuhan Anda
                });

                // Tampilkan tombol Crop
                document.getElementById('cropButton_form').style.display = 'block';
            };
            reader.readAsDataURL(files[0]);
        });
    </script>
    <!-- Akhir Script Cropping Gambar  -->

</div><!-- End Tab Content 2 -->