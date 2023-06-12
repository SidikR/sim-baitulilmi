<header id="header" class="header fixed-top p-2" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="<?php echo base_url('assets/img/logobaimtp.png'); ?>" alt="">
            <!-- <h1>Masjid Baitul Ilmi ITERA<span>.</span></h1> -->
        </a>

        <nav id="navbar" class="navbar">
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

                <li class="nav-link"><a <?php getactive('');
                                        ?> href="/">Home</a></li>
                <li><a <?php getactive('about');
                        ?> href="<?= base_url('about'); ?>">About</a></li>
                <li><a <?php getactive('guest-keuangan');
                        ?> href="<?= base_url('guest-keuangan'); ?>">Transparansi Keuangan</a></li>
                <li><a <?php getactive('peminjaman');
                        ?> href="<?= base_url('peminjaman'); ?>">Peminjaman</a></li>
                <?php if (!logged_in()) : ?>
                    <li>
                        <a href="<?= base_url('login'); ?>">
                            <button type="button" class="btn btn-login">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"></path>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                                    </svg> -->
                                Login
                            </button>
                        </a>

                    </li>

                <?php else : ?>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item user dropdown form-select-arrow">
                        <a class="nav-link" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img class="img-profile rounded-circle" src=<?= base_url('assets/img/foto-user/' . user()->foto_user); ?>>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="user">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <?php if (in_groups('admin')) : ?>
                                    <a class="dropdown-item" href="<?= base_url('dashboard'); ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Dashboard
                                    </a>
                                <?php elseif (in_groups('bendahara')) : ?>
                                    <a class="dropdown-item" href="<?= base_url('keuangan'); ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Dashboard
                                    </a>
                                <?php elseif (in_groups('user')) : ?>
                                    <a class="dropdown-item" href="<?= base_url('akun'); ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Akun
                                    </a>
                                <?php endif ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav>
    </div>
</header>