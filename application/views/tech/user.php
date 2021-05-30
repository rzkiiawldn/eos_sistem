<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <a href="<?= base_url('tech/user/create'); ?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('tech/user'); ?>">Users</a></li>
                <li class="breadcrumb-item active">List</li>
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
                  <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> USERS </b> </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th>FULLNAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>DEPARTMENT</th>
                        <th width="10%">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($data_user as $us) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $us['fullname']; ?></td>
                          <td><?= $us['username']; ?></td>
                          <td><?= $us['email']; ?></td>
                          <td><?= $us['no_telp']; ?></td>
                          <td><?= $us['name']; ?></td>
                          <td>
                            <a href="<?= base_url('tech/user/edit/' . $us['id_user']) ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('tech/user/delete/' . $us['id_user']) ?>" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>
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