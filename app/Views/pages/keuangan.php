<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <h1>Transparansi Keuangan </h1>
        <h2><span>Masjid Baitul Ilmi ITERA</span></h2>
    </div>
</section>

<!-- ======= KEuanagan Section ======= -->
<section id="keuangan" class="keuangan mt-5">
    <div class="container text-center" data-aos="zoom-out">
        <div class="row g-5">
            <div class="col-lg-12 col-md-12 col-12 d-flex flex-column ">

                <div class="section-header">
                    <h2>Keuangan Masjid</h2>
                    <p> Keuangan Masjid Baitul Ilmi ITERA dibagi menjadi tiga bagian yang berbeda, sesuai dengan ketentuan akad dengan donatur, berikut total keuangan masjid pada setaip akun keuangan</p>
                </div>

                <div class="row mt-3">
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4 tab-galeri">
                            <div class="card-body">
                                <h4>Pembangunan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_pem, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4 tab-galeri">
                            <div class="card-body">
                                <h4>Sarana Prasarana</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_prs, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card bg-secondary text-white mb-4 rounded-4 tab-galeri">
                            <div class="card-body">
                                <h4>Operasional</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_op, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card bg-primary text-white mb-4 rounded-4 tab-galeri">
                            <div class="card-body">
                                <h4 class="text-white"><b>Total Keuangan</b></h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <h2><?= 'Rp. ' . number_format($total_kas, 0, '.', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End KEuanagan Section -->


<div class="container">
    <div class="row">
        <section class="tabs">
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-12 col-md-4 col-lg-4 buku_besar">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-coin color-cyan"></i>
                            <h4>Keuangan</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-12 col-md-4 col-lg-4 masuk">
                        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-box-arrow-in-right color-cyan"></i>
                            <h4>Pemasukan</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->

                    <li class="nav-item col-12 col-md-4 col-lg-4 keluar">
                        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-3">
                            <i class="bi bi-box-arrow-left color-cyan"></i>
                            <h4>Pengeluaran</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->
                </ul>

                <form action="" id="form">
                    <div class="row">
                        <h4 class="mb-3 mt-3">Filter Keuangan</h4>
                        <div class="col-md-6">
                            <!-- <div class="row-md-6"> -->
                            <div class="col-md-12 mb-3">
                                <span>Pilih dari tanggal</span>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control date_range_filter pickdate" placeholder="Tanggal Awal" aria-label="Tanggal Awal" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <span>Sampai tanggal</span>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control date_range_filter2 pickdate" placeholder="Tanggal Akhir" aria-label="Tanggal Akhir" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="col-md-6" style="margin-bottom: 20px">
                            <div class="col-md-12 mb-3">
                                <span>Akun Keuangan</span>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>

                                    <select name="" id="" class="form-control akun_keuangan akun_k">
                                        <option selected>--Pilih Akun Keuangan--</option>
                                        <?php foreach ($daftar_akunkeuangan as $dak) : ?>
                                            <option value="<?= $dak->keterangan_akunkeuangan; ?>"><?= $dak->keterangan_akunkeuangan; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <span>Akses Keuangan</span>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                    <select name="" id="" class="form-control akses_keuangan akses_k" placeholder="sd">
                                        <option selected>--Pilih Akses Keuangan--</option>
                                        <?php foreach ($daftar_akseskeuangan as $dak) : ?>
                                            <option value="<?= $dak->keterangan_akseskeuangan; ?>"><?= $dak->keterangan_akseskeuangan; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-danger reset">Reset Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tab-content">
                    <!-- Tab Pertama -> Keuangan -->
                    <div class="tab-content">
                        <div class="tab-pane active show mb-5" id="tab-1">
                            <div class="col-md-12">
                                <h2 class="mb-3">Keuangan</h2>
                                <table id="datatables_userkeuangan" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Akun Keuangan</th>
                                            <th>Akses Keuangan</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        $saldo = 0; ?>

                                        <?php foreach ($daftar_keuangan as $dp) : $saldo += $dp->masuk - $dp->keluar; ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dp->tanggal_transaksi; ?></td>
                                                <td><?= $dp->keterangan_akunkeuangan; ?></td>
                                                <td><?= $dp->keterangan_akseskeuangan; ?></td>
                                                <td><?= $dp->keterangan; ?></td>
                                                <td><?php if ($dp->masuk != null) : ?>
                                                        <?= 'Rp. ' . number_format($dp->masuk, 0, '.', '.'); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php if ($dp->keluar != null) : ?>
                                                        <?= 'Rp. ' . number_format($dp->keluar, 0, '.', '.'); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= 'Rp. ' . number_format($saldo, 0, '.', '.'); ?></td> <!-- Display the new balance -->
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Akhie dari Keuangan -->

                        <!-- Tab 2 -> Pemasukan -->
                        <div class="tab-pane show mb-5" id="tab-2">
                            <div class="col-md-12">
                                <h2 class="mb-3">Pemasukan Kas</h2>
                                <table id="datatables_keuanganmasuk" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Akun Keuangan</th>
                                            <th>Akses Keuangan</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_pemasukan as $dp) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dp->tanggal_transaksi; ?></td>
                                                <td><?= $dp->keterangan_akunkeuangan; ?></td>
                                                <td><?= $dp->keterangan_akseskeuangan; ?></td>
                                                <td><?= $dp->keterangan; ?></td>
                                                <td><?php if ($dp->masuk != null) : ?>
                                                        <?= 'Rp. ' . number_format($dp->masuk, 0, '.', '.'); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Akhir Pemasukan -->

                        <!-- Awal Tab Untuk Menampilkan Tabel Pengeluaran -->
                        <div class="tab-pane show" id="tab-3">
                            <div class="col-md-12">
                                <h2 class="mb-3">Pengeluaran Kas</h2>
                                <table id="datatables_keuangankeluar" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Akun Keuangan</th>
                                            <th>Akses Keuangan</th>
                                            <th>Keterangan</th>
                                            <th>Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_pengeluaran as $dp) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dp->tanggal_transaksi; ?></td>
                                                <td><?= $dp->keterangan_akunkeuangan; ?></td>
                                                <td><?= $dp->keterangan_akseskeuangan; ?></td>
                                                <td><?= $dp->keterangan; ?></td>
                                                <td><?php if ($dp->keluar != null) : ?>
                                                        <?= 'Rp. ' . number_format($dp->keluar, 0, '.', '.'); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Akhir Tab Tabel Pengeluaran -->

                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection(); ?>