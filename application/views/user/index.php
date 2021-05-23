<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <!-- <div class="dropdowan">
                  <button class="btn bg-secondary text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      MORE ACTION
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?= base_url('c_user/create');?>"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
                  </div>
              </div> -->
              <a href="<?= base_url('c_user/create');?>" class="btn btn-secondary text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard');?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('c_user');?>">Users</a></li>
            <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">USERS</h3>
              </div> -->

              <!-- Main content -->
    <section class="content"> 
    <div class="container-fluid">
    <!-- Info boxes -->


    <div class="row">
        <div class="col-md-12">
        <div class="card card-info shadow">
            <div class="card-header border-transparent">
            <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> USERS </b> </h3>

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
                      <th>FULLNAME</th>
                      <th>USERNAME</th>
                      <th>EMAIL</th>
                      <th>PHONE</th>
                      <th>DEPARTMENT</th>
                      <th width="10%">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($user as $us):?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $us['fullname']; ?></td>
                        <td><?= $us['username']; ?></td>
                        <td><?= $us['email']; ?></td>
                        <td><?= $us['no_telp']; ?></td>
                        <td><?= $us['name']; ?></td>
                        <td>
                          <a href="" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
