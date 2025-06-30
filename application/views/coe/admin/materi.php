<!-- jQuery -->
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $namaDiklat ?></h1>                 
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Diklat') ?>">Master Pelatihan</a></li>
                        <li class="breadcrumb-item active">Materi</li>
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
                                <i class="fas fa-book"></i>
                                Daftar Materi
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
                            <?= $this->session->flashdata('message') ?>
                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>  
                                        <tr style="background-color:white;">
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Judul Materi</th>
                                            <th style="text-align:center">Diunggah oleh</th>
                                            <th style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($listMateri as $item) {
                                            $no++;
                                            if($item['uploaded_by'] == 'wi'){
                                                $uploaded_by = 'Widyaiswara';
                                            }
                                            else{
                                                $uploaded_by = 'Admin';
                                            }
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no ?></td>
                                                <td><?= $item['nama_materi'] ?></td>
                                                <td><?= $uploaded_by ?></td>
                                                <td style="text-align: center;">
                                                    <!-- Tombol Action Buka Pdf -->
                                                    <a href="<?= site_url('admin/Diklat/lihat_materi/' . $id_diklat . '/' . $item['id_materi'] . '/' . $item['materi']); ?>"><button title="Lihat" style="width:35px;" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button></a>
                                                    <!-- Tombol Action Edit -->
                                                    <a href="<?= site_url('admin/Diklat/edit_materi/' . $item['id_materi']); ?>"><button title="Edit" class="btn btn-warning btn-sm" style="width:35px;" ><i class="fas fa-edit" ></i>  </button></a>
                                                    <!-- Tombol Action Hapus -->
                                                    <button title="Hapus" onclick="delete_materi(<?= $item['id_materi']; ?>)" class="btn btn-danger btn-sm" style="width:35px;"><i class="fas fa-trash" ></i></button>
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
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#id_diklat").on("change", function () {
                        //Ambil value dari combo yg diselect
                        var id_diklat = document.getElementById("id_diklat").value;
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url(); ?>index.php/Kelas/get_jns_diklat',
                            dataType: 'json',
                            data: {id_diklat: id_diklat},
                            cache: false,
                            success: function (result) {
                                $("#jenis_diklat").val(result["jenis_diklat"]);
                                $("#nama_diklat").val(result["nama_diklat"]);

                                //     var jns = document.getElementById("jns_diklat").value;
                                //     if (jns == "dikfung")
                                //         $("#jns_diklat1").val("Diklat Fungsional");
                                //     else if (jns == "diknis")
                                //         $("#jns_diklat1").val("Diklat Teknis");
                                //     else if (jns == "dikpim")
                                //         $("#jns_diklat1").val("Diklat Kepemimpinan");
                                //     else if (jns == "prajab")
                                //         $("#jns_diklat1").val("Diklat Prajabatan");
                            }

                        });
                    });
                });
            </script>
            <script type="text/javascript">
                //fungsi untuk delete arsip masuk
                function delete_materi(id_materi)
                {
                    if (confirm("Anda yakin ingin menghapus materi ini ?"))
                    {
                        ;
                        $.ajax({
                            url: '<?= base_url(); ?>index.php/admin/Diklat/delete_materi',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {id_materi: id_materi},
                            success: function (data) {
                                //alert('Delete materi berhasil');
                                location.reload();
                            },
                            error: function () {
                                alert('Delete materi gagal');
                            }
                        });
                    }
                }

            </script>