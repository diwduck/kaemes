<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="<?php echo site_url('pageAdmin/dashboard');?>" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="<?php echo base_url('uploads/image/logo.png')?>"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light"> Portal Admin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="<?php echo site_url('pageAdmin/dashboard');?>" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Repositori
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('pageAdmin/addModul'); ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Modul Pembelajaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('pageAdmin/addWarta');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>E-Warta</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('pageAdmin/addJournal');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>E-journal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('pageAdmin/addCoe');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>COE</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-clipboard-fill"></i>
                  <p>
                    Statistik
                    <span class="nav-badge badge text-bg-secondary me-3">6</span>
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('assets/dist/pages/layout/unfixed-sidebar.html')?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Statistik pengunjung</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('assets/dist/pages/layout/fixed-sidebar.html')?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Statistik download</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Website
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
<<<<<<< Updated upstream
                    <a href="<?php echo site_url('page/home'); ?>" class="nav-link">
=======
                    <a href="<?php echo site_url('pageAdmin/home')?>" class="nav-link">
>>>>>>> Stashed changes
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Home</p>
                    </a>
                  </li>
                  <li class="nav-item">
<<<<<<< Updated upstream
                    <a href="<?php echo site_url('page/pageModul'); ?>" class="nav-link">
=======
                    <a href="<?php echo site_url('pageAdmin/pageModul')?>" class="nav-link">
>>>>>>> Stashed changes
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu Modul</p>
                    </a>
                  </li>
                  <li class="nav-item">
<<<<<<< Updated upstream
                    <a href="<?php echo site_url('page/pageWarta'); ?>" class="nav-link">
=======
                    <a href="<?php echo site_url('pageAdmin/pageWarta')?>" class="nav-link">
>>>>>>> Stashed changes
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu E-Warta</p>
                    </a>
                  </li>
                  <li class="nav-item">
<<<<<<< Updated upstream
                    <a href="<?php echo site_url('page/pageJournal'); ?>" class="nav-link">
=======
                    <a href="<?php echo site_url('pageAdmin/pageJournal')?>" class="nav-link">
>>>>>>> Stashed changes
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu E-Journal</p>
                    </a>
                  </li>
                  <li class="nav-item">
<<<<<<< Updated upstream
                    <a href="<?php echo site_url('page/pageCoe'); ?>" class="nav-link">
=======
                    <a href="<?php echo site_url('pageAdmin/pageCoe')?>" class="nav-link">
>>>>>>> Stashed changes
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu COE</p>
                    </a>
                  </li>
                </ul>
              </li>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    let currentPath = window.location.pathname;
    let navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach((link) => {
      let linkPath = new URL(link.href).pathname;

      if (currentPath === linkPath) {
        link.classList.add('active');
        
        // If it's a submenu item, keep its parent menu open
        let parentTreeview = link.closest('.nav-treeview');
        if (parentTreeview) {
          parentTreeview.previousElementSibling.classList.add('active');
          parentTreeview.closest('.nav-item').classList.add('menu-open');
        }
      } else {
        link.classList.remove('active');
      }
    });
  });
</script>
