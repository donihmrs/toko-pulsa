<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
      <?php if (isset($config) && $config->logo != NULL) { ?>
        <img src="<?=base_url()?>../public/image/<?=$config->logo?>" alt="Company Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <?php } else { ?>
      <img src="<?php echo asset_url();?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <?php } ?>
      <span class="brand-text font-weight-light">Admin-ECOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="#"><i class="nav-icon fas fa-user"></i></a>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= ucfirst($this->session->userdata('nama'))?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url()?>" class="nav-link <?= (strtolower($halaman) == 'dashboard' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Barang</li>

          <li class="nav-item">
            <a href="<?= base_url()?>barang" class="nav-link <?= (strtolower($halaman) == 'barang' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                List Barang
                <span class="right badge badge-primary right">List</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url()?>kategori" class="nav-link <?= (strtolower($halaman) == 'kategori' ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Kategori
                <span class="right badge badge-warning right">List</span>
              </p>
            </a>
          </li>

          <?php if ($this->session->userdata('level') == 1) { ?>
            <li class="nav-header">Administrator</li>

            <li class="nav-item">
              <a href="<?= base_url()?>admin/list" class="nav-link <?= (strtolower($halaman) == 'user' ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                  <span class="right badge badge-success right">List</span>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url()?>config" class="nav-link <?= (strtolower($halaman) == 'config' ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Konfigurasi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url()?>transaksi" class="nav-link <?= (strtolower($halaman) == 'transaksi' ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Transaksi
                  <span class="right badge badge-info right">List</span>
                </p>
              </a>
            </li>

            <li class="nav-header">Template</li>

            <li class="nav-item">
              <a href="<?= base_url()?>media" class="nav-link <?= (strtolower($halaman) == 'media sosial' ? 'active' : ''); ?>">
                <i class="nav-icon fab fa-facebook"></i>
                <p>
                  Media Sosial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>gambar" class="nav-link <?= (strtolower($halaman) == 'gambar' ? 'active' : ''); ?>">
                <i class="nav-icon far fa-images"></i>
                <p>
                  Gambar
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url()?>template" class="nav-link <?= (strtolower($halaman) == 'template' ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-air-freshener"></i>
                <p>
                  Others
                </p>
              </a>
            </li>
          <?php } ?>
          
          <li class="nav-header">Account</li>

          <li class="nav-item">
            <a href="<?= base_url()?>profile" class="nav-link">
              <i class="far fa-circle nav-icon text-light"></i>
              <p>My Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>bank" class="nav-link">
              <i class="far fa-circle nav-icon text-light"></i>
              <p>Account Bank</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url()?>logout" class="nav-link">
              <i class="far fa-circle nav-icon text-danger"></i>
              <p>Logout</p>
            </a>
          </li>
          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li> -->
          
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>