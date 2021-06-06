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
                        <th width=30%>Request Bundling Code</th>
                        <td>: <?= $request_bundling['request_bundling_code']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Bundling Type</th>
                        <td>: <?= $request_bundling['bundling_type']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Item Bundling</th>
                        <td>: <?= $request_bundling['id_item_bundling']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Request Quantity</th>
                        <td>: <?= $request_bundling['request_quantity']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Packing Type</th>
                        <td>: <?= $request_bundling['id_packing_type']; ?></td>
                      </tr>
                      <tr>
                        <th width=30%>Status</th>
                        <td>: <?= $request_bundling['id_status']; ?></td>
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