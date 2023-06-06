<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <?php if (isset($validation)) { ?>
                        <div class="col-md-12">
                            <?php foreach ($validation->getErrors() as $error) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="mdi mdi-alert-outline me-2"></i>
                                    <?= esc($error) ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php } ?>
                    <form action="<?= base_url(); ?>/users/setPassword" method="post">
                        <input type="hidden" name="id" class="id" value="<?= $id; ?>">
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection() ?>