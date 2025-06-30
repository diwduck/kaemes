
<body class="hold-transition" style="background-image: url(<?php echo base_url('assets/img/background.png'); ?>); background-repeat: repeat; background-position: center;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" style="text-align: center; margin-top: 50px;">
                <img src="<?php echo base_url('assets/img/Logo jateng.png'); ?>" style="background-size: cover; background-position: center; width: 70px; height: 70px; background-repeat: no-repeat;"/>
                <br>
                <h1 style="font-family: 'Cinzel Decorative', cursive; margin-top: 20px;"><b>DIREKTORI</b></h1>
                <h3 style="font-family: 'Acme', sans-serif;">Inovasi & Rencana Tindak Lanjut</h3>
            </div>
            <div class="col-lg-4"></div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-2" style="text-align: right; padding-left: 30px; padding-right: 30px;">
                <a href="<?php echo site_url('Auth/'); ?>">
                    <button type="button" class="btn btn-warning" style="width: 100%;">
                        <b><i class="fas fa-sign-in-alt"></i> Log In</b>
                    </button>
                </a>
            </div>
            <div class="col-lg-1"></div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="padding: 30px;">
                <div class="card card-primary">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-peserta" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b><i class="fas fa-user-tie"></i> KEPEMIMPINAN</b> <span class="right badge badge-danger"><?php echo htmlspecialchars($jumlah_file_proper); ?> files</span></a>
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

        <!-- Histats.com  (div with counter) -->
        <div style="text-align: center;" id="histats_counter"></div>
        
        <!-- Histats.com  START  (aync)-->
        <script type="text/javascript">
            var _Hasync= _Hasync|| [];
            _Hasync.push(['Histats.start', '1,4623016,4,422,112,75,00011111']);
            _Hasync.push(['Histats.fasi', '1']);
            _Hasync.push(['Histats.track_hits', '']);
            
            (function() {
                var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                hs.src = ('//s10.histats.com/js15_as.js');
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
            })();
        </script>
        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4623016&101" alt="page hit counter" border="0"></a></noscript>
        <!-- Histats.com  END  -->
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
