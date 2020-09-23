<style type="text/css">
  .must_required
  {
    color: red;
    font-weight: 700;
    font-size: 18px;
  }


</style>
<div class="content-wrapper">

    <section class="content">

      <div class="row">

        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('client/event/add_event'); ?>">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Event Details</h3>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">

                  <div class="col-xs-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo ""; ?>">
                    <div class="form-group">
                      <label>Event Name <span class="must_required">*</span></label>
                       <input type="text" name="event_name" id="en_title" class="form-control" placeholder="Enter Event Name" value="" required>
                      <span class="input-error"><?php echo form_error('event_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Celebrant <span class="must_required">*</span></label>
                      <input type="text" name="celebrant" id="en_title" class="form-control" placeholder="Enter Event Celebrant" value="" required>
                     
                      <span class="input-error"><?php echo form_error('celebrant', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Date <span class="must_required">*</span></label>
                      
                      <input type="text" name="edate" id="datepicker" class="form-control" placeholder="Enter Event Date" value="" required>
                      <input type="checkbox" id="flexible" name="flexible"/> Date is flexible
                      <span class="input-error"><?php echo form_error('edate', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Earliest Date</label>
                     
                     <input type="text" name="earliest_date" id="datepicker1" class="form-control" placeholder="Enter Event Earliest Date" value="" readonly>
                      <span class="input-error"><?php echo form_error('earliest_date', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Latest Date</label>
                      
                      <input type="text" name="latest_date" id="datepicker2" maxlength="10" class="form-control" placeholder="Event Latest Date" value="" readonly>
                      <span class="input-error"><?php echo form_error('latest_date', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Type <span class="must_required">*</span></label><br>

                       <?php 
                         if(!empty($customer_type[0]->event_type))
                         {
                         if($customer_type[0]->event_type=="consumer")
                        {
                          ?>
                        <input type="radio" name="event_type" value="consumer" checked="checked"> Consumer
                        <input type="radio" name="event_type" value="bisness" style="    margin-left: 20px;"> Business
                      <?php }  else if($customer_type[0]->event_type=="business") { ?>
                        <input type="radio" name="event_type" value="consumer"> Consumer
                        <input type="radio" name="event_type" value="business" style="    margin-left: 20px;" checked="checked"> Business
                         <?php }
                         } 
                       else { 
                        ?>
                        <input type="radio" name="event_type" value="consumer"> Consumer
                      <input type="radio" name="event_type" value="business" style="    margin-left: 20px;"> Business
                     
                     <?php } ?>
                     <!-- <select name="event_type" class="form-control select2" required>
                      <option value="">Select</option>
                      <?php foreach($event_type as $event) { ?>

                        <option value="<?php echo $event->id; ?>"><?php echo $event->event_categories; ?></option>
                      
                      <?php } ?>
                    </select> -->
                      <span class="input-error"><?php echo form_error('event_type', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Duration <span class="must_required">*</span></label>
                    
                      <input type="number" name="event_duration" id="event_duration" class="form-control" placeholder="Event Duration" value="" required>
                     
                      <span class="input-error"><?php echo form_error('event_duration', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Total Guests <span class="must_required">*</span></label>
                     
                      <input type="text" name="guest" id="guest" class="form-control" placeholder="Total Number of Guests" value="" required>
                      <span class="input-error"><?php echo form_error('guest', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                 
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Location <span class="must_required">*</span></label>
                     
                      <input type="text" name="location" id="location" class="form-control" placeholder="Event Location" value="" required>
                      <span class="input-error"><?php echo form_error('location', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Venue </label>
                     
                      <input type="text" name="venue" id="venue" class="form-control test" placeholder="Event Venue" value="" >
                       <input type="checkbox" id="novenue" name="novenue"/> Venue is not known
                      <span class="input-error"><?php echo form_error('venue', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>

                  <div class="row">
                 <div id="loc">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>City /State </label>
                     
                      <input type="text" name="city" id="city" class="form-control" placeholder="Event City / State" value="">
                      <span class="input-error"><?php echo form_error('city', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Zipcode </label>
                     
                      <input type="number" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" value="" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" >
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                </div>

                
                 <div class="row">
                  
                 
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Comments</label>
                     
                      <input type="text" name="comment" id="comment" class="form-control" placeholder="Event Comments" value="">
                      <span class="input-error"><?php echo form_error('comment', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                
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
