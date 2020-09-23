<div class="content-wrapper">

    <section class="content">

		<ul class="nav nav-pills nav-fill ">
  <li class="nav-item " >
    <a class="nav-link"  href="<?php echo base_url("client/profile/profileinfo")?>">Consumer Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active nav_itemss" href="<?php echo base_url("client/profile/businessinfo")?>">Business Info</a>
  </li>
 
</ul>
      <div class="row">

        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('client/profile/update_businessinfo'); ?>">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profileinfo</h3>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">

                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="text" name="company" id="en_title" class="form-control" placeholder="Enter Company Name" value="<?php if(!empty($customer[0]->company_name)) echo $customer[0]->company_name; else echo ""; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('first_name', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-xs-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo $customer[0]['cid']; ?>">
                    <div class="form-group">
                      <label>Name Prefix</label>
                      <select name="name_prefix" class="form-control" id="type" onClick="Remove_options();" required>
                      <?php if(!empty($customer[0]->customer_type)){ 
                      	switch($customer[0]->customer_type)
                      	{

                      		case "Mr" :

                      	?>
                      
                        <option value="<?php echo $customer[0]->customer_type ?>"><?php echo $customer[0]->customer_type ?>.</option>
                        <option value="Mrs">Mrs.</option>
						<option value="Ms">Ms.</option>
					</select>
						<?php break;
							case "Mrs" :

                      	?>
                      
                        <option value="<?php echo $customer[0]->customer_type ?>"><?php echo $customer[0]->customer_type ?>.</option>
                        <option value="Mrs">Mr.</option>
						<option value="Ms">Ms.</option>
					</select>

						<?php
						break;
						case "Ms" :

                      	?>
                      
                        <option value="<?php echo $customer[0]->customer_type ?>"><?php echo $customer[0]->customer_type ?>.</option>
                        <option value="Mrs">Mr.</option>
						<option value="Ms">Mrs.</option>
					</select>	<?php 
									break;
			            }
			        }
						else
						{
						?>
							<option value="">--</option>
							<option value="Mr">Mr.</option>
							<option value="Mrs">Mrs.</option>
							<option value="Ms">Ms.</option>
							<?php
						}
						?>
						</select>
                      <span class="input-error"><?php echo form_error('name_prefix', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="first_name" id="en_title" class="form-control" placeholder="Enter Firstname" value="<?php if(!empty($customer[0]->firstname)) echo $customer[0]->firstname; else echo ""; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('first_name', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Last Name</label>
                      
                      <input type="text" name="last_name" id="en_last_name" class="form-control" placeholder="Enter Lastname" value="<?php if(!empty($customer[0]->lastname)) echo $customer[0]->lastname; else echo ""; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('last_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Company Email</label>
                     
                     <input type="email" name="email_address" id="email_address" class="form-control" placeholder="email Address" value="<?php if(!empty($customer[0]->email)) echo $customer[0]->email; else echo ""; ?>" required>
                      <span class="input-error"><?php echo form_error('email_address', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Mobile Number</label>
                      <?php if(!empty($customer[0]->mobile))  $mobile_number=$customer[0]->mobile; else $mobile_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="mobile_number" id="en_mobile_number" maxlength="10" class="form-control" placeholder="mobile" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $mobile_number); ?>" required data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX"  >
                       <small></small>
                      <span class="input-error"><?php echo form_error('mobile_number', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Landline Number</label>
                     <?php if(!empty($customer[0]->landline))  $landline_number=$customer[0]->landline; else $landline_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="landline_number" id="en_landline_number" maxlength="10" class="form-control" placeholder="Landline" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $landline_number); ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" >
                      <small></small>
                      <span class="input-error"><?php echo form_error('landline_number', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Fax number</label>
                     <?php if(!empty($customer[0]->fax))  $fax_number=$customer[0]->fax; else $fax_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="fax_number" id="en_fax_number" maxlength="10" class="form-control" placeholder="fax number" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $fax_number); ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" >
                     <!--  <small>Format: (XXX)-XXX-XXXX</small> -->
                      <span class="input-error"><?php echo form_error('fax_number', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Company Address1</label>
                      <?php if(!empty($customer[0]->address1))  $address1=$customer[0]->address1; else $address1=""; ?>
                      <input type="text" name="address1" id="en_address1" class="form-control" placeholder="address1" value="<?php echo $address1; ?>" required>
                      <span class="input-error"><?php echo form_error('address1', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Address2</label>
                      <?php if(!empty($customer[0]->address2))  $address2=$customer[0]->address2; else $address2=""; ?>
                      <input type="text" name="address2" id="en_address2" class="form-control" placeholder="address2" value="<?php echo $address2; ?>">
                      <span class="input-error"><?php echo form_error('address2', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>city</label>
                      <?php if(!empty($customer[0]->city))  $city=$customer[0]->city; else $city=""; ?>
                      <input type="text" name="city_id" id="en_city_id" class="form-control" placeholder="city" value="<?php echo $city; ?>" required>
                      <span class="input-error"><?php echo form_error('city_id', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>State</label>
                       <?php if(!empty($customer[0]->state))  $state=$customer[0]->state; else $state=""; ?>
                      <!-- <input type="text" name="State_id" id="en_State_id" class="form-control" placeholder="state" value="<?php echo $State_id; ?>"> -->
                      <select class="form-control select2" id="state" name="State_id" required>
                          <?php if($state){ echo '<option value="'.$state.'" selected>'.$state.'</option>'; } ?>
                        <option >State</option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District Of Columbia">District Of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>


                      </select>
                      <span class="input-error"><?php echo form_error('State_id', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Zipcode</label>
                      <?php if(!empty($customer[0]->zipcode))  $zipcode=$customer[0]->zipcode; else $zipcode=""; ?>
                      <input type="number" onkeypress="return isNumberKey(event)" name="zipcode" id="en_zipcode" maxlength="5" class="form-control" placeholder="zipcode" value="<?php echo $zipcode; ?>" required data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" >
                      <!-- <small>(Only 5 numerical digits only)</small> -->
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                 <?php if($customer[0]->accept!=1)
                {
                  ?>

                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      	 <input type="checkbox" id="agreed" name="agreed" required/> I Agreed the Terms and Conditions
                     
                      <span class="input-error"><?php echo form_error('accept', '<div class="error">', '</div>'); ?></span>
					</div>

                  </div>
                </div>

              <?php  } ?>

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary pull-right form-btn">Save</button>
                    
                  </div>
              </div>
          </div>
        </div>

        </form>
      </div>
    </section>

	</div>
<script>

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }



</script>
