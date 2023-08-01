// JavaScript with jQuery
    function getLabelFromInputId(inputId) {
        // Cari elemen label yang memiliki atribut 'for' dengan nilai sesuai dengan inputId
        let label = $(`label[for='${inputId}']`);

        // Ambil teks dari elemen label
        let labelText = label.text();

        // Kembalikan teks label
        return labelText;
    }

    function validateNama(value, id) {
        let errorMessage = $(`#${id}-error`);
        let successMessage = $(`#${id}-success`);
        let regex = /^[a-zA-Z\s]+$/;

        // Ambil teks label dari elemen input dengan ID "value"
        let label = getLabelFromInputId(`${id}`);

        // Lakukan validasi sesuai kebutuhan, contoh: panjang minimal 3 karakter
        if (value.length < 3 && value.length > 0) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus memiliki setidaknya 3 karakter`);
            errorMessage.show();
            successMessage.hide();
        } else if (value.length === 0) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus diisi`);
            errorMessage.show();
            successMessage.hide();
        } else if (!regex.test(value)) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus berupa alfabet`);
            errorMessage.show();
            successMessage.hide();
        } else {
            $(`#${id}`).removeClass("is-invalid");
            $(`#${id}`).addClass("is-valid");
            errorMessage.hide();
            successMessage.text(`${label} sudah sesuai`);
            successMessage.show();
        }
    }

    function validateAlphabet(value, id) {
        let errorMessage = $(`#${id}-error`);
        let successMessage = $(`#${id}-success`);
        const regex = /^[A-Za-z\s]+$/;

        // Ambil teks label dari elemen input dengan ID "value"
        let label = getLabelFromInputId(`${id}`);

        // Lakukan validasi sesuai kebutuhan, contoh: panjang minimal 3 karakter
        if (value.length === 0) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus diisi`);
            errorMessage.show();
            successMessage.hide();
        } else if (!regex.test(value)) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus berupa alfabet`);
            errorMessage.show();
            successMessage.hide();
        } else {
            $(`#${id}`).removeClass("is-invalid");
            $(`#${id}`).addClass("is-valid");
            errorMessage.hide();
            successMessage.text(`${label} sudah sesuai`);
            successMessage.show();
        }
    
    }
    function validateRequired(value, id) {
        let errorMessage = $(`#${id}-error`);
        let successMessage = $(`#${id}-success`);

        // Ambil teks label dari elemen input dengan ID "value"
        let label = getLabelFromInputId(`${id}`);

        // Lakukan validasi sesuai kebutuhan, contoh: panjang minimal 3 karakter
        if (value.length === 0) {
            $(`#${id}`).addClass("is-invalid");
            errorMessage.text(`${label} harus diisi`);
            errorMessage.show();
            successMessage.hide();
        }  else {
            $(`#${id}`).removeClass("is-invalid");
            $(`#${id}`).addClass("is-valid");
            errorMessage.hide();
            successMessage.text(`${label} sudah sesuai`);
            successMessage.show();
        }
    }

    function validateInstagramUrl(value, id){
            let errorMessage = $(`#${id}-error`);
            let successMessage = $(`#${id}-success`);
            let regex = /^https?:\/\/(?:www\.)?instagram\.com\/[a-zA-Z\s0-9_]+$/;

            // Ambil teks label dari elemen input dengan ID "value"
        let label = getLabelFromInputId(`${id}`);

            // Lakukan validasi sesuai kebutuhan, contoh: panjang minimal 10 karakter
            if (!regex.test(value) && !value.length == 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`Url ${label} tidak valid, url harus mengandung https://www.value.com/`);
                errorMessage.show();
                successMessage.hide();
            } else if (value.length < 10 && value.length > 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus memiliki setidaknya 10 karakter`);
                errorMessage.show();
                successMessage.hide();
            } else if (value.length == 0) {
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).removeClass("is-valid");
                errorMessage.hide();
                successMessage.hide();
            } else {
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).addClass("is-valid");
                errorMessage.hide();
                successMessage.text(` ${label} sudah sesuai`);
                successMessage.show();
            }
    }

    function validateLinkedinUrl(value, id){
            let errorMessage = $(`#${id}-error`);
            let successMessage = $(`#${id}-success`);
            let regex = /^https?:\/\/(?:[a-z]{2}\.)?linkedin\.com\/in\/[a-zA-Z\s0-9_-]+$/;


            // Ambil teks label dari elemen input dengan ID "value"
        let label = getLabelFromInputId(`${id}`);

            // Lakukan validasi sesuai kebutuhan, contoh: panjang minimal 10 karakter
            if (!regex.test(value) && !value.length == 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`Url ${label} tidak valid, url harus mengandung https://id.linkedin.com/in/`);
                errorMessage.show();
                successMessage.hide();
            } else if (value.length < 10 && value.length > 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus memiliki setidaknya 10 karakter`);
                errorMessage.show();
                successMessage.hide();
            } else if (value.length == 0) {
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).removeClass("is-valid");
                errorMessage.hide();
                successMessage.hide();
            } else {
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).addClass("is-valid");
                errorMessage.hide();
                successMessage.text(` ${label} sudah sesuai`);
                successMessage.show();
            }
    }

    function validateDescribe(value,id){
        let errorMessage = $(`#${id}-error`);
        let successMessage = $(`#${id}-success`);
        let label = getLabelFromInputId(`${id}`);

        if (value.length < 20 && value.length > 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus memiliki setidaknya 20 karakter`);
                errorMessage.show();
                successMessage.hide();
            } else if (value.length == 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus diisi`);
                errorMessage.show();
                successMessage.hide();
            } else {
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).addClass("is-valid");
                errorMessage.hide();
                successMessage.text(`${label} sudah sesuai format`);
                successMessage.show();
            }
    }

    function validateNumber(value,id){
        let errorMessage = $(`#${id}-error`);
        let successMessage = $(`#${id}-success`);
        let label = getLabelFromInputId(`${id}`);
        let regex = /^[0-9]+$/;

        if (value.length == 0) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus diisi`);
                errorMessage.show();
                successMessage.hide();
            } else if (!regex.test(value)) {
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} harus berisi angka`);
                errorMessage.show();
                successMessage.hide();
            } else if(id == 'nomor_telepon' && value.length < 10){
                $(`#${id}`).addClass("is-invalid");
                errorMessage.text(`${label} minimal 10 angka`);
                errorMessage.show();
                successMessage.hide();
            }else{
                $(`#${id}`).removeClass("is-invalid");
                $(`#${id}`).addClass("is-valid");
                errorMessage.hide();
                successMessage.text(`${label} sudah sesuai`);
                successMessage.show();
            }
    }

    function validateMax(value, id, max){
    let errorMessage = $(`#${id}-error`);
    let successMessage = $(`#${id}-success`);
    let label = getLabelFromInputId(id);
    let regex = /^[0-9]+$/;

    if (value.length == 0) {
        $(`#${id}`).addClass("is-invalid");
        errorMessage.text(`${label} harus diisi`);
        errorMessage.show();
        successMessage.hide();
    } else if (!regex.test(value)) {
        $(`#${id}`).addClass("is-invalid");
        errorMessage.text(`${label} harus berisi angka`);
        errorMessage.show();
        successMessage.hide();
    } else if (parseInt(value) > parseInt(max)) {
        $(`#${id}`).addClass("is-invalid");
        errorMessage.text(`${label} maksimal ${max} unit`);
        errorMessage.show();
        successMessage.hide();
    } else {
        $(`#${id}`).removeClass("is-invalid");
        $(`#${id}`).addClass("is-valid");
        errorMessage.hide();
        successMessage.text(`${label} sudah sesuai`);
        successMessage.show();
    }
    }

