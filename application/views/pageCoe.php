<html lang="en">
 <head>
    
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
   Center of Excellence
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="shortcut icon" href="<?php echo base_url('assets/img/Logo jateng.png'); ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>" type="text/css"/>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css'); ?>" type="text/css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>" type="text/css"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>" type="text/css"/>
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css'); ?>" type="text/css"/>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>" type="text/css"/>
  <!-- Theme style -->
   <!-- AdminLTE /dist dihapus-->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.minv3.css'); ?>" type="text/css"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>" type="text/css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>" type="text/css"/>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css'); ?>" type="text/css"/>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>" type="text/css"/>
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css'); ?>" type="text/css"/>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css'); ?>" type="text/css"/>
  <!-- Bootstrap Image Checkbox -->
   <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-image-checkbox.css'); ?>" type="text/css"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" type="text/css"/>
  <!---font style-->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Merriweather:wght@300;700&display=swap" rel="stylesheet">

  <style>
   body {
            font-family: 'Poppins', sans-serif;
            background-color:rgb(226, 223, 223); /* Light gray background */
            transform: scale(1);
            zoom: 100%;
        }
        .header {
            font-family: 'Playfair Display', serif;
            background-image: url('<?php echo base_url('uploads/image/batik.jpg')?>');
            background-position: center;
            color: white;
            text-align: center;
            height: 38vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
            overflow: hidden; /* Pastikan elemen anak tidak keluar */
        }

        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.74); /* Hitam dengan transparansi 50% */
            z-index: -1; /* Menempatkan layer di belakang konten */
        }

        .header h1, .header p {
            position: relative; /* Agar berada di atas layer transparan */
            z-index: 2;
        }
        .header h1 {
            font-size: 5rem;
            font-weight: bold;
        }
        .header p {
            font-size: 3rem;
        }
        .card-container {
            position: relative;
            top: -20%;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 375px; /* Adjust the height as needed */
        }
        .card i {
            font-size: 50px;
            margin: 20px auto;
            color: black;
        }
        .card-title {
            font-weight: bold;
        }
        .card-text {
            color: #666;
        }
        .btn-read-more, .see-all-btn {
            font-size: 30px;
            background-color: black;
            color: white;
            border-radius: 20px;
            padding: 5px 20px;
            text-decoration: none;
            display: inline-block;
        }
        .see-all-btn {
            border-radius: 10px;
            display: block;
            margin: 30px auto 100px auto; /* Center the button and add more space below */
            width: 100px;
        }
        .content-box {
            background-color: white;
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .section-spacing {
            margin-top: 50px; /* Adjust the spacing as needed */
        }
        .more a {
            font-weight: bold;
            color: blue;
            text-decoration: underline;
            background-color: transparent;
        }
  </style>
 </head>
 <?php include_once 'templates/navbar.php'; ?>  
  <div class="header">
   <h1>
    <br />
    DIREKTORI
   </h1>
   <p>
    Inovasi dan Rencana Tindak lanjut
   </p>
  </div>
  <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="padding: 30px;">
                <div class="card card-primary">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-peserta" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b><i class="fas fa-user-tie" ></i> KEPEMIMPINAN</b> <span class="right badge badge-danger"><?php echo htmlspecialchars($jumlah_file_proper); ?> files</span></a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-peserta-latsar" role="tab" aria-controls="custom-tabs-two-home-tab" aria-selected="false"><b><i class="fas fa-user-graduate"></i> LATSAR</b> <span class="right badge badge-danger"><?php echo htmlspecialchars($jumlah_file_aktualisasi); ?> files</span></a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-teknis" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"><b><i class="fas fa-wrench"></i> TEKNIS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-fungsional" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><b><i class="fas fa-seedling"></i> FUNGSIONAL</b></a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-statistik" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><b><i class="fas fa-chart-line"></i> STATISTIK</b></a>
                            </li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">

                            <!--==========================================================TAB KEPEMIMPINAN==============================================-->
                            <div class="tab-pane fade show active" id="custom-tabs-peserta" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                <div class="row">
                                    <div class="col-md-2">
                                        <!-- select Tahun-->
                                        <div class="form-group">
                                            <select onchange="onchange_ajax_tahun_kepemimpinan('kepemimpinan');" class="form-control" name="tahun" id="tahun_kepemimpinan" required>
                                                <option selected disabled>--Pilih Tahun--</option>
                                                <?php
                                                foreach ($tahun as $tahun_kepemimpinan) {
                                                    ?>
                                                    <option value="<?php echo $tahun_kepemimpinan['tahun']; ?>">
                                                        <?php echo $tahun_kepemimpinan['tahun']; ?>        
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <!-- select Nama Diklat-->
                                        <div class="form-group">
                                            <select class="form-control" name="tahun" id="nama_diklat_kepemimpinan">
                                                <option selected disabled>--Pilih Tahun Inovasi Terlebih Dahulu--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <button onclick="show_filter_data_kepemimpinan()" style="border-radius: 5px;" type="submit" class="btn btn-primary btn-block btn-flat">
                                            <b><i class="fas fa-search"></i> Tampilkan</b>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body table-responsive">
                                            <table id="datatable-pim" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr style="background-color:white;">
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">No.</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Judul Inovasi</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Nama Penulis</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Jabatan</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">OPD</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Coach</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--==========================================================TAB LATSAR==============================================-->
                            <div class="tab-pane fade" id="custom-tabs-peserta-latsar" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                                <div class="row">
                                    <div class="col-md-2">
                                        <!-- select Tahun-->
                                        <div class="form-group">
                                            <select onchange="onchange_ajax_tahun_latsar('latsar');" class="form-control" name="tahun" id="tahun_latsar" required>
                                                <option selected disabled>--Pilih Tahun--</option>
                                                <?php
                                                foreach ($tahun_latsar as $tahun_aktualisasi) {
                                                    ?>
                                                    <option value="<?php echo $tahun_aktualisasi['tahun']; ?>">
                                                        <?php echo $tahun_aktualisasi['tahun']; ?>        
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <!-- select Nama Diklat-->
                                        <div class="form-group">
                                            <select class="form-control" name="tahun" id="nama_diklat_latsar">
                                                <option selected disabled>--Pilih Tahun Terlebih Dahulu--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <button onclick="show_filter_data_latsar()" style="border-radius: 5px;" type="submit" class="btn btn-primary btn-block btn-flat">
                                            <b><i class="fas fa-search"></i> Tampilkan</b>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body table-responsive">
                                            <table id="datatable-latsar" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr style="background-color:white;">
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">No.</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Judul Aktualisasi</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Nama Penulis</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Jabatan</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">OPD</th>
                                                        <th style="color:#007bff;font-size:1em; text-align:center;">Coach</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--===============================================================TAB STATISTIK===============================================-->
                            <div class="tab-pane fade" id="custom-tabs-statistik" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <p class="login-box-msg">
                                <h5 style="text-align: center;"><b>Statistik Direktori Inovasi & Rencana Tindak Lanjut <br>Tahun <?php echo date('Y'); ?></b></h5>
                                </p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--===============================================PIE CHART===============================================-->
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <h3 class="card-title">Grafik Jumlah Inovasi Berdasarkan Jenis Diklat</h3>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>

                                        <!--========================BAR CHART Berdasarkan Penyelenggaraan di Kabupaten/Kota========================-->
                                        <div class="card card-warning">
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Grafik Jumlah Inovasi Berdasarkan Penyelenggaraan di Kabupaten/Kota</b></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart">
                                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <!--====================================BAR CHART Berdasarkan Asal ASN=====================================-->
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Grafik Jumlah Inovasi Berdasarkan Asal ASN</b></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart">
                                                    <canvas id="barChart_asal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.tab -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>     
        </div> 

    </div>
    <!--===========================================================JAVASCRIPT==========================================================-->
    <script>
    const base_url = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript">
        $(function () {
            $("#datatable-pim").DataTable({
              "responsive": true,
              "autoWidth": false
            })
        });
      
      	$(function () {
            $("#datatable-latsar").DataTable({
              "responsive": true,
              "autoWidth": false
            })
        });
    </script>

    <!--============================================================JAVASCRIPT CHART.JS================================================-->
    <script type="text/javascript">
        //function for onchange nama diklat berdasarkan tahun dan jenis diklat
        function onchange_ajax_tahun_kepemimpinan(jenis_diklat)
        {
            var tahun_kepemimpinan = document.getElementById("tahun_kepemimpinan").value;

            $.ajax({
                url: base_url + 'index.php/coe/Publish/onchange_tahun',   
                type: 'POST',
                data: 'jenis_diklat='+jenis_diklat+'&tahun='+tahun_kepemimpinan,
                success: function(respData)
                        {
                            console.log(respData);
                            var cTotal = respData.nama_diklat.length;
                            var ctr;
                            
                            // clear options
                            $('#nama_diklat_kepemimpinan').html('<option selected disabled="disabled" value="0">--Pilih Nama Diklat--</option>');
                            $('#nama_diklat_kepemimpinan').html('<option value="0">Semua Diklat</option>');
                            for ( ctr = 0; ctr < cTotal; ctr++)
                            {
                                $('#nama_diklat_kepemimpinan').append('<option value="'+respData.nama_diklat[ctr].id+'">'+respData.nama_diklat[ctr].name+'</option>');
                            }
                        }
            });
            console.log("AJAX dipanggil dengan tahun:", tahun_kepemimpinan, "jenis:", jenis_diklat);

        }

        //fungsi untuk filter data berdasarkan tahun usulan renja
        function show_filter_data_kepemimpinan()
        {
            var tahun = document.getElementById("tahun_kepemimpinan").value;
            var id_diklat = document.getElementById("nama_diklat_kepemimpinan").value;

            $.ajax({
                  url: base_url + 'index.php/coe/Publish/get_data_proper_by_tahun_nama',
                  type: 'POST',
                  data: 'tahun='+tahun+'&id_diklat='+id_diklat,
                  success: function(respData){
                    
                          
                              //destroy and cleaar data from datatables
                              $('#datatable-pim').DataTable().clear().destroy();

                              //reinitialize datatables
                              $("#datatable-pim").DataTable({
                                    "scrollX": true,
                                    "responsive": true,
                                    "autoWidth": false
                                });

                              //fetch data
                              $.each(respData.data_proper, function(i, item) {
                                 $('#datatable-pim').DataTable().row.add([
                                   item.no,
                                   item.judul,
                                   item.nama,
                                   item.jabatan,
                                   item.opd,
                                   item.nama_coach
                                 ]).draw();
                              });
                          }
              });
        }

        //=================================================AJAX LATSAR=================================================
        //function for onchange nama diklat berdasarkan tahun dan jenis diklat
        function onchange_ajax_tahun_latsar(jenis_diklat)
        {
            var tahun_latsar = document.getElementById("tahun_latsar").value;

            $.ajax({
                url: base_url + 'index.php/coe/Publish/onchange_tahun',   
                type: 'POST',
                data: 'jenis_diklat='+jenis_diklat+'&tahun='+tahun_latsar,
                success: function(respData)
                        {
                            var cTotal = respData.nama_diklat.length;
                            var ctr;
                            
                            // clear options
                            $('#nama_diklat_latsar').html('<option selected disabled="disabled" value="0">--Pilih Nama Diklat--</option>');
                            $('#nama_diklat_latsar').html('<option value="0">Semua Diklat</option>');
                            for ( ctr = 0; ctr < cTotal; ctr++)
                            {
                                $('#nama_diklat_latsar').append('<option value="'+respData.nama_diklat[ctr].id+'">'+respData.nama_diklat[ctr].name+'</option>');
                            }
                        }
            });
        }

        //fungsi untuk filter data berdasarkan nama diklat
        function show_filter_data_latsar()
        {
            var tahun = document.getElementById("tahun_latsar").value;
            var id_diklat = document.getElementById("nama_diklat_latsar").value;
            
            console.log("Tahun:", tahun);
            console.log("ID Diklat:", id_diklat);

            $.ajax({
                  url: base_url + 'index.php/coe/Publish/get_data_aktualisasi_by_tahun_nama',
                  type: 'POST',
                  data: 'tahun='+tahun+'&id_diklat='+id_diklat,
                  success: function(respData){
                    console.log("Response Data:", respData); // Penting!
                          
                              //destroy and cleaar data from datatables
                              $('#datatable-latsar').DataTable().clear().destroy();

                              //reinitialize datatables
                              $("#datatable-latsar").DataTable({
                                    "scrollX": true,
                                    "responsive": true,
                                    "autoWidth": false
                                });

                              //fetch data
                              $.each(respData.data_aktualisasi, function(i, item) {
                                 $('#datatable-latsar').DataTable().row.add([
                                   item.no,
                                   item.judul,
                                   item.nama,
                                   item.jabatan,
                                   item.opd,
                                   item.nama_coach
                                 ]).draw();
                              });
                          }
              });
        }
    </script> 
        <!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js'); ?>" type="text/javascript"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>" type="text/javascript"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>" type="text/javascript"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>" type="text/javascript"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>" type="text/javascript"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>" type="text/javascript"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js'); ?>" type="text/javascript"></script>
<!-- jQuery ddSlick -->
<script src="<?php echo base_url('assets/plugins/ddSlick/jquery.ddslick.min.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>" type="text/javascript"></script>
 --><!-- AdminLTE for demo purposes -->
<!--<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>" type="text/javascript"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script>
    $(document).ready(function(){
        $(".preloader").fadeOut();
    })
</script>
<script type="text/javascript">
    $(document).ready( function () {
//        ddslick_wi();
        $("#example1").DataTable({
            "ordering": false
        });

        $("#datatable").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
        
        $("#datatable1").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    } );

    function validasiFile_s()
    {
        var inputFile = document.getElementById('file_proper');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Laporan Akhir Perubahan yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        }
    }

    function validasiFile_ra()
    {
        var inputFile = document.getElementById('file_ra');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Rancangan Aktualisasi yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        }
    }

    function validasiFile_s_edit()
    {
        var inputFile = document.getElementById('file_ra_edit');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Rancangan Aktualisasi yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        }
    }

    function validasiFile_s_la()
    {
        var inputFile = document.getElementById('file_la');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Laporan Aktualisasi yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        } 
    }

    function validasiFile_s_edit_la()
    {
        var inputFile = document.getElementById('file_la_edit');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Laporan Aktualisasi yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        } 
    }

    //validasi file Rancangan Akhir
    function validasiFile_dikpim_ra()
    {
        var inputFile = document.getElementById('file_ra');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Rancangan Akhir yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        } 
    }
</script>
<script type='text/javascript'>
    $(function() {
        $.fn.scrollToTop = function() {
            $(this).hide();
            if ($(window).scrollTop() != "0") {
                $(this).fadeIn("slow")
            }
            var scrollDiv = $(this);
            $(window).scroll(function() {
                if ($(window).scrollTop() == "0") {
                    $(scrollDiv).fadeOut("slow")
                } else {
                    $(scrollDiv).fadeIn("slow")
                }
            });
            $(this).click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow")
            })
        }
    });

    $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    })
    $(function () {
    // Summernote
    $('.textareaajuan').summernote({
        height: "300px",
    });
    })
    $(function() {
        $("#w2b-StoTop").scrollToTop();
    });
</script>
<?php if (isset($_SESSION['flash_message'])) { ?>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            title: "Done",
            timer: 5000,
            showConfirmButton: true,
            icon: 'success'
        });
        Toast.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['flash_message']; ?>'
        });
    });
</script>
<?php } ?>

 
 <?php if (isset($_SESSION['flash_message'])){ ?>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
        title: "Done",
        //timer: 5000,
        //showConfirmButton: true,
        confirmButtonText: '<a href="https://esurya.organisasi.jatengprov.go.id/mcc" target="_blank"><button type="button" class="btn btn-primary"><b>Survey Pelayanan Elektronik</b></button></a>',
        type: 'success'
    });
      Toast.fire({
        type: 'success',
        title: '<?php echo $_SESSION['flash_message_survey']; ?>'
      })
    });
</script>
<?php } ?>
  <?php include 'templates/footer.php'; ?>
  </body>
  
</html>
