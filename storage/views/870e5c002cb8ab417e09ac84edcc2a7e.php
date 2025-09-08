<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">
            Company name
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi" aria-hidden="true">
                  <use xlink:href="#house-fill"></use>
                </svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo  aurl('categories') ; ?>">
                <i class="fa-solid fa-list-ul"></i>
                <?php echo  trans('admin.categories') ; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo  aurl('news') ; ?>">
                <i class="fa-solid fa-newspaper"></i>
                <?php echo  trans('admin.news') ; ?>
              </a>
            </li>
          </ul>
            <hr class="my-3" />
            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <i class="fa-solid fa-screwdriver-wrench"></i>
                  Settings
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="<?php echo  url('admin/logout') ; ?>">
                  <!-- <svg class="bi" aria-hidden="true">
                    <use xlink:href="#door-closed"></use>
                  </svg> -->
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <?php echo  trans ('admin.logout') ; ?>
                </a>
              </li>
            </ul>
        </div>
      </div>
    </div>