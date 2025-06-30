 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('coe/admin/Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php
            if ($role_admin != "contributor") 
            { ?>
              
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <h3 class="countdown_first"><?php echo htmlspecialchars($dashboard_jumlah_user); ?></h3>
                        <p>Jumlah Peserta MCC</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?php echo site_url('coe/admin/Peserta'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3 class="countdown_first"><?php echo htmlspecialchars($dashboard_jumlah_kelas_tutup+$dashboard_jumlah_kelas_buka); ?></h3>
                        <p>Jumlah Kelas</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-school"></i>
                      </div>
                      <a href="<?php echo site_url('coe/admin/Diklat'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 class="countdown_first"><?php echo htmlspecialchars($dashboard_jumlah_kelas_buka); ?></h3>
                        <p>Kelas Sedang Berlangsung</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-door-open"></i>
                      </div>
                      <a href="<?php echo site_url('admin/Diklat'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3 class="countdown_first"><?php echo htmlspecialchars($dashboard_jumlah_kelas_tutup); ?></h3>
                        <p>Kelas Sudah Tutup</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-door-closed"></i>
                      </div>
                      <a href="<?php echo site_url('coe/admin/Diklat'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
      <?php } 
            else
            { ?>
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4" style="text-align: center;">
                    <img src="<?= base_url('./assets/img/Logo jateng.png'); ?>" alt="Logo" style="width: 80px; height: 90px; margin-top: 50px;">
                  </div>
                  <div class="col-lg-4"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <h4 style="text-align: center;">Selamat Datang Administrator <?php echo $nama; ?></h4>
                  </div>
                  <div class="col-lg-4"></div>
                </div>
      <?php } ?>
          <!-- ./col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(function() {
   

   function countUp(count) {
  var div_by = 100,
    speed = Math.round(count / div_by),
    $display = $('.countdown_first'),
    run_count = 1,
    int_speed = 100;
  var int = setInterval(function () {
    if (run_count < div_by) {
      $display.text(speed * run_count);
      run_count++;
    } else if (parseInt($display.text()) < count) {
      var curr_count = parseInt($display.text()) + 1;
      $display.text(curr_count);
    } else {
      clearInterval(int);
    }
  }, int_speed);
}
countUp(100);
  });
  </script>