<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('setup/packing_type'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> LIST</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('setup/packing_type'); ?>">packing type</a></li>
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
              <div class="card-body text-uppercase">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>packing type Code *</label>
                    <input type="text" class="form-control" id="packing_type_code" name="packing_type_code" value="<?= set_value('packing_type_code'); ?>">
                    <?= form_error('packing_type_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>packing type Name *</label>
                    <input type="text" class="form-control" id="packing_type_name" name="packing_type_name" value="<?= set_value('packing_type_name'); ?>">
                    <?= form_error('packing_type_name', '<small class="text-danger pl-2">', '</small>'); ?>
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