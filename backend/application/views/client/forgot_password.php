<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('client/customer/register'); ?>"><b><?php echo "Event Dragon"; ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <span class="input-error"><?php echo $this->session->flashdata('log-err'); ?></span>

    <?php echo form_open('client/customer/login'); ?>
      <div class="form-group has-feedback">
        <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
        <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Submit</button>


        </div>


        <!-- /.col -->
      </div>
    </form>
      <br>
    <p>Password will send to your email soon!</p>

    <p class="Signup">Are you haven't account? <a href="<?php echo base_url('client/customer/register/') ?>">Sign Up!</a></p>
      <p> <a href="<?php echo base_url('client/customer/login/') ?>">Log In</a></p>

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
