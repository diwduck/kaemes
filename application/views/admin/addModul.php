
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
                  <li class="breadcrumb-item"><a href="#">Repositori</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modul</li>
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
                <h3 class="card-title">Modul</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Button to toggle form visibility with + icon, aligned right -->
                <button class="btn btn-success float-end mb-3" id="showFormBtn">
                        <i class="fas fa-plus"></i> Tambah
                </button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px; text-align: center;" align-middle>No</th>
                            <th style="width: 60px; text-align: center;" align-middle>Thumbnail Video</th>
                            <th style="width: 150px; text-align: center;" align-middle>Nama Modul</th>
                            <th style="width: 90px; text-align: center;" align-middle>Penyusun</th>
                            <th style="width: 130px; text-align: center;" align-middle>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!is_null($modul) && count($modul) > 0): ?>
                            <?php foreach ($modul as $key => $item): ?>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $key + 1 ?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="<?= base_url('uploads/' . $item->thumbnail) ?>" 
                                            alt="Thumbnail" 
                                            style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px; cursor: pointer;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#imageModal" 
                                            onclick="showImage('<?= base_url('uploads/' . $item->thumbnail) ?>')">
                                    </td>
                                    <td><?= $item->nama_modul ?></td>
                                    <td><?= $item->penyusun_1?>
                                    <br><?= $item->penyusun_2?>
                                    <br><?= $item->penyusun_3?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="<?= site_url('modul/download/' . $item->id) ?>" class="btn btn-primary btn-sm">
                                          <i class="fas fa-download"></i>Download
                                        </a>
                                        <button class="btn btn-warning btn-sm edit-btn" 
                                            data-id="<?= $item->id ?>"
                                            data-title="<?= $item->nama_modul ?>"
                                            data-penyusun1="<?= $item->penyusun_1 ?>"
                                            data-penyusun2="<?= $item->penyusun_2 ?>"    
                                            data-penyusun3="<?= $item->penyusun_3 ?>"
                                            data-deskripsi="<?= $item->deskripsi ?>"
                                            data-lembaga_penerbit="<?= $item->lembaga_penerbit ?>"
                                            data-file="<?= $item->file_name ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="<?= site_url('modul/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                          <i class="fas fa-trash"></i>Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No data available</td>
                            </tr>
                        <?php endif; ?>
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
      <form method="post"  id="modulForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_modul">Nama Modul</label>
            <textarea class="form-control mb-4" name="nama_modul" id="nama_modul" required></textarea>
        </div>
            <div class="form-group">
              <label for="penyusun_1">Penyusun 1</label>
              <input type="text" class="form-control mb-4" name="penyusun_1" id="penyusun_1" required>
            </div>
            <div class="form-group">
              <label for="penyusun_2">Penyusun 2</label>
              <input type="text" class="form-control mb-4" name="penyusun_2" id="penyusun_2">
            </div>
            <div class="form-group">
              <label for="penyusun_3">Penyusun 3</label>
              <input type="text" class="form-control mb-4" name="penyusun_3" id="penyusun_3">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control mb-4" name="deskripsi" id="deskripsi"></textarea>
            </div>
            <div class="form-group">
              <label for="lembaga_penerbit">Lembaga Penerbit</label>
              <input type="text" class="form-control mb-4" name="lembaga_penerbit" id="lembaga_penerbit" required>
            </div>
            <div class="form-group mb-4">
            <label for="file_thumbnail">Upload Thumbnail Video</label>
            <input type="file" class="form-control" name="file_thumbnail" id="file_thumbnail" accept="image/*" required>
            <small class="form-text text-muted">Hanya gambar: JPG, PNG</small>
        </div>
        <div class="form-group mb-4">
            <label for="file">Upload File</label>
            <input type="file" class="form-control" name="file" id="file" accept="image/*,video/*,application/pdf" required>
            <small class="form-text text-muted">File yang diupload: PDF</small>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Modul</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editModulForm" enctype="multipart/form-data">
          <input type="hidden" name="id" id="editId">
          <div class="form-group">
            <label for="editNamaModul">Judul Modul</label>
            <input type="text" class="form-control mb-4" name="nama_modul" id="editNamaModul" required>
          </div>
          <div class="form-group">
            <label for="editPenyusun1">Penyusun 1</label>
            <textarea class="form-control mb-4" name="penyusun_1" id="editPenyusun1" required></textarea>
          </div>
          <div class="form-group">
            <label for="editPenyusun2">Penyusun 2</label>
            <textarea class="form-control mb-4" name="penyusun_2" id="editPenyusun2" required></textarea>
          </div>
          <div class="form-group">
            <label for="editPenyusun3">Penyusun 3</label>
            <textarea class="form-control mb-4" name="penyusun_3" id="editPenyusun3" required></textarea>
          </div>
          <div class="form-group">
            <label for="editDeskripsi">Deskripsi</label>
            <textarea class="form-control mb-4" name="deskripsi" id="editDeskripsi" required></textarea>
          </div>
          <div class="form-group">
            <label for="editPenerbit">Lembaga Penerbit</label>
            <textarea class="form-control mb-4" name="lembaga_penerbit" id="editPenerbit" required></textarea>
          </div>
          <div class="form-group mb-4">
            <label for="editFileThumbnail">Upload Thumbnail</label>
            <input type="file" class="form-control" name="file_thumbnail" id="editFileThumbnail" accept="image/*">
            <small class="form-text text-muted">Hanya gambar: JPG, PNG</small>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script 
      src="https://code.jquery.com/jquery-3.6.4.min.js"
    ></script>

<script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?php echo base_url('assets/dist/js/adminlte.js')?>"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
      crossorigin="anonymous"
    ></script>
    <!-- js for Form submission -->
    <script>
    $('#modulForm').on('submit', function(e) {
    e.preventDefault();
    console.log('Form submission handler triggered!');
    let formData = new FormData(this);
    $.ajax({
        url: '<?= site_url('modul/add') ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log('Server response:', response);
            let res = JSON.parse(response);
            if (res.success) {
                alert('Data successfully saved!');
                location.reload();
            } else {
                alert('Error: ' + res.error);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', xhr.responseText);
        }
    });
});

    </script>
    <!-- Script for handle edit -->
    <script>
    $(document).ready(function () {
          $(".edit-btn").click(function () {
              var id = $(this).data("id");

              // Ambil data untuk diisi ke modal
              $.ajax({
                  url: '<?= site_url('modul/edit_modul/') ?>' + id,
                  type: 'GET',
                  success: function(response) {
                      var data = JSON.parse(response);

                      $("#editId").val(data.id);
                      $("#editNamaModul").val(data.nama_modul);
                      $("#editPenyusun1").val(data.penyusun_1);
                      $("#editPenyusun2").val(data.penyusun_2);
                      $("#editPenyusun3").val(data.penyusun_3);
                      $("#editDeskripsi").val(data.deskripsi);
                      $("#editPenerbit").val(data.lembaga_penerbit);
                      $("#editModal").modal("show");
                }
              });
            
          $("#editModal").appendTo("body"); // Ensure modal is appended to body
          });

          $("#editModulForm").on('submit', function(e) {
              e.preventDefault();
              let formData = new FormData(this);
              $.ajax({
                  url: '<?= site_url('modul/edit_modul/') ?>' + $("#editId").val(),
                  type: 'POST',
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function(response) {
                      let res = JSON.parse(response);
                      if (res.success) {
                          alert('Data berhasil diperbarui!');
                          location.reload(); // Reload halaman untuk melihat perubahan
                      } else {
                          alert('Error: ' + res.error);
                      }
                  },
                  error: function(xhr, status, error) {
                      console.error('AJAX error:', xhr.responseText);
                  }
              });
          });
      });
</script>

    <!-- sortablejs -->
    <script>
      const connectedSortables = document.querySelectorAll('.connectedSortable');
      connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
          group: 'shared',
          handle: '.card-header',
        });
      });
      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
      <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
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


