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
                <button class="btn btn-primary float-end mb-3" id="showFormBtn">
                        <i class="fas fa-plus"></i> Tambah
                </button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px; text-align: center;" align-middle>No</th>
                            <th style="width: 150px; text-align: center;" align-middle>Thumbnail Video</th>
                            <th style="width: 250px; text-align: center;" align-middle>Nama Video</th>
                            <th style="width: 100px; text-align: center;" align-middle>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!is_null($modul) && count($modul) > 0): ?>
                            <?php foreach ($modul as $key => $item): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $item->thumbnail ?></td>
                                    <td><?= $item->nama_modul ?></td>
                                    <td>
                                        <a href="<?= site_url('modul/download/' . $item->id) ?>" class="btn btn-primary btn-sm">Download</a>
                                        <button class="btn btn-warning btn-sm edit-btn" 
                                            data-id="<?= $item->id ?>"
                                            data-thumbnail="<?= $item->thumbnail ?>" 
                                            data-title="<?= $item->nama_modul ?>"  
                                            data-file="<?= $item->file_name ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <br />
                                        <a href="<?= site_url('modul/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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
              <label for="jenis_kompetensi">Jenis Kompetensi</label>
              <input type="text" class="form-control mb-4" name="jenis_kompetensi" id="jenis_kompetensi" required>
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
            <div class="form-group">
            <label for="thumbnail">Thumbnail Video</label>
            <input type="file" class="form-control mb-4" name="thumbnail" id="thumbnail" accept="image/*,video/*,application/pdf" required>
        </div>
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" class="form-control mb-4" name="file" id="file" accept="image/*,video/*,application/pdf" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
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
    <script 
      src="https://code.jquery.com/jquery-3.6.4.min.js"
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
    <!-- Script for handle edit -->
    <script>
    $(document).ready(function () {
        $(".edit-btn").click(function () {
            // Get data attributes from the button
            var id = $(this).data("id");
            var thumbnail = $(this).data("thumbnail");
            var nama_modul = $(this).data("nama_modul");
            var date = $(this).data("date");
            var file = $(this).data("file");

            // Redirect to the edit page with the ID
            window.location.href = "<?= site_url('modul/edit_modul/') ?>" + id;
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
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++
      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };
      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
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
    <!-- jsvectormap -->
    <script>
      const visitorsData = {
        US: 398, // USA
        SA: 400, // Saudi Arabia
        CA: 1000, // Canada
        DE: 500, // Germany
        FR: 760, // France
        CN: 300, // China
        AU: 700, // Australia
        BR: 600, // Brazil
        IN: 800, // India
        GB: 320, // Great Britain
        RU: 3000, // Russia
      };
      // World map by jsVectorMap
      const map = new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });
      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };
      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();
      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };
      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();
      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };
      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();

    </script>
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