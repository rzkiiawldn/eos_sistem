<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-info shadow">
                <div class="card-header border-transparent">
                  <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> <?= $judul; ?></b></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead class="text-uppercase">
                      <tr>
                        <th width="5%">No</th>
                        <th>Name</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($department as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['name']; ?></td>
                          <td><a href="<?= base_url('setup/setting/manage_access/' . $row['department_id']) ?>" class="btn btn-sm btn-danger">Manage Access</a>
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