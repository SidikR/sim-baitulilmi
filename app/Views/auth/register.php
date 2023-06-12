<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="<?= base_url('auth/css/style.css'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
</head>

<body>
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-6">
                    <div class="card rounded-5 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center p-2 pb-5">
                                        <img src="<?= base_url('assets/img/logobaimtp.png'); ?>" style="width: 20%;" alt="logo">
                                        <!-- <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4> -->
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= url_to('register') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <p>Silakan Isi Data-Data Dibawah Ini</p>

                                        <div class="form-floating mb-3">

                                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" id="floatingInput" placeholder=<?= lang('Auth.email') ?> value="<?= old('email') ?>">

                                            <label for="floatingInput"><?= lang('Auth.email') ?></label>

                                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="floatingInput" placeholder=<?= lang('Auth.username') ?> value="<?= old('username') ?>">

                                            <label for="floatingInput"><?= lang('Auth.username') ?></label>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating mb-4">
                                                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingPassword" placeholder=<?= lang('Auth.password') ?> autocomplete="off">

                                                    <label for="floatingPassword"><?= lang('Auth.password') ?></label>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-4">
                                                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="floatingPassword" placeholder=<?= lang('Auth.repeatPassword') ?> autocomplete="off">

                                                    <label for="floatingRepeatPassword"><?= lang('Auth.repeatPassword') ?></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1 d-grid">
                                            <button class="btn btn-login btn-block fa-lg mb-3" type="submit"><?= lang('Auth.register') ?></button>
                                        </div>

                                    </form>


                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Sudah Punya Akun?</p>
                                        <a href="<?= url_to('login') ?>" class="btn btn-outline-danger">Create New</a>
                                    </div>

                                    <div class="pb-4 d-grid">
                                        <a href="<?= basename('home'); ?>" class="btn btn-outline-success" type="button">Back To Home</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>