
<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color:rgba(0, 0, 0, 0.5);
    }
    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<body id="page-top" class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <!--<div class="preloader">
        <div class="loading">
            <img src="<?php echo base_url('assets/img/91.gif'); ?>" width="80">
        </div>
    </div>-->
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
<!--                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><i class="fas fa-door-open"></i> <strong>Diklat : <?= $nama_diklat; ?></strong></a>
                </li>                -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link">
                        <img src="<?= base_url('./assets/foto_profil/'.$foto_peserta) ?>" height="30px"> <strong>Peserta : <?= $nama_peserta; ?></strong>
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
                <a href="<?php echo site_url('admin/Dashboard') ?>" class="brand-link elevation-4 navbar-primary">
                    <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                    <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                </a>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/') . $foto; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $nama; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item ">
                            <a href="<?php echo site_url('wi/DashboardWI') ?>" class="nav-link <?php echo active_menu('Dikpim') ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo site_url('wi/latsar/Latsar') ?>" class="nav-link <?php echo active_menu('Dikpim') ?>">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Aktualisasi</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo site_url('wi/latsar/Diskusi') ?>" class="nav-link <?php echo active_menu('Dikpim') ?>">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Diskusi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link" style="background-color: red; color: white;">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                        <hr style="border: solid 1px black; width: 100%;">
                        <?php
                        foreach ($listPeserta as $item) {
                            ?>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('wi/DashboardWI/lanjut1'); ?>" method="POST">
                                <li class="nav-item" >
                                    <input hidden value="<?php echo $item['id_user']; ?>" name="id_user" type="text" class="form-control" id="is_user" readonly>
                                    <input hidden value="<?php echo $item['jenis_diklat']; ?>" name="jenis_diklat" type="text" class="form-control" id="jenis_diklat" readonly>
                                    <button value="1" name="simpan" style="text-align: left;width: 100%;" class="nav-link" >
                                        <i class="nav-icon fas fa-user-tie"></i> <p> </p> <p><?php echo $item['nama']; ?></p></button>
                                </li>
                            </form>
                        <?php } ?>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>