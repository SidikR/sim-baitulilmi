<?php

if (!function_exists('validate_judul')) {
    /**
     * Validasi Nama Program/Galeri.
     *
     * @param string $nama_program Nama program/galeri yang akan divalidasi.
     * @return string Pesan kesalahan atau kosong jika valid.
     */
    function validate_nama_program($nama_program)
    {
        $nama_program = trim($nama_program);
        if (strlen($nama_program) < 5 && strlen($nama_program) > 0) {
            return 'Nama Program/Galeri harus memiliki setidaknya 5 karakter';
        } elseif (strlen($nama_program) == 0) {
            return 'Nama Program/Galeri Harus Diisi';
        }

        return ''; // Return empty string if no error
    }
}
