<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Pelatihan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/Diklat') ?>">Master Pelatihan</a></li>
                        <li class="breadcrumb-item active">Edit Pelatihan</li>
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
                                Edit Data Pelatihan
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('admin/Diklat/edit_diklat_act/' . $dataDiklat['id_kelas']); ?>" method="POST">
                            <div class="card-body">
                                <?=
                                validation_errors('
                     <div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                        '</div>'
                                );
                                ?>
                                <?= $this->session->flashdata('message') ?>
                                <input hidden name="id_kelas" type="text" value="<?php echo $dataDiklat['id_kelas']; ?>" class="form-control" id="id_kelas" readonly>
                                <div class="form-group">
                                    <label>Pilih Nama Pelatihan</label>
                                    <select class="form-control select2" style="width: 100%;" name="id_diklat" id="id_diklat" required>
                                        
                                        <?php
                                        // tampilkan data pelatihan yang sudah pernah dibuka pada daftar online
                                        foreach ($kelas as $key) 
                                        {
                                            if ($dataDiklat['nama_diklat'] == $key->nama_diklat)
                                            { ?>
                                                <option value='<?= $key->id_diklat ?>' selected>
                                                    <?= $key->nama_diklat . ' (' . $key->tgl_mulai . ' s/d ' . $key->tgl_selesai . ')' ?>
                                                </option>
                                      <?php }
                                            else
                                            { ?>
                                                <option value='<?= $key->id_diklat ?>'>
                                                    <?= $key->nama_diklat . ' (' . $key->tgl_mulai . ' s/d ' . $key->tgl_selesai . ')' ?>
                                                </option>
                                      <?php } ?>
                                            
                                  <?php } ?>
                                        
                                    </select>
                                    <small>Nama Pelatihan baik yang diselengarakan di BPSDMD maupun Kab/Kota ditampilkan dari database Reg-Online. Jika Nama Pelatihan tidak ada di daftar, silahkan input Nama Pelatihan di aplikasi Reg-Online.</small>
                                </div>
                                <input name="nama_diklat" type="hidden" value="<?php echo $dataDiklat['nama_diklat']; ?>" id="nama_diklat">
                                <div class="form-group">
                                    <label>Jenis Pelatihan</label>
                                    <select class="form-control" name="jenis_diklat" required>
                                        <option value="">--Pilih Jenis Pelatihan--</option>
                                        <option value="Pelatihan Kepemimpinan Nasional" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Kepemimpinan Nasional' ? 'selected' : '' ?>>Pelatihan Kepemimpinan Nasional</option>
                                        <option value="Pelatihan Kepemimpinan Administrator" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Kepemimpinan Administrator' ? 'selected' : '' ?>>Pelatihan Kepemimpinan Administrator</option>
                                        <option value="Pelatihan Kepemimpinan Pengawas" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Kepemimpinan Pengawas' ? 'selected' : '' ?>>Pelatihan Kepemimpinan Pengawas</option>
                                        <option value="Pelatihan Kepemimpinan Pemerintahan Daerah" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Kepemimpinan Pemerintahan Daerah' ? 'selected' : '' ?>>Pelatihan Kepemimpinan Pemerintahan Daerah</option>
                                        <option value="Pelatihan Teknis" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Teknis' ? 'selected' : '' ?>>Pelatihan Teknis</option>
                                        <option value="Pelatihan Fungsional" <?= $dataDiklat['jenis_diklat'] == 'Pelatihan Fungsional' ? 'selected' : '' ?>>Pelatihan Fungsional</option>
                                        <option value="Diklat Prajabatan" <?= $dataDiklat['jenis_diklat'] == 'Diklat Prajabatan' ? 'selected' : '' ?>>Pelatihan Dasar / Prajabatan</option>
                                    </select>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Dibuka : </label>
                                            <div class="input-group" >
                                                <input type="date" name="tgl_mulai" class="form-control" readonly value="<?php echo $dataDiklat['tgl_mulai']; ?>">
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
                                                <input type="date" name="tgl_selesai" value="<?php echo $dataDiklat['tgl_selesai']; ?>"class="form-control date"id="datepicker2" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input hidden type="text" name="juklak_ganti" value="<?php echo $dataDiklat['juklak']; ?>">
                                <input hidden type="text" name="jadwal_ganti" value="<?php echo $dataDiklat['jadwal']; ?>">
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
                                                    $(document).ready(function () {
                                                        $(function () {
                                                            $('#datepicker').datepicker({
                                                                format: "dd/mm/yyyy",
                                                                autoclose: true
                                                            });
                                                            $('#datepicker2').datepicker({
                                                                format: "yyyy-mm-dd",
                                                                autoclose: true
                                                            });
                                                        });
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
                                                                    $("#nama_diklat").val(result["nama_diklat"]);
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