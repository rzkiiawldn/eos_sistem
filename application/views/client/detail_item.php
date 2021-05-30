<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <a href="<?= base_url('client/list_item_satuan'); ?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('client/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('client/list_item_satuan'); ?>">Item</a></li>
            <li class="breadcrumb-item active">Detail</li>
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
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th width=30%>Manage By</th>
                        <td>: <?= $item_satuan['manage_by']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Code</th>
                        <td>: <?= $item_satuan['item_code']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Barcode</th>
                        <td>: <?= $item_satuan['barcode']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Name</th>
                        <td>: <?= $item_satuan['item_name']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Description</th>
                        <td>: <?= $item_satuan['description']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Brand</th>
                        <td>: <?= $item_satuan['brand']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Category</th>
                        <td>: <?= $item_satuan['category']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Model</th>
                        <td>: <?= $item_satuan['model']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Color</th>
                        <td>: <?= $item_satuan['color']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Minimum Stock</th>
                        <td>: <?= $item_satuan['minimum_stock']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Publish Price</th>
                        <td>: <?= $item_satuan['publish_price']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Addtional Expired</th>
                        <td>: <?= $item_satuan['addtional_expired']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Size</th>
                        <td>: <?= $item_satuan['size']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Lenght</th>
                        <td>: <?= $item_satuan['lenght']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Width</th>
                        <td>: <?= $item_satuan['width']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Height</th>
                        <td>: <?= $item_satuan['height']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Weight</th>
                        <td>: <?= $item_satuan['weight']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Dimension</th>
                        <td>: <?= $item_satuan['dimension']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Pilihan</th>
                        <td>: <?= $item_satuan['pilihan']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Is Fragile</th>
                        <td>: <?= $item_satuan['is_fragile']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Active</th>
                        <td>: <?= $item_satuan['active']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Cool Storage</th>
                        <td>: <?= $item_satuan['cool_storage']; ?></td>
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