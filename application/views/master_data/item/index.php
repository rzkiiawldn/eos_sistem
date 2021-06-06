<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if ($user['department_id'] == 1 || $user['department_id'] == 2 || $user['department_id'] == 3) { ?>
            <a href="<?= base_url('master_data/item/create_item'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
          <?php } ?>
        </div>
        <div class="col-sm-6">
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
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header border-transparent">
              <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>TYPE</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>BARCODE</th>
                    <th>CATEGORY</th>
                    <th>MINIMUM STOCK</th>
                    <th width="15%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($item_nonbundling as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['item_nonbundling_code']; ?></td>
                      <td><?= $row['item_nonbundling_name']; ?></td>
                      <td><?= $row['brand']; ?></td>
                      <td><?= $row['category']; ?></td>
                      <td><?= $row['category']; ?></td>
                      <td><?= $row['category']; ?></td>
                      <td>

                        <?php if ($user['department_id'] == 1 || $user['department_id'] == 2 || $user['department_id'] == 3) { ?>
                          <a href="<?= base_url('master_data/item/detail_item/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('master_data/item/edit_item/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('master_data/item/delete_item/' . $row['id_item_nonbundling']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url('master_data/item/detail_item/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>