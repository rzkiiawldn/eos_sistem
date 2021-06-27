<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">EOSystem</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('profile') ?>" class="d-block"><b><?= $user['fullname']; ?></b></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-uppercase" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php
        $client = $this->db->get('client')->result_array();
        $location = $this->db->get('location')->result_array() ?>



        <div class="form-group">
          <ul>
            <?php foreach ($client as $row) : ?>
              <li><a href="<?= base_url('master_data/item/index/' . $row['id_client']) ?>">
                  <?= $row['client_name']; ?></li>
              </a>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="form-group">
          <ul>
            <?php foreach ($location as $row) : ?>
              <li><a href="<?= base_url('master_data/item/index/' . $this->uri->segment(4) . '/' . $row['id_location']) ?>">
                  <?= $row['location_name']; ?></li>
              </a>
            <?php endforeach; ?>
          </ul>
        </div>

        <?php if (empty($this->uri->segment(5))) { ?>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/' . $this->uri->segment(4)); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Tes
              </p>
            </a>
          </li>
        <?php } elseif (!empty($this->uri->segment(4))) { ?>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Tes
              </p>
            </a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Tes
              </p>
            </a>
          </li>
        <?php } ?>

        <!-- ========================= ADMIN STORE ============================== -->

        <li class="nav-item">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
            <i class="nav-icon  fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php
        $id_level = $this->session->userdata('department_id');
        $menu     = $this->db->query("SELECT * FROM user_menu um JOIN user_access_menu uam ON um.id_menu = uam.id_menu WHERE uam.id_level = $id_level GROUP BY uam.id_menu ORDER BY menu_order ASC")->result();
        ?>
        <?php foreach ($menu as $m) : ?>
          <?php if ($m->url != '#') : ?>
            <li class="nav-item <?= strtolower($nama_menu) == strtolower($m->menu) ? "menu-open" : null; ?>">
              <a href="<?= base_url($m->url); ?>" class="nav-link">
                <i class="nav-icon <?= $m->icon; ?>"></i>
                <p>
                  <?= $m->menu; ?>
                </p>
              </a>
            </li>
          <?php else : ?>
            <li class="nav-item <?= strtolower($nama_menu) == strtolower($m->menu) ? "menu-open" : null; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon <?= $m->icon ?> text-white"></i>
                <p>
                  <?= $m->menu; ?>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <?php $id_menu = $m->id_menu ?>
              <?php $submenu = $this->db->query("SELECT * FROM user_submenu us JOIN user_access_menu uam ON us.id_submenu = uam.id_submenu WHERE uam.id_level = $id_level AND us.menu_id = $id_menu AND us.active = 1 ORDER BY us.submenu_order ASC")->result(); ?>
              <ul class="nav nav-treeview">
                <?php foreach ($submenu as $s) : ?>
                  <li class="nav-item">
                    <a href="<?= base_url($s->url); ?>" class="nav-link <?= strtolower($judul) == strtolower($s->submenu) ? null : null; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $s->submenu; ?></p>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>