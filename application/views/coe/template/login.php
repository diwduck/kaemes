<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('assets/img/background.png'); ?>); background-repeat: repeat; background-position: center;">
    <div class="login-box" style="padding: 10px;">
        <div class="login-logo" >
            <img src="<?php echo base_url('assets/img/Logo jateng.png');?>" style="background-size: cover; background-position: center; width: 70px; height: 70px; background-repeat: no-repeat;"/>
            <br>
            <h1 style="font-family: 'Cinzel Decorative', cursive; margin-top: 20px;"><b>COE</b></h1>
            <h3 style="font-family: 'Acme', sans-serif;">Center Of Excellent</h3>
        </div>
        <!-- /.login-logo -->
        <div class="card card-primary">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-peserta" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Login Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-wi" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Login Widyaiswara</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-peserta" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <p class="login-box-msg"><b>Login Peserta</b></p>
                        <?=
                        validation_errors(
                                '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                '</div>'
                        );
                        ?>
<?= $this->session->flashdata('message') ?>
                        <form action="<?php echo site_url('Auth'); ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="NIP" class="form-control" placeholder="NIP">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><b><i class="fas fa-sign-in-alt"></i> Log In</b></button>
                            </div>
                        </form>
                        <!-- /.tab -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-wi" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <p class="login-box-msg"><b>Login Widyaiswara</b></p>
                        <?=
                        validation_errors(
                                '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                                '</div>'
                        );
                        ?>
<?= $this->session->flashdata('message') ?>
                        <form action="<?php echo site_url('coe/Auth/loginwi'); ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="NIP" class="form-control" placeholder="NIP">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat"><b><i class="fas fa-sign-in-alt"></i> Log In</b></button>
                            </div>
                        </form>
                        <!-- /.tab -->
                    </div>
                </div>

                <hr style="border: solid 1px lightgray;">

                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo site_url(); ?>">
                            <div class="info-box mb-3" style="box-shadow: 0px 0px 10px 2px lightgray; border: solid 1px lightgray; background-color: khaki;">
                              <span class="info-box-icon elevation-1" style="background-color: red; color: white;">
                                  <img src="<?php echo base_url('assets/img/animated-folder.gif'); ?>">
                              </span>

                              <div class="info-box-content">
                                <hr style="border: solid 1px white; margin-bottom: unset;">
                                <span class="info-box-text"><b> Akses Direktori Inovasi & RTL</b></span>
                                <hr style="border: solid 1px white; margin: unset;">
                              </div>
                              <!-- /.info-box-content -->
                            </div>

                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card -->
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
        <p style="text-align: center; color: black;">&copy; Copyrights 2020 by BPSDMD Provinsi Jawa Tengah</p>
        
    </div>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>

