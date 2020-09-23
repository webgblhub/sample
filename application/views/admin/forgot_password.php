<?php $this->load->view('admin/includes/login_header');?>
   <div class="image-wall">
      <div class="container input-wrap">
        <div class="sign-label">
          <h2>EVENTS DRAGON</h2>
          <div class="signin-container-wrap">
                  <span>Don't Have an Account? <a id="sign-req" href="<?php echo base_url('Supplier/Register/') ?>"> Sign Up!</a></span> 
                </div>
        </div>
        <div class="input-main forgot_input_main">
          <div class="input-form-label">
             <div class="header-sub-bg"></div>
            <span>Sign up to start your account</span>
          </div>
          <?php echo form_open('auth/supplier_forgot'); ?>
              <div class="input-container">
            
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>"  class="inp"  required="required">
                  <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
                  <label>Email</label>
                  <div class="line"><i class="fa fa-envelope"></i></div>
                  
              </div>


              <div class="btn-container">
                <a  href="#"><button type="submit" id="signup-btn">Submit</button></a>
                </div>

                  <!-- <div class="forgot-container">
                 <label class="forgot-label">Password will sent you soon!<a id="sign-req"  href="#"></a></label> 
                </div>   -->
                
                <div class="forgot-container">
                <a href="#" id="sign-req"><label class="forgot-label">Password will sent you soon! </label> </a> 
                </div> 

                <div class="forgot-container">
               <a href="<?php echo site_url('Supplier'); ?>" id="sign-req" class="forgot-label"><i class="fa fa-hand-o-right"></i> Already have an account? Sign In! </a>
                </div> 
              
          <?php echo form_close(); ?>
       </div> 
      </div>
    </div>
      <?php	$this->load->view('admin/includes/login_footer');?>
           