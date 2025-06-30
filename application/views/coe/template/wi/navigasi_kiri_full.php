
<body id="page-top" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebarToggle" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('wi/DashboardWI') ?>" class="nav-link" title="Pilih Diklat">
                        <i class="fas fa-door-open"></i> <strong><?= $nama_diklat ?></strong>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link">
                        <img src="<?= base_url('./assets/foto_profil/' . $foto_peserta) ?>" height="30px"> <strong>Peserta : <?= $nama_peserta; ?></strong>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <div style="background-color: #007bff;">
                <?php if ($jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah'): ?>
                    <a href="<?= site_url('wi/dikpim/Dikpim') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($jenis_diklat == 'Diklat Fungsional'): ?>
                    <a href="<?= site_url('wi/dikfung/Dikfung') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($jenis_diklat == 'Diklat Teknis'): ?>
                    <a href="<?= site_url('wi/diknis/Diknis') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Prajabatan'): ?>
                    <a href="<?= site_url('Diktan') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php else : ?>
                    <a href="#" class="brand-link elevation-4 navbar-primary">
                        <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= $foto ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $nama; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item ">
                            <?php if ($jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah'): ?>
                                <a href="<?= site_url('wi/dikpim/Dikpim') ?>" class="nav-link <?= active_menu('Dikpim') ?>">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>Dashboard</p>
                                </a>
                            <?php elseif ($jenis_diklat == 'Diklat Fungsional'): ?>
                                <a href="<?= site_url('wi/dikfung/Dikfung') ?>" class="nav-link <?= active_menu('Dikfung') ?>">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>Dashboard</p>
                                </a>
                            <?php elseif ($jenis_diklat == 'Diklat Teknis'): ?>
                                <a href="<?= site_url('wi/diknis/Diknis') ?>" class="nav-link <?= active_menu('Diknis') ?>">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>Dashboard</p>
                                </a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('wi/dikpim/Diskusikel/'); ?>" class="nav-link <?= active_menu('Diskusikel') ?>">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Diskusi Kelompok</p>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="<?= site_url('wi/Materi/'); ?>" class="nav-link <?= active_menu('Materi') ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Materi <small>(untuk semua kelompok)</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                        <li class="nav-header">Pilih Peserta</li>
                        <?php
                        foreach ($listPeserta as $item) {
                            ?>
                            <form role="form" enctype="multipart/form-data" action="<?= site_url('wi/DashboardWI/lanjut1'); ?>" method="POST">
                                <li class="nav-item" >
                                    <input value="<?= $item['id_user']; ?>" name="id_user" type="hidden">
                                    <input value="<?= $item['jenis_diklat']; ?>" name="jenis_diklat" type="hidden">
                                    <button value="1" name="simpan" style="text-align: left;width: 100%;" class="nav-link" >
                                        <i class="nav-icon fas fa-user-tie"></i>
                                        <p> <?= $item['nama']; ?></p>
                                    </button>
                                </li>
                            </form>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>