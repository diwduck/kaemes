<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Materi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Materi') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Materi</li>
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
                                Tambah Materi
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('admin/Materi/tambah_materi/'); ?>" method="POST">
                            <div class="card-body">
                                <?=
                                validation_errors('
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                        '</div>'
                                );
                                ?>
                                <?= $this->session->flashdata('message') ?>
                                <?= $this->session->flashdata('message_gagal') ?>
                                <div class="form-group">
                                    <label>Pilih Nama Diklat</label>
                                    <select class="form-control select2" style="width: 100%;" name="id_diklat" id="id_diklat" required>
                                        <option value="" disabled selected>--Pilih Nama Diklat--</option>
                                        <?php foreach ($kelas as $kelas) { ?>
                                            <option value="<?php echo $kelas->id_diklat; ?>"><?php echo $kelas->nama_diklat; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input name="nama_diklat" type="hidden" class="form-control" id="nama_diklat">
                                <div class="form-group">
                                    <label>Jenis Diklat</label>
                                    <input  name="jenis_diklat" type="text" class="form-control" id="jns_diklat1" required="" readonly="">
                                </div>
                                <div class="form-group">
                                    <label>Judul Materi</label>
                                    <input  name="nama_materi" type="text" class="form-control" id="nama_materi" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload Materi</label>
                                        <div class="input-group">
                                            <input id="materi" onchange="return validasiFile_materi()" type="file" accept=".pdf" name="materi" required>
                                            <b><label style="color:red;">File .pdf maksimal 5 MB / 5.000 KB</label></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button value="1" name="simpan" type="submit" class="btn btn-primary">Tambah</button>
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
            <script>
                                                $(document).ready(function () {
                                                    $("#id_diklat").on("change", function () {
                                                        //Ambil value dari combo yg diselect
                                                        var id_diklat = document.getElementById("id_diklat").value;
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: '<?php echo base_url(); ?>index.php/admin/Kelas/get_nama_kelas',
                                                            dataType: 'json',
                                                            data: {id_diklat: id_diklat},
                                                            cache: false,
                                                            success: function (result) {
                                                                $("#jns_diklat1").val(result["jenis_diklat"]);
                                                                $("#nama_diklat").val(result["nama_diklat"]);
                                                            }

                                                        });
                                                    });
                                                });

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