        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-img">
                    <img src="<?= base_url('assets-admin/img/logobaimtp.png'); ?>" alt="Logo Baim">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <!-- <div class="sidebar-brand-text me-auto ms-auto"> SIM-BAIM</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ManajemenData" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen Data</span>
                </a>
                <div id="ManajemenData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data :</h6>
                        <a class="collapse-item pengurus" href="<?= base_url('pengurus'); ?>">Pengurus</a>
                        <a class="collapse-item" href="<?= base_url('petugas-jumat'); ?>">Petugas Jum'at</a>
                        <a class="collapse-item" href="<?= base_url('inventaris'); ?>">Inventaris</a>
                        <a class="collapse-item" href="<?= base_url('kegiatan'); ?>">Kegiatan</a>
                        <a class="collapse-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Peminjaman
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#KelolaPeminjaman" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Peminjaman</span>
                </a>
                <div id="KelolaPeminjaman" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data Peminjaman :</h6>
                        <a class="collapse-item" href="<?= base_url('list-peminjaman'); ?>">Peminjaman Inventaris</a>
                        <a class="collapse-item" href="<?= base_url('peminjaman-masjid'); ?>">Peminjaman Masjid</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola User
            </div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white small">Selamat Datang, <b><?= user()->nama_lengkap; ?></b> <?php if (in_groups('1')) {
                                                                                                                                    echo "As Admin";
                                                                                                                                } elseif (in_groups('2')) {
                                                                                                                                    echo "As Bendahara";
                                                                                                                                } else {
                                                                                                                                    echo "As User";
                                                                                                                                } ?></span>
                    <img class="img-profile rounded-circle" src=<?= base_url('assets/img/foto-user/' . user()->foto_user); ?>>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu  shadow " aria-labelledby="userDropdown1">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#KelolaUsers" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola User</span>
                </a>
                <div id="KelolaUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola User :</h6>
                        <a class="collapse-item" href="<?= base_url('users/index'); ?>">Data Users</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>