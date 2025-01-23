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
                  <li class="breadcrumb-item active" aria-current="page">COE</li>
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
                <h3 class="card-title">Center Of Excellent</h3>
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
<!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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
    <script src="../../../dist/js/adminlte.js"></script>
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
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const appSidebar = document.querySelector('.app-sidebar');
        const sidebarColorModes = document.querySelector('#sidebar-color-modes');
        const sidebarColor = document.querySelector('#sidebar-color');
        const sidebarColorCode = document.querySelector('#sidebar-color-code');

        const themeBg = [
          'bg-primary',
          'bg-primary-subtle',
          'bg-secondary',
          'bg-secondary-subtle',
          'bg-success',
          'bg-success-subtle',
          'bg-danger',
          'bg-danger-subtle',
          'bg-warning',
          'bg-warning-subtle',
          'bg-info',
          'bg-info-subtle',
          'bg-light',
          'bg-light-subtle',
          'bg-dark',
          'bg-dark-subtle',
          'bg-body-secondary',
          'bg-body-tertiary',
          'bg-body',
          'bg-black',
          'bg-white',
          'bg-transparent',
        ];

        // loop through each option themeBg array
        document.querySelector('#sidebar-color').innerHTML = themeBg.map((bg) => {
          // return option element with value and text
          return `<option value="${bg}" class="text-${bg}">${bg}</option>`;
        });

        let sidebarColorMode = '';
        let sidebarBg = '';

        function updateSidebar() {
          appSidebar.setAttribute('data-bs-theme', sidebarColorMode);

          sidebarColorCode.innerHTML = `<pre><code class="language-html">&lt;aside class="app-sidebar ${sidebarBg}" data-bs-theme="${sidebarColorMode}"&gt;...&lt;/aside&gt;</code></pre>`;
        }

        sidebarColorModes.addEventListener('input', (event) => {
          sidebarColorMode = event.target.value;
          updateSidebar();
        });

        sidebarColor.addEventListener('input', (event) => {
          sidebarBg = event.target.value;

          themeBg.forEach((className) => {
            appSidebar.classList.remove(className);
          });

          if (themeBg.includes(sidebarBg)) {
            appSidebar.classList.add(sidebarBg);
          }

          updateSidebar();
        });
      });

      document.addEventListener('DOMContentLoaded', () => {
        const appNavbar = document.querySelector('.app-header');
        const navbarColorModes = document.querySelector('#navbar-color-modes');
        const navbarColor = document.querySelector('#navbar-color');
        const navbarColorCode = document.querySelector('#navbar-color-code');

        const themeBg = [
          'bg-primary',
          'bg-primary-subtle',
          'bg-secondary',
          'bg-secondary-subtle',
          'bg-success',
          'bg-success-subtle',
          'bg-danger',
          'bg-danger-subtle',
          'bg-warning',
          'bg-warning-subtle',
          'bg-info',
          'bg-info-subtle',
          'bg-light',
          'bg-light-subtle',
          'bg-dark',
          'bg-dark-subtle',
          'bg-body-secondary',
          'bg-body-tertiary',
          'bg-body',
          'bg-black',
          'bg-white',
          'bg-transparent',
        ];

        // loop through each option themeBg array
        document.querySelector('#navbar-color').innerHTML = themeBg.map((bg) => {
          // return option element with value and text
          return `<option value="${bg}" class="text-${bg}">${bg}</option>`;
        });

        let navbarColorMode = '';
        let navbarBg = '';

        function updateNavbar() {
          appNavbar.setAttribute('data-bs-theme', navbarColorMode);
          navbarColorCode.innerHTML = `<pre><code class="language-html">&lt;nav class="app-header navbar navbar-expand ${navbarBg}" data-bs-theme="${navbarColorMode}"&gt;...&lt;/nav&gt;</code></pre>`;
        }

        navbarColorModes.addEventListener('input', (event) => {
          navbarColorMode = event.target.value;
          updateNavbar();
        });

        navbarColor.addEventListener('input', (event) => {
          navbarBg = event.target.value;

          themeBg.forEach((className) => {
            appNavbar.classList.remove(className);
          });

          if (themeBg.includes(navbarBg)) {
            appNavbar.classList.add(navbarBg);
          }

          updateNavbar();
        });
      });
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
