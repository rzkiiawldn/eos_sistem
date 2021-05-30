<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <a href="<?= base_url('admin_store/list_bundling'); ?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin_store/list_bundling'); ?>">Item</a></li>
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
                    <input type="text" class="form-control" id="manage_by" name="manage_by" value="<?= $item_bundling['manage_by']; ?>">
                    <?= form_error('manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling_code *</label>
                    <input type="text" class="form-control" id="bundling_code" name="bundling_code" value="<?= $item_bundling['bundling_code']; ?>">
                    <?= form_error('bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>bundling_name *</label>
                    <input type="text" class="form-control" id="bundling_name" name="bundling_name" value="<?= $item_bundling['bundling_name']; ?>">
                    <?= form_error('bundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>detail_informasi *</label>
                    <input type="text" class="form-control" id="detail_informasi" name="detail_informasi" value="<?= $item_bundling['detail_informasi']; ?>">
                    <?= form_error('detail_informasi', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>quantity *</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $item_bundling['quantity']; ?>">
                    <?= form_error('quantity', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>form *</label>
                    <input type="text" class="form-control" id="form" name="form" value="<?= $item_bundling['form']; ?>">
                    <?= form_error('form', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>item_code *</label>
                    <input type="text" class="form-control" id="item_code" name="item_code" value="<?= $item_bundling['item_code']; ?>">
                    <?= form_error('item_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $item_bundling['barcode']; ?>">
                    <?= form_error('barcode', '<small class="text-danger pl-2">', '</small>'); ?>
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