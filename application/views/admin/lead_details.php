 <?php
  $switching=base64_decode($this->uri->segment(4));
foreach ($lead_details as $lead) {


      $old_date = $lead->event_date;              
    $old_date_timestamp = strtotime($old_date);
    $new_date = date('l, d M, Y ', $old_date_timestamp);
 

 
  ?>



 <section class="final-container-section">

          <div class="container">
            <div class="header-sec">
              <h5>Leads Details</h5>
            </div>  
            <div class="user-details">

              
               <div class="row all-cont-continer-wrap-row">
                <div class="chat">
                  <a href="<?php echo base_url() ?>supplier/edit/chat_history/<?php echo base64_encode($switching); ?>/<?php echo base64_encode($lead->from_id); ?>/<?php echo base64_encode($lead->lead_id); ?>"><i class="fas fa-comments"></i></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                  <div class="user-img">
                        
                          <?php if(!empty($lead->image)) {?>
                            <div class="profileimage">
                            <img src="<?php echo base_url() ?>uploads/customerimage/<?php echo $lead->image;?>" class="imgeradius"></div>
                             <?php }else {?>
                  <div class="user-image-sec">
                        <span class="user-icon">
                          <i class="fa fa-user" aria-hidden="true"></i> </span>
                        </div>
                            <?php } ?>
                       
                        <span class="user-name"><?php echo strtoupper($lead->firstname). " ". strtoupper($lead->lastname); ?></span>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                  <div class="row row-container-list">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 list-col">
                      <div class="leads-detail-row-cont">
                       <h5>Event Details</h5>
                       <div class="event-list-cont">
                        <ul>
                          <li><span class="leads-icon-top"><i class="fas fa-calendar-alt"></i></span><?php echo $new_date;?></li>
                          <li><span class="leads-icon-top"><i class="fas fa-map-marker-alt"></i></span><?php echo $lead->event_venue;?></li>
                          <li><span class="leads-icon-top"><i class="fas fa-user"></i></span><?php echo $lead->guest_count;?></li>
                        </ul>
                       </div>
                      </div>
   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 list-col">
                     <div class="leads-detail-row-cont row-list-custom-margin">
                     <h5>More Info</h5>
             <div class="list-item-container">
          <div class="container-list-flex">
            <div class="row row-container-list">
              <div class="col-6 padd-custom"> <span class="list-span">Partner's Name :</span> </div>
                <div class="col-6 padd-custom"> <span class="list-span"><?php echo $lead->partner_name;?></span></div>
                <div class="col-6 padd-custom"><span class="list-span">Primary Contact :</span></div>
                <div class="col-6 padd-custom"><span class="list-span"><a href="mailto:<?php echo $lead->primary_contact;?>"><?php echo $lead->primary_contact;?></a></span></div>
                <div class="col-6 padd-custom"><span class="list-span">Secondary Contact :</span> </div>
                <div class="col-6 padd-custom"><span class="list-span"><a href="mailto:<?php echo $lead->secondary_contact;?>"><?php echo $lead->secondary_contact;?></a></span></div>
                <?php if(!empty($lead->wedding_website)){ ?>
                <div class="col-6 padd-custom"> <span class="list-span">Wedding Website :</span></div>
                <div class="col-6 padd-custom"><span class="list-span"><a href="<?php echo $lead->wedding_website;?>" target="_blank">View </a></span></div> 
              <?php  } ?>
             </div>
          </div>
             </div> 

 
                     </div>
                   </div>
                  </div>

                  <!-- second Section -->
                  <div class="row row-container-list row-list-custom-margin">
                    <span class="sec-section-para">" <?php echo $lead->message ?>. "</span>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                      <div class="leads-detail-row-cont">
                        <div class="list-item-container">
                          <div class="container-list-flex">
                            <div class="row row-container-list">
                              <div class="col-6 padd-custom"> <span class="list-span">Name :</span> </div>
                                <div class="col-6 padd-custom"> <span class="list-span"><?php echo strtoupper($lead->firstname). " ". strtoupper($lead->lastname); ?></span></div>
                                <div class="col-6 padd-custom"><span class="list-span">Start Time :</span></div>
                                <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->start_time;?></span></div>
                                <div class="col-6 padd-custom"><span class="list-span">Reception Venue :</span> </div>
                                <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->event_venue;?></span> </div>
                                <div class="col-6 padd-custom"> <span class="list-span">Additional Services :</span></div>
                                <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->addition_service ?></span></div>
                             </div>
                          </div>
                             </div> 
                      </div>
   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                     <div class="leads-detail-row-cont">
                      <div class="list-item-container class-row-list-cont">
                        <div class="container-list-flex">
                          <div class="row row-container-list">
                            <div class="col-6 padd-custom"> <span class="list-span">Wedding Date :</span> </div>
                              <div class="col-6 padd-custom"> <span class="list-span"><?php echo $new_date;?></span></div>
                              <div class="col-6 padd-custom"><span class="list-span">Number of Hours :</span></div>
                              <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->num_of_hours;?></span></div>
                              <div class="col-6 padd-custom"><span class="list-span">Guest Count :</span> </div>
                              <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->guest_count;?></span> </div>
                              <div class="col-6 padd-custom"> <span class="list-span">Video Meeting :</span></div>
                              <div class="col-6 padd-custom"><span class="list-span"><?php echo $lead->video_metting_request;?></span></div>
                           </div>
                        </div>
                           </div> 
                     </div>
                   </div>
                  </div>

              <form enctype="multipart/form-data"  id="comment" method="post" action="<?php echo base_url() ?>supplier/edit/send_enquiry/<?php echo base64_encode($switching); ?>/<?php echo base64_encode($lead->from_id); ?>/<?php echo base64_encode($lead->lead_id); ?>">

                  <div class="row row-container-list" style="margin-top: 30px;">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="leads-detail-row-cont">
                          <div class="contact-area">
                            <p class="lead emoji-picker-container">
                            <textarea placeholder="Replay <?php echo $lead->firstname ?>" name="reply" data-emojiable="true" data-emoji-input="unicode" ></textarea></p>
                            <input type="file" name="file" id="chatupload"/><a id="upload_link"><i class="fa fa-paperclip"></i></a>
                            <label id="file_uploaded" class="uploadedname_path"></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="leads-detail-row-cont  leads-button-cont">
                          <a href="<?php echo base_url() ?>supplier/edit/send_enquiry/<?php echo base64_encode($switching); ?>/<?php echo base64_encode($lead->from_id); ?>/<?php echo base64_encode($lead->lead_id); ?>/base64_encode('not_inter')" > <button class="leades-btn"> Not Intrested</button></a>
                           <a href="<?php echo base_url() ?>supplier/edit/send_enquiry/<?php echo base64_encode($switching); ?>/<?php echo base64_encode($lead->from_id); ?>/<?php echo base64_encode($lead->lead_id) ;?>/base64_encode('not_avail')"><button class="leades-btn">Not Available </button></a>
                          
                           <input type="submit" class="nxt-button lead_inputbutton" name="submit" value="Send" >
                        </div>
                      </div>
                    
                  </div>
                </form>
                </div>

               </div>
             <?php } ?>
          </div>
</div>

<script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>
<script>
$('#chatupload').change(function() {
 
  var i = $(this).prev('label').clone();
  var file = $('#chatupload')[0].files[0].name;
  //alert(file);
  $('#file_uploaded').text(file);
  
});
</script>