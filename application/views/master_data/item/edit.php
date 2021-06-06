<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <a href="<?= base_url('master_data/item'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('master_data/item'); ?>">Item</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
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
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <input type="hidden" class="form-control" id="id_item_nonbundling" name="id_item_nonbundling" value="<?= $item_nonbundling['id_item_nonbundling']; ?>">
                  <div class="form-group col-md-6">
                    <label>Item Nonbundling Code *</label>
                    <input type="text" class="form-control" id="item_nonbundling_code" name="item_nonbundling_code" value="<?= $item_nonbundling['item_nonbundling_code']; ?>">
                    <?= form_error('item_nonbundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Item Nonbundling Name *</label>
                    <input type="text" class="form-control" id="item_nonbundling_name" name="item_nonbundling_name" value="<?= $item_nonbundling['item_nonbundling_name']; ?>">
                    <?= form_error('item_nonbundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $item_nonbundling['barcode']; ?>">
                    <?= form_error('barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <select name="id_manage_by" id="id_manage_by" class="form-control">
                      <option value="" disabled selected>-- pilih --</option>
                      <?php foreach ($manage_by as $manage) { ?>
                        <?php if ($manage['id_manage_by'] == $item_nonbundling['id_manage_by']) { ?>
                          <option value="<?= $manage['id_manage_by'] ?>" selected><?= $manage['manage_by_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $manage['id_manage_by'] ?>"><?= $manage['manage_by_name']; ?></option>
                        <?php } ?>
                      <?php } ?>
                    </select>
                    <?= form_error('id_manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>description *</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= $item_nonbundling['description']; ?>">
                    <?= form_error('description', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>brand *</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= $item_nonbundling['brand']; ?>">
                    <?= form_error('brand', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>model *</label>
                    <input type="text" class="form-control" id="model" name="model" value="<?= $item_nonbundling['model']; ?>">
                    <?= form_error('model', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>category *</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?= $item_nonbundling['category']; ?>">
                    <?= form_error('category', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>minimum stock *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="minimum_stock" value="<?= $item_nonbundling['minimum_stock']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pcs</span>
                      </div>
                    </div>
                    <?= form_error('minimum_stock', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>publish price *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="publish_price" value="<?= $item_nonbundling['publish_price']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">IDR</span>
                      </div>
                    </div>
                    <?= form_error('publish_price', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>addtional expired *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" placeholder="0" name="additional_expired" aria-describedby="basic-addon1" value="<?= $item_nonbundling['additional_expired']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">days</span>
                      </div>
                    </div>
                    <?= form_error('additional_expired', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>size *</label>
                    <input type="text" class="form-control" id="size" name="size" value="<?= $item_nonbundling['size']; ?>">
                    <?= form_error('size', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>length *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="length" value="<?= $item_nonbundling['length']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('length', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>width *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="width" value="<?= $item_nonbundling['width']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('width', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>height *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="height" value="<?= $item_nonbundling['height']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('height', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>weight *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="weight" value="<?= $item_nonbundling['weight']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('weight', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>dimension *</label>
                    <input type="text" class="form-control" id="dimension" name="dimension" value="<?= $item_nonbundling['dimension']; ?>">
                    <?= form_error('dimension', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>is_fragile *</label>
                    <select name="is_fragile" id="is_fragile" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($select as $s) : ?>
                        <?php if ($s == $item_nonbundling['is_fragile']) { ?>
                          <option value="<?= $s ?>" selected><?= $s ?></option>
                        <?php } else { ?>
                          <option value="<?= $s ?>"><?= $s ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('is_fragile', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>active *</label>
                    <select name="active" id="active" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($select as $s) : ?>
                        <?php if ($s == $item_nonbundling['active']) { ?>
                          <option value="<?= $s ?>" selected><?= $s ?></option>
                        <?php } else { ?>
                          <option value="<?= $s ?>"><?= $s ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('active', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>cool_storage *</label>
                    <select name="cool_storage" id="cool_storage" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($select as $s) : ?>
                        <?php if ($s == $item_nonbundling['cool_storage']) { ?>
                          <option value="<?= $s ?>" selected><?= $s ?></option>
                        <?php } else { ?>
                          <option value="<?= $s ?>"><?= $s ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('cool_storage', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
              </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">EDIT</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>\
</div>