<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('bundling/request_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('bundling/request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('bundling/request_bundling'); ?>">Request Bundling</a></li>
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
                  <div class="form-group col-md-6">
                    <label>Request Bundling Code *</label>
                    <input type="text" class="form-control" id="request_bundling_code" onchange="Barcode()" name="request_bundling_code" value="<?= set_value('request_bundling_code'); ?>">
                    <?= form_error('request_bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Barcode *</label>
                    <input type="text" class="form-control" id="request_bundling_barcode" name="request_bundling_barcode" readonly>
                    <?= form_error('request_bundling_barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Bundling Type *</label>
                    <input type="text" class="form-control" id="bundling_type" name="bundling_type" value="Bundling From Inbound" readonly>
                    <?= form_error('bundling_type', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Item Bundling *</label>
                    <select name="id_item_bundling" id="id_item_bundling" class="form-control select2bs4">
                      <option value="" selected disabled></option>
                      <?php foreach ($item_bundling as $item) : ?>
                        <option value="<?= $item['id_item_bundling'] ?>"><?= $item['item_bundling_name']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_item_bundling', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Packing Type *</label>
                    <select name="id_packing_type" id="id_packing_type" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($packing_type as $item) : ?>
                        <option value="<?= $item['id_packing_type'] ?>"><?= $item['packing_type_name']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_packing_type', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Request Quantity *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" id="request_quantity" name="request_quantity" value="<?= set_value('request_quantity'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pcs</span>
                      </div>
                    </div>
                    <?= form_error('request_quantity', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Status *</label>
                    <select name="id_status" id="id_status" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($status as $item) : ?>
                        <option value="<?= $item['id_status'] ?>"><?= $item['status']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_status', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <?php if (!empty($this->uri->segment(5))) { ?>
                  <input type="hidden" name="id_client" value="<?= $id_client ?>">
                  <input type="hidden" name="id_location" value="<?= $id_location ?>">
                <?php } ?>
                <button type="submit" class="btn btn-info float-right">CREATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<script>
  function Barcode() {
    var p = document.getElementById("request_bundling_code").value;
    document.getElementById("request_bundling_barcode").value = p;
  }
</script>