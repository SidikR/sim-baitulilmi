<!-- Modal pinjam-->
<?php foreach ($daftar_inventaris as $di) :  ?>
    <div class="modal fade modal-lg" id="pinjamModal<?= $di->id_inventaris; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Perhatian! Anda akan meminjam <b><?= $di->nama_inventaris; ?></h1>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <h2 class="mt-3 mb-4">Silakan Isi Formulir Berikut Untuk Peminjaman Inventaris</h2>
                    <div class="container">
                        <div class="row d-flex">
                            <form class="addPeminjamanInventaris_modal" id="addPeminjamanInventaris_modal<?= $di->id_inventaris; ?>" data-iditem="<?= $di->id_inventaris; ?>" action="./peminjaman/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" class="form-control" id="nama_inventaris_modal" name="nama_inventaris" value="<?= $di->id_inventaris; ?>" required>
                                <div class="row d-flex">
                                    <div class="col-12 col-xl-6">
                                        <div class="mb-4">
                                            <label for="qty_modal<?= $di->id_inventaris; ?>" class="form-label">Quantitas</label>
                                            <input type="text" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : null; ?>" id="qty_modal<?= $di->id_inventaris; ?>" name="qty" data-maxstok="<?= $di->stok_inventaris; ?>" placeholder="Maksimal <?= $di->stok_inventaris; ?>" required>

                                            <?php if ($validation->hasError('qty')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('qty'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="qty_modal<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="qty_modal<?= $di->id_inventaris; ?>-success"></div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="tanggal_dipinjam_inventaris<?= $di->id_inventaris; ?>" class="form-label">Tanggal Dipinjam</label>
                                            <input type="date" class="form-control <?= $validation->hasError('tanggal_dipinjam') ? 'is-invalid' : null; ?>" id="tanggal_dipinjam_inventaris<?= $di->id_inventaris; ?>" placeholder="Isikan Tanggal di Pinjam" name="tanggal_dipinjam" rows="3" required>

                                            <?php if ($validation->hasError('tanggal_dipinjam')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_dipinjam'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="tanggal_dipinjam_inventaris<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="tanggal_dipinjam_inventaris<?= $di->id_inventaris; ?>-success"></div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="infaq_modal<?= $di->id_inventaris; ?>" class="form-label">Infaq</label>
                                            <input type="text" class="form-control infaq-input <?= $validation->hasError('infaq') ? 'is-invalid' : null; ?>" id="infaq_modal<?= $di->id_inventaris; ?>" placeholder="Isikan Jumlah Infaq Anda" name="infaq" rows="3" required>

                                            <?php if ($validation->hasError('infaq')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('infaq'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="infaq_modal<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="infaq_modal<?= $di->id_inventaris; ?>-success"></div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="nama_penanggungjawab_modal<?= $di->id_inventaris; ?>" class="form-label">Nama Penanggung Jawab</label>
                                            <input type="text" class="form-control <?= $validation->hasError('nama_penanggungjawab') ? 'is-invalid' : null; ?>" id="nama_penanggungjawab_modal<?= $di->id_inventaris; ?>" placeholder="Isikan Nama Penanggung Jawab" name="nama_penanggungjawab" value="<?= user()->nama_lengkap; ?>" required>

                                            <?php if ($validation->hasError('nama_penanggungjawab')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_penanggungjawab'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="nama_penanggungjawab_modal<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="nama_penanggungjawab_modal<?= $di->id_inventaris; ?>-success"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="mb-4">
                                            <label for="instansi_peminjam_modal<?= $di->id_inventaris; ?>" class="form-label">Instansi Peminjam</label>
                                            <input type="text" class="form-control <?= $validation->hasError('instansi_peminjam') ? 'is-invalid' : null; ?>" id="instansi_peminjam_modal<?= $di->id_inventaris; ?>" placeholder="Isikan Nama Instansi Peminjam" name="instansi_peminjam" rows="3" required>

                                            <?php if ($validation->hasError('instansi_peminjam')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('instansi_peminjam'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="instansi_peminjam_modal<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="instansi_peminjam_modal<?= $di->id_inventaris; ?>-success"></div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="tanggal_kembali_inventaris<?= $di->id_inventaris; ?>" class="form-label">Tanggal Pengembalian</label>
                                            <input type="date" class="form-control <?= $validation->hasError('tanggal_kembali') ? 'is-invalid' : null; ?>" id="tanggal_kembali_inventaris<?= $di->id_inventaris; ?>" placeholder="Isikan Tanggal Kembali" name="tanggal_kembali" rows="3" required>

                                            <?php if ($validation->hasError('tanggal_kembali')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_kembali'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="tanggal_kembali_inventaris<?= $di->id_inventaris; ?>-error"></div>
                                            <div class="valid-feedback" id="tanggal_kembali_inventaris<?= $di->id_inventaris; ?>-success"></div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="metode_infaq" class="form-label">Metode Penyaluran Infaq</label>
                                            <select type="number" class="form-control <?= $validation->hasError('metode_infaq') ? 'is-invalid' : null; ?>" id="metode_infaq" placeholder="Isikan Alamat Lengkap" name="metode_infaq" id="" required>
                                                <option value="" selected>--Pilih--</option>
                                                <option value="COD">COD</option>
                                                <option value="TRANSFER">TRANSFER</option>
                                            </select>

                                            <?php if ($validation->hasError('metode_infaq')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('metode_infaq'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="invalid-feedback" id="metode_infaq-error"></div>
                                            <div class="valid-feedback" id="metode_infaq-success"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="foto_identitas" class="form-label">Foto KTP</label>
                                            <input type="file" class="form-control" id="imageFormPeminjamanInventaris<?= $di->id_inventaris; ?>" onchange="readURL(this);" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="images<?= $di->id_inventaris; ?>" style="display: none;">
                                    <div class="row d-flex mb-3 mt-3 gap-3">
                                        <div class="col-12 col-xl-6" style="width:100%">
                                            <div class="box" style="height: 300px; width:100%">
                                                <img src="" id="previewImagePeminjamanInventaris<?= $di->id_inventaris; ?>" alt="Preview Image" style="display: none;">
                                            </div>
                                            <button class="btn btn-primary mt-3" id="cropButton<?= $di->id_inventaris; ?>" type="button" style="display: none;"><i class="bi bi-scissors"></i> Crop</button>
                                        </div>
                                        <div class="col-12 col-xl-6" id="croppingArea<?= $di->id_inventaris; ?>" style="display: none;">
                                            <div id="previewContainer<?= $di->id_inventaris; ?>" style="display: none;" class="mb-3">
                                                <img id="croppedImageView<?= $di->id_inventaris; ?>" class=" img-thumbnail" alt="Cropped Image">
                                                <input type="hidden" id="croppedImageInput<?= $di->id_inventaris; ?>" name="croppedImageInventaris">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-success px-2" id="addSubmitButtonPeminjamanInventarisModal<?= $di->id_inventaris; ?>">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Akhir Script untuk Validasi Form -->
<script>
    $(document).ready(function() {
        $('.addPeminjamanInventaris_modal').each(function() {
            // Ambil nilai atribut data-iditem pada masing-masing elemen form
            let idItem = $(this).data('iditem');
            const formElement = $(this);
            const validationMessage = document.getElementById('validationMessage');

            $('#infaq_modal' + idItem).on('input', function() {
                let infaq_form = $(this).val().trim();
                validateNumber(infaq_form, 'infaq_modal' + idItem);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.
            });

            $('#nama_penanggungjawab_inventaris' + idItem).on('input', function() {
                let nama_penanggungjawab = $(this).val().trim();
                validateNama(nama_penanggungjawab, 'nama_penanggungjawab_inventaris' + idItem);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.
            });

            $('#instansi_peminjam_inventaris' + idItem).on('input', function() {
                let instansi_peminjam = $(this).val().trim();
                validateAlphabet(instansi_peminjam, 'instansi_peminjam_inventaris' + idItem);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.
            });

            $('#qty_modal' + idItem).on('input', function() {
                let qty_value = $(this).val().trim();
                let maxStok = $(this).data('maxstok');
                validateMax(qty_value, 'qty_modal' + idItem, maxStok);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.
            });

            $('#tanggal_kembali_inventaris' + idItem).on('input', function() {
                let tanggal_kembali_inventaris = new Date($(this).val().trim());
                let tanggal_dipinjam_inventaris = new Date($('#tanggal_dipinjam_inventaris' + idItem).val().trim());
                validateDateRange(tanggal_kembali_inventaris, 'tanggal_kembali_inventaris' + idItem, tanggal_dipinjam_inventaris);
                checkInvalidElementsr();
            });

            $('#tanggal_dipinjam_inventaris' + idItem).on('input', function() {
                let tanggal_dipinjam_inventaris = new Date($(this).val().trim());
                validateDateStart(tanggal_dipinjam_inventaris, 'tanggal_dipinjam_inventaris' + idItem);
                checkInvalidElementsr();
            });

            function checkInvalidElementsr(idItem) {
                console.log('Checking invalid elements for idItem:', idItem);
                // Cari elemen dengan kelas "is-invalid" atau "invalid-feedback" di dalam form dengan idItem tertentu

                let hasInvalidElements = formElement.find('.is-invalid').length > 0;

                // Cari elemen dengan ID "addSubmitButtonPeminjamanInventaris"+ idItem di dalam form dengan idItem tertentu
                let submitButton = formElement.find('#addSubmitButtonPeminjamanInventarisModal' + idItem);

                // Aktifkan atau nonaktifkan tombol "Kirim" berdasarkan hasil pengecekan
                if (hasInvalidElements) {
                    submitButton.prop('disabled', true);
                } else {
                    submitButton.prop('disabled', false);
                }
            }

            $(`#addSubmitButtonPeminjamanInventarisModal${idItem} :input`).on('input', function() {
                checkInvalidElementsr(idItem);
            });

            let cropperModal;
            document.getElementById('cropButton' + idItem).addEventListener('click', function() {
                let canvas = cropperModal.getCroppedCanvas();
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
                let croppedImageView = document.getElementById('croppedImageView' + idItem);
                croppedImageView.src = canvas.toDataURL('image/jpeg'); // Change 'croppedImage' to 'croppedImageView'+ idItem
                let inputValue = document.getElementById("croppedImageInput" + idItem);
                inputValue.value = canvas.toDataURL('image/jpeg');
                let submitButton = $('#addSubmitButtonPeminjamanInventarisModal' + idItem);
                submitButton.prop('disabled', true);

                // Tampilkan kontainer preview dan gambar yang di-crop
                document.getElementById('previewContainer' + idItem).style.display = 'block';

                $('#addSubmitButtonPeminjamanInventarisModal' + idItem).prop("disabled", false);
            });

            document.getElementById('imageFormPeminjamanInventaris' + idItem).addEventListener('change', function(e) {
                document.getElementById('croppingArea' + idItem).style.display = 'block';
                document.getElementById('images' + idItem).style.display = 'block';
                if (cropperModal) {
                    cropperModal.destroy();
                }
                let submitButton = $('#addSubmitButtonPeminjamanInventarisModal' + idItem);
                submitButton.prop('disabled', true);

                let files = e.target.files;
                let reader = new FileReader();
                reader.onload = function() {
                    let image = document.getElementById('previewImagePeminjamanInventaris' + idItem);
                    image.src = reader.result;

                    cropperModal = new Cropper(image, {
                        aspectRatio: NaN, // Set rasio 16:9
                        viewMode: 1 // Sesuaikan mode tampilan sesuai kebutuhan Anda
                    });

                    // Tampilkan tombol Crop
                    document.getElementById('cropButton' + idItem).style.display = 'block';
                };
                reader.readAsDataURL(files[0]);
            });
        });
    });
</script>

<!-- Akhir Script untuk Validasi Form -->