<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Peserta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Peserta</li>
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
                                <i class="fas fa-users"></i>
                                Data Peserta yang sudah melakukan aktivasi
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body table-responsive">
                            <!--<div class="box-body table-responsive">-->
                            <table id="data-peserta" class="table table-bordered table-hover">
                                <thead>  
                                    <tr style="background-color:white;">
                                        <th style="color:#007bff;font-size:1em; text-align:center;">Nama Peserta</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">NIP</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">Jabatan</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">OPD</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">Pemda</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">Pelatihan yang diikuti</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center;">Coach</th>
                                        <th style="color:#007bff;font-size:1em; text-align:center; width:60px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>                
                            <!--</div>-->
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- modal untuk view detail Peserta -->
<div class="modal fade" id="modal-detail">
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
                                <th>Nama</th><td id="profilnama"></td>
                            </tr>                             
                            <tr>
                                <th>NIP</th><td id="profilnip"></td>
                            </tr>
                            <tr>
                                <th>Telepon</th><td id="profiltelp"></td>
                            </tr>
                            <tr>
                                <th>Email</th><td id="profilemail"></td>
                            </tr>
                            <tr>
                                <th>Pangkat</th><td id="profilpangkat"></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th><td id="profiljabatan"></td>
                            </tr>
                            <tr>
                                <th>OPD</th><td id="profilopd"></td>
                            </tr>
                            <tr>
                                <th>Pemda</th><td id="profilpemda"></td>
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
            </div>
            <div class="modal-footer right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.content-wrapper -->
<script>
    function send_detail(nama, nip, no_telp, gol, pangkat, jabatan, opd, pemda, email, file_foto, nama_diklat, nama_coach) {
        $('#profilfoto').html('<img src="<?= base_url('assets/foto_profil/') ?>' + file_foto + '" width="140px">');
        $('#profilnama').html(nama);
        $('#profilnip').html(nip);
        $('#profiltelp').html(no_telp);
        $('#profilemail').html(email);
        $('#profilpangkat').html(pangkat + ' (' + gol + ')');
        $('#profiljabatan').html(jabatan);
        $('#profilopd').html(opd);
        $('#profilpemda').html(pemda);
        $('#profilpelatihan').html(nama_diklat);
        $('#profilcoach').html(nama_coach);

    }
    function konfirmasi_reset(id_user, nip) {
        Swal.fire({
            title: 'Reset Password?',
            text: "Setelah direset, Password default adalah NIP",
            //icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Reset'
        }).then((result) => {
            if (result.value) {
                reset_password(id_user, nip);
            }
        });
        return false;
    }

    function konfirmasi_hapus(id_user) {
        Swal.fire({
            title: 'Hapus data peserta?',
            text: "Setelah dihapus, Data peserta juga akan terhapus dari database",
            //icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                hapus_peserta(id_user);
            }
        });
        return false;
    }

    function reset_password(id_user, nip) {
        $.ajax({
            type: 'POST',
            url: '<?= site_url('admin/Peserta/resetpass/') ?>' + id_user + '/' + nip,
            contentType: false,
            processData: false,
            success: function success(returndata) {
                pesan_reset(returndata);
            }
        });
    }

    function hapus_peserta(id_user) {
        $.ajax({
            type: 'POST',
            url: '<?= site_url('admin/Diklat/hapus_data_peserta_dari_user/') ?>' + id_user,
            contentType: false,
            processData: false,
            success: function success(returndata) {
                pesan_hapus(returndata);
                location.reload();
            }
        });
    }

    function pesan_reset(respon) {
        console.log(respon);
//        if (respon === '1') {
//            Swal.fire('Reset Password berhasil!',
//                    'Password default adalah NIP',
//                    'success');
//        } else {
//            Swal.fire('Reset Password gagal!',
//                    respon,
//                    'error');
//        }
        Swal.fire('Reset Password berhasil!',
                'Password default adalah NIP',
                'success');
    }

    function pesan_hapus(respon) {
        Swal.fire('Data peserta berhasil dihapus!',
                'success');
    }
</script>
