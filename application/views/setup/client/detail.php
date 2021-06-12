<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="<?= base_url('setup/client'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('setup/client'); ?>">client</a></li>
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
              <div class="row text-uppercase" style="font-size: 14px;">
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Client Code</label>
                    <p class="mb-0 pb-0"><?= $client['client_code']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Client Name</label>
                    <p class="mb-0 pb-0"><?= $client['client_name']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">User Id</label>
                    <p class="mb-0 pb-0"><?= $client['fullname']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Stock Allocation</label>
                    <p class="mb-0 pb-0"><?= $client['stock_allocation_name']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
              </div>
              <a href="<?= base_url('setup/client'); ?>" class="btn btn-info float-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>