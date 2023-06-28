<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    sty
</head>

<body>

    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong><?= $data_peminjaman_masjid->nama_kegiatan; ?></strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/logobaimtp.png'); ?>" alt="" style="width: 5%; height : 5%;">
                            <!-- <p class="pt-0">Masjid Baitul Ilmi ITERA</p> -->
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;"><?= $data_peminjaman_masjid->nama_penanggungjawab . " | " . $data_peminjaman_masjid->instansi_peminjam; ?></span></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#123-456</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Creation Date: </span><?= date('l, d / M / Y') ?></li>
                                <?php if ($data_peminjaman_masjid->status_infaq == 'terbayar') : ?>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-success text-white fw-bold">
                                            Paid</span></li>
                                <?php elseif ($data_peminjaman_masjid->status_infaq == 'belum bayar') : ?>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                            Unpaid</span></li>
                                <?php endif ?>

                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-start">
                        <table class="table table-striped-columns table-borderless text-start">
                            <thead style="background-color:#84B0CA ;" class="text-white text-start">
                                <tr class="text-start">
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Instansi</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Infaq</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $data_peminjaman_masjid->nama_kegiatan; ?></td>
                                    <td><?= $data_peminjaman_masjid->instansi_peminjam; ?></td>
                                    <td><?= $data_peminjaman_masjid->tanggal_dipinjam; ?></td>
                                    <td><?= $data_peminjaman_masjid->tanggal_selesai; ?></td>
                                    <td><?= 'Rp. ' . number_format($data_peminjaman_masjid->infaq, 0, ",", "."); ?></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="">Silakan Transfer Melalui : </p>
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/img/bsi.png'); ?>" alt="Logo BSI" style="width: 50%; height : 50%; transform: scale(1.7);">
                                    <h3 class="card-title">7210 774 216</h3>
                                    <p class="card-text">a.n Masjid Baitul Ilmi ITERA</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4">
                            <p class="text-black float-end me-5"><span class="text-black me-3"> Total Transfer</span><span style="font-size: 25px;"><?= 'Rp. ' . number_format($data_peminjaman_masjid->infaq, 0, ",", "."); ?></span></p>
                        </div>
                    </div>
                    <hr>
                    <?php if ($data_peminjaman_masjid->status_infaq == 'belum bayar') : ?>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Kirim Bukti Transfer Anda</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="image_upload float-end me-4">
                                    <label for="userImage">
                                        <a title="Edit" class="btn btn-primary text-capitalize float-end me-4" style="background-color:#60bdf3 ;" data-bs-toggle="modal" data-bs-target="#updateGambar"><i class="bi bi-upload"></i> Kirim Bukti</a>
                                    </label>
                                </p>
                            </div>
                        </div>
                    <?php elseif ($data_peminjaman_masjid->status_infaq == 'terbayar') : ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>