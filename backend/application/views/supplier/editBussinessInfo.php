<?php
$peakdays="";
$peakmonths="";
?>

<?php if(!empty($categoryname[0]->company_name)){
                $companyName = '-'.$categoryname[0]->company_name;
              }else{
                $companyName = '';
              } ?>

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
<style type="text/css">
        .bor
        {
            border: 2px solid #20bb62;
        }
    </style>
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
            <li class="breadcrumb-item"><a href="#!">Edit Business Info</a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="form-group row">
        
      
                                <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.@$business[0]->storeid); ?>" class="btn btn-primary active bor" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Lead</a>

                                 <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.@$business[0]->supplier_id.'/'.@$business[0]->category_id.'/'.@$business[0]->storeid); ?>" class="btn btn-success bor">Reviews</a>

                            
            <!-- Basic Form Inputs card start -->
            <div class="card">

                <br><br>
                    <div class="form-group row">
                         
                            <label class="col-sm-4 col-form-label"></label>
                           
                        </div>

                <div class="card-header">
                    <h5>Edit Business Info  - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('supplier/edit/editBusinessInfo/'.@$business[0]->storeid); ?>">
                  
                    <input type="hidden" value="<?php echo @$business[0]->supplier_id; ?>" name="supplier_id" id="supplier_id">

                  

  

                <div class="form-group row">
                 
                     <input type="hidden" value="<?php echo @$business[0]->business_id; ?>" name="businessid" id="businessid">
                     <input type="hidden" value="<?php echo @$business[0]->id; ?>" name="storefrontid">
                  
                      <label class="col-sm-2 col-form-label">Name Prefix</label>
                       <div class="col-sm-4">
                      
                      
                           <?php if(set_value('name_prefix1')){ $name_prefix = set_value('name_prefix1'); } elseif (isset($business) &&$business) { $name_prefix = @$business[0]->prefix; } ?>
                      <select class="form-control" name="name_prefix">


                        <option value="Mr" <?php if($name_prefix=='Mr.'){ echo 'selected';}else{ echo ""; } ?>>Mr.</option>
                        <option value="Mrs" <?php if($name_prefix=='Mrs'){ echo 'selected';}else{ echo ""; } ?>>Mrs.</option>
                        <option value="Ms" <?php if($name_prefix=='Ms'){ echo 'selected';}else{ echo ""; } ?>>Ms.</option>
                            
                       
                        </select>
                     
                    </div>

                     <?php if(set_value('first_name1')){ $first_name = set_value('first_name1'); } elseif (isset($business) &&$business) { $first_name = @$business[0]->first_name; } ?>
                      <label class="col-sm-2 col-form-label">Supplier First Name</label>
                      <div class="col-sm-4">
                      <input type="text"  name="first_name" class="form-control" placeholder="Enter Firstname" value="<?php echo $first_name; ?>" >
                     
                     
                    </div>
                </div>

                  

                 

                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Last Name</label>
                      <div class="col-sm-4">
                      <input type="text" name="last_name" class="form-control" placeholder="Enter Lastname" value="<?php echo @$business[0]->last_name; ?>" >
                     
                      
                    </div>

                     <label class="col-sm-2 col-form-label">Supplier Company Name</label>
                      <div class="col-sm-4">
                      <input type="text" name="Company_name" class="form-control" placeholder="Company name" value="<?php echo @$business[0]->company_name; ?>" >
                      
                     
                    </div>

                  </div>
                  
                  <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Company Email</label>
                     <div class="col-sm-4">
                     <input type="email" name="email_address" class="form-control" placeholder="email Address" value="<?php echo @$business[0]->email; ?>" >
                    
                    </div>

                    <label class="col-sm-2 col-form-label">Mobile Number</label>
                      <div class="col-sm-4">
                      <input type="text"   maxlength="14" name="mobile_number" value="<?php echo @$business[0]->mobile; ?>" class="form-control" placeholder="mobile"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" id="phoneNum0" >
                      
                     
                    </div>


                  </div>
                

                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Landline Number</label>
                    <div class="col-sm-4">
                      <input type="text" name="landline_number" maxlength="14" class="form-control" value="<?php echo @$business[0]->telephone; ?>" placeholder="Landline"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" id="phoneNum1">
                      <small></small>
                     
                    </div>

                     <label class="col-sm-2 col-form-label">Ext</label>
                    <div class="col-sm-4">
                      <input type="text" name="landline_number_ext" onkeypress="return isNumberKey(event)" class="form-control" placeholder="extension" value="<?php echo @$business[0]->ext; ?>" maxlength="6">
                     
                     
                    </div>
                  </div>
                
                   <div class="form-group row">
                  
                      <label class="col-sm-2 col-form-label">Fax number</label>
                    <div class="col-sm-4">
                      <input type="text"  name="fax_number"  maxlength="10" class="form-control" placeholder="fax number"  data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" value="<?php echo @$business[0]->fax; ?>"id="phoneNum2" >
                    
                    </div>

                    <label class="col-sm-2 col-form-label">Company Address1</label>
                     <div class="col-sm-4">
                      <input type="text" name="address1" class="form-control" placeholder="address1" value="<?php echo @$business[0]->address; ?>" >
                      
                    </div>

                  </div>
                 
                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Address2</label>
                <div class="col-sm-4">  
                   <input type="text" name="address2" class="form-control" placeholder="address2" value="<?php echo @$business[0]->address2; ?>" >
                     
                    </div>

                     <label class="col-sm-2 col-form-label">State</label>
                      <div class="col-sm-4">
                       <select class="form-control select2" id="state1" name="state">
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { 
                          if($item->id==@$business[0]->stateid)
                          {
                          ?>
                        <option value="<?php echo $item->id ?>" selected><?php echo $item->name?></option>
                        <?php } 
                        else
                          {?>
                            <option value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                            <?php } } ?>
                      </select>
                      <span class="input-error"><?php echo form_error('State_id', '<div class="error">', '</div>'); ?></span>
                     
                    </div>

                  </div>
                  

                <div class="form-group row">
               
                      <label class="col-sm-2 col-form-label">city</label>
                     <div class="col-sm-4">
                       <select class="form-control select2" id="city1" name="city_id">
                        <?php if(!empty(@$business[0]->cityid))
                        { ?>
                        <option value="<?php echo @@$business[0]->cityid ?> "><?php echo @@$business[0]->cname ?></option>
                        <?php
                      }
                      
                      else {
                              echo "<option value=''>Select </option>";
                       }?>

                      </select>

                      <span id="tt"></span>
                      <input type="hidden" name="latitude" id="latitude" value="<?php echo @$business[0]->latitude ?>">
                      <input type="hidden" name="longitude" id="longitude" value="<?php echo @$business[0]->longitude ?>">
                      <span class="push-down"></span>
                      <span class="input-error"><?php echo form_error('city_id', '<div class="error">', '</div>'); ?></span>
                      
                    </div>

                    <label class="col-sm-2 col-form-label">Zipcode</label>
                     <div class="col-sm-4">
                      <input type="text" onkeypress="return isNumberKey(event)" name="zipcode" maxlength="5" class="form-control" placeholder="zipcode" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" value="<?php echo @$business[0]->zipcode; ?>" >
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
                      <label class="col-sm-6 col-form-label">Multi Storefront Discount Amount</label>
                </div>

                  
                  <div class=" form-group row">
                
                      <div class="col-sm-6">
                      <select id="dis_multi_type" name="dis_multi_type"  class="form-control" onchange="swap(this.value)"  >
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {
                              if($dis->discount_id==@$business[0]->discount_multi_type)
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
                       
                      <input type="text" name="amount" id="amount" class="form-control distamt1" placeholder="Discount Amount"  <?php if(@$business[0]->discount_multi_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @@$business[0]->multi_discount_amount; ?>" maxlength="5" onkeypress="return isNumberKey(event)">
                   
                      
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
                              if($dis->discount_id==@$business[0]->discount_day_type)
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
                      <input type="text" name="discount_days_amt" min=0 id="en_cost" class="form-control en_cost distamt1" placeholder="Discount Days Amount " <?php if(@$business[0]->discount_day_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->discount_days_amt; ?>" maxlength="5" onkeypress="return isNumberKey(event)">
                     
                      <span class="input-error"><?php echo form_error('discount_days_amt', '<div class="error">', '</div>'); ?></span>

                  </div>
                </div>
                   
                
                 

                    <div class="form-group row en_cost" <?php if(@$business[0]->discount_day_type==3) { ?> style="display:none"; <?php } ?>>
                       <div class="col-xs-12">
                      <label>Supplier Discount Days</label>
                     


                       <?php if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($business) &&$business) { $peakdays = @$business[0]->days; } ?>
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

                        echo '<input type="checkbox" class="week" name="peakdays[]" id="en_peakdays"  value="'.$week->day.'" checked>'.$week->day;
                    }else{ ?>
                        <input type="checkbox" id="en_peakdays" name="peakdays[]" class="week" value="<?php echo $week->day;?> "><?php echo $week->day;?>

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
                      <label class="col-sm-6 col-form-label">Discounted Months Amount</label>
                 </div> 
                 <div class="form-group row">
                 <div class="col-sm-6">    
                      <select id="dis_month_type" name="dis_month_type" class="form-control select2" onchange="swap3(this.value)" >
                        <option value="Select" >Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {

                          if($dis->discount_id==@$business[0]->discount_month_type)
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

                    
                     
                      <input type="text" name="discount_month_amt" min=0 id="en_cost2" class="form-control en_cost2 distamt1" placeholder="Discount Month Amount " <?php if(@$business[0]->discount_month_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->discount_month_amt; ?>" maxlength="5" onkeypress="return isNumberKey(event)">
                      
                      <span class="input-error"><?php echo form_error('discount_month_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                
               
                   
                    <div class="form-group row en_cost2">
                      <div class="col-xs-12">
                      <label>Supplier Discount Months</label>
                      



                      <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($business) &&$business) { $peakmonths = @$business[0]->month; } ?>
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
                      <input type="text"  onkeypress="return isNumberKey(event)" maxlength="4" name="accepteble_travel_miles" class="form-control" placeholder="travel miles" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" value="<?php echo @$business[0]->travel_miles; ?>" id="nationaltxt">
                     
                                           
                        <input type="checkbox" name="nationalwide"  value="1" id="nationl" onclick="nationalwides(this)" >Nationwide Service: “(no distance limitation)”                  
                     
                    </div>

                    <!-- <label class="col-sm-2 col-form-label">Supplier Dynamic Classification </label>
                     <div class="col-sm-4">
                      <input type="text"  name="dynamic_classification" maxlength="4" class="form-control" placeholder="Supplier Dynamic Classification" value="<?php echo @$business[0]->dynamic_classification; ?>" >
                      
                      
                    </div> -->
                  </div>
                 

                


                <div class="form-group row">
                 
                      <label class="col-sm-2 col-form-label">Supplier Certification</label>
                     <div class="col-sm-4">
                       <input type="file" name="certify" class="form-control" placeholder="Supplier Certification" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo@$business[0]->certification; ?>" >
                       <?php if(@$business[0]->certification){ ?>
                         <a class="fa fa-file"style="font-size:16px;" id="t" href = "<?php echo base_url('../uploads/business_info/'.@$business[0]->certification)?>" target="_blank">view file</a>

                       <?php }else{ ?>

                      <?php } ?>
                                       
                                            </div>

                        <label class="col-sm-2 col-form-label">Supplier insurance forms</label>
                     <div class="col-sm-4">
                       <input type="file" name="photo" class="form-control" placeholder="Supplier Certification" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo @$business[0]->insurance; ?>" >

                       <?php if(@$business[0]->insurance){ ?>
                         <a class="fa fa-file"style="font-size:16px;" id="t" href = "<?php echo base_url('../uploads/business_info/'.@$business[0]->insurance)?>" target="_blank">view file</a>

                       <?php }else{ ?>

                      <?php } ?>
                        
                                            </div>
                  </div>
                  
            
                  
               
                 <div class="form-group row">
                
                      <label class="col-sm-4 col-form-label">Acceptable Event Categories (Consumer) </label>
                     
                    <div class="col-sm-8">
                       <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = @$business[0]->consumer_event; } ?>
                      <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);
                       $conk=count($ac);


                    } 
                  else{
                      $conk=0;
                    }
                  } } 
                    $con=count($consumer_cat);
                    ?>
                    <input type="hidden" id="conscat" value="<?php echo $conk ?>">
                          <input type="hidden" id="constotal" value="<?php echo $con ?>">

                       <input type="checkbox"  id="checkAll">All</input>
                       


                      <?php //print_r($accept);  ?><br>
                       <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        {

                          echo '<input type="checkbox" class="cosumer" name="cons_accept[]" value="'.$event['id'].'" checked class="form-control">'.$event['event_categories'].'</option>';
                        }


                        else{?>
                          <input type="checkbox" name="cons_accept[]" class="cosumer" id="en_accept1"  value="<?php echo $event['id'] ?>" class="form-control"><?php echo $event['event_categories'] ?>
                      <?php


                    }



                      } else{?>

                       <input type="checkbox" name="cons_accept[]" id="en_accept1" class="cosumer" value="<?php echo $event['id'] ?>"><?php echo $event['event_categories'] ?>
                       <?php }}}


                       ?>

                      
                    

                    
                                        </div>
                                    </div>

                 <div class="form-group row">
                                      
                      <label class="col-sm-4 col-form-label">Acceptable Event Categories (Business) </label>
                      <div class="col-sm-8">
                        <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = @$business[0]->business_event; } ?>
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
                        <input type="checkbox"  id="BusinesscheckAll">All</input>
                        
                       <?php //print_r($accept); ?><br>
                       <?php if($business_cat){

                          foreach ($business_cat as $event) {

                            ?>

                    <?php if($accept){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        {

                          echo '<input type="checkbox" class="business" name="business_accept[]" value="'.$event['id'].'" checked>'.$event['event_categories'].'</option>';
                        }


                        else{?>
                          <input type="checkbox" class="business" name="business_accept[]" id="en_accept"  value="<?php echo $event['id'] ?>"><?php echo $event['event_categories'] ?>
                      <?php


                    }



                      } else{?>

                       <input type="checkbox" class="business" name="business_accept[]" id="en_accept"  value="<?php echo $event['id'] ?>"><?php echo $event['event_categories'] ?>
                       <?php }}}


                       ?>


                     

                      <span class="input-error"><?php echo form_error('business_accept', '<div class="error">', '</div>'); ?></span>
                    </div>



                      
                   

                    </div>


                                    </div>

                                     <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
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
<!-- Main-body end -->
<!-- ck editor -->
<script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="bower_components/switchery/dist/switchery.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/advance-elements/swithces.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  // if ($("input[name='cons_accept[]'").is(":checked"))
  // {
  // $('#checkAll').attr('checked','checked');
  // }
  // if ($("input[name='business_accept[]'").is(":checked"))
  // {
  // $('#BusinesscheckAll').attr('checked','checked');
  // }

   // $('#state').change(function(e) {
  
   //      e.preventDefault();
   //      $.ajax({
   //          type: "POST",
   //          url: '<?php echo base_url(); ?>administrator/getCity',
   //          data: $('#frm').serialize(),
   //          success: function(response)
   //          {
   //              $('#city1').html(response); 
   //         }
   //     });
   //   });


var conc=$('#conscat').val();
var cont=$('#constotal').val();
if(conc==cont)
{
$('#checkAll').attr('checked','checked');
}


var i=$('#bisci').val();
var c=$('#bisc').val();
if(i==c)
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


$(document).ready(function() {

  $('.selectpickers').selectpicker();
});

function swap(val)
{
if(val==3)
{
$('#dis_multi_type').closest('.row').find('#amount').prop('disabled',true);
$('#amount').hide();
}
else
{
$('#dis_multi_type').closest('.row').find('#amount').prop('disabled',false);
$('#amount').show();
}
}

function swap2(val)
{
if(val==3)
{
$('#dis_day_type').closest('.row').find('#en_cost').prop('disabled',true);
$('.en_cost').hide();
}
else
{
$('#dis_day_type').closest('.row').find('#en_cost').prop('disabled',false);
$('.en_cost').show();
}
}

function swap3(val)
{
if(val==3)
{
$('#dis_month_type').closest('.row').find('#en_cost2').prop('disabled',true);
$('.en_cost2').hide();
}
else
{
$('#dis_month_type').closest('.row').find('#en_cost2').prop('disabled',false);
$('.en_cost2').show();
}
}
</script>

<script>
  

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

   $('#state1').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>administrator/getCity2',
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

$(".distamt1").on("keypress keyup blur",function (event) {
           
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>



