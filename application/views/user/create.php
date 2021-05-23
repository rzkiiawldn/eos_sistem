<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
        <div class="dropdown">
            <button class="btn bg-secondary text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MORE ACTION
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= base_url('c_user');?>"> LIST</a>
            </div>
        </div>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard');?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('c_users');?>">Users</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary shadow">
                <div class="card-header">
                <h3 class="card-title">USER INFORMATION</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="<?= base_url('c_user/create');?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>FULLNAME *</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= set_value('fullname');?>">
                                <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>');?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>USERNAME *</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username');?>">
                                <?= form_error('username', '<small class="text-danger pl-2">', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>EMAIL *</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email');?>">
                                <?= form_error('email', '<small class="text-danger pl-2">', '</small>');?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>PHONE *</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone');?>">
                                <?= form_error('phone', '<small class="text-danger pl-2">', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>PASSWORD *</label>
                                <input type="password" class="form-control" id="password1" name="password1">
                                <?= form_error('password1', '<small class="text-danger pl-2">', '</small>');?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>RETYPE PASSWORD *</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-md-3 col-form-label">DEPARTMENT *</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    <option selected="0">Select Department</option>
                                    <?php foreach($department as $dept):?>
                                        <option value="<?= $dept['department_id']; ?>"><?= $dept['name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">CREATE</button>
                    </div>
                </form>
        </div>
        <!-- /.card -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
</div>