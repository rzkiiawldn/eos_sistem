<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 mt-4">
            <div class="col-sm-6">
              <div class="dropdown">
                <a href="<?= base_url('setup/setting/menu_access'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> Back</a>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-info shadow">
                <div class="card-header border-transparent">
                  <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> Department :</b><?= $department['name']; ?></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Menu</th>
                        <th>Subenu</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($submenu as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['menu']; ?></td>
                          <td><?= $row['submenu']; ?></td>
                          <td class="text-center">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" <?= cek_akses($department['department_id'], $row['id_menu'], $row['id_submenu']); ?> data-department="<?= $department['department_id']; ?>" data-menu="<?= $row['id_menu']; ?>" data-submenu="<?= $row['id_submenu'] ?>">
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>