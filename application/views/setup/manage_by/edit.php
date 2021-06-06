<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('setup/manage_by'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> LIST manage_by</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('setup/manage_by'); ?>">manage_by</a></li>
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
                  <input type="hidden" class="form-control" id="id_manage_by" name="id_manage_by" value="<?= $manage_by['id_manage_by']; ?>">
                  <div class="form-group col-md-6">
                    <label>manage_by Code *</label>
                    <input type="text" class="form-control" id="manage_by_code" name="manage_by_code" value="<?= $manage_by['manage_by_code']; ?>">
                    <?= form_error('manage_by_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>manage_by Name *</label>
                    <input type="text" class="form-control" id="manage_by_name" name="manage_by_name" value="<?= $manage_by['manage_by_name']; ?>">
                    <?= form_error('manage_by_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-info">EDIT</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>