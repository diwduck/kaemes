
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
    <div class="preloader">
        <div class="loading">
            <img src="<?php echo base_url('assets/img/91.gif'); ?>" width="80">
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
<!--                <li class="nav-item d-none d-sm-inline-block">
                    <?php if ($this->session->userdata('jenis_diklat') == 'Diklat Kepemimpinan'): ?>
                        <a href="<?php echo site_url('peserta/dikpim/Dikpim') ?>" class="nav-link">Home</a>
                    <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Fungsional'): ?>
                        <a href="<?php echo site_url('Dikfung') ?>" class="nav-link">Home</a>
                    <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Teknis'): ?>
                        <a href="<?php echo site_url('Diknis') ?>" class="nav-link">Home</a>
                    <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Prajabatan'): ?>
                        <a href="<?php echo site_url('peserta/latsar/Latsar') ?>" class="nav-link">Home</a>
                    <?php else : ?>
                        <a href="<?php echo site_url('peserta/DashboardPeserta') ?>" class="nav-link">Home</a>
                    <?php endif; ?>
                </li>-->
                <?php if ($id_coach != NULL && $id_diklat != NULL) {
                    ?>
                    <!-- Nama Pelatihan yang diikuti peserta -->
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link"><i class="fas fa-door-open"></i> <?= $nama_diklat; ?></a>
                    </li>
                    <!-- Coach nya -->
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link"><i class="fas fa-chalkboard-teacher"></i> Coach : <?= $nama_coach; ?></a>
                    </li>
                <?php } ?>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <div style="background-color: #007bff;">
                <?php if ($this->session->userdata('jenis_diklat') == 'Diklat Kepemimpinan'): ?>
                    <a href="<?php echo site_url('peserta/dikpim/Dikpim') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Fungsional'): ?>
                    <a href="<?php echo site_url('Dikfung') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Teknis'): ?>
                    <a href="<?php echo site_url('Diknis') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Prajabatan'): ?>
                    <a href="<?php echo site_url('Diktan') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php else : ?>
                    <a href="<?php echo site_url('peserta/DashboardPeserta') ?>" class="brand-link elevation-4 navbar-primary">
                        <img src="<?php echo base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" class="brand-image img-circle elevation-2">
                        <span style="color:white;" class="brand-text font-weight-light">MCC BPSDMD</span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/foto_profil/') . $file_foto; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo site_url('peserta/Profil') ?>" class="d-block"><?= $nama_peserta; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if ($jenis_diklat == 'Diklat Kepemimpinan'): ?>
                            <li class="nav-item ">
                                <a href="<?php echo site_url('peserta/dikpim/Dikpim') ?>" class="nav-link <?php echo active_menu('Dikpim') ?>">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo site_url('peserta/Materi'); ?>" class="nav-link <?php echo active_menu('Materi') ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Materi</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <!-- jika ada Juklak -->
                                <?php
                                if ($datajadwal['juklak'] != NULL) {
                                    ?>
                                    <a href="<?php echo site_url('peserta/Juklak/lihat_juklak/' . $datajadwal['juklak']); ?>" class="nav-link <?php echo active_menu('Juklak') ?>">
                                    <?php } ?>
                                    <!-- jika tidak ada Juklak -->
                                    <?php
                                    if ($datajadwal['juklak'] == NULL) {
                                        ?>
                                        <a href="<?php echo site_url('peserta/Juklak'); ?>" class="nav-link <?php echo active_menu('Juklak') ?>">
                                        <?php } ?>
                                        <i class="nav-icon fas fa-solar-panel"></i>
                                        <p>Petunjuk Pelaksanaan</p>
                                    </a>
                            </li>
                            <li class="nav-item ">
                                <!-- jika ada Jadwal -->
                                <?php
                                if ($datajadwal['jadwal'] != NULL) {
                                    ?>
                                    <a href="<?php echo site_url('peserta/Jadwal/lihat_jadwal/' . $datajadwal['jadwal']); ?>" class="nav-link <?php echo active_menu('Jadwal') ?>">
                                    <?php } ?>
                                    <!-- jika tidak ada jadwal -->
                                    <?php
                                    if ($datajadwal['jadwal'] == NULL) {
                                        ?>
                                        <a href="<?php echo site_url('peserta/Jadwal'); ?>" class="nav-link <?php echo active_menu('Jadwal') ?>">
                                        <?php } ?>
                                        <i class="nav-icon fas fa-calendar-alt"></i>
                                        <p>Jadwal</p>
                                    </a>
                            </li>
                        <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Fungsional'): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>Diklat Fungsional</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                        <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Teknis'): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>Diklat Teknis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                        <?php elseif ($this->session->userdata('jenis_diklat') == 'Diklat Prajabatan'): ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url('peserta/latsar/Latsar') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Aktualisasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('peserta/latsar/Diskusi') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>Diskusi</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo site_url('peserta/Profil') ?>" class="nav-link <?php echo active_menu('Profil') ?>">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link" style="background-color: red; color: white;">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>
                        </li>

                    <?php
                        if ($latsar->status_judul_identifikasi == "2" AND $latsar->status_gagasan == "2" AND $latsar->status_ra == "2" AND $latsar->status_la == "2" AND $latsar->link_video != NULL) 
                        {
                            //==============================================Tombol ganti pelatihan======================================
                            ?>

                            <li class="nav-item" style="display: block;">
                                <hr style="border: solid 1px black;">
                            </li>

                            <li class="nav-item"  style="display: block;">
                                <button value="1" data-toggle="modal" data-target="#modal-konfirmasi" name="simpan" style="color:black; text-align: left;width: 100%;" class="btn btn-warning nav-link" >
                                    <i class="nav-icon fas fa-plus"></i>
                                    <p> Ikuti Pelatihan Lain</p>
                                </button>
                            </li>
                  <?php } ?>
                        
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?php
            if ($latsar->status_judul_identifikasi == "2" AND $latsar->status_gagasan == "2" AND $latsar->status_ra == "2" AND $latsar->status_la == "2" AND $latsar->link_video != NULL) 
            { ?>
                <!--============================================Modal DIALOG Ikuti Pelatihan lain===========================================-->
                <form role="form" enctype="multipart/form-data" action="<?= site_url('peserta/dikpim/Dikpim/diklat_baru/' . $NIP); ?>" method="POST">
                    <div class="modal fade" id="modal-konfirmasi">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color:red;"><b>Konfirmasi</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body pad">
                                    <div class="mb-4">
                                        <div class="form-group">
                                            <h4 style="text-align: center; color: green;"><b><i class="nav-icon fas fa-check-circle"></i> Selamat</b></h4>
                                            <label>Anda telah menyelesaikan semua tahapan pelatihan. Apakah Anda ingin memulai Pelatihan Baru lainnya?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button value="1" name="simpan" type="submit" type="button" class="btn btn-success">
                                        <i class="nav-icon fas fa-check"></i> Ya
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>
      <?php } ?>