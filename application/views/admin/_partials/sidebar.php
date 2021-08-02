<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('assets/') ?>images/favicon.png" alt="Mam-mam Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: #c8a97e; font-family: 'Great Vibes', cursive;">Mam-mam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/') ?>images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama_user') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2" || $this->session->userdata('id_level') == "3" || $this->session->userdata('id_level') == "4") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/home') ?>" class="nav-link <?php if($this->uri->segment('3') == 'home'){echo "active"; } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2" || $this->session->userdata('id_level') == "3") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/registrasi') ?>" class="nav-link <?php if($this->uri->segment('3') == 'registrasi'){echo "active"; } ?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Registrasi
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1") { ?>
          <li class="nav-item has-treeview <?php if($this->uri->segment('3') == 'user' || $this->uri->segment('3') == 'menu' ){echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment('3') == 'user' || $this->uri->segment('3') == 'menu' ){echo "active"; } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Entri Referensi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('dashboard/manage/user') ?>" class="nav-link <?php if($this->uri->segment('3') == 'user'){echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('dashboard/manage/menu') ?>" class="nav-link <?php if($this->uri->segment('3') == 'menu'){echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Menu</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/meja') ?>" class="nav-link <?php if($this->uri->segment('3') == 'meja'){echo "active"; } ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Meja
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/order') ?>" class="nav-link <?php if($this->uri->segment('3') == 'order' || $this->uri->segment('3') == 'data_order'){echo "active"; } ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Entri Order
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "3") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/transaksi') ?>" class="nav-link <?php if($this->uri->segment('3') == 'transaksi'){echo "active"; } ?>">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Entri Transaksi
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2" || $this->session->userdata('id_level') == "3" || $this->session->userdata('id_level') == "4") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard/manage/laporan') ?>" class="nav-link <?php if($this->uri->segment('3') == 'laporan'){echo "active"; } ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Generate Laporan
              </p>
            </a>
          </li>
          <?php  } ?>

          <?php if ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "2" || $this->session->userdata('id_level') == "3" || $this->session->userdata('id_level') == "4") { ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dashboard/manage/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>