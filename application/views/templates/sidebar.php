<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">EOSystem</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/adminlte/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user['fullname']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- ========================= ADMIN STORE ============================== -->
        <?php if ($this->session->userdata('department_id') == 3) : ?>

          <li class="nav-item">
            <a href="<?= base_url('admin_store/dashboard'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dashboard') {
                                                                                  echo "active";
                                                                                } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'item' || $this->uri->segment(2) == 'client') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'item' || $this->uri->segment(2) == 'client') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-database text-blue"></i>
              <p>
                MASTER DATA
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin_store/item'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'item') {
                                                                                  echo "active";
                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_store/client'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'client') {
                                                                                    echo "active";
                                                                                  } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-table text-green"></i>
              <p>
                BUNDLING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin_store/list_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_bundling') {
                                                                                          echo "active";
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_store/request_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'request_bundling') {
                                                                                              echo "active";
                                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>

        <!-- ========================= ADMIN OPERATION ============================== -->
        <?php if ($this->session->userdata('department_id') == 4) : ?>

          <li class="nav-item">
            <a href="<?= base_url('admin_operation/dashboard'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'dashboard') {
                                                                                      echo "active";
                                                                                    } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-table text-green"></i>
              <p>
                BUNDLING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin_operation/list_bundling'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'list_bundling') {
                                                                                                echo "active";
                                                                                              } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_operation/request_bundling'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'request_bundling') {
                                                                                                  echo "active";
                                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'invoice' || $this->uri->segment(2) == 'berita_acara') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'invoice' || $this->uri->segment(2) == 'berita_acara') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-book text-orange"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin_operation/invoice'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'invoice') {
                                                                                          echo "active";
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_operation/berita_acara'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'berita_acara') {
                                                                                              echo "active";
                                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita Acara</p>
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>


        <!-- ========================= CLIENT ============================== -->
        <?php if ($this->session->userdata('department_id') == 5) : ?>

          <li class="nav-item">
            <a href="<?= base_url('client/dashboard'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'dashboard') {
                                                                              echo "active";
                                                                            } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'list_item_satuan' || $this->uri->segment(2) == 'list_item_bundling') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'list_item_satuan' || $this->uri->segment(2) == 'list_item_bundling') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-database text-blue"></i>
              <p>
                MASTER ITEM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('client/list_item_satuan'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_item_satuan') {
                                                                                        echo "active";
                                                                                      } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Item Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('client/list_item_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_item_bundling') {
                                                                                          echo "active";
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Item Bundling</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('client/data_request_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'data_request_bundling') {
                                                                                        echo "active";
                                                                                      } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                REQUEST
              </p>
            </a>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'cetak_invoice' || $this->uri->segment(2) == 'berita_acara') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'cetak_invoice' || $this->uri->segment(2) == 'berita_acara') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-database text-blue"></i>
              <p>
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('client/cetak_invoice'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'cetak_invoice') {
                                                                                      echo "active";
                                                                                    } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat & Cetak Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('client/berita_acara'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'berita_acara') {
                                                                                    echo "active";
                                                                                  } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Berita Acara</p>
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>


        <!-- ======================= TECH AND HOD TECH ============================ -->
        <?php if ($this->session->userdata('department_id') == 1) : ?>

          <li class="nav-item">
            <a href="<?= base_url('tech/dashboard'); ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? "active" : null; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'item' || $this->uri->segment(2) == 'client') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'item' || $this->uri->segment(2) == 'client') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-database text-blue"></i>
              <p>
                MASTER DATA
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/item'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'item') {
                                                                          echo "active";
                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/client'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'client') {
                                                                            echo "active";
                                                                          } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'list_bundling' || $this->uri->segment(2) == 'request_bundling') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-table text-green"></i>
              <p>
                BUNDLING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/list_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_bundling') {
                                                                                    echo "active";
                                                                                  } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/request_bundling'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'request_bundling') {
                                                                                      echo "active";
                                                                                    } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'invoice' || $this->uri->segment(2) == 'berita_acara') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'invoice' || $this->uri->segment(2) == 'berita_acara') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-book text-orange"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/invoice'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'invoice') {
                                                                              echo "active";
                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/berita_acara'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'berita_acara') {
                                                                                    echo "active";
                                                                                  } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita Acara</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if ($this->uri->segment(2) == 'user' || $this->uri->segment(2) == 'location' || $this->uri->segment(2) == 'client' || $this->uri->segment(2) == 'status') {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'user' || $this->uri->segment(2) == 'location' || $this->uri->segment(2) == 'client' || $this->uri->segment(2) == 'status') {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-cog text-white"></i>
              <p>
                SETUP
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/user'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'user') {
                                                                          echo "active";
                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>USERS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/location'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'location') {
                                                                              echo "active";
                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LOCATION</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/client'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'client') {
                                                                            echo "active";
                                                                          } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CLIENT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/status'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'status') {
                                                                            echo "active";
                                                                          } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>STATUS</p>
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>
        <!-- ======================= SUPERVISIOR ============================ -->

        <?php if ($this->session->userdata('department_id') == 6) : ?>

          <li class="nav-item">
            <a href="<?= base_url('supervisior/dashboard'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'dashboard') {
                                                                                  echo "active";
                                                                                } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('supervisior/berita_acara'); ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'berita_acara') {
                                                                                      echo "active";
                                                                                    } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                BERITA ACARA
              </p>
            </a>
          </li>

        <?php endif; ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>