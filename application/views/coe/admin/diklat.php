<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Pelatihan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Master Pelatihan</li>
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
                                Data Pelatihan
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <?=
                            validation_errors('
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                    '</div>'
                            );
                            ?>
                            <?php
                            $message = $this->session->flashdata('message');
                            $message_gagal = $this->session->flashdata('message_gagal');
                            ?>
                            <?php if (!empty($message)): ?>
                                <?= $message ?>
                            <?php endif; ?>

                            <?php if (!empty($message_gagal)): ?>
                                <?= $message_gagal ?>
                            <?php endif; ?>

                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="background-color:white;">
                                            <th style="color:#007bff;font-size:1em; text-align:center;">No.</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Nama Diklat</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Jenis Diklat</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Petunjuk</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Jadwal</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Materi</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Tanggal Berlangsung</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center;">Status</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center; width:60px;">Action</th>
                                            <th style="color:#007bff;font-size:1em; text-align:center; width:60px;">Kontrol Peserta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($listMasterDiklat as $item) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no ?></td>
                                                <td >
                                                    <a href="<?= site_url('admin/Diklat/coach/' . htmlspecialchars($item['id_diklat'])) ?>" title="Lihat Coach dan Peserta Pelatihan">
                                                        <?= htmlspecialchars($item['nama_diklat']); ?>
                                                    </a>
                                                </td>
                                                <td><?= htmlspecialchars($item['jenis_diklat']); ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <!-- Tombol Action Buka Pdf -->
                                                    <?php
                                                    if ($item['juklak'] != NULL) {
                                                        ?>
                                                        <a style="color: white;" href="<?= base_url('assets/file/' . htmlspecialchars($item['juklak'])) ?>" target="_blank">
                                                            <button type="button" class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <!-- Tombol Action Buka Pdf -->
                                                    <?php
                                                    if ($item['jadwal'] != NULL) {
                                                        ?>
                                                        <a style="color: white;" href="<?= base_url('assets/file/' . htmlspecialchars($item['jadwal'])) ?>" target="_blank">
                                                            <button type="button" class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <a style="color: white;" href="<?= site_url('admin/Diklat/materi/' . htmlspecialchars($item['id_diklat'])); ?>">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php
                                                        $date = date_create($item['tgl_mulai']);
                                                        $tanggal = date_format($date, 'd M Y');
                                                        echo $tanggal;
                                                    ?> 
                                                    s/d 
                                                    <?php
                                                        $date = date_create($item['tgl_selesai']);
                                                        $tanggal = date_format($date, 'd M Y');
                                                        echo $tanggal;
                                                    ?>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <label class="badge <?php
                                                    if ($item['tgl_selesai'] <= date('Y-m-d')) {
                                                        echo "badge-danger";
                                                    } elseif ($item['tgl_selesai'] >= date('Y-m-d')) {
                                                        echo "badge-success";
                                                    }
                                                    ?>">
                                                        <strong style="font-size: small;color:white;">
                                                            <?php
                                                            if ($item['tgl_selesai'] <= date('Y-m-d')) {
                                                                echo "Sudah Tutup";
                                                            } elseif ($item['tgl_selesai'] >= date('Y-m-d')) {
                                                                echo "Berlangsung";
                                                            }
                                                            ?>
                                                        </strong>
                                                    </label>
                                                </td>
                                                <td style="text-align:center; vertical-align: middle;">
                                                    <!-- Tombol Action Edit -->
                                                    <a href="<?= site_url('admin/Diklat/edit_diklat/' . htmlspecialchars($item['id_kelas'])); ?>">
                                                        <button title="Edit" class="btn btn-warning btn-sm" style="width:35px;" >
                                                            <i class="fas fa-edit" ></i>  
                                                        </button>
                                                    </a>
                                                    
                                                    <!-- Tombol Action Hapus -->
                                                    <a title="Hapus" onclick="return confirm('Yakin ingin menghapus data Pelatihan ini?');" href="<?= site_url('admin/Diklat/delete_data_kelas/') . htmlspecialchars($item['id_kelas']); ?>" class="btn btn-danger btn-sm" style="width:35px;">
                                                        <i class="fas fa-trash" ></i>
                                                    </a>
                                                </td>

                                                <td style="text-align:center; vertical-align: middle;">
                                                    <!--Tombol Cetak rekap kontrol peserta-->
                                                    <a href="<?= site_url('admin/Diklat/rekap_kontrol_peserta/' . htmlspecialchars($item['id_diklat'])); ?>">
                                                        <button title="Cetak Kontrol Peserta" class="btn btn-success btn-sm" style="width:35px;" >
                                                            <i class="fas fa-file-excel" ></i>  
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
    <!-- /.content -->            
</div>
<!-- /.content-wrapper -->
