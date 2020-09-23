 <?php if(!empty($categoryname)){
                $companyName = '-'.$categoryname[0]->company_name;
              }else{
                $companyName = '';
              } 
$switching=base64_decode($this->uri->segment(4));


              ?>

                <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <label>Leads</label>
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
 <section class="final-container-section">

          <div class="container">
            <!-- <div class="header-sec">
              <h5>Leads</h5>
            </div>   -->
            <div class="sort-input-wrpa">
              <div class="row">
                <div class="col-6">
                  <select placeholder="Sort By" class="sort-by-sele-option" onchange="location = this.options[this.selectedIndex].value;">
                    <option value="" <?php if($s=="not") {?> selected <?php } ?>>Sort by Status</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('booked')) ?>" <?php if($s=="booked") {?> selected <?php } ?>>Booked</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('flag')) ?>" <?php if($s=="flag") {?> selected <?php } ?> >Flag</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('archive')) ?>" <?php if($s=="archive") {?> selected <?php } ?>>Archive</option>
                  </select>
                </div>
                <div class="col-6">
                  <select placeholder="Sort By" class="sort-by-sele-option align-sec-sort" onchange="location = this.options[this.selectedIndex].value;">
                    <option value="" <?php if($s=="not") {?> selected <?php } ?> >Sort by</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('recent')) ?>" <?php if($s=="recent") {?> selected <?php } ?>>Recent Activity</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('wdate')) ?>" <?php if($s=="wdate") {?> selected <?php } ?> >Wedding Date</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('idate')) ?>"<?php if($s=="idate") {?> selected <?php } ?> >Inquiry Date</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('fname')) ?>" <?php if($s=="fname") {?> selected <?php } ?>  >First Name</option>
                    <option value="<?php echo base_url('supplier/edit/lead_list/'.base64_encode($store_id).'/'.base64_encode('lname')) ?>" <?php if($s=="lname") {?> selected <?php } ?>>Last Name</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="container container-contents-wrap tabletoppadd">
            <table class="table table-striped table-bordered mydatatable" style="width: 100%">
              <thead>
                <tr>
                  <th style="width: 7%;">#</th>
                  <th style="width: 20%;">Customer Name</th>
                  <th style="width:35%;">Message</th>
                  <th style="width:20%;">Event Date</th>
                  <th style="width:25%;">Action</th>
                </tr>
              </thead>
  
              <tbody>
                  <?php if($get_lead){ $i = 1; foreach ($get_lead as $lead) {


                       $old_date = $lead->event_date;              
                        $old_date_timestamp = strtotime($old_date);
                        $new_date = date('l, d M, Y ', $old_date_timestamp);

                      ?>
                   <tr onclick="document.location = '<?php echo base_url("supplier/edit/view_all_lead/".base64_encode($switching)."/".base64_encode($lead->lead_id)) ?>';">
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $lead->firstname. " ". $lead->lastname; ?></td>
                     <td><?php echo $lead->message?></td>
                     <td><?php echo $new_date ?></td>
                     <td>
                      <?php if($lead->estatus =="booked") { ?>
                       <a href="#" class="leadactive"><i class="fas fa-gift"></i></a>
                       <a href="#" class="flag"><i class="fas fa-flag"></i></a>
                       <a href="#" class="deletes"><i class="fas fa-trash"></i></a>
                       <?php }
                        else if($lead->estatus =="flagged") { ?>

                          <a href="#" class="gift"><i class="fas fa-gift"></i></a>
                       <a href="#" class="leadactive"><i class="fas fa-flag"></i></a>
                       <a href="#" class="deletes"><i class="fas fa-trash"></i></a>
                        <?php }
                        else if($lead->estatus =="archived") { ?>
                      
                        <a href="#" class="gift"><i class="fas fa-gift"></i></a>
                       <a href="#" class="flag"><i class="fas fa-flag"></i></a>
                       <a href="#" class="leadactive"><i class="fas fa-trash"></i></a>
                        <?php } ?>

                     </td>
                   </tr>
                 <?php } } ?>
              </tbody>
            </table>
          </div>

              <!--
            <div class="input-element-wrap">
              <div class="checkbox-wrap">
                <input type="checkbox">
                <label>Use Same Promo Info</label>
               </div>
              -->
         
        </section>