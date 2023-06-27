<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card">
                <div class="card-header">
                    <h3>Keuangan Masjid</h3>
                </div>
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2 d-grid gap-2 mb-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-database-add"></i> Import
                            </button>
                            <a href='keuangan/tambah-pemasukan' class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Pemasukan</a>
                            <a href='keuangan/tambah-pengeluaran' class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Pengeluaran</a>
                        </div>

                        <div class="col-md-10 ">
                            <section class="tabs">
                                <ul class="nav nav-tabs gy-4 row gy-4 d-flex">

                                    <!-- Awal Tab Untuk Menampilan Buku Besar -->
                                    <li class="nav-item col-12 col-md-4 col-lg-4 buku_besar ">
                                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                            <i class="bi bi-coin color-secondary"></i>
                                            <h4>Buku Besar</h4>
                                        </a>
                                    </li>
                                    <!-- End Tab Buku Besar -->

                                    <!-- Awal Tab Untuk Menampilkan Tabel Pemasukan -->
                                    <li class="nav-item col-12 col-md-4 col-lg-4 masuk">
                                        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-2">
                                            <i class="bi bi-box-arrow-in-right color-secondary"></i>
                                            <h4>Pemasukan</h4>
                                        </a>
                                    </li><!-- End Tab 2 Nav -->

                                    <!-- Awal Tab Untuk Menampilkan Tabel Penegluaran -->
                                    <li class="nav-item col-12 col-md-4 col-lg-4 keluar">
                                        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#tab-3">
                                            <i class="bi bi-box-arrow-left color-secondary"></i>
                                            <h4>Pengeluaran</h4>
                                        </a>
                                    </li><!-- End Tab 2 Nav -->
                                </ul>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="">
                <div class="mb-4 mt-4">
                    <!-- ini notifikasi Berhasil ditambah -->
                    <?php if (session('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success'); ?>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header text-center btn-success text-white">Ringkasan Keuangan</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class=" col-12 col-md-12 col-lg-6">Pembangunan</h5>
                                        <h5 class=" col-12 col-md-12 col-lg-6"><span class="badge bg-primary">: Rp. <?= number_format($total_pem, 0, '.', '.'); ?></span></h5>
                                    </div>
                                    <div class="row">
                                        <h5 class=" col-12 col-md-12 col-lg-6">Sarana Prasarana</h5>
                                        <h5 class=" col-12 col-md-12 col-lg-6"><span class="badge bg-primary">: Rp. <?= number_format($total_prs, 0, '.', '.'); ?></span></h5>
                                    </div>
                                    <div class="row">
                                        <h5 class=" col-12 col-md-12 col-lg-6">Operasional</h5>
                                        <h5 class=" col-12 col-md-12 col-lg-6"><span class="badge bg-primary">: Rp. <?= number_format($total_op, 0, '.', '.'); ?></span></h5>
                                    </div>
                                    <div class="row">
                                        <h5 class=" col-12 col-md-12 col-lg-6">Total</h5>
                                        <h5 class=" col-12 col-md-12 col-lg-6"><span class="badge btn-success">: Rp. <?= number_format($total_kas, 0, '.', '.'); ?></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
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

                        </div>
                    </div>

                    <div class="row">
                        <section class="tables">
                            <div data-aos="fade-up">
                                <!-- Tab Pertama -> Buku Besar -->
                                <div class="tab-content">
                                    <div class="tab-pane active show mb-5" id="tab-1">
                                        <div class="col-md-12">
                                            <h2 class="mb-3">Buku Besar</h2>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($daftar_keuangan as $dp) : ?>
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
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5"></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Akhir dari Buku Besar -->

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
                                                        <th>Aksi</th>
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
                                                            <td style="width: 15%;">
                                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailMasuk<?= $dp->id_keuangan; ?>"><i class="bi bi-book-fill"></i></button>
                                                                <a href="<?= 'pemasukan/edit/' . $dp->id_keuangan; ?>"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusMasuk<?= $dp->id_keuangan; ?>"><i class="bi bi-trash3-fill"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5"></td>
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
                                                        <th>Aksi</th>
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
                                                            <td style="width: 15%;">
                                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailMasuk<?= $dp->id_keuangan; ?>"><i class="bi bi-book-fill"></i></button>
                                                                <a href="<?= 'pengeluaran/edit/' . $dp->id_keuangan; ?>"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusKeluar<?= $dp->id_keuangan; ?>"><i class="bi bi-trash3-fill"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5"></td>
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
                        </section>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

<!-- Modal Hapus -->
<?php foreach ($daftar_keuangan as $dp) : ?>
    <div class="modal fade" id="hapusMasuk<?= $dp->id_keuangan; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Keuangan</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form action="keuangan/hapus/<?= $dp->id_keuangan; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data keuangan <b><?= $dp->keterangan; ?></b> akan dihapus ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($daftar_keuangan as $dp) : ?>
    <div class="modal fade" id="hapusKeluar<?= $dp->id_keuangan; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Keuangan</h5>
                    <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
                </div>
                <div class="modal-body">
                    <form action="keuangan/hapus/<?= $dp->id_keuangan; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Yakin data keuangan <b><?= $dp->keterangan; ?></b> akan dihapus ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>


<div class="modal fade" id="importModal" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash3-fill "></i> Hapus Data Pengurus</h5>
                <span><i type="button" class="bi bi-x-square text-center fs-5" data-bs-dismiss="modal" aria-label="Close"></i></span>
            </div>
            <div class="modal-body">
                <form action="keuangan-import" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Unggah File Anda Seperti <a href="<?= base_url('assets/template/Import_Pengurus_Masjid.xlsx'); ?>">Template</a></label>
                        <input class="form-control" type="file" id="formFile" name="import_keuangan" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->include('bendahara/pemasukan/modal_detail'); ?>
<?= $this->include('bendahara/pengeluaran/modal_detail'); ?>


<?= $this->endSection() ?>