<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a>
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
                  <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

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
                        <th width="5%">No</th>
                        <th>Submenu</th>
                        <th>Menu</th>
                        <th>Icon</th>
                        <th>Url</th>
                        <th>Active</th>
                        <th>Subenu Order</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($submenu as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['submenu']; ?></td>
                          <td><?= $row['menu']; ?></td>
                          <td><?= $row['icon']; ?></td>
                          <td><?= $row['url']; ?></td>
                          <td><?= $row['active'] == 1 ? 'Active' : 'Not Active'; ?></td>
                          <td><?= $row['submenu_order']; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit<?= $row['id_submenu'] ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('setup/setting/delete_submenu/' . $row['id_submenu']) ?>" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>
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


    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahLabel">Add Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('setup/setting/add_submenu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="submenu">Submenu</label>
                <input type="text" class="form-control" id="submenu" name="submenu">
              </div>
              <div class="form-group">
                <label for="menu_id">Menu</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="" selected disabled>-- pilih --</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id_menu'] ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon">
              </div>
              <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="#">
              </div>
              <div class="form-group">
                <label for="submenu_order">Subenu Order</label>
                <input type="number" min="1" class="form-control" id="submenu_order" name="submenu_order">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" value="1" class="form-check-input" name="active" id="active" checked>
                  <label for="active" class="form-check-label">Active ?</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>




    <?php foreach ($submenu as $row) { ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?= $row['id_submenu']; ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editLabel">Edit Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url("setup/setting/edit_submenu/" . $row['id_submenu']); ?>" method="post">
              <div class="modal-body">
                <input type="hidden" class="form-control" id="id_submenu" name="id_submenu" value="<?= $row['id_submenu']; ?>">
                <div class="form-group">
                  <label for="submenu">Submenu</label>
                  <input type="text" class="form-control" id="submenu" name="submenu" value="<?= $row['submenu']; ?>">
                </div>
                <div class="form-group">
                  <label for="menu_id">menu_id</label>
                  <select class="form-control" id="menu_id" name="menu_id" required="">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($menu as $m) { ?>
                      <?php if ($m['id_menu'] == $row['menu_id']) { ?>
                        <option value="<?= $m['id_menu']; ?>" selected><?= $m['menu']; ?></option>
                      <?php } else { ?>
                        <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control" id="icon" name="icon" value="<?= $row['icon']; ?>">
                </div>
                <div class="form-group">
                  <label for="url">Url</label>
                  <input type="text" class="form-control" id="url" name="url" value="<?= $row['url']; ?>">
                </div>
                <div class="form-group">
                  <label for="submenu_order">Subenu Order</label>
                  <input type="number" min="1" class="form-control" id="submenu_order" name="submenu_order" value="<?= $row['submenu_order']; ?>">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <?php if ($row['active'] == 1) { ?>
                      <input type="checkbox" value="<?= $row['active'] ?>" class="form-check-input" name="active" id="active" checked>
                    <?php } else { ?>
                      <input type="checkbox" value="1" class="form-check-input" name="active" id="active">
                    <?php } ?>
                    <label for="" class="form-check-label">Active ?</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>