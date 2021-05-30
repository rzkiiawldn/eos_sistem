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
            <li class="breadcrumb-item"><a href="<?= base_url('admin_store/list_bundling'); ?>">Item Bundling</a></li>
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
                        <td>: <?= $item_bundling['manage_by']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Bundling Code</th>
                        <td>: <?= $item_bundling['item_code']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Bundling Name</th>
                        <td>: <?= $item_bundling['bundling_name']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Detail informasi</th>
                        <td>: <?= $item_bundling['detail_informasi']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>quantity</th>
                        <td>: <?= $item_bundling['quantity']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>form</th>
                        <td>: <?= $item_bundling['form']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Code</th>
                        <td>: <?= $item_bundling['item_code']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Barcode</th>
                        <td>: <?= $item_bundling['barcode']; ?></td>
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