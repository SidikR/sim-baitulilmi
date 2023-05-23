<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0"><img src=" ?>" alt="" class="img-fluid"></a> -->
        <!-- <h1 class="logo me-auto"><a href="index.html">Baitul Ilmi ITERA</a></h1> -->

        <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="<?php echo base_url('assets/img/logobaimtp.png'); ?>" alt="">
            <!-- <h1>Masjid Baitul Ilmi ITERA<span>.</span></h1> -->
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('about'); ?>">About</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('guest-keuangan'); ?>">Transparansi Keuangan</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('peminjaman'); ?>">Peminjaman</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('dashboard'); ?>">Admin</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('keuangan'); ?>">Keuangan</a></li>
                <?php if (!logged_in()) : ?>
                    <a href="<?= base_url('login'); ?>">
                        <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"></path>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                            </svg>
                            Login
                        </button>
                    </a>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('akun'); ?>">Akun</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
                        </ul>
                    </li>


                <?php endif ?>

            </ul>
            <!-- <li><a class="nav-link   scrollto" href="/datatables">Data Tables</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>