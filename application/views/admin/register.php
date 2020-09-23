<?php $this->load->view('admin/includes/login_header'); ?>
  <div class="image-wall">

     <?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>

                              
      <div class="container input-wrap">
        <div class="sign-label">
           <div class="header-sub-bg"></div>
          <h2>Sign up to<br> start your account</h2>
          <div class="signin-container-wrap">
                  <span>Already have an account?<a id="sign-req" href="<?php echo site_url('Supplier/'); ?>"> Sign In!</a></span> 
                </div>
        </div>
        <div class="input-main">
          <div class="input-form-label">
            <span>Sign up to start your account</span>
          </div>
          <?php //echo form_open('auth/register'); ?>
	 <form enctype="multipart/form-data" method="post" name="f1" action="<?php echo base_url('auth/register'); ?>" onsubmit="return validate()" >
              <div class="input-container">
              <input type="hidden" name="username" value="test@test.com" class="inp" placeholder="Username">
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>"  class="inp"  required="required">
                  <label>Email</label>
                  <div class="line"><i class="fa fa-envelope"></i></div>
                  <span class="input-error"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
                  
                  
              </div>
              <div class="input-container">
                  <input type="password" name="password" value="<?php echo set_value('password'); ?>" id="pass" class="inp" required="required" >
                  
                  <span class="input-error"><?php echo form_error('password', '<div class="error">', '</div>'); ?></span>

                  <label>Password</label>
                  
                  <div class="line"><i class="fa fa-eye toggle-password"></i></div>
                  <output name="result2" id="result2" style="color:red;text-align: left;
    font-size: 14px;"></output>
              </div>
              <div class="input-container">
                  <input type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>" id="cpass" class="inp" required="required">
                  <span class="input-error"><?php echo form_error('cpassword', '<div class="error">', '</div>'); ?></span>

                  <label>Confirm Password</label>
                  <div class="line"><i class="fa fa-eye  toggle-cpassword"></i></div>
<output name="result" id="result" style="color:red;text-align: left;
    font-size: 14px;"></output>
              </div>
              <div class="checkbox-conatiner">
                  <input type="checkbox" name="" value="" class="inp-check" required>
                  <label>Check here for accepting our <a id="sign-req" href="<?php echo base_url('Embed/terms_conditions') ?>">terms & conditions</a></label>
              </div>
              <div class="btn-container">
                <a  href="#"><button type="submit" id="signup-btn" onclick="return CheckPassword(document.getElementById('pass').value)">Sign Up</button></a>
              </div>
                <div class="signin-container">
                  <label class="sign-class">Already have an account?<a id="sign-req"  href="#"> Sign In!</a></label> 
                </div>
          <?php echo form_close(); ?>
       </div> 
      </div>
    </div>
			<?php	$this->load->view('admin/includes/login_footer');?>
<script>  
function validate(){  
var cpassword=document.f1.cpassword.value;  
var password=document.f1.password.value;  
var status=false;  
var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;
if(password.match(paswd)) 
{ 
status= true;
}
else
{ 
document.getElementById('result2').value="Password must contain atleast on digit, one capital letter, one small letter, minimum 8 characters and maximum 20 characters and a special character";
status= false;
}
if(password!=cpassword)
{
$('#result').html('Password Not Matching');
status= false;
}
return status;
}  

$(document).on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass");
if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
$(document).on('click', '.toggle-cpassword', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#cpass");
if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

         