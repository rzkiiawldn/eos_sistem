
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <!-- <img src="<?= base_url('assets/img/');?>logo/contohlogo.png" alt="AdminLTE Logo" class="#" style="opacity: .8" height="100px" weight="100px"> -->
      <a href="#" class="h3">EOS SYSTEM</a>
    </div>
    <div class="card-body" >
      <p class="login-box-msg">Login Page</p>

      <form action="<?= base_url('auth');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
            <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-primary"style="background-color:	darkslategray	"><span class="fa fa-sign-in-alt"></span> Sign In </button>
            </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

