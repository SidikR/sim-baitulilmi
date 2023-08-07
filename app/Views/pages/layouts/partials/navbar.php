<header id="header" class="header fixed-top p-2" data-scrollto-offset="0">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-2">
                <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                    <img src="<?php echo base_url('assets/img/logobaimtp.png'); ?>" alt="">
                </a>
            </div>

            <div class="col-10">
                <nav id="navbar" class="navbar p-0 m-0 justify-content-end">
                    <ul>
                        <?php
                        function getactive($segmnt)
                        {
                            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                            $uri_segments = explode('/', $uri_path);
                            if ($uri_segments[1] == $segmnt) : {
                                    echo 'class="active"';
                                }
                            endif;
                        } ?>

                        <li class="nav-link p-0 m-0"><a <?php getactive('');
                                                        ?> href="<?= base_url(""); ?>">Home</a></li>

                        <li class="nav-link p-0 m-0"><a <?php getactive('guest-keuangan');
                                                        ?> class="scrollto" href="<?= base_url('guest-keuangan'); ?>">Laporan Keuangan</a></li>

                        <li class="nav-link p-0 m-0"><a <?php getactive('pengurus-guest');
                                                        ?> class="scrollto" href="<?= base_url('pengurus-guest'); ?>">Pengurus</a></li>
                        <?php if (in_groups('user')) : ?>
                            <li class="nav-link p-0 m-0"><a <?php getactive('peminjaman');
                                                            ?> class="scrollto" href="<?= base_url('peminjaman'); ?>">Peminjaman</a></li>
                        <?php elseif (in_groups('bendahara' || 'admin')) : ?>
                            <li class="nav-link p-0 m-0"><a <?php getactive('peminjaman');
                                                            ?> class="scrollto" href="<?= base_url('/peminjaman-admin'); ?>">Peminjaman</a></li>
                        <?php else : ?>
                            <li class="nav-link p-0 m-0"><a <?php getactive('login');
                                                            ?> class="scrollto" href="<?= base_url('/login'); ?>">Peminjaman</a></li>
                        <?php endif ?>

                        <li class="nav-item dropdown">
                            <a <?php getactive('kegiatan-guest') || getactive('post-guest');
                                ?> class="nav-link dropdown-toggle" href="#" id="postDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Post
                            </a>
                            <div class="user">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?= base_url('kegiatan-guest'); ?>"><i class="bi bi-calendar2-event-fill pe-2 color-primary"></i>Kegiatan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('post-guest'); ?>"><i class="bi bi-mailbox2 pe-2 color-primary"></i>Berita</a>
                                </div>
                        </li>

                        <li class="nav-link p-0 m-0"><a <?php getactive('about');
                                                        ?> href="<?= base_url('about'); ?>">Kontak</a></li>


                        <?php if (!logged_in()) : ?>
                            <li>
                                <a href="<?= base_url('login'); ?>">
                                    <button type="button" class="btn btn-login">
                                        Login
                                    </button>
                                </a>
                            </li>

                        <?php else : ?>
                            <div class="row d-flex justify-content-between flex-column d-block d-sm-none">
                                <li class="col">
                                    <a href="<?= base_url('login'); ?>">
                                        <button type="button" class="btn btn-login">
                                            Profil
                                        </button>
                                    </a>
                                </li>
                                <li class="col d-grid mx-auto p-4">
                                    <a href="<?= base_url('logout'); ?>" class="btn btn-danger d-flex align-items-center justify-content-center">
                                        Logout
                                    </a>
                                </li>
                            </div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item user dropdown form-select-arrow d-none d-lg-block">
                                <a class=" nav-link" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img class="img-profile rounded-circle" src=<?= base_url('assets/img/foto-user/' . user()->foto_user); ?>>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="user">
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        <?php if (in_groups('admin')) : ?>
                                            <a class="dropdown-item" href="<?= base_url('dashboard'); ?>">
                                                <i class="bi bi-speedometer2 pe-2 color-primary"></i>
                                                Dashboard
                                            </a>
                                        <?php elseif (in_groups('bendahara')) : ?>
                                            <a class="dropdown-item" href="<?= base_url('keuangan'); ?>">
                                                <i class="bi bi-speedometer2 pe-2 color-primary"></i>
                                                Dashboard
                                            </a>
                                        <?php elseif (in_groups('user')) : ?>
                                            <a class="dropdown-item" href="<?= base_url('akun'); ?>">
                                                <i class="bi bi-speedometer2 pe-2 color-primary"></i>
                                                Akun
                                            </a>
                                        <?php endif ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="bi bi-box-arrow-right pe-2 color-primary"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>
                    </ul>
                    <i class="bi bi-list mx-auto my-auto mobile-nav-toggle d-none"></i>
                </nav>
            </div>
        </div>
    </div>
</header>