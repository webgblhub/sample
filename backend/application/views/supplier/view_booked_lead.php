<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>View Leads</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!"> Leads</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">View lead</a>
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
                          
            <br><br>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <a href="<?php echo base_url("supplier/edit/booked_Lead_list/".$lead_details->store_front_id) ?> "class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                    </div>

                    <label class="col-sm-10"><a href="<?php echo base_url("supplier/edit/chat_history/".$lead_details->lead_id.'/'.$lead_details->store_front_id.'/1') ?> "class="btn btn-primary" title="Chat History"><i class="ti-comments-smiley" ></i></a></label>

                <div class="card-header">
                    <h5>View Leads</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
  

                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Event Date:</label>
                            <div class="col-sm-4">
                                <input readonly type="text" name="event_date" class="form-control" placeholder="Type Business Name" value=<?php echo $lead_details->event_date ?> ">
                            </div>
                            <label class="col-sm-2 col-form-label">Event Venue</label>
                            <div class="col-sm-4">
                             <textarea readonly name="event_venue" class="form-control" placeholder="Type Business Name" ><?php echo $lead_details->event_venue ?></textarea>
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Start Time</label>
                            <div class="col-sm-4">
                                <input readonly type="text"  name="start_time" class="form-control" placeholder="Type Business details" value=<?php echo $lead_details->start_time ?>>
                            </div>
                            <label class="col-sm-2 col-form-label">Number Of Hours</label>
                            <div class="col-sm-4">
                                <input readonly type="text"  name="num_of_hours" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->num_of_hours ?>>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Guest Count</label>
                            <div class="col-sm-4">
                              <input readonly type="text" name="guest_count" id="personal" class="form-control" placeholder="personal photo" value=<?php echo $lead_details->guest_count ?>>

                            </div>
                            <label class="col-sm-2 col-form-label">Video Meeting Request  </label>
                            <div class="col-sm-4">
                              <input readonly type="text"  name="video_metting_request" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->video_metting_request ?>>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Additional Service</label>
                            <div class="col-sm-4">
                              <input readonly type="text"  name="addition_service" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->addition_service ?>>
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Budget</label>
                            <div class="col-sm-4">
                             <input readonly type="text"  name="budget" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->budget ?> >
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Partner Name</label>
                            <div class="col-sm-4">
                              <input readonly type="text"  name="partner_name" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->partner_name ?>>
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Primary Contact</label>
                            <div class="col-sm-4">
                             <input readonly type="text"  name="primary_contact" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->primary_contact ?> >
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Secondary Contact</label>
                            <div class="col-sm-4">
                              <input readonly type="text"  name="secondary_contact" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->secondary_contact ?>>
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Wedding Website</label>
                            <div class="col-sm-4">
                             <input readonly type="text"  name="wedding_website" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->wedding_website ?> >
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-4">
                              <input readonly type="text"  name="status" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->status ?>>
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Created At</label>
                            <div class="col-sm-4">
                             <input readonly type="text"  name="created_at" class="form-control" placeholder="www.google.com" value=<?php echo $lead_details->created_at ?> >
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-4">
                            <?php if($lead_details){?>
                                <?php if($lead_details->image){?>
                                <a href="<?php echo base_url('../uploads/'.$lead_details->image)?>" >View Photo</a>
                                <?php }} ?>
                            </div>

                        </div>
                        <br><br>

                        
                    <!-- </form> -->
                   
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