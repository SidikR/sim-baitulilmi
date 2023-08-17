<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Open Recruitmen Marbot </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
    </div>
</section>

<section class="oprec-marbot">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="oprec-marbot-header">
                    <h1>Timeline Open Recruitment</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kamis, 17 Agustus 2023 - Kamis, 24 Agustus 2023</td>
                                <td>Pendaftaran</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jumat, 25 Agustus 2023</td>
                                <td>Pengumuman Seleksi Berkas & Jadwal Wawancara</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Senin, 28 Agustus 2023 Rabu, 30 Agustus 2023</td>
                                <td>Pelaksanaan Wawancara</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kamis, 31 Agustus 2023</td>
                                <td>Pengumuman dan Waktu Check-In</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-xl-6">
                        <div class="oprec-marbot-persyaratan">
                            <h2>Persyaratan</h2>
                            <p>Silakan perhatikan persyaratan berikut : </p>
                            <ol>
                                <li>Beragama Islam</li>
                                <li>Mahasiswa Institut Teknologi Sumatera</li>
                                <li>CV Terbaru</li>
                                <li>Motivation Letter</li>
                                <li>Transkip / Ijazah SMA <span>*</span></li>
                                <li>KTM</li>
                                <li>KTP</li>
                                <li>Surat Rekomendasispan <span>**</span></li>
                                <li>Rekaman Adzan</li>
                                <li>Rekaman Surah Al-fatihah</li>
                                <li>Mengisi Link Pendaftaran</li>
                                <li>Melakukan Ujian Tulis</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="oprec-marbot-persyaratan">
                            <h2>Kualifikasi</h2>
                            <p>Silakan perhatikan kualifikasi berikut : </p>
                            <ol>
                                <li>Memiliki niat yang lurus karena Allah</li>
                                <li>Berniat untuk serius melakukukan kuliah</li>
                                <li>Bisa adzan</li>
                                <li>Memiliki loyalitas untuk memakmurkan masjid</li>
                                <li>Dapat bekerjasama degan baik</li>
                                <li>Mempunyai rasa kepekaan sosial yang tinggi</li>
                                <li>Mulitalenta menjadi nilai <b>PLUS</b>, seperti memperbaiki kelistrikan/sound sistem, suka berkebun,bisa memanjat pohon/bangunan </li>
                                <li>Bersedia pulang sesuai jadwal ketika libur kuliah</li>
                            </ol>
                            <span>Poin lain akan disampaikan ketika wawancara</span>
                        </div>
                    </div>

                    <?php if (!logged_in()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Silakan Login terlebih dahulu untuk melanjutkan pendaftaran</p>
                        </div>
                    <?php else : ?>

                        <div class="alert alert-warning" role="alert">
                            <p>(*) Jika Masih Semester 1, maka lampirkan Ijazah, jika semester 3 keatas, maka Transkip</p>
                            <p>(**) Jika ada, bisa dari guru, dosen, atau lainnya</p>
                            <p>Link Grub : <span><a target="_blank" href="https://chat.whatsapp.com/EHcRZqPLXeq4p5Up5mfltY"> Grub Whatsapps</a></span></p>
                        </div>
                </div>

            </div>
            <div class="col-12 form-pendaftaran mt-3">
                <p class="row justify-content-center align-items-center">Silakan Isi Form Pendaftaran dibawah ini dengan sebenar-benarnya</p>
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe-2sUhDmW1M2HsifhP8929vLpHzDtFOCqk1E4Ms2b4Z5wc6g/viewform?embedded=true" width="100%" height="800">Memuat…</iframe>
            </div>
        <?php endif ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>