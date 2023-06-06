<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div class="text-center">
    <div class="error mx-auto" data-text="403">403</div>
    <p class="lead text-gray-800 mb-5">Akses tidak diijinkan</p>
    <a href="<?= base_url() ?>">&larr; Kembali ke Halama Utama</a>
</div>
<?= $this->endSection() ?>