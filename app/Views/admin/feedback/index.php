<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="bi bi-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <table id="admin_feedback" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengirim</th>
                                <th>Subject</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_feedback as $df) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $df->nama; ?></td>
                                    <td><?= $df->subject; ?></td>
                                    <td><?= $df->email; ?></td>
                                    <td><?= $df->no_telepon; ?></td>
                                    <td><?= $df->feedback; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection() ?>