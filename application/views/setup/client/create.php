<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('setup/client'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> LIST client</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('setup/client'); ?>">client</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>user *</label>
                    <select name="user_id" id="user_id" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php foreach ($data_user as $row) : ?>
                        <option value="<?= $row['id_user'] ?>"><?= $row['fullname']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('user_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>client Code *</label>
                    <input type="text" class="form-control" id="client_code" name="client_code" value="<?= set_value('client_code'); ?>">
                    <?= form_error('client_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>client Name *</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" value="<?= set_value('client_name'); ?>">
                    <?= form_error('client_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>stock allocation *</label>
                    <input type="text" class="form-control" id="title" name="id_stock_allocation" value="<?= set_value('id_stock_allocation'); ?>">
                    <?= form_error('id_stock_allocation', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-info">CREATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>