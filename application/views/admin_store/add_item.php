<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <a href="<?= base_url('admin_store/item'); ?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin_store/item'); ?>">Item</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <input type="text" class="form-control" id="manage_by" name="manage_by" value="<?= set_value('manage_by'); ?>">
                    <?= form_error('manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>item_code *</label>
                    <input type="text" class="form-control" id="item_code" name="item_code" value="<?= set_value('item_code'); ?>">
                    <?= form_error('item_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?= set_value('barcode'); ?>">
                    <?= form_error('barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>item_name *</label>
                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?= set_value('item_name'); ?>">
                    <?= form_error('item_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>description *</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= set_value('description'); ?>">
                    <?= form_error('description', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>brand *</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= set_value('brand'); ?>">
                    <?= form_error('brand', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>category *</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?= set_value('category'); ?>">
                    <?= form_error('category', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>model *</label>
                    <input type="text" class="form-control" id="model" name="model" value="<?= set_value('model'); ?>">
                    <?= form_error('model', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>minimum_stock *</label>
                    <input type="text" class="form-control" id="minimum_stock" name="minimum_stock" value="<?= set_value('minimum_stock'); ?>">
                    <?= form_error('minimum_stock', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>publish_price *</label>
                    <input type="text" class="form-control" id="publish_price" name="publish_price" value="<?= set_value('publish_price'); ?>">
                    <?= form_error('publish_price', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>addtional_expired *</label>
                    <input type="text" class="form-control" id="addtional_expired" name="addtional_expired" value="<?= set_value('addtional_expired'); ?>">
                    <?= form_error('addtional_expired', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>size *</label>
                    <input type="text" class="form-control" id="size" name="size" value="<?= set_value('size'); ?>">
                    <?= form_error('size', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>lenght *</label>
                    <input type="text" class="form-control" id="lenght" name="lenght" value="<?= set_value('lenght'); ?>">
                    <?= form_error('lenght', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>width *</label>
                    <input type="text" class="form-control" id="width" name="width" value="<?= set_value('width'); ?>">
                    <?= form_error('width', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>height *</label>
                    <input type="text" class="form-control" id="height" name="height" value="<?= set_value('height'); ?>">
                    <?= form_error('height', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>weight *</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="<?= set_value('weight'); ?>">
                    <?= form_error('weight', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>dimension *</label>
                    <input type="text" class="form-control" id="dimension" name="dimension" value="<?= set_value('dimension'); ?>">
                    <?= form_error('dimension', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>pilihan *</label>
                    <input type="text" class="form-control" id="pilihan" name="pilihan" value="<?= set_value('pilihan'); ?>">
                    <?= form_error('pilihan', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>is_fragile *</label>
                    <input type="text" class="form-control" id="is_fragile" name="is_fragile" value="<?= set_value('is_fragile'); ?>">
                    <?= form_error('is_fragile', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>active *</label>
                    <input type="text" class="form-control" id="active" name="active" value="<?= set_value('active'); ?>">
                    <?= form_error('active', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>cool_storage *</label>
                    <input type="text" class="form-control" id="cool_storage" name="cool_storage" value="<?= set_value('cool_storage'); ?>">
                    <?= form_error('cool_storage', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-secondary float-right">CREATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>\
</div>