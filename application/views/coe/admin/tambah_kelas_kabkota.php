<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Buka Pelatihan Kabupaten/Kota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Buka Diklat</li>
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
                                Buka Pelatihan yang diselenggarakan oleh Kabupaten/Kota
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('admin/Kelas/buka_kelas/'); ?>" method="POST">
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
                                    <label>Pilih Nama Pelatihan</label>
                                    <select class="form-control select2" style="width: 100%;"
                                            name="id_diklat" id="id_diklat" required>
                                        <option value="" disabled selected>--Pilih Nama Pelatihan--</option>
                                        <?php foreach ($kelas as $kelas) { ?>
                                            <option value="<?php echo $kelas->id_diklat; ?>"><?php echo $kelas->nama_diklat; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small>Nama Pelatihan yang diselengarakan di Kab/Kota ditampilkan dari database Reg-Online. Jika Nama Pelatihan tidak ada di daftar, silahkan input Nama Pelatihan di aplikasi Reg-Online.</small>
                                </div>
                                
                                <input hidden name="nama_diklat" type="text" class="form-control" id="nama_diklat" readonly>
                                <input hidden type="text" class="form-control" id="jns_diklat" readonly>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Diklat</label>
                                            <input  name="jenis_diklat" type="text" class="form-control" id="jns_diklat1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penyelenggara Diklat</label>
                                            <input  name="penyelenggara" type="text" class="form-control" id="penyelenggara" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Dibuka : </label>
                                            <div class="input-group" >
                                                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" readonly >
                                                <div class="input-group-prepend" >
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Ditutup : </label>
                                            <div class="input-group" >
                                                <input type="date" name="tgl_selesai" class="form-control date" id="tgl_selesai"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(function () {
                                        $('#tgl_mulai').datepicker({
                                            format: "yyyy-mm-dd",
                                            autoclose: true
                                        });
                                        $('#tgl_selesai').datepicker({
                                            format: "yyyy-mm-dd",
                                            autoclose: true
                                        });
                                    });
                                </script>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Petunjuk Pelaksanaan :</label>
                                            <div class="input-group">
                                                <input id="file" style="color: black; width: 100%;" onchange="return validasiFile()" type="file" accept=".pdf" name="juklak">
                                                <b><label style="color:red;">File(.pdf) Maksimal 5 MB / 5.000 Kb</label></b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jadwal :</label>
                                            <div class="input-group">
                                                <input id="file1" style="color: black; width: 100%;" onchange="return validasiFile1()" type="file" accept=".pdf" name="jadwal">
                                                <b><label style="color:red;">File(.pdf) Maksimal 5 MB / 5.000 Kb</label></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button value="1" name="simpan" type="submit" class="btn btn-primary">Buka</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#id_diklat").on("change", function () {
            //Ambil value dari combo yg diselect
            var id_diklat = document.getElementById("id_diklat").value;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/admin/Kelas/get_jns_diklat',
                dataType: 'json',
                data: {id_diklat: id_diklat},
                cache: false,
                success: function (result) {
                    $("#jns_diklat").val(result["jns_diklat"]);
                    $("#nama_diklat").val(result["nama_diklat"]);
                    $("#tgl_mulai").val(result["tgl_mulai"]);
                    $("#tgl_selesai").val(result["tgl_selesai"]);
                    $("#penyelenggara").val(result["penyelenggara"]);

                    var jns = document.getElementById("jns_diklat").value;
                    if (jns == "dikfung")
                        $("#jns_diklat1").val("Diklat Fungsional");
                    else if (jns == "diknis")
                        $("#jns_diklat1").val("Diklat Teknis");
                    else if (jns == "dikpim")
                        $("#jns_diklat1").val("Diklat Kepemimpinan");
                    else if (jns == "prajab")
                        $("#jns_diklat1").val("Diklat Prajabatan");
                    else if (jns == "pka")
                        $("#jns_diklat1").val("Pelatihan Kepemimpinan Administrator");
                    else if (jns == "pkp")
                        $("#jns_diklat1").val("Pelatihan Kepemimpinan Pengawas");
                }

            });
        });
    });

    function validasiFile() {
        var inputFile = document.getElementById('file');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.pdf)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file dengan ekstensi .pdf');
            inputFile.value = '';
            return false;
        }
    }

    function validasiFile1() {
        var inputFile = document.getElementById('file1');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.pdf)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file dengan ekstensi .pdf');
            inputFile.value = '';
            return false;
        }
    }

</script>