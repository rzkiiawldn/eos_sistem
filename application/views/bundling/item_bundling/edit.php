<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <a href="<?= base_url('bundling/item_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('bundling/item_bundling'); ?>">Item</a></li>
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
                  <input type="hidden" class="form-control" id="id_item_bundling" name="id_item_bundling" value="<?= $item_bundling['id_item_bundling']; ?>">
                  <div class="form-group col-md-6">
                    <label>bundling code *</label>
                    <input type="text" class="form-control" id="item_bundling_code" name="item_bundling_code" value="<?= $item_bundling['item_bundling_code']; ?>">
                    <?= form_error('item_bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling name *</label>
                    <input type="text" class="form-control" id="item_bundling_name" name="item_bundling_name" value="<?= $item_bundling['item_bundling_name']; ?>">
                    <?= form_error('item_bundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <select name="id_manage_by" id="id_manage_by" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($manage_by as $manage) : ?>
                        <?php if ($manage['id_manage_by'] == $item_bundling['id_manage_by']) { ?>
                          <option selected value="<?= $manage['id_manage_by'] ?>"><?= $manage['manage_by_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $manage['id_manage_by'] ?>"><?= $manage['manage_by_name']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>

                    </select>
                    <?= form_error('id_manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>id item Nonbundling *</label>
                    <select name="id_item_nonbundling" id="id_item_nonbundling" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($item_nonbundling as $item) : ?>
                        <?php if ($item['id_item_nonbundling'] == $item_bundling['id_item_nonbundling']) { ?>
                          <option selected value="<?= $item['id_item_nonbundling'] ?>"><?= $item['item_nonbundling_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $item['id_item_nonbundling'] ?>"><?= $item['item_nonbundling_name']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>

                    </select>
                    <?= form_error('id_item_nonbundling', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Total Price *</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                      </div>
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="total_price" value="<?= $item_bundling['total_price']; ?>">
                    </div>
                    <?= form_error('total_price', '<small class="text-danger pl-2">', '</small>'); ?>
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