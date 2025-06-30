<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $namaDiklat ?></h1>   
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Kelas') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Diklat') ?>">Master Pelatihan</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/Diklat/materi/'.$id_diklat) ?>">Materi</a></li>
                        <li class="breadcrumb-item active">Lihat Materi</li>
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
                                Materi: <?= $namaMateri ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <embed width="100%" height="800px" src="<?= base_url('./assets/materi/' . $materi); ?>" type="application/pdf"></embed>
                        </div>
                        <!-- /.card -->
                    </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <!-- jQuery -->