<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <?= $this->session->flashdata('pesan'); ?>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-secondary shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                  <div class="form-group col-md-6">
                    <label>FULLNAME *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname']; ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>USERNAME *</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>EMAIL *</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PHONE *</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['no_telp']; ?>">
                    <?= form_error('phone', '<small class="text-danger pl-2">', '</small>'); ?>
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
        </div>
      </div>
  </section>
</div>