  <?php if(!empty($categoryname[0]->company_name)){
                $companyName = '-'.$categoryname[0]->company_name;
              }else{
                $companyName = '';
              } ?>
               <?php
$peakdays="";
$peakmonths="";
$api=$this->config->item('geokey');


?>
  <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <label>Edit Basic Info</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-wrap2">
                    <label><?php echo $categoryname[0]->category.$companyName; ?></label>
                  </div>
                </div>
              </div>
            </div>
         </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api; ?>&libraries=places&callback=initMap"
        defer></script>

      <form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('supplier/edit/editBusinessInfo/'.base64_encode($business[0]->storeid)); ?>">
            <input type="hidden" value="<?php echo $supplier_id; ?>" name="supplier_id" id="supplier_id">

            <input type="hidden" value="<?php echo @$business[0]->business_id; ?>" name="businessid" id="businessid">

            <input type="hidden" value="<?php echo $business[0]->storeid; ?>" name="storefrontid">
<section class="cont-sec-wrap">

  <?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>

                              
          <div class="container page-cont-container">
            <div class="header-sec">
              <h5>SUPPLIER INFORMATION</h5>
            </div>
            <div class="row row-wrap">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="input-container">
                  <label>COMPANY NAME</label><br>
                  <input type="text" placeholder="Company Name" name="Company_name" value="<?php echo @$business[0]->company_name; ?>">
                </div>
              </div>
            </div>
              <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                <div class="input-container">
                  <label>TITLE</label><br>
                  <?php if(set_value('name_prefix1')){ $name_prefix = set_value('name_prefix1'); } elseif (isset($business) && $business) { $name_prefix = @$business[0]->prefix; } ?>
                  <select class="inpu-option-wrap" name="name_prefix">
                        <option id="header-opt" value="Mr" <?php if($name_prefix=='Mr.'){ echo 'selected';}else{ echo ""; } ?>>Mr.</option>
                        <option id="header-opt" value="Mrs" <?php if($name_prefix=='Mrs'){ echo 'selected';}else{ echo ""; } ?>>Mrs.</option>
                        <option id="header-opt" value="Ms" <?php if($name_prefix=='Ms'){ echo 'selected';}else{ echo ""; } ?>>Ms.</option>
                       
                 </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="input-container">
                  <label>FIRST NAME</label><br>
                   <?php if(set_value('first_name1')){ $first_name = set_value('first_name1'); } elseif (isset($business) &&$business) { $first_name = @$business[0]->first_name; } ?>
                  <input type="text" placeholder="First Name" name="first_name" value="<?php echo $first_name; ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="input-container">
                  <label>LAST NAME</label><br>
                  <input type="text" placeholder="Last Name" name="last_name" value="<?php echo @$business[0]->last_name; ?>">
                </div>
              </div>
            </div>
            <!-- sec row-->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="input-container">
                  <label>ADDRESS LINE 1</label><br>
                  <input type="text" placeholder="Street Address" name="address1" value="<?php echo @$business[0]->address; ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="input-container">
                  <label>ADDRESS LINE 2</label><br>
                  <input type="text" placeholder="Apt, Unit Floor (Optional)" name="address2" value="<?php echo @$business[0]->address2; ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="input-container">
                  <label>STATE</label><br>
                  <select class="inpu-option-wrap" id="state" name="State_id">
                    <option id="header-opt">Select State</option>
                     <?php foreach($states as $item) { 
                          if($item->id==$business[0]->stateid)
                          {
                          ?>
                        <option id="header-opt" value="<?php echo $item->id ?>" selected><?php echo $item->name?></option>
                        <?php } 
                        else
                          {?>
                            <option id="header-opt" value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                            <?php } } ?>
                 </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="input-container">
                  <label>ZIPCODE</label><br>
                  <input type="text" placeholder="Zip Code" name="zipcode" maxlength="5" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" value="<?php echo @$business[0]->zipcode; ?>" onkeypress="return isNumberKey(event)">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                <div class="input-container">
                  <label>CITY</label><br>
                  <select class="inpu-option-wrap" id="city" name="city_id">
                   
                     <?php if(!empty($city[0]->name)) {
                          ?>
                          <option id="header-opt" value="<?php echo $city[0]->id ?> "> <?php echo @$city[0]->name ?></option>
                        <?php } else
                        {?>
                          <option value="">Select</option> <?php } ?>
                 </select>
                 <div id="tt"></div>
                      <input type="hidden" name="latitude" id="latitude" value="<?php echo @$business[0]->latitude ?>">
                      <input type="hidden" name="longitude" id="longitude" value="<?php echo @$business[0]->longitude ?>">
                </div>
              </div>
            </div>

               <!-- sec row-->
               <div class="row row-wrap-last">
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="input-container">
                      <label>EMAIL ADDRESS</label><br>
                        <input type="email" placeholder="@" name="email_address" value="<?php echo @$business[0]->email; ?>">
                         </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6  col-lg-2">
                            <div class="input-container">
                          <label>MOBILE PHONE</label><br>
                        <input type="text" placeholder="10 Digits Only" maxlength="14" name="mobile_number" value="<?php echo @$business[0]->mobile; ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX"  id="phoneNum0">
                    </div>
                   </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="input-container">
                              <label>LANDLINE PHONE</label><br>
                              <input type="text" placeholder="Landline 10 Digits Only" name="landline_number" maxlength="14" value="<?php echo @$business[0]->telephone; ?>" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX"  id="phoneNum1">
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                            <div class="input-container">
                              <label>EXTENSION</label><br>
                              <input type="text" placeholder="Ext" name="landline_number_ext" value="<?php echo @$business[0]->ext; ?>" onkeypress="return isNumberKey(event)" maxlength="6">
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                            <div class="input-container">
                              <label>FAX NUMBER</label><br>
                              <input type="text" placeholder="10 Digits Only" name="fax_number"  maxlength="14" data-toggle="tooltip" data-placement="top" title="Format: (XXX)-XXX-XXXX" value="<?php echo @$business[0]->fax; ?>"  id="phoneNum2">
                            </div>
                          </div>
                           <?php if($business[0]->category_id!=21) { ?>
                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                            <div class="cont-wrp">
                              <label>SUPPLIER ACCEPTABLE TRAVEL MILES</label><br>
                          <span id="nationaltxt"> <input class="inp" id="supplier-acc-id" type="text" placeholder="Travel Miles" maxlength="4" name="accepteble_travel_miles" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" value="<?php echo @$business[0]->travel_miles; ?>" onkeypress="return isNumberKey(event)"><br></span>
                              
                             <div class="checkbox-frth-section check-box-wraper">
                          <div class="check-supp-box-fwarp">
                         <input type="checkbox" name="nationalwide" <?php if(@$business[0]->nationalwide==1){echo "checked";}?> value="1" onclick="nationalwides(this)">
                       </div>
                     <label style="margin-left:10px;">Nationwide Service: “(no distance limitation)”
                       </label>
                    </div>
                    </div>
                 </div>
               <?php } ?>
             </div>
           </div>
          </div>
        </section>
        <section>
          <div class="container" id="header-sec-section-container">
            <div class="sec-header-section-header">
<span><span id="header-sec-two"> EVENT CATEGORIES --</span><span id="sec-section-mini-header"> If not ALL, tell us which consumer and business categories are acceptable to you for your services or products.</span></span>
                </div>
          </div>
          <div class="container" id="sec-container-wraper">  
            <div class="row check-section-row-wrap">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
               <div class="header-section">
                 <div class="checkbox-wrap">
                  <h5>CONSUMER EVENT CATEGORIES</h5>
                   <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = @$business[0]->consumer_event; } ?>
                      <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if(!empty($accept)){


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


                  <input type="checkbox" class="sec-checkbox" id="checkAll">
                  <label>ALL</label>
                 </div><br>
                 <?php if($consumer_cat){

                          foreach ($consumer_cat as $event) {

                            ?>

                    <?php if(!empty($accept)){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        {?>
                           <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept1" name="cons_accept[]" value="<?php echo $event['id'] ?>" checked > <label><?php echo $event['event_categories'] ?></label>
                  
                 </div><br>
               <?php } else { ?>
                <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept1" name="cons_accept[]" value="<?php echo $event['id'] ?>" > <label><?php echo $event['event_categories'] ?></label>
                  </div><br>
                  
                  <?php } } else{ ?>

                    <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept1" name="cons_accept[]" value="<?php echo $event['id'] ?>" > <label><?php echo $event['event_categories'] ?></label>
                  </div><br>

                     <?php }}}


                       ?>
                 
               </div>
             </div>
             <!-- Sec Col-->
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
              <div class="header-section header-section-wrap">
                <div class="checkbox-wrap">
                  <h5 id="check-header">BUSINESS EVENT CATEGORIES</h5>
                   <?php if(set_value('accept')){ $accept = set_value('accept'); } elseif (isset($business) &&$business) { $accept = @$business[0]->business_event; } ?>
                       <?php
                       $k=0; 
                       if($business_cat){

                          foreach ($business_cat as $event) {

                            ?>

                    <?php if(!empty($accept)){


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
                  <input type="checkbox" class="sec-checkbox" id="BusinesscheckAll">
                  <label>ALL</label>
                 </div><br>
                 <?php if($business_cat){

                          foreach ($business_cat as $event) {

                            ?>

                    <?php if(!empty($accept)){


                      $ac=explode('<>',$accept);

                    //  print_r(  $ac);exit;
                        if(in_array($event['id'],$ac))
                        { ?>
                 <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept" name="business_accept[]" value="<?php echo $event['id'] ?>" checked > <label><?php echo $event['event_categories'] ?></label>
                  
                 </div><br>
               <?php } else { ?>
                <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept" name="business_accept[]" value="<?php echo $event['id'] ?>" > <label><?php echo $event['event_categories'] ?></label>
                  </div><br>
                  
                  <?php } } else{ ?>

                    <div class="checkbox-wrap">
                  <input type="checkbox" id="en_accept" name="business_accept[]" value="<?php echo $event['id'] ?>" > <label><?php echo $event['event_categories'] ?></label>
                  </div><br>

                     <?php }}}


                       ?>
                
                </div>
              </div>
            </div>
            </div>
          </div>
        </section>

        <!-- fourth section -->
        <section">
          <div class="container" id="header-sec-section-container">
            <div class="sec-header-section-header">
<span><span id="header-sec-two">OPTIONAL DISCOUNTS --</span><span id="sec-section-mini-header"> Offer to entice bookings across your storefronts, or on low volume days or months. Discounts will not be combined.</span></span>
                </div>
          </div>
          <div class="container frth-sec-cont">
            <div class="frth-section-header">
              <h6>MULTI STOREFRONT:
                “DISCOUNT -- Only if you have 2+ storefronts and more than one is selected.”</h6>
               <div class="row frth-row-sec">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                  <div class="header-frth-section header-frth-section-wrap">
                    <label>DISCOUNT TYPE</label><br>
                    <div class="option-wrap">
                      <select class="selec-attr" name="dis_multi_type" id="dis_multi_type" onchange="swap(this.value)">
                        <option id="header-opt">Select Type</option>
                        <?php
                            foreach ($discount_types as $key =>$dis) {
                              if($dis->discount_id==$business[0]->discount_multi_type)
                              {
                          ?>
                        <option id="header-opt" ="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } else{
                          ?>
                          <option id="header-opt" value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        }
                        } ?>
                     </select>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
              <div class="header-frth-section header-frth-section-wrap">
                <label>DISCOUNT AMOUNT</label><br>
                <div class="option-wrap">
                  <input type="text" class="inp-Number distamt1" placeholder="Discount Amount" name="amount" id="amount" <?php if(@$business[0]->discount_multi_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->multi_discount_amount; ?>" maxlength="5">
                 </select>
            </div>
          </div>
        </div>
            </div>
          </div>
                    <!-- here -->
                    <div class="frth-section-header frt-wrap">
                      <h6>LOW VOLUME DAYS YOU WOULD OFFER A DISCOUNT</h6>

                      <!-- days -->
                      
                       <div class="row frth-row-sec">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                          <div class="header-frth-section header-frth-section-wrap">
                            <label>DISCOUNT TYPE</label><br>
                            <div class="option-wrap">
                              <select class="selec-attr" id="dis_day_type" name="dis_day_type" onchange="swap2(this.value)">
                                <option id="header-opt">Select Type</option>
                                <?php
                            foreach ($discount_types as $key =>$dis) {
                              if($dis->discount_id==$business[0]->discount_day_type)
                              {

                          ?>
                        <option id="header-opt" value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } 
                        else{
                          ?>
                          <option id="header-opt" value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } }?>
                             </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 en_cost" >
                      <div class="header-frth-section header-frth-section-wrap">
                        <label>DAYS DISCOUNTS AMOUNT</label><br>
                        <div class="option-wrap">
                          <input type="text" min=0 id="en_cost" name="discount_days_amt" class="inp-Number en_cost distamt1" placeholder="Discount Amount" <?php if(@$business[0]->discount_day_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->discount_days_amt; ?>" maxlength="5">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="row check-month-row en_cost">
                      <div id="supp-label-col" class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="header-check-wrpa">
                          <label>SUPPLIER DISCOUNT DAYS</label>
                        </div>
                      </div>
                      <div id="month-col-wrp" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="checkbox-wrap-all">
                         <?php if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($business) &&$business) { $peakdays = @$business[0]->days; } ?>
                      

                       <?php

                       if(!empty($weekdays)){

                        $weekday1=explode(',',trim($peakdays));
                        foreach($weekday1 as $each)
                          {
                            array_push($weekday1,trim($each));
                          }

                      foreach ($weekdays as $week) {

                      if(in_array($week->day,$weekday1))
                        {
                          ?>
                           <div class="checkbox-frth-section">
                            <input type="checkbox" name="peakdays[]" class="week" id="en_peakdays" value="<?php echo $week->day; ?>" checked>
                            <label><?php echo $week->day; ?></label>
                           </div> 
                           <?php } else { ?>

                            <div class="checkbox-frth-section">
                            <input type="checkbox" name="peakdays[]" class="week" id="en_peakdays" value="<?php echo $week->day; ?>">
                            <label><?php echo $week->day; ?></label>
                           </div> 
                         <?php  } } }?>                                                                                                                                  
                        </div>
                      
                      </div>
                    </div>
                  </div>
                  
          <!-- here -->
          <div class="frth-section-header">
            <h6>LOW VOLUME MONTHS YOU WOULD OFFER A DISCOUNT</h6>
             <div class="row frth-row-sec">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                <div class="header-frth-section header-frth-section-wrap">
                  <label>DISCOUNT TYPE</label><br>
                  <div class="option-wrap">
                    <select class="selec-attr" id="dis_month_type" name="dis_month_type" onchange="swap3(this.value)">
                      <option id="header-opt">Select Type</option>
                      <?php
                            foreach ($discount_types as $key =>$dis) {

                          if($dis->discount_id==$business[0]->discount_month_type)
                              {

                          ?>
                        <option id="header-opt" value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } 
                        else{
                          ?>
                          <option id="header-opt" value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        } }?>
                   </select>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
            <div class="header-frth-section header-frth-section-wrap">
              <label>MONTHS DISCOUNTS AMOUNT</label><br>
              <div class="option-wrap">
                <input type="text" name="discount_month_amt" min=0 id="en_cost" class="inp-Number en_cost2 distamt1" placeholder="Discount Amount" <?php if(@$business[0]->discount_month_type==3) { ?> disabled="disabled" <?php } ?> value="<?php echo @$business[0]->discount_month_amt; ?>" maxlength="5">
          </div>
        </div>
      </div>
          </div>
          <!-- months -->
          <div class="row check-month-row row-wrp-mnt en_cost2" <?php if(@$business[0]->discount_month_type==3) { ?> style="display:none"; <?php } ?>>
            <div id="supp-label-col" class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="header-check-wrpa">
                <label>SUPPLIER DISCOUNT MONTHS</label>
              </div>
            </div>
            <div id="month-col-wrp" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
              <div class="checkbox-wrap-all">
                <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($business) &&$business) { $peakmonths = @$business[0]->month; } 

                ?>
                      

                      <?php if(!empty($months)){

                      $month1=explode(',',trim($peakmonths));
                      
                  foreach($month1 as $each)
                    {
                      array_push($month1,trim($each));
                    }

                     foreach ($months as $mont) {

                      if(in_array($mont->month,$month1))
                      { ?>
                <div class="checkbox-frth-section">
                  <input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="<?php echo $mont->month; ?>" checked>
                  <label><?php echo $mont->month; ?></label>
                 </div> 
                <?php  }else{ ?> 
                <div class="checkbox-frth-section">
                  <input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="<?php echo $mont->month; ?>">
                  <label><?php echo $mont->month; ?></label>
                 </div> 
                 <?php  }}}
                       ?>                                                                                                                                      
              </div>
            
            </div>
          </div>
        </div>
        
          </div>
        </section>
        <section>
          <div class="container" id="header-sec-section-container">
            <div class="sec-header-section-header">
<span><span id="header-sec-two">CERTIFICATIONS and INSURANCE -- </span><span id="sec-section-mini-header">  If you or your business have certifcations or requires insurance, you can attach these files here.</span></span>
                </div>
          </div>
          <div class="container" id="check-wrap-id">
              <div class="row fifth-row-wrp row-wrap-section">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                  <div class="cont-wrp cont-wrp-sec">
                    <label>SUPPLIER CERTIFICATION</label><br>
                    <div class="input-file">
                      <input class="inp" type="file" id="file-input" name="certify" data-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo @$business[0]->certification; ?>">
                      <label id="support-file-id">Support files:<span id="support-weight-text"> jpg, jpeg, png, gif, pdf</span></label>
                      <?php if(!empty($business[0]->certification)){ ?>
                        <a href="<?php echo base_url() ?>supplier/edit/download/certification/<?php echo $business[0]->business_id; ?>" class="fa fa-file"style="font-size:16px;" id="t" >view file</a>

                       <?php }else{ ?>

                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                  <div class="cont-wrp cont-wrp-sec">
                    <label>SUPPLIER INSURANCE FORMS</label><br>
                    <div class="input-file">
                      <input class="inp" type="file" id="file-input" name="photo" ata-toggle="tooltip" data-placement="top" title="support file:jpg,jpeg,png,gif,pdf" value="<?php echo @$business[0]->insurance; ?>">
                      <label id="support-file-id">Support files:<span id="support-weight-text"> jpg, jpeg, png, gif, pdf</span></label>
                      <?php if(!empty($business[0]->insurance)){ ?>
                         <a href="<?php echo base_url() ?>supplier/edit/download/insurance/<?php echo $business[0]->business_id; ?>" class="fa fa-file"style="font-size:16px;" id="t" >view file</a>

                       <?php }else{ ?>

                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="container" id="footer-top-button-container">
              <div class="footer-button">
               
                <a href=""><button class="nxt-button" name="submit">UPDATE</button></a> 
               </div>
             </div>         
        </section>
      </form>

       <script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>

 <script type="text/javascript">
   

$(document).ready(function() {

    $('#state').change(function(e) {
  
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>dashboard/getCity',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#city').html(response); 
           }
       });
     });

     $("#city").change(function(){
      var city=$('#city').val();
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




});

</script>


<script>
// if ($("input[name='cons_accept[]'").is(":checked"))
// {
// $('#checkAll').attr('checked','checked');
// }
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

// if ($("input[name='business_accept[]'").is(":checked"))
// {
// $('#BusinesscheckAll').attr('checked','checked');
// }

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
function submitContactForm(){
    //var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            //data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            data:'contactFrmSubmit=1&name='+name,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                // if(msg == 'ok'){
                //     $('#inputName').val('');
                //     $('#inputEmail').val('');
                //     $('#inputMessage').val('');
                //     $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                // }else{
                //     $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                // }
                // $('.submitBtn').removeAttr("disabled");
                // $('.modal-body').css('opacity', '');
            }
        });
    }
}



function confirmDelete(form) {
  if (!confirm("Do you really want to Delete?")) {
    return false;
  }
  this.form.submit();
}

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
<script type="text/javascript">
      
 
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
</script>