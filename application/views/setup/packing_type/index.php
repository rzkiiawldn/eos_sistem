<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <a href="<?= base_url('setup/packing_type/create_packing_type') ?>" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a>
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
                    <thead class="text-uppercase">
                      <tr>
                        <th width="5%">NO</th>
                        <th>packing type CODE</th>
                        <th>packing type NAME</th>
                        <th width="10%">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($packing_type as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['packing_type_code']; ?></td>
                          <td><?= $row['packing_type_name']; ?></td>
                          <td>
                            <a href="<?= base_url('setup/packing_type/edit_packing_type/' . $row['id_packing_type']) ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('setup/packing_type/delete_packing_type/' . $row['id_packing_type']) ?>" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>
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