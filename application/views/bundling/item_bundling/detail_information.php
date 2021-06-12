<div class="content-wrapper">
  <section class="content mt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?= base_url('bundling/item_bundling/add_item') ?>">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Item Name *</label>
                    <select name="id_item_nonbundling" id="id_item_nonbundling" class="form-control select2bs4" required>
                      <option value="" selected disabled></option>
                      <?php foreach ($item_nonbundling as $item) : ?>
                        <option value="<?= $item['id_item_nonbundling'] ?>"><?= $item['item_nonbundling_name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('id_item_nonbundling', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Item Qty *</label>
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" id="item_qty" name="item_qty" value="<?= set_value('item_qty'); ?>">
                      <input type="hidden" class="form-control" id="id_item_bundling" name="id_item_bundling" value="<?= $item_bundling->id_item_bundling; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pcs</span>
                      </div>
                    </div>
                    <?= form_error('item_qty', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-info float-right">ADD</button>
              </form>
              <div class="pt-5 mt-5">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">NO</th>
                      <th>ITEM NAME</th>
                      <th>ITEM CODE</th>
                      <th>BARCODE</th>
                      <th>Qty</th>
                      <th width="15%">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($item_bundling_detail as $row) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['item_nonbundling_name']; ?></td>
                        <td><?= $row['item_nonbundling_code']; ?></td>
                        <td><?= $row['barcode']; ?></td>
                        <td><?= $row['item_qty']; ?></td>
                        <td>
                          <form action="<?= base_url('bundling/item_bundling/delete_item_satuann/' . $row['id_item_bundling_detail']); ?>" method="post">
                            <input type="hidden" name="id_item_bundling_detail" value="<?= $row['id_item_bundling_detail'] ?>">
                            <input type="hidden" name="id_item_bundling" value="<?= $row['id_item_bundling'] ?>">
                            <input type="hidden" name="item_qty" value="<?= $row['item_qty'] ?>">
                            <input type="hidden" name="price" value="<?= $row['price'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <a href="<?= base_url('bundling/item_bundling') ?>" class="btn btn-danger float-right mt-3">Finish</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>