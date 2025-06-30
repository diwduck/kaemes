<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Materi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Diklat') ?>">Master Diklat</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Diklat/materi/' . $dataMateri['id_diklat']); ?>">Materi</a></li>
                        <li class="breadcrumb-item active">Edit Materi</li>
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
                                <i class="fas fa-edit"></i>
                                Edit Materi
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('admin/Diklat/edit_materi_act/' . $dataMateri['id_materi']); ?>" method="POST">
                            <div class="card-body">
                                <?=
                                validation_errors('
                     <div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                        '</div>'
                                );
                                ?>
                                <?= $this->session->flashdata('message') ?>
                                <input name="id_materi" type="hidden" value="<?php echo $dataMateri['id_materi']; ?>" class="form-control" id="id_materi" readonly>
                                <input name="id_diklat" type="hidden" value="<?php echo $dataMateri['id_diklat']; ?>" class="form-control" id="id_diklat" readonly>
                                <div class="form-group">
                                    <label>Nama Diklat</label>
                                    <input  name="nama_diklat" type="text" value="<?php echo $dataMateri['nama_diklat']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Diklat</label>
                                    <input  name="jenis_diklat" type="text" value="<?php echo $dataMateri['jenis_diklat']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Materi</label>
                                    <input  name="nama_materi" type="text" value="<?php echo $dataMateri['nama_materi']; ?>" class="form-control" required>
                                </div>
                                <input type="hidden" name="materi_ganti" value="<?php echo $dataMateri['materi']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Materi (biarkan kosong jika tidak ingin mengubah file)</label>
                                        <div class="input-group">
                                            <input id="materi" style="color: black; width: 100%;" onchange="return validasiFile_materi()" type="file" accept=".pdf" name="materi">
                                            <b><label style="color:red;">File .pdf maksimal 5 MB / 5.000 KB</label></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button value="1" name="simpan" type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- jQuery -->
            <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

            <script type="text/javascript">
                                                function validasiFile_materi() {
                                                    var inputFile = document.getElementById('materi');
                                                    var pathFile = inputFile.value;
                                                    var ekstensiOk = /(\.pdf)$/i;
                                                    if (!ekstensiOk.exec(pathFile)) {
                                                        alert('Silakan upload file dengan ekstensi .pdf');
                                                        inputFile.value = '';
                                                        return false;
                                                    }
                                                }
            </script>