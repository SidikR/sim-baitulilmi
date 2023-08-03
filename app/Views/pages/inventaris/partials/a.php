<!-- Akhir Script untuk Validasi Form -->
<!-- <script>
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

            $('#nama_penanggungjawab_modal' + idItem).on('input', function() {
                let nama_penanggungjawab = $(this).val().trim();
                validateNama(nama_penanggungjawab, 'nama_penanggungjawab_modal' + idItem);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.

            });

            $('#instansi_peminjam_modal' + idItem).on('input', function() {
                let instansi_peminjam = $(this).val().trim();
                validateAlphabet(instansi_peminjam, 'instansi_peminjam_modal' + idItem);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.

            });

            $('#qty_modal' + idItem).on('input', function() {
                let qty_value = $(this).val().trim();
                let maxStok = $(this).data('maxstok');
                validateMax(qty_value, 'qty_modal' + idItem, maxStok);
                checkInvalidElementsr(idItem); // Tambahkan ini untuk memeriksa elemen yang tidak valid setelah input berubah.

            });

            function checkInvalidElementsr(idItem) {
                console.log('Checking invalid elements for idItem:', idItem);
                // Cari elemen dengan kelas "is-invalid" atau "invalid-feedback" di dalam form dengan idItem tertentu

                let hasInvalidElements = formElement.find('.is-invalid').length > 0;

                // Cari elemen dengan ID "addSubmitButtonPeminjamanInventaris-form" di dalam form dengan idItem tertentu
                let submitButton = formElement.find('#addSubmitButtonPeminjamanInventarisModal' + idItem);

                // Aktifkan atau nonaktifkan tombol "Kirim" berdasarkan hasil pengecekan
                if (hasInvalidElements) {
                    submitButton.prop('disabled', true);
                } else {
                    submitButton.prop('disabled', false);
                }
            }

            // Panggil fungsi checkInvalidElementsr saat input berubah di dalam form dengan idItem tertentu
            // formElement.find(`#addSubmitButtonPeminjamanInventarisModal${idItem} :input`).on('input', function() {
            //     checkInvalidElementsr(idItem); // Gantikan argumen ini dengan idItem yang benar.
            // });

            $(`#addSubmitButtonPeminjamanInventarisModal${idItem} :input`).on('input', function() {
                checkInvalidElementsr(idItem);
            });
        });
    });
</script> -->

<!-- Akhir Script untuk Validasi Form -->