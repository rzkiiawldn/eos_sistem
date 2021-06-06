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
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th width=30%>Manage By</th>
                        <td>: <?= $item_nonbundling['id_manage_by']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Code</th>
                        <td>: <?= $item_nonbundling['item_nonbundling_code']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Barcode</th>
                        <td>: <?= $item_nonbundling['barcode']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Name</th>
                        <td>: <?= $item_nonbundling['item_nonbundling_name']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Description</th>
                        <td>: <?= $item_nonbundling['description']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Brand</th>
                        <td>: <?= $item_nonbundling['brand']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Category</th>
                        <td>: <?= $item_nonbundling['category']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Model</th>
                        <td>: <?= $item_nonbundling['model']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Minimum Stock</th>
                        <td>: <?= $item_nonbundling['minimum_stock']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Publish Price</th>
                        <td>: <?= $item_nonbundling['publish_price']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Additional Expired</th>
                        <td>: <?= $item_nonbundling['additional_expired']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Size</th>
                        <td>: <?= $item_nonbundling['size']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Length</th>
                        <td>: <?= $item_nonbundling['length']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Width</th>
                        <td>: <?= $item_nonbundling['width']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Height</th>
                        <td>: <?= $item_nonbundling['height']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Weight</th>
                        <td>: <?= $item_nonbundling['weight']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Dimension</th>
                        <td>: <?= $item_nonbundling['dimension']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Is Fragile</th>
                        <td>: <?= $item_nonbundling['is_fragile']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Active</th>
                        <td>: <?= $item_nonbundling['active']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Cool Storage</th>
                        <td>: <?= $item_nonbundling['cool_storage']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>