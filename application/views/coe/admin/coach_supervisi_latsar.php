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
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Diklat') ?>">Master Pelatihan</a></li>
                        <li class="breadcrumb-item active"><?= $nama_diklat ?></li>
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
                                            <th style="color:#007bff;font-size:1em; text-align:center;">File LA</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Last Active</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center; width:130px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;

                                        foreach ($listPeserta as $item) 
                                        {
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
                                                    if ($item['upload_file_ra'] == NULL) 
                                                    {
                                                        echo "-";
                                                    } 
                                                    else 
                                                    { ?>
                                                        <a href="<?php echo base_url('assets/latsar/aktualisasi/ra/' . htmlspecialchars($item['upload_file_ra'])); ?>" target=blank_>
                                                            <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-cloud-download"></i> <b style="color: white;">Lihat File RA</b>
                                                        </a>
                                              <?php } ?>
                                                </td>

                                                <td style="text-align: center; vertical-align: middle;">
                                                <?php
                                                    if ($item['upload_file_la'] == NULL) 
                                                    {
                                                        echo "-";
                                                    } 
                                                    else 
                                                    { ?>
                                                        <a href="<?php echo base_url('assets/latsar/aktualisasi/la/' . htmlspecialchars($item['upload_file_la'])); ?>" target=blank_>
                                                            <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-cloud-download"></i> <b style="color: white;">Lihat File LA</b>
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

<!--=======================================================================================================================================-->

<!-- modal untuk view detail Peserta ======================================================================================================-->
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
                                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><b>Progres Aktualisasi</b></a>
                                    </li>
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
                                                                <th style="color:#007bff;text-align: center;">Tanggal Pengajuan</th>
                                                                <th style="color:#007bff;text-align: center;">Tanggal Disetujui</th>
                                                                <th style="color:#007bff;text-align: center;">Status</th>
                                                                <th style="color:#007bff;text-align: center;">Tanggapan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td><b>Judul & Identifikasi Isu</b></td>
                                                                <td style="text-align: center;">
                                                                    <button id="set_judul_identifikasi" type="button" class="btn btn-primary btn-sm">
                                                                        Lihat
                                                                    </button>
                                                                </td>
                                                                <td style="text-align: center;" id="tanggal_pengajuan_judul"></td>
                                                                <td style="text-align: center;" id="tanggal_validasi_judul_isu"></td>
                                                                <td style="text-align: center;" id="status_judul_identifikasi"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-tanggapan-judul-isu">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>2.</td>
                                                                <td><b>Gagasan Penyelesaian Isu</b></td>
                                                                <td style="text-align: center;" id="set_gagasan"></td>
                                                                <td style="text-align: center;" id="tgl_pengajuan_gagasan"></td>
                                                                <td style="text-align: center;" id="tgl_validasi_gagasan"></td>
                                                                <td style="text-align: center;" id="status_gagasan"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-tanggapan-gagasan">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>3.</td>
                                                                <td><b>Rancangan Aktualisasi</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" target="_blank" id="file_ra" title="Lihat File Rancangan Aktualisasi">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center;" id="tgl_pengajuan_ra"></td>
                                                                <td style="text-align: center;" id="tgl_validasi_ra"></td>
                                                                <td style="text-align: center;" id="status_ra"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-tanggapan-ra">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>4.</td>
                                                                <td><b>Laporan Aktualisasi</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" target="_blank" id="file_la" title="Lihat File Laporan Aktualisasi">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center;" id="tgl_pengajuan_la"></td>
                                                                <td style="text-align: center;" id="tgl_validasi_la"></td>
                                                                <td style="text-align: center;" id="status_la"></td>
                                                                <td style="text-align: center;">
                                                                    <a href="#" title="Lihat Tanggapan Coach" data-toggle="modal" data-target="#modal-tanggapan-la">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>5.</td>
                                                                <td><b>Link Video</b></td>
                                                                <td style="text-align: center;">
                                                                    <a href="" id="link_video" target="_blank" title="Lihat Video">
                                                                        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: center;">-</td>
                                                                <td style="text-align: center;">-</td>
                                                                <td style="text-align: center;">-</td>
                                                                <td style="text-align: center;">-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>

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

<!--Modal to view content content judul dan identifikasi isu ============================================================================-->
<div class="modal fade" id="modal-judul-isu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Judul & Identifikasi Isu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body pad">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Judul Aktualisasi</b></h3>
                    </div>
                    <div class="card-body">
                        <textarea id="judul_identifikasi" readonly class="form-control" name="judul" rows="3" required></textarea>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title"><b>Identifikasi Isu</b></h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 30px;">No.</th>
                                            <th style="text-align: center;">Isu</th>
                                            <th style="text-align: center;">Sumber Isu</th>
                                            <th style="text-align: center;">Core Isu</th>
                                            <th style="text-align: center;">Timestamp</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_identifikasi_isu">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan uraian judul dan identifikasi isu ===================================================================-->
<div class="modal fade" id="modal-tanggapan-judul-isu">
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
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="alasan_status_judul_identifikasi"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan uraian Gagasan penyelesaian isu =======================================================================-->
<div class="modal fade" id="modal-tanggapan-gagasan">
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
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="alasan_status_gagasan"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan uraian RA ===========================================================================================-->
<div class="modal fade" id="modal-tanggapan-ra">
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
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="alasan_ra"></div></textarea>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Modal to view content tanggapan uraian LA ==========================================================================================-->
<div class="modal fade" id="modal-tanggapan-la">
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
                    <textarea rows="10" readonly class="textareaajuan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><div id="alasan_status_la"></div></textarea>
                </div>
            </div>
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
            url: '../get_data_peserta_latsar',
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

                //section konseling judul dan identfikasi
                $('#set_judul_identifikasi').attr("onclick", "show_judul_identifikasi_isu(" + cData.id_aktualisasi + ")");
                $('#judul_identifikasi').val(cData.judul);
                $('#tanggal_pengajuan_judul').html(cData.tanggal_pengajuan_judul);
                $('#tanggal_validasi_judul_isu').html(cData.tanggal_validasi_judul_isu);
                $('#status_judul_identifikasi').html(cData.status_judul_identifikasi);
                //jika alasannya NULL
                if (cData.alasan_status_judul_identifikasi == null)
                {
                    $('#alasan_status_judul_identifikasi').html("-");
                } else
                {
                    $('#alasan_status_judul_identifikasi').html(cData.alasan_status_judul_identifikasi);
                }

                //section konseling gagasan
                if (cData.tgl_pengajuan_gagasan != null)
                {
                    $('#set_gagasan').html("Terisi");
                } else
                {
                    $('#set_gagasan').html("Kosong");
                }

                $('#tgl_pengajuan_gagasan').html(cData.tgl_pengajuan_gagasan);
                $('#tgl_validasi_gagasan').html(cData.tgl_validasi_gagasan);
                $('#status_gagasan').html(cData.status_gagasan);
                //jika alasannya NULL
                if (cData.alasan_status_gagasan == null)
                {
                    $('#alasan_status_gagasan').html("-");
                } else
                {
                    $('#alasan_status_gagasan').html(cData.alasan_status_gagasan);
                }

                //section konseling RA
                $('#file_ra').attr("href", "../../../../assets/latsar/aktualisasi/ra/" + cData.file_ra);
                $('#tgl_pengajuan_ra').html(cData.tgl_pengajuan_ra);
                $('#tgl_validasi_ra').html(cData.tgl_validasi_ra);
                $('#status_ra').html(cData.status_ra);
                //jika alasannya NULL
                if (cData.alasan_ra == null)
                {
                    $('#alasan_ra').html("-");
                } else
                {
                    $('#alasan_ra').html(cData.alasan_ra);
                }

                //section konseling LA
                $('#file_la').attr("href", "../../../../assets/latsar/aktualisasi/la/" + cData.file_la);
                $('#tgl_pengajuan_la').html(cData.tgl_pengajuan_la);
                $('#tgl_validasi_la').html(cData.tgl_validasi_la);
                $('#status_la').html(cData.status_la);
                //jika alasannya NULL
                if (cData.alasan_status_la == null)
                {
                    $('#alasan_status_la').html("-");
                } else
                {
                    $('#alasan_status_la').html(cData.alasan_status_la);
                }

                //section link video
                $('#link_video').attr("href", cData.link_video);

            }
        });
    }

    //fungsi untuk menampilkan content judul dan identifikasi isu
    function show_judul_identifikasi_isu(id_aktualisasi)
    {
        $('#modal-judul-isu').modal('show'); //buka modal judul identifikasi isu

        $.ajax({
            url: '../get_data_identifikasi_isu_by_idaktualisasi',
            type: 'POST',
            data: 'id_aktualisasi=' + id_aktualisasi,
            success: function (respData) {
                var cData = respData.data_isu;
                var cTotal = respData.data_isu.length;
                var ctr = 0;
                var nomor = 1;

                for (ctr = 0; ctr < cTotal; ctr++)
                {
                    $('#show_identifikasi_isu').append(
                            "<tr>" +
                            "<td style='text-align: center;'>" + nomor + ".</td>" +
                            "<td>" + cData[ctr].isu + "</td>" +
                            "<td>" + cData[ctr].sumber + "</td>" +
                            "<td style='text-align: center;'>" + cData[ctr].core_isu + "</td>" +
                            "<td style='text-align: center;'>" + cData[ctr].timestamp + "</td>" +
                            "</tr>"
                            );
                    nomor = nomor + 1;
                }
            }
        });
    }

    //fungsi untuk menampilkan content gagasan penyelesaian isu
    function show_gagasan_pennyelesaian_isu()
    {
        $('#modal-gagasan').modal('show'); //buka modal judul identifikasi isu

        $.ajax({
            url: '../get_data_gagasan_penyelesaian_isu',
            type: 'POST',
            data: 'id_aktualisasi=' + id_aktualisasi,
            success: function (respData) {
                var cData = respData.data_isu;
                var cTotal = respData.data_isu.length;
                var ctr = 0;
                var nomor = 1;

                for (ctr = 0; ctr < cTotal; ctr++)
                {
                    $('#show_identifikasi_isu').append(
                            "<tr>" +
                            "<td style='text-align: center;'>" + nomor + ".</td>" +
                            "<td>" + cData[ctr].isu + "</td>" +
                            "<td>" + cData[ctr].sumber + "</td>" +
                            "<td style='text-align: center;'>" + cData[ctr].core_isu + "</td>" +
                            "<td style='text-align: center;'>" + cData[ctr].timestamp + "</td>" +
                            "</tr>"
                            );
                    nomor = nomor + 1;
                }
            }
        });
    }
</script>