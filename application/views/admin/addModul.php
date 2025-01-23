<head> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<?php $this->load->view('admin/template/meta') ?>
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <?php $this->load->view('admin/template/navbar') ?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php $this->load->view('admin/template/sidebar') ?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Repositori</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Repositori</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modul Pembelajaran</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Modul Pembelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Button to toggle form visibility with + icon, aligned right -->
                <button class="btn btn-primary float-end mb-3" id="showFormBtn">
                        <i class="fas fa-plus"></i> Tambah
                </button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px; text-align: center;" align-middle>No</th>
                            <th style="width: 150px; text-align: center;" align-middle>Tumbnail Video</th>
                            <th style="width: 250px; text-align: center;" align-middle>Nama Modul</th>
                            <th style="width: 150px; text-align: center;" align-middle>Penyusun</th>
                            <th style="width: 100px; text-align: center;" align-middle>Label</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
    </div>
    </main>
    <?php $this->load->view('admin/template/footer') ?>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="card card-primary card-outline mb-4"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Modul</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="moduleName">Nama Modul</label>
                <input type="text" class="form-control mb-4" id="moduleName" placeholder="Masukkan Nama Modul">
            </div>
            <div class="form-group">
                <label for="moduleDescription">Deskripsi Modul</label>
                <textarea class="form-control  mb-4" id="moduleDescription" placeholder="Masukkan Deskripsi Modul"></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnailVideo">Tumbnail Video Uploud</label>
                <input type="file" class="form-control  mb-4" id="thumbnailVideo">
            </div>

            <div class="form-group">
                <label for="uploadFile">File Uploud</label>
                <input type="file" class="form-control  mb-4" id="uploadFile">
            </div>

            

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome CDN -->

<script>
    // Get the button that opens the modal
    const showFormBtn = document.getElementById('showFormBtn');
    const modal = new bootstrap.Modal(document.getElementById('formModal'));

    // Show the modal when the button is clicked
    showFormBtn.addEventListener('click', function() {
        modal.show(); // Show the modal
    });
</script>