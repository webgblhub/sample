<?php
$peakdays="";
$peakmonths="";
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUwfcnwjN3AW4Wj3AW9ioFjzOpaHsGkI0&libraries=places&callback=initMap"
        defer></script>
<style type="text/css">
.discount_style
  {
    color: #3f51b5;
    font-weight: 700;

  }
  .discount_col
  {
     background-color: #ebeeff;
  }
  .subtype
        {
          background-color: #2ecc71;
          padding: 5px;
          color: #e0fbfb;
        }
</style>
<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Business Info</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/supplier/lists">Supplier</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Business Info</a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="form-group row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">

                <br><br>
                    <div class="form-group row">
                         <div class="col-sm-2">
                                <a href="<?php echo base_url(); ?>supplier/supplier/lists" class="btn btn-success"><i class="ti-menu-alt"></i> Supplier List</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                           
                        </div>

                <div class="card-header">
                    <h5>Add Business Info</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('supplier/create/addBusiness'); ?>">
                  
                    <input type="hidden" value="<?php echo $supplier_id; ?>" name="supplier_id" id="supplier_id">

                   <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Select Store Front</label>
                            <div class="col-sm-10">
                                 <select name="category" class="form-control" id="biscat" required>
                                    <option value="">Select</option>
                                    <?php foreach ($cat as $c)
                                    { ?>
                                      <option value="<?php echo $c->cat_id; ?>"><?php echo $c->category ?></option>
                                   <?php } ?>
                               </select>
                            </div>
                            
                        </div> 


                      

              <div id="bis">
                <?php if($available=='1')
                {
                    ?>

                     <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                   <div class="col-sm-10">
                         <input type="checkbox" id="same" name="same" value="1" onclick="sameBusiness(this)"/> Use same Business info
                         
                     
                     
                    </div>

                  </div>
                

              <?php  } ?>

              <div id="chk">
                         <div class="form-group row">
                 

                  
                      <label class="col-sm-2 col-form-label">Name Prefix</label>
                       <div class="col-sm-4">
                      <select name="name_prefix" class="form-control" id="type" onClick="Remove_options();" >
                      
                            <option value="">--</option>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Ms">Ms.</option>
                            
                       
                        </select>
                      <span class="input-error"><?php echo form_error('name_prefix', '<div class="error">', '</div>'); ?></span>
                    </div>

                      <label class="col-sm-2 col-form-label">Supplier First Name</label>
                      <div class="col-sm-4">
                      <input type="text" name="first_name" id="en_title" class="form-control" placeholder="Enter Firstname" >
                     
                      <span class="input-error"><?php echo form_error('first_name', '<div class="error">', '</div>'); ?></span>
                    </div>
                </div>

                  

                 

                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Last Name</label>
                      <div class="col-sm-4">
                      <input type="text" name="last_name" id="en_last_name" class="form-control" placeholder="Enter Lastname" >
                     
                      <span class="input-error"><?php echo form_error('last_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                     <label class="col-sm-2 col-form-label">Supplier Company Name</label>
                      <div class="col-sm-4">
                      <input type="text" name="Company_name" id="en_Company_name" class="form-control" placeholder="Company name">
                      
                      <span class="input-error"><?php echo form_error('Company_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  
                  <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Company Email</label>
                     <div class="col-sm-4">
                     <input type="email" name="email_address" id="email_address" class="form-control" placeholder="email Address" >
                      <span class="input-error"><?php echo form_error('email_address', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <label class="col-sm-2 col-form-label">Mobile Number</label>
                      <div class="col-sm-4">
                      <input type="text"  name="mobile_number"  maxlength="14" class="form-control" placeholder="mobile"   data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" id="phoneNum0">
                       <small></small>
                      <span class="input-error"><?php echo form_error('mobile_number', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>


                  </div>
                

               
                  
                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Landline Number</label>
                    <div class="col-sm-4">
                      <input type="text" id="phoneNum1" name="landline_number" maxlength="14" class="form-control" placeholder="Landline"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" >
                      <small></small>
                      <span class="input-error"><?php echo form_error('landline_number', '<div class="error">', '</div>'); ?></span>
                    </div>

                     <label class="col-sm-2 col-form-label">Ext</label>
                    <div class="col-sm-4">
                      <input type="text" name="landline_number_ext" id="en_landline_number_ext" class="form-control" placeholder="extension" maxlength="6" onkeypress="return isNumberKey(event)" data-toggle="tooltip" data-placement="top" title="Only 6 numeric number only">
                     
                      <span class="input-error"><?php echo form_error('landline_number_ext', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                
                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Fax number</label>
                    <div class="col-sm-4">
                      <input type="text" id="phoneNum2" name="fax_number" maxlength="14" class="form-control" placeholder="fax number"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" >
                     <!--  <small>Format: (XXX)-XXX-XXXX</small> -->
                      <span class="input-error"><?php echo form_error('fax_number', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <label class="col-sm-2 col-form-label">Company Address1</label>
                     <div class="col-sm-4">
                      <input type="text" name="address1" id="en_address1" class="form-control" placeholder="address1" >
                      <span class="input-error"><?php echo form_error('address1', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                 
                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Address2</label>
                <div class="col-sm-4">  
                   <input type="text" name="address2" id="en_address2" class="form-control" placeholder="address2">
                      <span class="input-error"><?php echo form_error('address2', '<div class="error">', '</div>'); ?></span>
                    </div>

                     <label class="col-sm-2 col-form-label">State</label>
                      <div class="col-sm-4">
                      <select class="form-control select2" id="state1" name="State_id" >
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                        <?php } ?>
                      </select>
                      <span class="input-error"><?php echo form_error('State_id', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  

                <div class="form-group row">
               
                      <label class="col-sm-2 col-form-label">city</label>
                     <div class="col-sm-4">
                      <select class="form-control select2" id="city1" name="city_id" >
                        <option value="" >Select City</option>
                        
                      </select>
                       <span id="tt"></span>
                      <input type="hidden" name="latitude" id="latitude">
                      <input type="hidden" name="longitude" id="longitude">
                      <span class="push-down"></span>
                      <span class="input-error"><?php echo form_error('city_id', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <label class="col-sm-2 col-form-label">Zipcode</label>
                     <div class="col-sm-4">
                      <input type="text" onkeypress="return isNumberKey(event)" name="zipcode" id="en_zipcode" maxlength="5" class="form-control" placeholder="zipcode"   data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" >
                      <!-- <small>(Only 5 numerical digits only)</small> -->
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                <div class="col-sm-12 discount_col">
                  <h4 class="subtype">Multi Storefront Discount Type</h4>
                </div>

              </div>
              <br>

                <div class=" form-group row">
                 
                      <label class="col-sm-6 col-form-label">Multi Storefront Discount Type</label>
                      <label class="col-sm-6 col-form-label">Multi Storefront Discount Amount</label>
                </div>

                  
                  <div class=" form-group row">
                
                      <div class="col-sm-6">
                      <select id="dis_multi_type" name="dis_multi_type" class="form-control" onchange="swap(this.value)" >
                        <option value="Select" >Select Type</option>
                        <?php foreach($discount_types as $key =>$dis){ ?>
                           <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                        <?php } ?>
                       
                      </select>
                      <span class="input-error"><?php echo form_error('discount_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                     <div class="col-sm-6 flat_amount">
                       
                      <input type="text" name="amount" id="amount" class="form-control distamt1" placeholder="Discount Amount" value="" maxlength="5">
                   
                      
                      <span class="input-error"><?php echo form_error('amount', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
                <div class="form-group row">
                <div class="col-md-12 discount_col">
                  <h4 class="subtype">Low Volume Days You'd Offer a Discount</h4>
                </div>

              </div>
              <br>
                <div class=" form-group row">
                  
                      <label class="col-sm-6 col-form-label">Days Discount Type</label>
                      <label class="col-sm-6 col-form-label">Discounted Days Amount</label>
                </div>  
                <div class=" form-group row"> 
                 <div class="col-sm-6">   
                      <select id="dis_day_type" name="dis_day_type" class="form-control select2" onchange="swap2(this.value)" >
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {
                             
                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } ?>
                      </select>
                      <span class="input-error"><?php echo form_error('dis_day_type', '<div class="error">', '</div>'); ?></span>
                    </div>
                     <div class="col-sm-6">
                      <input type="text" name="discount_days_amt" min=0 id="en_cost" class="form-control en_cost distamt1" placeholder="Discount Days Amount " value="" maxlength="5">
                     
                      <span class="input-error"><?php echo form_error('discount_days_amt', '<div class="error">', '</div>'); ?></span>

                  </div>
                </div>
                   
                
                 

                    <div class="form-group row en_cost">
                       <div class="col-xs-12">
                      <label>Supplier Discount Days</label>
                     


                       <?php


                       if($weekdays){

                        $weekday1=explode(',',trim($peakdays));
                        foreach($weekday1 as $each)
                          {
                            array_push($weekday1,trim($each));
                          }


                      foreach ($weekdays as $week) {


                      if(in_array($week->day,$weekday1))
                        {

                        echo '<input type="checkbox" name="peakdays[]" class="week" id="en_peakdays"  value="'.$week->day.'" checked>'.$week->day;
                    }else{ ?>
                        <input type="checkbox" name="peakdays[]" id="en_peakdays" class="week" value="<?php echo $week->day;?> "><?php echo $week->day;?>

                <?php  } }}?>

                      
                      <span class="input-error"><?php echo form_error('peakdays', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
                <div class="form-group row">
                <div class="col-md-12 discount_col">
                  <h4 class="subtype">Low Volume Months You'd Offer a Discount</h4>
                </div>

              </div>
              <br>
                <div class="form-group row">
                   

                   
                      <label class="col-sm-6 col-form-label">Months Discount Type</label>
                      <label class="col-sm-6 col-form-label">Discounted Months Amount</label>
                 </div> 
                 <div class="form-group row">
                 <div class="col-sm-6">    
                      <select id="dis_month_type" name="dis_month_type" class="form-control select2" onchange="swap3(this.value)" >
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {

                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } ?>
                      </select>
                      <span class="input-error"><?php echo form_error('dis_month_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                  
                   <div class="col-sm-6">

                    
                     
                      <input type="text" name="discount_month_amt" min=0 id="en_cost" class="form-control en_cost2 distamt1" placeholder="Discount Month Amount " value="" maxlength="5">
                      
                      <span class="input-error"><?php echo form_error('discount_month_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
               
                   
                    <div class="form-group row en_cost2">
                      <div class="col-xs-12">
                      <label>Supplier Discount Months</label>
                      


                      <?php if($months){

                      $month1=explode(',',trim($peakmonths));
                  foreach($month1 as $each)
                    {
                      array_push($month1,trim($each));
                    }
                     foreach ($months as $mont) {
//        var_dump($mont->month);
//        var_dump($month1[0]);
//        exit;
// print_r($mont->month==$month1[0]);exit;

                      if(in_array($mont->month,$month1))
                      {

                      echo '<input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="'.$mont->month.'" checked>'.$mont->month;
                  }else{ ?>
                      <input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="<?php echo $mont->month;?> "><?php echo $mont->month;?>

              <?php  }}}
                       ?>





                      
                      <span class="input-error"><?php echo form_error('peakmonths', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                  <hr style="border: 1px solid #dfe1e2;" />

                   <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Acceptable Travel Miles </label>
                     <div class="col-sm-4">
                      <input type="text" onkeypress="return isNumberKey(event)" maxlength="4" name="accepteble_travel_miles" id="nationaltxt" class="form-control" placeholder="travel miles" value="" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only">
                     
                                            <input type="checkbox" name="nationalwide"  value="1" id="nationl" onclick="nationalwides(this)">Nationwide Service: “(no distance limitation)”
                                           
                      <span class="input-error"><?php echo form_error('accepteble_travel_miles', '<div class="error">', '</div>'); ?></span>
                    </div>

                   <!--  <label class="col-sm-2 col-form-label">Supplier Dynamic Classification </label>
                     <div class="col-sm-4">
                      <input type="text"  maxlength="4" name="dynamic_classification" id="dynamic_classification" class="form-control" placeholder="Supplier Dynamic Classification" value="">
                      
                      <span class="input-error"><?php echo form_error('Supplier Dynamic Classification', '<div class="error">', '</div>'); ?></span>
                    </div> -->
                  </div>
                 

                


                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Certification</label>
                     <div class="col-sm-4">
                       <input type="file" name="certify"  id="certifyNumber" class="form-control" placeholder="Supplier Certification" value="" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" >
                        <span class="input-error"><?php echo form_error('certify', '<div class="error">', '</div>'); ?></span>
                                        <span style="color:red">Note:</span> <span style="color:green">support file:jpg,jpeg,png,gif,pdf</span>
                                            </div>

                        <label class="col-sm-2 col-form-label">Supplier insurance forms</label>
                     <div class="col-sm-4">
                       <input type="file" name="photo"  id="photoNumber" class="form-control" placeholder="Supplier Certification" value="" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf">
                        <span class="input-error"><?php echo form_error('photo', '<div class="error">', '</div>'); ?></span>
                                                <span style="color:red">Note:</span> <span style="color:green">support file:jpg,jpeg,png,gif,pdf</span>
                                            </div>
                  </div>
                  
            
                  
                  <br><br>
                 <div class="form-group row">
                
                      <label class="col-sm-3 col-form-label">Acceptable Event Categories (Consumer) </label>
                      <div class="col-sm-2">
                      <input type="checkbox"  id="checkAll">All
                      
                     </div>
                    <div class="col-sm-7">
                      <?php if($consumer_cat){

                         foreach ($consumer_cat as $event) { ?>
                      <input type="checkbox" class="cosumer" name="cons_accept[]" id="en_accept"  value="<?php echo $event['id'] ?>" class="form-control" ><?php echo $event['event_categories'] ?>
                      <?php }} ?>
                    

                      <span class="input-error"><?php echo form_error('cons_accept', '<div class="error">', '</div>'); ?></span>
                                        </div>
                                    </div>
<br><br>
                 <div class="form-group row">
                                      
                      <label class="col-sm-3 col-form-label">Acceptable Event Categories (Business) </label>
                      <div class="col-sm-2">
                        <input type="checkbox"  id="BusinesscheckAll">All</div>
                      <div class="col-sm-7">
                    
                      <?php if($business_cat){

                         foreach ($business_cat as $event) { ?>
                      <input type="checkbox" class="business" name="business_accept[]" id="en_accept"  value="<?php echo $event['id'] ?>" class="form-control"><?php echo $event['event_categories'] ?>
                      <?php }} ?>
                      

                      <span class="input-error"><?php echo form_error('business_accept', '<div class="error">', '</div>'); ?></span>
                    </div>


                                    </div>

                   <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">SAVE & NEXT</button>
                            </div>
                        </div>
                         
              
          </div>

          <div id="chk1" >

   <?php if(!empty($business))
   { ?>
                 <div class="form-group row">
                 
                     <input type="hidden" value="<?php echo $business[0]->id; ?>" name="businessid" id="businessid">
                  
                      <label class="col-sm-2 col-form-label">Name Prefix</label>
                       <div class="col-sm-4">
                      
                      
                           <?php if(set_value('name_prefix1')){ $name_prefix = set_value('name_prefix1'); } elseif (isset($business) &&$business) { $name_prefix = $business[0]->prefix; } ?>
                      <select class="form-control" name="prefix">


                        <option value="Mr" <?php if($name_prefix=='Mr.'){ echo 'selected';}else{ echo ""; } ?>>Mr.</option>
                        <option value="Mrs" <?php if($name_prefix=='Mrs'){ echo 'selected';}else{ echo ""; } ?>>Mrs.</option>
                        <option value="Ms" <?php if($name_prefix=='Ms'){ echo 'selected';}else{ echo ""; } ?>>Ms.</option>
                            
                       
                        </select>
                     
                    </div>

                     <?php if(set_value('first_name1')){ $first_name = set_value('first_name1'); } elseif (isset($business) &&$business) { $first_name = $business[0]->first_name; } ?>
                      <label class="col-sm-2 col-form-label">Supplier First Name</label>
                      <div class="col-sm-4">
                      <input type="text"  class="form-control" placeholder="Enter Firstname" value="<?php echo $first_name; ?>" name="namefirst" >
                     
                     
                    </div>
                </div>

                  

                 

                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Last Name</label>
                      <div class="col-sm-4">

                      <input type="text" class="form-control" placeholder="Enter Lastname" value="<?php echo $business[0]->last_name; ?>" name="namelast" >
                     
                      
                    </div>

                     <label class="col-sm-2 col-form-label">Supplier Company Name</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Company name" value="<?php echo $business[0]->company_name; ?>" name="namecompany" >
                      
                     
                    </div>

                  </div>
                  
                  <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Company Email</label>
                     <div class="col-sm-4">
                     <input type="email" class="form-control" placeholder="email Address" value="<?php echo $business[0]->email; ?>" name="mailaddr" >
                    
                    </div>

                    <label class="col-sm-2 col-form-label">Mobile Number</label>
                      <div class="col-sm-4">
                      <input type="text" maxlength="14" value="<?php echo $business[0]->mobile; ?>" class="form-control" placeholder="mobile"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" name="mob" id="phoneNum3">
                      
                     
                    </div>


                  </div>
                

                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Landline Number</label>
                    <div class="col-sm-4">
                      <input type="text"  maxlength="14" class="form-control" value="<?php echo $business[0]->telephone; ?>" placeholder="Landline"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" name="tele" id="phoneNum4" >
                      <small></small>
                     
                    </div>

                     <label class="col-sm-2 col-form-label">Ext</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="extension" value="<?php echo $business[0]->ext; ?>" name="tele_ext" maxlenght="6" onkeypress="return isNumberKey(event)" data-toggle="tooltip" data-placement="top" title="Only 6 numeric number only">
                     
                     
                    </div>
                  </div>
                
                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Fax number</label>
                    <div class="col-sm-4">
                      <input type="text"  maxlength="14" class="form-control" placeholder="fax number"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" value="<?php echo $business[0]->fax; ?>" name="fax" id="phoneNum5">
                    
                    </div>

                    <label class="col-sm-2 col-form-label">Company Address1</label>
                     <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="address1" value="<?php echo $business[0]->address; ?>" name="addr" >
                      
                    </div>

                  </div>
                 
                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Address2</label>
                <div class="col-sm-4">  
                   <input type="text" class="form-control" placeholder="address2" value="<?php echo $business[0]->address2; ?>" name="addr2" >
                     
                    </div>

                     <label class="col-sm-2 col-form-label">State</label>
                      <div class="col-sm-4">
                       <select class="form-control select2" id="en_state1" name="state">
                        <option value="<?php echo $business[0]->stateid; ?>" ><?php echo $business[0]->sname; ?></option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                        <?php } ?>
                      </select>
                     
                    </div>

                  </div>
                  

                <div class="form-group row">
              
                      <label class="col-sm-2 col-form-label">city</label>
                     <div class="col-sm-4">
                      <select class="form-control select2" id="en_city11" name="cityname">
                        <option value="<?php echo $business[0]->cityid ?> "><?php echo $business[0]->cname ?></option>
                        
                      </select>

                      <span id="tf"></span>
                      <input type="hidden" name="latit" id="latit" value="<?php echo $business[0]->latitude ?>">
                      <input type="hidden" name="longt" id="longt" value="<?php echo $business[0]->longitude ?>">
                     <span class="push-down1"></span>
                      
                    </div>

                    <label class="col-sm-2 col-form-label">Zipcode</label>
                     <div class="col-sm-4">
                      <input type="number" maxlength="5" class="form-control" placeholder="zipcode" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" value="<?php echo $business[0]->zipcode; ?>" name="buszip" >
                      <!-- <small>(Only 5 numerical digits only)</small> -->
                      
                    </div>
                  </div>

                     <div class="form-group row">
                <div class="col-sm-12 discount_col">
                  <h4 class="subtype">Multi Storefront Discount Type</h4>
                </div>

              </div>
              <br>

                <div class=" form-group row">
                 
                      <label class="col-sm-6 col-form-label">Multi Storefront Discount Type</label>
                      <label class="col-sm-6 col-form-label">Multi Storefront Discount Amount $</label>
                </div>

                  
                  <div class=" form-group row">
                
                      <div class="col-sm-6">
                      <select id="dis_multi_type" class="form-control " name="multi_type" onchange="swap(this.value)">
                        <option value="Select" >Select Type</option>
                       <?php
                            foreach ($discount_types as $key =>$dis) {
                              if($dis->discount_id==$business[0]->discount_multi_type)
                              {
                          ?>
                        <option value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } else{
                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        }
                        } ?>
                      </select>
                      <span class="input-error"><?php echo form_error('discount_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                     <div class="col-sm-6 flat_amount">
                       
                       <input type="text" class="form-control multi_amount distamt1" placeholder="Discount Amount" <?php if($business[0]->discount_multi_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->multi_discount_amount; ?>" name="multi_amount" maxlength="5">
                   
                      
                      <span class="input-error"><?php echo form_error('amount', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
                <div class="form-group row">
                <div class="col-md-12 discount_col">
                  <h4 class="subtype">Low Volume Days You'd Offer a Discount</h4>
                </div>

              </div>
              <br>
                <div class=" form-group row">
                  
                      <label class="col-sm-6 col-form-label">Days Discount Type</label>
                      <label class="col-sm-6 col-form-label">Discounted Days Amount $</label>
                </div>  
                <div class=" form-group row"> 
                 <div class="col-sm-6">   
                      <select id="dis_day_type"  class="form-control select2" onchange="swap2(this.value)" name="days_type">
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {
                              if($dis->discount_id==$business[0]->discount_day_type)
                              {

                          ?>
                        <option value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } 
                        else{
                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } }?>
                      </select>
                      <span class="input-error"><?php echo form_error('dis_day_type', '<div class="error">', '</div>'); ?></span>
                    </div>
                     <div class="col-sm-6">
                      <input type="text" min=0  maxlength="5" id="en_cost" class="form-control en_cost distamt1" placeholder="Discount Days Amount " <?php if($business[0]->discount_day_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo $business[0]->discount_days_amt; ?>" name="days_amount">
                     
                      <span class="input-error"><?php echo form_error('discount_days_amt', '<div class="error">', '</div>'); ?></span>

                  </div>
                </div>
                   
                
                 

                    <div class="form-group row en_cost" <?php if($business[0]->discount_day_type==3) { ?> style="display:none"; <?php } ?>>
                       <div class="col-xs-12">
                      <label>Supplier Discount Days</label>
                     


                       <?php if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($business) &&$business) { $peakdays = $business[0]->days; } ?>
                      <!-- <input type="text" name="peakdays" id="en_peakdays" class="form-control" placeholder="v" value="<?php echo $peakdays; ?>"> -->
                       selected :<?php print_r($peakdays); if(!empty($peakdays))print_r("updated")?><br>

                       <?php

                       if($weekdays){

                        $weekday1=explode(',',trim($peakdays));
                        foreach($weekday1 as $each)
                          {
                            array_push($weekday1,trim($each));
                          }

                      foreach ($weekdays as $week) {

                      if(in_array($week->day,$weekday1))
                        {

                        echo '<input type="checkbox" class="week" id="en_peakdays"  value="'.$week->day.'" checked name="days_peak[]">'.$week->day;
                    }else{ ?>
                        <input type="checkbox" id="en_peakdays" class="week" value="<?php echo $week->day;?> " name="days_peak[]"><?php echo $week->day;?>

                <?php  } } }?>

                      
                      <span class="input-error"><?php echo form_error('peakdays', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
                <div class="form-group row">
                <div class="col-md-12 discount_col">
                  <h4 class="subtype">Low Volume Months You'd Offer a Discount</h4>
                </div>

              </div>
              <br>
                <div class="form-group row">
                   

                   
                      <label class="col-sm-6 col-form-label">Months Discount Type</label>
                      <label class="col-sm-6 col-form-label">Discounted Months Amount $</label>
                 </div> 
                 <div class="form-group row">
                 <div class="col-sm-6">    
                      <select id="dis_month_type" class="form-control select2" onchange="swap3(this.value)" >
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {

                          if($dis->discount_id==$business[0]->discount_month_type)
                              {

                          ?>
                        <option value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } 
                        else{
                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } }?>
                      </select>
                      <span class="input-error"><?php echo form_error('dis_month_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                  
                   <div class="col-sm-6">

                    
                     
                       <input type="text" min=0  maxlength="5" id="en_cost" class="form-control en_cost2 distamt1" placeholder="Discount Month Amount " <?php if($business[0]->discount_month_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo $business[0]->discount_month_amt; ?>" name="month_amount">
                      
                      <span class="input-error"><?php echo form_error('discount_month_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
               
                   
                    <div class="form-group row en_cost2">
                      <div class="col-xs-12">
                      <label>Supplier Discount Months</label>
                      



                     <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($business) &&$business) { $peakmonths = $business[0]->month; } ?>
                      <!-- <input type="text" name="peakmonths" id="en_peakmonths" class="form-control" placeholder="peakmonths" value="<?php echo $peakmonths; ?>"> -->
                      selected :<?php print_r($peakmonths); if(!empty($peakmonths))print_r("updated"); ?><br>

                      <?php if($months){

                      $month1=explode(',',trim($peakmonths));
                  foreach($month1 as $each)
                    {
                      array_push($month1,trim($each));
                    }
                     foreach ($months as $mont) {

                      if(in_array($mont->month,$month1))
                      {

                      echo '<input type="checkbox" class="month" name="month_peak[]" id="peakmonths"  value="'.$mont->month.'" checked>'.$mont->month;
                  }else{ ?>
                      <input type="checkbox" class="month" id="peakmonths" name="month_peak[]" value="<?php echo $mont->month;?> "><?php echo $mont->month;?>

              <?php  }}}
                       ?>




                      <span class="input-error"><?php echo form_error('peakmonths', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                 


                   <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Acceptable Travel Miles </label>
                     <div class="col-sm-4">
                     <input type="text"  maxlength="4" class="form-control" placeholder="travel miles" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" value="<?php echo $business[0]->travel_miles; ?>" name="traval" id="nationaltxt2">
                       <input type="checkbox" name="national" <?php if($business[0]->nationalwide==1){echo "checked";}?> value="1" id="nationl1" onclick="nationalwides2(this)" >Nationwide Service: “(no distance limitation)”
                                           
                                           
                     
                    </div>

                   <!--  <label class="col-sm-2 col-form-label">Supplier Dynamic Classification </label>
                     <div class="col-sm-4">
                       <input type="text"  maxlength="4" class="form-control" placeholder="Supplier Dynamic Classification" value="<?php echo $business[0]->dynamic_classification; ?>" name="dymanic">
                      
                      
                    </div> -->
                  </div>
                 

                


                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Certification</label>
                     <div class="col-sm-4">
                       <input type="file" class="form-control" placeholder="Supplier Certification" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo $business[0]->certification; ?>" name="certi">
                       <input type="hidden" name="defult_certi" value="<?php echo $business[0]->certification; ?>">
                       
                                       
                                            </div>

                        <label class="col-sm-2 col-form-label">Supplier insurance forms</label>
                     <div class="col-sm-4">
                      <input type="file" class="form-control" placeholder="Supplier Certification" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo $business[0]->insurance; ?>" name="insurance">
                        <input type="hidden" name="defult_insur" value="<?php echo $business[0]->insurance; ?>">
                        
                                            </div>
                  </div>
                  
            
                  
               
                 <div class="form-group row">
                
                      <label class="col-sm-3 col-form-label">Acceptable Event Categories (Consumer) </label>
                     
                    
                       <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = $business[0]->consumer_event; } ?>
                      <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);
                       $conk=count($ac);


                    }
                    else{
                      $conk=0;
                    } } } 
                    $con=count($consumer_cat);
                    ?>
                    <input type="hidden" id="conscat" value="<?php echo $conk ?>">
                          <input type="hidden" id="constotal" value="<?php echo $con ?>">
                          <div class="col-sm-2">
                      <input type="checkbox" class="cosumer_st"  id="Allcheck"><span class="cosumer_style">All</span><br>
                     </div>
                     <div class="col-sm-7">
                      <?php //print_r($accept);  ?>
                       <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        {

                          echo '<input type="checkbox" class="cosumer cosumer_st" name="accept_cons[]" value="'.$event['id'].'" checked class="form-control"><span class="cosumer_st">'.$event['event_categories'].'</span></option><br><br>';
                        }


                        else{?>
                          <input type="checkbox" name="accept_cons[]" class="cosumer cosumer_st" id="en_accept1"  value="<?php echo $event['id'] ?>" class="form-control"><span class="cosumer_st"><?php echo $event['event_categories'] ?></span><br><br>
                      <?php


                    }



                      } else{?>

                       <input type="checkbox" name="accept_cons[]" id="en_accept1" class="cosumer cosumer_st" value="<?php echo $event['id'] ?>"><span class="cosumer_st"><?php echo $event['event_categories'] ?></span><br><br>
                       <?php }}}


                       ?>
                      
                    

                    
                                        </div>
                                    </div>

                 <div class="form-group row">
                                      
                      <label class="col-sm-3 col-form-label">Acceptable Event Categories (Business) </label>
                      
                        <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = $business[0]->business_event; } ?>
                       <?php
                       $k=0; 
                       if($business_cat){

                          foreach ($business_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);
                      $k=count($ac);

                      //print_r(  $ac);exit;
                    
                      }
                       else{
                      $k=0;
                    }
                     }
                    
                    }
                    $c=count($business_cat);

                        ?>
                        
                         <input type="hidden" id="bisc" value="<?php echo $c ?>">
                          <input type="hidden" id="bisci" value="<?php echo $k ?>">
                          <div class="col-sm-2">
                      <input type="checkbox" class="cosumer_st"  id="AllBusinesscheck" ><span class="cosumer_style">All</span>
                    </div>
                    <div class="col-sm-7">
                      
                       <?php //print_r($accept); ?>
                       <?php if($business_cat){

                          foreach ($business_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        {

                          echo '<input type="checkbox" class="cosumer cosumer_st" name="accept_business[]" value="'.$event['id'].'" checked> <span class="cosumer_st">'.$event['event_categories'].'</span></option><br><br>';
                        }


                        else{?>
                          <input type="checkbox" class="cosumer cosumer_st" name="accept_business[]" id="en_accept"  value="<?php echo $event['id'] ?>"><span class="cosumer_st"><?php echo $event['event_categories'] ?></span><br><br>
                      <?php


                    }



                      } else{?>

                       <input type="checkbox" class="cosumer cosumer_st" name="accept_business[]" id="en_accept"  value="<?php echo $event['id'] ?>"><span class="cosumer_st"><?php echo $event['event_categories'] ?></span><br><br>
                       <?php }}}


                       ?>
                     
                      
                   

                    </div>


                                    </div>

                                     <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="bisnext" id="bisnext" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                      <?php } ?>

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
<!-- Main-body end -->
<!-- ck editor -->
<script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="bower_components/switchery/dist/switchery.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/advance-elements/swithces.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

    var conc=$('#conscat').val();
var cont=$('#constotal').val();
if(conc==cont)
{
$('#AllcheckAll').attr('checked','checked');
}


var i=$('#bisci').val();
var c=$('#bisc').val();
if(i==c)
{
$('#AllBusinesscheck').attr('checked','checked');
}

 $("#Allcheck").click(function () {
      $('input[name="accept_cons[]"]').not(this).prop('checked', this.checked);
  });
  $("#AllBusinesscheck").click(function () {
      $('input[name="accept_business[]"]').not(this).prop('checked', this.checked);
  });



  if ($("input[name='cons_accept[]'").is(":checked"))
  {
  $('#checkAll').attr('checked','checked');
  }
  if ($("input[name='business_accept[]'").is(":checked"))
  {
  $('#BusinesscheckAll').attr('checked','checked');
  }

  $("#checkAll").click(function () {
      $('input[name="cons_accept[]"]').not(this).prop('checked', this.checked);
  });
  $("#BusinesscheckAll").click(function () {
      $('input[name="business_accept[]"]').not(this).prop('checked', this.checked);
  });

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
        }

  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $("#discount_type").change(function(){
    var selctectdVal = $(this).children("option:selected").val();
    if(selctectdVal=='Flat Rate'){
      $(".percentage").hide();
      $(".flat_amount").show();
    }
    if(selctectdVal=='Percentage'){
      $(".flat_amount").hide();
      $(".percentage").show();
    }
  });
</script>

  <script>
  function confirmDelete(form) {
    if (!confirm("Do you really want to Delete?")) {
      return false;
    }
    this.form.submit();
  }


   function nationalwides(chk)
 {
 	
 	if(chk.checked == true)
    {
       $("#nationaltxt").hide();
      

    }
    else
    {
        $("#nationaltxt").show();
       
    }
 }

  function nationalwides2(chk)
 {
 	
 	if(chk.checked == true)
    {
       $("#nationaltxt2").hide();
      

    }
    else
    {
        $("#nationaltxt2").show();
       
    }
 }






$(document).ready(function() {

  $('.selectpickers').selectpicker();
});

  
function swap(val)
{
if(val==3)
{
$('#dis_multi_type').closest('.row').find('#amount').hide();
$('.multi_amount').hide();
}
else
{
$('#dis_multi_type').closest('.row').find('#amount').show();
$('.multi_amount').show();
}
}

function swap2(val)
{
if(val==3)
{
$('#dis_day_type').closest('.row').find('#en_cost').hide();
$('.en_cost').hide();
}
else
{
$('#dis_day_type').closest('.row').find('#en_cost').show();
$('.en_cost').show();
}
}

function swap3(val)
{
if(val==3)
{
//$('#dis_day_type').closest('.row').find('.en_cost').hide();
$('.en_cost2').hide();
}
else
{
//$('#dis_day_type').closest('.row').find('.en_cost').show();
$('.en_cost2').show();
}
}

$('#en_state1').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>administrator/getCity2',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#en_city11').html(response); 
           }
       });
     });

$("#city1").change(function(){
      var city=$('#city1').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>supplier/create/selectCityName/'+ city,
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#tt').html(response); 
                var cityname=$("#citynameassign").val();
//alert(cityname);
            var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': $('#citynameassign').val()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            $('.push-down').text("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
            $("#longitude").val(results[0].geometry.location.lng());
             $("#latitude").val(results[0].geometry.location.lat());
            //alert(results[0].geometry.location.lat());
          } else {
            $('.push-down').text("Something got wrong " + status);
          }
        });

           }

       });


});



    $("#en_city11").change(function(){
      var city1=$('#en_city11').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>supplier/create/selectCityName2/'+ city1,
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#tf').html(response); 
                var cityname=$("#citynameassignall").val();
//alert(cityname);
            var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': $('#citynameassignall').val()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            $('.push-down1').text("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
            $("#longt").val(results[0].geometry.location.lng());
             $("#latit").val(results[0].geometry.location.lat());
            //alert(results[0].geometry.location.lat());
          } else {
            $('.push-down1').text("Something got wrong " + status);
          }
        });

           }

       });


});

    $('#state1').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>administrator/getCity',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#city1').html(response); 
           }
       });
     });
</script>


<script>

	
	let telEl = document.querySelector('#phoneNum0')

telEl.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})
let telEl1 = document.querySelector('#phoneNum1')

telEl1.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})


let telEl2 = document.querySelector('#phoneNum2')

telEl2.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})


let telEl3 = document.querySelector('#phoneNum3')

telEl3.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})


let telEl4 = document.querySelector('#phoneNum4')

telEl4.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})


let telEl5 = document.querySelector('#phoneNum5')

telEl5.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,3})(\d{1,3})?(\d{1,4})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})


 $(".distamt1").on("keypress keyup blur",function (event) {
           
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>

