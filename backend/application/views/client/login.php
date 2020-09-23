<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('client/customer/login'); ?>"><b><?php echo "Events Dragon"; ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <span class="input-error"><?php echo $this->session->flashdata('log-err'); ?></span>

    <?php echo form_open('client/customer/login'); ?>
      <div class="form-group has-feedback">
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
        <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
        <span class="input-error"><?php echo form_error('password', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

        <div class="col-xs-8">
          <a href="<?php echo base_url('client/customer/forgot_password') ?>" class="forgot-password">I forgot my password</a>

        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <p class="Signup">Don't Have an Account? <a href="<?php echo base_url('client/customer/register') ?>">Sign Up Here!</a></p>

		 
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
