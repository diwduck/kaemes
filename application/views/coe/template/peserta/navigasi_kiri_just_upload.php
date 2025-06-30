<body id="page-top" class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/img/91.gif'); ?>" width="80">
        </div>
    </div>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebarToggle" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <?php
                // Jika Peserta sudah menentukan pelatihan dan coach
                if ($id_coach != NULL && $id_diklat != NULL) {
                    ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link"><i class="fas fa-door-open"></i> Diklat : <?= $nama_diklat; ?></a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-chalkboard-teacher"></i> Coach : <?= $nama_coach ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <div style="background-color: #007bff;">
                <?php
                $session_jenis_diklat = $this->session->userdata('jenis_diklat');
                // Jika jenis pelatihan adalah PKN, PKA, PKP atau Pim Pemda
                if ($session_jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $session_jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah') {
                    $link_home = site_url('peserta/dikpim/Dikpim');
                }
                // Jika jenis pelatihan adalah fungsional
                elseif ($session_jenis_diklat == 'Diklat Fungsional') {
                    $link_home = site_url('peserta/dikpim/Dikfung');
                }
                // Jika jenis pelatihan adalah teknis
                elseif ($session_jenis_diklat == 'Diklat Teknis') {
                    $link_home = site_url('peserta/dikpim/Diknis');
                }
                // Jika jenis pelatihan adalah prajabatan / latsar
                elseif ($session_jenis_diklat == 'Diklat Prajabatan') {
                    $link_home = site_url('Diktan');
                }
                // Jika jenis pelatihan adalah ?
                else {
                    $link_home = site_url('peserta/DashboardPeserta');
                }
                ?>
                <a href="<?= $link_home ?>" class="brand-link elevation-4 navbar-primary">
                    <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                    <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                </a>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/foto_profil/') . $file_foto; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('peserta/Profil') ?>" class="d-block"><?= $nama_peserta; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link" style="background-color: red; color: white;">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>