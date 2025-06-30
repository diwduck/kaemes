<?php
foreach ($dataKelas as $item) {
    $nama_diklat = $item->nama_diklat;
    $jenis_diklat = $item->jenis_diklat;
    $id_diklat = $item->id_diklat;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $nama_diklat ?></h1>                 
                </div><!-- /.col -->                     
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Diklat') ?>">Master Pelatihan</a></li>
                        <li class="breadcrumb-item active">Daftar Coach dan Peserta</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-external-link-alt"></i>
                                Daftar Coach dan Peserta

                                <!--To store temporary id pelatihan-->
                                <input id="id_pelatihan" hidden readonly type="tex" value="<?php echo htmlspecialchars($id_pelatihan); ?>">
                            </h3>
                        </div>

                        <?php
                        if ($this->session->flashdata('msg_berhasil') != '') {
                            ?>
                            <h5> <?= $this->session->flashdata('msg_berhasil'); ?></h5>
                            <?php
                        } elseif ($this->session->flashdata('msg_berhasil_upload') != '') {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> <?= $this->session->flashdata('msg_berhasil_upload'); ?></h5>
                            </div>
                        <?php } ?>

                        <!-- form start -->
                        <div class="card-body">
                            <!--create tabel for show data peserta based on id pelatihan-->
                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">No.</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Nama Peserta</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Coach</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">File RA</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">File Proper</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Last Active</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center; width:100px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;

                                        foreach ($listPeserta as $item) {
                                            $no++;
                                            ?>

                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?php echo $no; ?></td>

                                                <td style="vertical-align: middle;">
                                                    <?php
                                                    echo htmlspecialchars($item['nama']);
                                                    echo "<br>";
                                                    echo "NIP. " . htmlspecialchars($item['NIP']);
                                                    ?>
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <?php
                                                    echo htmlspecialchars($item['nama_coach']);
                                                    echo "<br>";
                                                    echo "NIP. " . htmlspecialchars($item['id_coach']);
                                                    ?>

                                                </td>

                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php
                                                    if ($item['file_ra'] == NULL) {
                                                        echo "-";
                                                    } else {
                                                        ?>
                                                        <a href="<?php echo base_url('assets/inovasi/ra/' . htmlspecialchars($item['file_ra'])); ?>" target=blank_>
                                                            <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-cloud-download"></i> <b style="color: white;">Lihat File RA</b>
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php
                                                    if ($item['file_proper'] == NULL) {
                                                        echo "-";
                                                    } else {
                                                        ?>
                                                        <a href="<?php echo base_url('assets/inovasi/la/' . htmlspecialchars($item['file_proper'])); ?>" target=blank_>
                                                            <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-cloud-download"></i> <b style="color: white;">Lihat File Inovasi</b>
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php echo htmlspecialchars(date_format(date_create($item['timestamp']), "d-m-Y | H:i")); ?>
                                                </td>

                                                <td style="text-align: center; vertical-align: middle;">
                                                    <!--Tombol lihat detail data peserta-->
                                                    <a href="javascript: void(0)" onclick="show_detail(<?php echo htmlspecialchars($item['id_diklat']); ?>, '<?php echo htmlspecialchars($item['NIP']); ?>')" data-toggle="modal" data-target="#show-detail-peserta" title="Lihat detail" class="btn btn-xs btn-primary">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--=============================================================================================================================================-->

<!-- modal untuk view detail Peserta -->
<div class="modal fade" id="show-detail-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Peserta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3" id="profilfoto"></div>
                    <div class="col-md-9">
                        <table class="table table-sm table-hover">
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td id="profilnama"></td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td id="profilnip"></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>:</td>
                                <td id="profiltelp"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td id="profilemail"></td>
                            </tr>
                            <tr>
                                <th>Pangkat</th>
                                <td>:</td>
                                <td id="profilpangkat"></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>:</td>
                                <td id="profiljabatan"></td>
                            </tr>
                            <tr>
                                <th>OPD</th>
                                <td>:</td>
                                <td id="profilopd"></td>
                            </tr>
                            <tr>
                                <th>Pemda</th>
                                <td>:</td>
                                <td id="profilpemda"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Pelatihan yang diikuti</label>
                        <p id="profilpelatihan"></p>
                        <label>Coach</label>
                        <p id="profilcoach"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><b>Progres PROPER</b></a>
                                    </li>
                                    <!--<li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"><b>Riwayat Konseling</b></a>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Konseling</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <input name="NIP" hidden type="text" id="konseling_nip" value="" class="form-control" readonly>

                                            <div class="card-body">
                                                <?=
                                                validation_errors('
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                                        '</div>'
                                                );
                                                ?>

                                                <?= $this->session->flashdata('message') ?>
                                                <div class="box-body table-responsive">
                                                    <table id="datatable1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="color:#007bff;text-align: center;">#</th>
                                                                <th style="color:#007bff;text-align: center;">Topik</th>
                                                                <th style="color:#007bff;text-align: center;">Isi</th>
                                                                <th style="color:#007bff;text-align: center;">Tanggal</th>
                                                                <th style="color:#007bff;text-align: center;">Status</th>
                                                                <th style="color:#007bff;text-align: center;">Tanggapan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>1.</td>
                                                                <td><b>Latar Belakang</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Latar Belakang" data-toggle="modal" data-target="#modal-latarbelakang-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_tgllatarbelakang"></td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_statuslatarbelakang"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-latarbelakang-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>2.</td>
                                                                <td><b>Judul</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Judul" data-toggle="modal" data-target="#modal-judul-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_tgljudul"></td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_statusjudul"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-judul-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>3.</td>
                                                                <td><b>Manfaat</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Manfaat" data-toggle="modal" data-target="#modal-manfaat-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_tglmanfaat"></td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_statusmanfaat"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-manfaat-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>4.</td>
                                                                <td><b>Milestone</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Milestone" data-toggle="modal" data-target="#modal-milestone-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_tglmilestone"></td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_statusmilestone"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-milestone-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>5.</td>
                                                                <td><b>File RA</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" target="_blank" id="konseling_file_ra" title="Lihat File Rancangan Akhir">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_tgl_file_ra"></td>
                                                                <td style="text-align: center; vertical-align: middle;" id="konseling_status_ra"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-ra">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>6.</td>
                                                                <td><b>File LAP</b></td>
                                                                <td style="text-align: center;">
                                                                    <a id="konseling_file_la" target="_blank" title="Lihat File Laporan Aksi Perubahan">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center; vertical-align: middle;" rowspan="2" id="konseling_tgl_file_la"></td>
                                                                <td rowspan="2" style="text-align: center; vertical-align: middle;" id="konseling_status_la"></td>
                                                                <td rowspan="2" style="text-align: center; vertical-align: middle;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-uraian-la">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>7.</td>
                                                                <td><b>Abstraksi</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Abstraksi" data-toggle="modal" data-target="#modal-abstrak-peserta">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                       Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                    </div>-->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!--Modal to view content judul-->
<div class="modal fade" id="modal-judul-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="<?php echo site_url('admin/Diklat/update_judul_peserta/'); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Judul</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pad">
                    <div class="mb-3">
                        <textarea rows="10" name="ubah_judul" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_judul"></div></textarea>
                        <input id="ubahjudulnip" type="text" name="nip_ubah_judul" value="" readonly hidden>
                        <input type="text" name="id_diklat_ubah_judul" value="<?= htmlspecialchars($id_diklat); ?>" readonly hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button value="1" name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan uraian judul-->
<div class="modal fade" id="modal-uraian-judul-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraianjudul"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content latar belakang-->
<div class="modal fade" id="modal-latarbelakang-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Latar Belakang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_latarbelakang"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan latar belakang-->
<div class="modal fade" id="modal-uraian-latarbelakang-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraianlatarbelakang"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content manfaat-->
<div class="modal fade" id="modal-manfaat-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manfaat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_manfaat"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan manfaat-->
<div class="modal fade" id="modal-uraian-manfaat-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraianmanfaat"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content milestone-->
<div class="modal fade" id="modal-milestone-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Milestone</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_milestone"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan milestone-->
<div class="modal fade" id="modal-uraian-milestone-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraianmilestone"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan file Rancangan Akhir-->
<div class="modal fade" id="modal-uraian-ra">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraian_ra"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan file Laporan Akhir  Perubahan-->
<div class="modal fade" id="modal-uraian-la">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanggapan Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="mb-3">
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_uraian_la"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content abstraksi-->
<div class="modal fade" id="modal-abstrak-peserta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="<?php echo site_url('admin/Diklat/update_abstrak_peserta/'); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Abstraksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pad">
                    <div class="mb-3">
                        <textarea rows="10" name="abstraksi" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="konseling_abstraksi"></div></textarea>
                        <input id="ubahabstraknip" type="text" name="nip_ubah_abstrak" value="" readonly hidden>
                        <input type="text" name="id_diklat_ubah_abstrak" value="<?= htmlspecialchars($id_diklat); ?>" readonly hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button value="1" name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--====================================================================================================================================-->

<script type="text/javascript">

    //fungsi untuk menampilkan modal detail peserta
    function show_detail(id_diklat, nip)
    {
        $('#modal-edit-isu').modal('show'); //buka modal tambah sub PKP

        $.ajax({
            url: '../get_data_peserta',
            type: 'POST',
            data: 'id_diklat=' + id_diklat + '&nip=' + nip,
            success: function (respData) {
                var cData = respData.data_peserta[0];
                var ctr;

                $('#profilfoto').html('<img src="<?= base_url('assets/foto_profil/') ?>' + cData.file_foto + '" width="140px">');
                $('#profilnama').html(cData.nama);
                $('#profilnip').html(cData.nip);
                $('#profiltelp').html(cData.telepon);
                $('#profilemail').html(cData.email);
                $('#profilpangkat').html(cData.pangkat);
                $('#profiljabatan').html(cData.jabatan);
                $('#profilopd').html(cData.skpd);
                $('#profilpemda').html(cData.pemda);
                $('#profilpelatihan').html(cData.nama_diklat);
                $('#profilcoach').html(cData.nama_coach);

                $('#id_diklat_ganti_coach').val(cData.id_diklat);
                $('#jenis_diklat_ganti_coach').val(cData.jenis_diklat);
                $('#nama_diklat_ganti_coach').val(cData.nama_diklat);
                $('#nip_ganti_coach').val(cData.nip);

                //section konseling judul
                $('#konseling_nip').val(cData.nip);
                $('#konseling_judul').html(cData.judul);
                $('#konseling_tgljudul').html(cData.tgl_judul);
                $('#konseling_statusjudul').html(cData.status_judul);
                $('#konseling_uraianjudul').html(cData.uraian_judul);
                $('#ubahjudulnip').val(cData.nip);

                //section konseling latar belakang
                $('#konseling_latarbelakang').html(cData.latar);
                $('#konseling_tgllatarbelakang').html(cData.tgl_latar);
                $('#konseling_statuslatarbelakang').html(cData.status_latar);
                $('#konseling_uraianlatarbelakang').html(cData.uraian_latar);

                //section konseling manfaat
                $('#konseling_manfaat').html(cData.manfaat);
                $('#konseling_tglmanfaat').html(cData.tgl_manfaat);
                $('#konseling_statusmanfaat').html(cData.status_manfaat);
                $('#konseling_uraianmanfaat').html(cData.uraian_manfaat);

                //section konseling milestone
                $('#konseling_milestone').html(cData.milestone);
                $('#konseling_tglmilestone').html(cData.tgl_milestone);
                $('#konseling_statusmilestone').html(cData.status_milestone);
                $('#konseling_uraianmilestone').html(cData.uraian_milestone);
                $('#konseling_aksimilestone').html(cData.aksi_milestone);

                //section konseling Rancangan Akhir
                $('#konseling_file_ra').attr("href", "../../../../assets/inovasi/ra/" + cData.file_ra);
                $('#konseling_tgl_file_ra').html(cData.tgl_file_ra);
                $('#konseling_status_ra').html(cData.status_file_ra);
                $('#konseling_uraian_ra').html(cData.uraian_file_ra);

                //section konseling Laporan Akhir
                $('#konseling_file_la').attr("href", "../../../../assets/inovasi/la/" + cData.file_proper);
                $('#konseling_tgl_file_la').html(cData.tgl_file_la);
                $('#konseling_status_la').html(cData.status_file_la);
                $('#konseling_uraian_la').html(cData.uraian_la_abstrak);
                $('#konseling_abstraksi').html(cData.abstrak);
                $('#ubahabstraknip').val(cData.nip);
            }
        });
    }

</script>