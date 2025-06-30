<body class="hold-transition" style="background-image: url(<?php echo base_url('assets/img/background.png'); ?>); background-repeat: repeat; background-position: center;">

    <div class="container-fluid">
        <div class="row" style="padding: 20px;">
            <div class="col-md-3">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2" style="box-shadow: 0px 0px 10px 2px grey;">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= base_url('assets/img/default_kosong.png'); ?>" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h5 class="widget-user-desc" style="margin-top: 20px;"><?php echo htmlspecialchars($detail_proper[0]['nama']); ?></h5>
                    </div>
                    <div class="card-footer p-0" style="background-color: white;">
                        <table class="table table-responsive">
                            <tr>
                                <td>Nama Pelatihan</td>
                                <td>:</td>
                                <td><?php echo htmlspecialchars($detail_proper[0]['nama_pelatihan']); ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><?php echo htmlspecialchars($detail_proper[0]['jabatan']); ?></td>
                            </tr>
                            <tr>
                                <td>OPD</td>
                                <td>:</td>
                                <td><?php echo htmlspecialchars($detail_proper[0]['opd']); ?></td>
                            </tr>
                            <tr>
                                <td>Pemda</td>
                                <td>:</td>
                                <td><?php echo htmlspecialchars($detail_proper[0]['pemda']); ?></td>
                            </tr>
                        </table>

                        <hr style="border: solid 1px lightgray; margin-bottom: unset;">

                        <div class="row">
                            <div class="col-md-12" style="text-align: center; padding: 20px;">
                                <?php
                                    if ($detail_proper[0]['penyelenggara'] == "internal") 
                                    { ?>
                                        <div class="alert alert-success" style="margin-bottom: unset;" role="alert">
                                            <h5 style="margin-bottom: unset;"><i class="fas fa-info-circle"></i> <b>Informasi</b></h5>
                                            <hr style="border: solid 1px lightgray; margin-bottom: unset;">
                                            File tersedia dalam bentuk <b>Hardcopy</b> di <b>Perpustakaan BPSDMD Provinsi Jawa Tengah</b>
                                        </div>
                              <?php }
                                    else
                                    { ?>
                                        <div class="alert alert-success" style="margin-bottom: unset;" role="alert">
                                            <h5 style="margin-bottom: unset;"><i class="fas fa-info-circle"></i> <b>Informasi</b></h5>
                                            <hr style="border: solid 1px lightgray; margin-bottom: unset;">
                                            File tersedia di <b>Pemda asal penyelenggaraan pelatihan</b>
                                        </div>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="col-md-9">
                <!-- Box Comment -->
                <div class="card card-widget" style="box-shadow: 0px 0px 10px 2px grey;">
                    <div class="card-header" style="background-color: gold;">
                        <h4 style="text-align: center;">
                            <b><?php
                                echo htmlspecialchars($detail_proper[0]['judul']);
                                ?></b>
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo site_url('Publish'); ?>">
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <b><i class="fas fa-arrow-left"></i> Kembali</b>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- post text -->
                        <div class="row" style="padding: 30px;">
                            <div class="col-md-12" style="text-align: center;"><h3><b><u>Latar Belakang</u></b></h3></div>
                            <div class="col-md-12" style="text-align: justify; margin-top: 30px;">
                                <?php
                                echo $detail_proper[0]['latarbelakang'];
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer card-comments">
                        <p style="text-align: center; color: black;">&copy; Copyrights 2020 by BPSDMD Provinsi Jawa Tengah</p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
