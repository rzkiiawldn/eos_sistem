<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Item Satuan</li>
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
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th>ITEM CODE</th>
										<th>ITEM NAME</th>
										<th>BRAND</th>
										<th>CATEGORY</th>
										<th width=8%">AKSI</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($item_satuan as $row) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $row['item_code']; ?></td>
											<td><?= $row['item_name']; ?></td>
											<td><?= $row['brand']; ?></td>
											<td><?= $row['category']; ?></td>
											<td>
												<a href="<?= base_url('client/list_item_satuan/detail_item/' . $row['id_item']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
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