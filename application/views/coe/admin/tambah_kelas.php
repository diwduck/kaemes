<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Buka Pelatihan BPSDMD</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
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
                                Buka Pelatihan yang diselenggarakan oleh BPSDMD Provinsi Jawa Tengah
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="<?= site_url('admin/Kelas/buka_kelas/'); ?>" method="POST">
                            <div class="card-body">
                                <?=
                                validation_errors('
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                        '</div>'
                                );
                                ?>
                                <?php // $this->session->flashdata('message') ?>
                                <?= $this->session->flashdata('message_gagal') ?>                                
                                <div class="form-group">
                                    <label>Jenis Pelatihan</label>
                                    <select name="jenis_diklat" class="form-control" id="jns_diklat1" required="">
                                        <option value="">--Pilih--</option>
                                        <option value="Pelatihan Kepemimpinan Nasional">Pelatihan Kepemimpinan Nasional</option>
                                        <option value="Pelatihan Kepemimpinan Administrator">Pelatihan Kepemimpinan Administrator</option>
                                        <option value="Pelatihan Kepemimpinan Pengawas">Pelatihan Kepemimpinan Pengawas</option>
                                        <option value="Pelatihan Kepemimpinan Pemerintahan Daerah">Pelatihan Kepemimpinan Pemerintahan Daerah</option>
                                        <option value="Pelatihan Teknis">Pelatihan Teknis</option>
                                        <option value="Pelatihan Fungsional">Pelatihan Fungsional</option>
                                        <option value="Diklat Prajabatan">Pelatihan Dasar / Prajabatan</option>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                    <label>Nama Pelatihan</label>
                                    <input name="nama_diklat" type="hidden" id="nama_diklat">
                                    <select class="form-control select2" style="width: 100%;" name="id_diklat" id="id_diklat" required>
                                        <option value="" disabled selected>--Pilih Nama Pelatihan--</option>
                                    </select>
                                    <small>Nama Pelatihan yang diselengarakan di BPSDMD ditampilkan dari database Reg-Online. Jika Nama Pelatihan tidak ada di daftar, silahkan input Nama Pelatihan di aplikasi Reg-Online.</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Dibuka : </label>
                                            <div class="input-group" >
                                                <input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" readonly >
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
                                                <input type="text" name="tgl_selesai" class="form-control date" id="tgl_selesai"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script>
$(document).ready(function () {
    // datepicker untuk field input tgl_mulai dan tgl_selesai
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

    $("#jns_diklat1").on("change", function () {
        // Ambil value dari combo yg diselect
        var jns_diklat = $("#jns_diklat1").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>index.php/admin/Kelas/get_nama_diklat',
            //dataType: 'json',
            data: {jns_diklat: jns_diklat},
            cache: false,
            success: function (result) {
                $("#id_diklat").html(result);
                $("#id_diklat").select2("destroy");
                $("#id_diklat").select2();

                get_data_diklat();
            }
        });
    });

    // fungsi yang dijalankan ketika nama diklat dipilih
    $("#id_diklat").on("change", function () {
        get_data_diklat();
    });
});

// get data diklat termasuk id_diklat, jenis_diklat, nama_diklat, tanggal buka dan tanggal tutup
function get_data_diklat() {
    var id_diklat = $("#id_diklat").val();
    $.ajax({
        type: 'POST',
        url: '<?= base_url(); ?>index.php/admin/Kelas/get_jns_diklat',
        dataType: 'json',
        data: {id_diklat: id_diklat},
        cache: false,
        success: function (result) {
            //taruh valuenya ke form input
            $("#nama_diklat").val(result["nama_diklat"]);
            $("#tgl_mulai").val(result["tgl_mulai"]);
        }
    });
}
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