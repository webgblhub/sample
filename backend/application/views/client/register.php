<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('client/customer/register'); ?>" alt="Customer"><b>Events Dragon</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign up to start your account</p>
    <span class="input-error"><?php echo $this->session->flashdata('reg-err'); ?></span>

    <?php echo form_open('client/customer/register'); ?>
     
      <div class="form-group has-feedback">
        <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" required>
        <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" required>
        <span class="input-error"><?php echo form_error('password', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>" class="form-control" placeholder="Confirm Password">
        <span class="input-error"><?php echo form_error('cpassword', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="checkbox" name="" value="" class="form-control" placeholder="" required>
        Check here for accepting our <a href="#">terms & conditions</a>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>

        <!-- /.col -->
      </div>
    </form>
    <br>
    <p class="Signup">Already have an account? <a href="<?php echo site_url('client/customer/login'); ?>">Sign In!</a></p>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
