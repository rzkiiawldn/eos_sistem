<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('reports/report_request_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('reports/report_request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>?</strong><br>
                  Phone: +62<br>
                  Email: email
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?= $request_bundling['id_client']; ?></strong><br>
                  Lokasi<br>
                  Phone: +62<br>
                  Email: email
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row mb-5">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Code</th>
                      <th>Marketplcae</th>
                      <th>Quantity</th>
                      <th>Weight</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $request_bundling['item_bundling_name']; ?></td>
                      <td><?= $request_bundling['request_bundling_code']; ?></td>
                      <td><?= $request_bundling['stock_allocation_name']; ?></td>
                      <td>?</td>
                      <td>?</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print" style="margin-top: 150px;">
              <div class="col-12">
                <p>* INI ADALAH CETAKAN KOMPUTER, TANDA TANGAN TIDAK DIPERLUKAN</p>
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>