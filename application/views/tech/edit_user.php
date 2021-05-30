<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/user'); ?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> LIST</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/user'); ?>">Users</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-secondary shadow">
            <div class="card-header">
              <h3 class="card-title">USER INFORMATION</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>FULLNAME *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $data_user['fullname']; ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>USERNAME *</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $data_user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>EMAIL *</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $data_user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PHONE *</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $data_user['no_telp']; ?>">
                    <?= form_error('phone', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="col-md-3 col-form-label">DEPARTMENT *</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                      <option selected="" disabled value="">Select Department</option>
                      <?php foreach ($department as $dept) : ?>
                        <?php if ($data_user['department_id'] == $dept['department_id']) { ?>
                          <option value="<?= $dept['department_id']; ?>" selected><?= $dept['name']; ?></option>
                        <?php } else {  ?>
                          <option value="<?= $dept['department_id']; ?>"><?= $dept['name']; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <hr>
                <p style="font-size: 12px;color: red;">Kosongkan jika tidak diisi</p>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>PASSWORD *</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>RETYPE PASSWORD *</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-secondary float-right">EDIT</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>