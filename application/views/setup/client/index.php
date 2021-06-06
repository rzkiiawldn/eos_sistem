<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php if ($user['department_id'] == 1 || $user['department_id'] == 2) { ?>
                <a href="<?= base_url('setup/client/create_client') ?>" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a>
              <?php } ?>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->


          <div class="row">
            <div class="col-md-12">
              <div class="card card-info shadow">
                <div class="card-header border-transparent">
                  <h3 class="card-title"> <i class="fas fa-map mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="5%">NO</th>
                        <th>USER</th>
                        <th>CLIENT CODE</th>
                        <th>CLIENT NAME</th>
                        <th>STOCK ALLOCATION</th>
                        <th width="15%">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($client as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['user_id']; ?></td>
                          <td><?= $row['client_code']; ?></td>
                          <td><?= $row['client_name']; ?></td>
                          <td><?= $row['id_stock_allocation']; ?></td>
                          <td>
                            <?php if ($user['department_id'] == 1 || $user['department_id'] == 2) { ?>
                              <a href="<?= base_url('setup/client/detail_client/' . $row['id_client']) ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                              <a href="<?= base_url('setup/client/edit_client/' . $row['id_client']) ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                              <a href="<?= base_url('setup/client/delete_client/' . $row['id_client']) ?>" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>
                            <?php } else { ?>
                              <a href="<?= base_url('setup/client/detail_client/' . $row['id_client']) ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>