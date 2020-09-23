<?php $this->load->view('admin/includes/login_header');?>
<div class="image-wall">
<?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>
<?php if(@$stat!="")
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style="">Successfully activated the account. You can login now</span>
                                </div><br><br>
                              <?php } ?>
                              
      <div class="container input-wrap">
        <div class="sign-label">
           <div class="header-sub-bg"></div>
          <h2>EVENTS DRAGON</h2>
          <div class="signin-container-wrap">
                  <span>Don't Have an Account? <a id="sign-req" href="<?php echo base_url('Supplier/Register/') ?>"> Sign Up!</a></span> 
                </div>
        </div>
        <div class="input-main login_input_main">
          <div class="input-form-label">
            <span>Sign up to start your account</span>
          </div>
          <?php echo form_open('auth/admin_login'); ?>
              <div class="input-container">
            
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>"  class="inp"  required="required">
                  <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
                  <label>Email</label>
                  <div class="line"><i class="fa fa-envelope"></i></div>
                  
              </div>
              <div class="input-container">
                  <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="inp" required="required">
                  <span class="input-error"><?php echo form_error('password', '<div class="error">', '</div>'); ?></span>

                  <label>Password</label>
                  <div class="line"><i class="fa fa-lock"></i></div>
              </div>


              <div class="btn-container">
                <a  href="#"><button type="submit" id="signup-btn">Sign in</button></a>
                </div>

                <div class="forgot-container">
                <a href="<?php echo base_url('Supplier/ForgotPassword/') ?>" id="sign-req" class="forgot-label"><i class="fa fa-hand-o-right"></i>  I forgot my password</a> 
                </div>
              
          <?php echo form_close(); ?>
       </div> 
      </div>
      <?php	$this->load->view('admin/includes/login_footer');?>
           