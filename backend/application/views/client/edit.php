<div class="page-header">
                <div class="page-header-title">
                    <h4>Personal Info</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>client/profile/lists">Clients</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Client</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Role</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                                <h4><?= $title ?></h4>
                                <form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('client/profile/update_profileinfo'); ?>">
                                <div class="row">

        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profileinfo</h3>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">

                  <div class="col-md-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo ""; ?>">
                    <div class="form-group">
                      <label>Name Prefix <span class="must_required">*</span></label>
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

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>First Name <span class="must_required">*</span></label>
                      <input type="text" name="first_name" id="en_title" class="form-control" placeholder="Enter Firstname" value="<?php if(!empty($customer[0]->firstname)) echo $customer[0]->firstname; else echo ""; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('first_name', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Last Name <span class="must_required">*</span></label>
                      
                      <input type="text" name="last_name" id="en_last_name" class="form-control" placeholder="Enter Lastname" value="<?php if(!empty($customer[0]->lastname)) echo $customer[0]->lastname; else echo ""; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('last_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email Address <span class="must_required">*</span></label>
                     
                     <input type="email" name="email_address" id="email_address" class="form-control" placeholder="email Address" value="<?php if(!empty($customer[0]->email)) echo $customer[0]->email; else echo ""; ?>" required>
                      <span class="input-error"><?php echo form_error('email_address', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Mobile Number <span class="must_required">*</span></label>
                      <?php if(!empty($customer[0]->mobile))  $mobile_number=$customer[0]->mobile; else $mobile_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="mobile_number" id="en_mobile_number" maxlength="10" class="form-control" placeholder="mobile" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $mobile_number); ?>" required data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX">
                      <!--  <small>Format: (XXX)-XXX-XXXX</small> -->
                      <span class="input-error"><?php echo form_error('mobile_number', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Landline Number</label>
                     <?php if(!empty($customer[0]->landline))  $landline_number=$customer[0]->landline; else $landline_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="landline_number" id="en_landline_number" maxlength="10" class="form-control" placeholder="Landline" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $landline_number); ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX">
                      <!-- <small>Format: (XXX)-XXX-XXXX</small> -->
                      <span class="input-error"><?php echo form_error('landline_number', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Fax number</label>
                     <?php if(!empty($customer[0]->fax))  $fax_number=$customer[0]->fax; else $fax_number=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="fax_number" id="en_fax_number" maxlength="10" class="form-control" placeholder="fax number" value="<?php echo preg_replace('#(\d{3})(\d{3})(\d{4})#', '$1-$2-$3', $fax_number); ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX">
                      <!-- <small>Format: (XXX)-XXX-XXXX</small> -->
                      <span class="input-error"><?php echo form_error('fax_number', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Address1</label>
                      <?php if(!empty($customer[0]->address1))  $address1=$customer[0]->address1; else $address1=""; ?>
                      <input type="text" name="address1" id="en_address1" class="form-control" placeholder="address1" value="<?php echo $address1; ?>">
                      <span class="input-error"><?php echo form_error('address1', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Address2</label>
                      <?php if(!empty($customer[0]->address2))  $address2=$customer[0]->address2; else $address2=""; ?>
                      <input type="text" name="address2" id="en_address2" class="form-control" placeholder="address2" value="<?php echo $address2; ?>">
                      <span class="input-error"><?php echo form_error('address2', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>State</label>
                      <select class="form-control select2" id="state" name="State_id">
                          
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" <?php echo ($item->id==$customer[0]->state)?"selected":""; ?>><?php echo $item->name ?></option>
                        <?php } ?>

                      </select>
                      <span class="input-error"><?php echo form_error('State_id', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>city</label>
                      <input type="hidden" name="city2" value="<?php echo $customer[0]->city; ?>" />
                      <select class="form-control select2" id="city" name="city_id">
                          
                        <option value="" >Select City</option>

                      </select>
                      <span class="input-error"><?php echo form_error('city_id', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Zipcode <span class="must_required">*</span></label>
                      <?php if(!empty($customer[0]->zipcode))  $zipcode=$customer[0]->zipcode; else $zipcode=""; ?>
                      <input type="text" onkeypress="return isNumberKey(event)" name="zipcode" id="en_zipcode" maxlength="5" class="form-control" placeholder="zipcode" value="<?php echo $zipcode; ?>" required data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only">
                      <!-- <small>(Only 5 numerical digits only)</small> -->
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Sex <span class="must_required">*</span></label>
                      <?php if(!empty($customer[0]->sex))  $sex=$customer[0]->sex; else $sex=""; ?>
                     <select class="form-control select2" id="sex" name="sex" required>
                          <?php if($sex){ echo '<option value="'.$sex.'" selected>'.$sex.'</option>'; } ?>
                        <option >Sex</option>
    					<option value="Male">Male</option>
    					<option value="Female">Female</option>
    					<option value="Other">Other</option>
    				</select>
                      <span class="input-error"><?php echo form_error('sex', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Age</label>
                      <?php if(!empty($customer[0]->age))  $age=$customer[0]->age; else $age=""; ?>
                      <input type="text" name="age" id="en_age" class="form-control" placeholder="Age" value="<?php echo $age; ?>">
                      <span class="input-error"><?php echo form_error('age', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                <?php if($customer[0]->accept!=1)
                {
                	?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      	 <input type="checkbox" id="agreed" name="agreed" required/>I Agreed the Terms and Conditions
                     
                      <span class="input-error"><?php echo form_error('accept', '<div class="error">', '</div>'); ?></span>
					</div>

                  </div>
                </div>
<?php
}

?>
                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary pull-right form-btn">Save</button>
                    
                  </div>
              </div>
          </div>
        </div>

        
      </div>
              </form>                 
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                        
                      

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>

    <!-- ck editor -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
    
    