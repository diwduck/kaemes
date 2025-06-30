
<body id="page-top" class="hold-transition sidebar-mini sidebar-open layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebarToggle" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url('coe/admin/Dashboard') ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-primary">
            <!-- Brand Logo -->
            <div style="background-color: #007bff;">
                <a href="<?= site_url('coe/admin/Dashboard') ?>" class="brand-link elevation-4 navbar-primary">
                    <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                    <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                </a>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/foto_profil/default.png'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $nama; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item ">
                            <a href="<?= site_url('coe/admin/Dashboard') ?>" class="nav-link <?= active_menu('Dashboard') ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item treeview <?= open_menu('Kelas') ?>">
                            <a href="#" class="nav-link <?= active_menu('Kelas') ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>
                                    Buka Pelatihan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview <?= active_menu('Kelas') ?>">
                                <li class="nav-item">
                                    <a href="<?= site_url('coe/admin/Kelas') ?>" class="nav-link <?php if ($menu == "1") {
    echo active_menu('Kelas');
} ?>">
                                        <i class="fas fa-door-open nav-icon"></i>
                                        <p>BPSDMD</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('coe/admin/Kelas/buka_diklat_kabkota') ?>" class="nav-link <?php if ($menu == "2") {
    echo active_menu('Kelas');
} ?>">
                                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                        <p>Kab/Kota</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item treeview <?= ($menu == "5" || $menu == "6") ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= ($menu == "5" || $menu == "6") ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-server"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('coe/admin/Diklat') ?>" class="nav-link <?= ($menu == "5") ? 'active' : '' ?>">
                                        <i class="fas fa-door-open nav-icon"></i>
                                        <p>Pelatihan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('coe/dmin/Peserta') ?>" class="nav-link  <?= ($menu == "6") ? 'active' : '' ?>">
                                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                        <p>Peserta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= site_url('coe/admin/Materi') ?>" class="nav-link <?php if ($menu == "3") {
    echo active_menu('Materi');
} ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Tambah Materi</p>
                            </a>
                        </li>             
                        <!--           
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php //if ($menu == "4") {
    //echo active_menu('Kendala');
//} ?>">
                                <i class="nav-icon fas fa-compass"></i>
                                <p>Monitoring Kendala</p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link" style="background-color: red; color: white;">
                                <i class="nav-icon fas fa-sign-out-alt"></i> <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>