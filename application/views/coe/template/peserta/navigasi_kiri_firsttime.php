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
                        <?php
                        // Jika yang login dikpim
                        if ($jenis_diklat == 'Pelatihan Kepemimpinan Nasional' || $jenis_diklat == 'Pelatihan Kepemimpinan Administrator' || $jenis_diklat == 'Pelatihan Kepemimpinan Pengawas' || $jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah') {
                            ?>
                            <li class="nav-item ">
                                <a href="<?= site_url('peserta/dikpim/Dikpim') ?>" class="nav-link <?= active_menu('Dikpim') ?>">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= site_url('peserta/dikpim/Diskusikel') ?>" class="nav-link <?= active_menu('Diskusikel') ?>">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>Diskusi Kelompok</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= site_url('peserta/Materi'); ?>" class="nav-link <?= active_menu('Materi') ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Materi</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <?php
                                // jika ada Juklak
                                if ($datajadwal['juklak'] != NULL) {
                                    ?>
                                    <a href="<?= site_url('peserta/Juklak/lihat_juklak/' . $datajadwal['juklak']); ?>" class="nav-link <?= active_menu('Juklak') ?>">
                                        <?php
                                    }
                                    //jika tidak ada Juklak
                                    elseif ($datajadwal['juklak'] == NULL) {
                                        ?>
                                        <a href="<?= site_url('peserta/Juklak'); ?>" class="nav-link <?= active_menu('Juklak') ?>">
                                            <?php
                                        }
                                        ?>
                                        <i class="nav-icon fas fa-solar-panel"></i>
                                        <p>Petunjuk Pelaksanaan</p>
                                    </a>
                            </li>
                            <li class="nav-item ">
                                <?php
                                // jika ada Jadwal
                                if ($datajadwal['jadwal'] != NULL) {
                                    ?>
                                    <a href="<?= site_url('peserta/Jadwal/lihat_jadwal/' . $datajadwal['jadwal']); ?>" class="nav-link <?= active_menu('Jadwal') ?>">
                                        <?php
                                    }
                                    //jika tidak ada jadwal
                                    elseif ($datajadwal['jadwal'] == NULL) {
                                        ?>
                                        <a href="<?= site_url('peserta/Jadwal'); ?>" class="nav-link <?= active_menu('Jadwal') ?>">
                                            <?php
                                        }
                                        ?>
                                        <i class="nav-icon fas fa-calendar-alt"></i>
                                        <p>Jadwal</p>
                                    </a>
                            </li>
                            <?php
                        }
                        ?>
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

        <!--show modal konfirmasi ======================================================================================================-->
        <div class="modal fade" id="modal-confirm-ganti-coach">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:red;">Konfirmasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body pad">
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Apakah Anda yakin ingin mengganti Coach?</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a href="<?= site_url('peserta/GantiCoach') ?>" class="btn btn-danger">Ya</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <?php if ($jenis_diklat == 'Pelatihan Kepemimpinan Nasional' OR $jenis_diklat == 'Pelatihan Kepemimpinan Administrator' OR $jenis_diklat == 'Pelatihan Kepemimpinan Pengawas'OR $jenis_diklat == 'Pelatihan Kepemimpinan Pemerintahan Daerah'): ?>
            <form role="form" enctype="multipart/form-data" action="<?= site_url('peserta/dikpim/Dikpim/diklat_baru/' . $NIP); ?>" method="POST">
            <?php elseif ($jenis_diklat == 'Diklat Fungsional'): ?>
                <form role="form" enctype="multipart/form-data" action="<?= site_url('peserta/diknis/Diknis/file_berkas/' . $NIP); ?>" method="POST">
                <?php elseif ($jenis_diklat == 'Diklat Teknis'): ?>
                    <form role="form" enctype="multipart/form-data" action="<?= site_url('peserta/dikfung/Dikfung/file_berkas/' . $NIP); ?>" method="POST">
                    <?php endif; ?>
                    <div class="modal fade" id="modal-konfirmasi">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color:red;">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body pad">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label>Selamat, Anda telah menyelesaikan semua tahapan pelatihan. Apakah Anda ingin memulai kembali Pelatihan lain?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button value="1" name="simpan" type="submit" type="button" class="btn btn-danger">Ya</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>