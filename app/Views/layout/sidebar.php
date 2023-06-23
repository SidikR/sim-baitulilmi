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
            <hr class="sidebar-divider my-0 color-primary">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
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
                        <a class="collapse-item" href="<?= base_url('post'); ?>">Post</a>
                        <a class="collapse-item" href="<?= base_url('program'); ?>">Program</a>
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

            <div class="sidebar-heading">
                Kelola User
            </div>


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