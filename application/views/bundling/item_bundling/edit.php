<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('bundling/item_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('bundling/item_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
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
        <div class="col">
          <?= $this->session->flashdata('pesan'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <div class="card-body">
              <form method="post" action="">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <select name="id_manage_by" id="id_manage_by" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($manage_by as $manage) : ?>
                        <?php if ($item_bundling['id_manage_by'] == $manage['id_manage_by']) { ?>
                          <option value="<?= $manage['id_manage_by'] ?>" selected><?= $manage['manage_by_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $manage['id_manage_by'] ?>"><?= $manage['manage_by_name']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling code *</label>
                    <input type="text" class="form-control" id="item_bundling_code" onchange="Barcode()" name="item_bundling_code" value="<?= $item_bundling['item_bundling_code']; ?>">
                    <?= form_error('item_bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="item_bundling_barcode" name="item_bundling_barcode" readonly value="<?= $item_bundling['item_bundling_barcode'] ?>">
                    <?= form_error('item_bundling_barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling name *</label>
                    <input type="text" class="form-control" id="item_bundling_name" name="item_bundling_name" value="<?= $item_bundling['item_bundling_name']; ?>">
                    <?= form_error('item_bundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <input type="hidden" class="form-control" id="id_item_bundling" name="id_item_bundling" value="<?= $item_bundling['id_item_bundling']; ?>">
                <button type="submit" class="btn btn-info">Save</button>
              </form>
              <div class="alert alert-info pb-2 pt-2 mt-3" role="alert">
                Detail Information
              </div>
              <?php if (!empty($this->uri->segment(5))) { ?>
                <form action="<?= base_url('bundling/item_bundling/add_edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" method="post">
                <?php } else { ?>
                  <form method="post" action="<?= base_url('bundling/item_bundling/add_edit_item') ?>">
                  <?php } ?>
                  <div class="row mt-4">
                    <div class="form-group col-md-6">
                      <label>Item Name *</label>
                      <select name="id_item_nonbundling" id="id_item_nonbundling" class="form-control select2bs4" required style="width: 100%;">
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
                        <input type="number" min="1" required class="form-control" id="item_qty" name="item_qty" value="<?= set_value('item_qty'); ?>">
                        <input type="hidden" class="form-control" id="id_item_bundling" name="id_item_bundling" value="<?= $item_bundling['id_item_bundling']; ?>">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Pcs</span>
                        </div>
                      </div>
                      <?= form_error('item_qty', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info float-right">ADD</button>
                  </form>
                  <div class="pt-5">
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
                            <td><?= $row['item_nonbundling_barcode']; ?></td>
                            <td><?= $row['item_qty']; ?></td>
                            <td>
                              <?php if (!empty($this->uri->segment(5))) { ?>
                                <form action="<?= base_url('bundling/item_bundling/delete_item_satuan/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_item_bundling_detail']); ?>" method="post">
                                  <input type="hidden" name="id_item_bundling_detail" value="<?= $row['id_item_bundling_detail'] ?>">
                                  <input type="hidden" name="id_item_bundling" value="<?= $row['id_item_bundling'] ?>">
                                  <input type="hidden" name="item_qty" value="<?= $row['item_qty'] ?>">
                                  <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                </form>
                              <?php } else { ?>
                                <form action="<?= base_url('bundling/item_bundling/delete_item_satuan/' . $row['id_item_bundling_detail']); ?>" method="post">
                                  <input type="hidden" name="id_item_bundling_detail" value="<?= $row['id_item_bundling_detail'] ?>">
                                  <input type="hidden" name="id_item_bundling" value="<?= $row['id_item_bundling'] ?>">
                                  <input type="hidden" name="item_qty" value="<?= $row['item_qty'] ?>">
                                  <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                </form>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <?php if (!empty($this->uri->segment(5))) { ?>
                    <a href="<?= base_url('bundling/item_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-danger mt-3">Finish</a>
                  <?php } else { ?>
                    <a href="<?= base_url('bundling/item_bundling') ?>" class="btn btn-danger mt-3">Finish</a>
                  <?php } ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

<script>
  function Barcode() {
    var p = document.getElementById("item_bundling_code").value;
    document.getElementById("item_bundling_barcode").value = p;
  }
</script>