<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="<?php echo site_url('pageAdmin/dashboard'); ?>" class="brand-link">
            <img src="<?php echo base_url('uploads/image/logo.png') ?>" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
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
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Website
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('page/home'); ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Home</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('page/pageModul'); ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu Modul</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('page/pageWarta'); ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu E-Warta</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('page/pageJournal'); ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Menu E-Journal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('page/pageCoe'); ?>" class="nav-link">
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
    document.addEventListener("DOMContentLoaded", function () {
        let menuItems = document.querySelectorAll(".toggle-menu");
        
        menuItems.forEach(item => {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                let parent = this.closest(".nav-item");
                let submenu = parent.querySelector(".nav-treeview");
                let arrow = this.querySelector(".nav-arrow");
                
                if (submenu.style.display === "none" || submenu.style.display === "") {
                    submenu.style.display = "block";
                    arrow.classList.replace("bi-chevron-right", "bi-chevron-down");
                } else {
                    submenu.style.display = "none";
                    arrow.classList.replace("bi-chevron-down", "bi-chevron-right");
                }
            });
        });
    });
</script>
