<form enctype="multipart/form-data" method="post" action="<?php echo base_url('supplier/supplier/new_password'); ?>" name="f1" onsubmit="return validate()" >
<?php
echo @$this->session->flashdata('success');
?>
    <section class="final-container-section">
             <div class="change-pass">

                 <div class="chage-label-con">
                  <label>Change Password</label>
                 </div>
                 
                 <div class="change-pass-input">
                 <div class="input-change-pass-container">
                    <input type="password" required="required" placeholder="Old Password" class="chang-inp" name="oldpassword" id="txtOldPassword">
                    <span class="change-pass-icon"><i class="fa fa-eye toggle-oldpassword" toggle="#password-field"></i></span>
                   </div>
                   <div class="input-change-pass-container">
                    <input type="password" required="required" placeholder="New Password" class="chang-inp" name="password" id="txtPassword" onkeyup="CheckPassword(this.value)">
                    
                    <span class="change-pass-icon"><i class="fa fa-eye toggle-password" toggle="#password-field"></i></span>
                    <output name="result2" id="result2" style="color:red;text-align: left;
    font-size: 14px;"></output>
                   </div>

                   <div class="input-change-pass-container">
                    <input type="password" required="required" placeholder="Confirm Password" class="chang-inp" name="confirm_password" id="txtConfirmPassword">
                    
                    <span class="change-pass-icon"><i class="fa fa-eye toggle-cnfrmpassword" toggle="#password-field"></i></span>
                    <output name="result" id="result" style="color:red;text-align: left;
    font-size: 14px;"></output>
                   </div>
                 <button type="submit" class="chage-pass-btn" >Submit</button>
               </div>
             </div>
        </section>
      
      </form>
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
</script>


 <script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>
      <script>
        
        $(document).on('click', '.toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash ");
      var input = $("#txtPassword");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });

        $(document).on('click', '.toggle-cnfrmpassword', function() {
      $(this).toggleClass("fa-eye fa-eye-slash ");
      var input = $("#txtConfirmPassword");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });


        $(document).on('click', '.toggle-oldpassword', function() {
      $(this).toggleClass("fa-eye fa-eye-slash ");
      var input = $("#txtOldPassword");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });


    
     </script>



