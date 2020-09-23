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
        <?php foreach ($event as $evt) {
        
        ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("client/event/edit_event/$evt->event_id"); ?>">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Event Details</h3>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">

                  <div class="col-xs-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo ""; ?>">
                    <div class="form-group">
                      <label>Event Name <span class="must_required">*</span></label>
                       <input type="text" name="event_name" id="en_title" class="form-control" placeholder="Enter Event Name" value="<?php echo $evt->event_name; ?>" required>
                      <span class="input-error"><?php echo form_error('event_name', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Celebrant <span class="must_required">*</span></label>
                      <input type="text" name="celebrant" id="en_title" class="form-control" placeholder="Enter Event Celebrant" value="<?php echo $evt->celebrant; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('celebrant', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Date <span class="must_required">*</span></label>
                      
                      <input type="text" name="edate" id="datepicker" class="form-control" placeholder="Enter Event Date" value="<?php echo $evt->event_date; ?>" required>
                      <?php if($evt->earliest_date =="")
                      { ?>
                     <input type="checkbox" id="flexible" name="flexible"/> Date is flexible <?php } ?>
                      <span class="input-error"><?php echo form_error('edate', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Earliest Date</label>
                     
                     <input type="text" name="earliest_date" id="datepicker1" class="form-control" placeholder="Enter Event Earliest Date" value="<?php echo $evt->earliest_date; ?>" <?php if($evt->earliest_date =="" && $evt->latest_date =="") { ?> readonly <?php } ?> >
                      <span class="input-error"><?php echo form_error('earliest_date', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Latest Date</label>
                      
                      <input type="text" name="latest_date" id="datepicker2" maxlength="10" class="form-control" placeholder="Event Latest Date" value="<?php echo $evt->latest_date; ?>" <?php if($evt->latest_date =="" && $evt->earliest_date =="") { ?> readonly <?php } ?>>
                      <span class="input-error"><?php echo form_error('latest_date', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Type <span class="must_required">*</span></label><br>
                      <?php if($evt->event_type=="consumer")
                      {
                        ?>
                      <input type="radio" name="event_type" value="consumer" checked="checked"> Consumer
                      <input type="radio" name="event_type" value="bisness" style="    margin-left: 20px;"> Business

                    <?php } else { ?>
                       <input type="radio" name="event_type" value="consumer"> Consumer
                      <input type="radio" name="event_type" value="business" style="    margin-left: 20px;" checked="checked"> Business

                    <?php } ?>
                     <!-- <select name="event_type" class="form-control select2" required>
                      <option value="<?php echo $evt->id; ?>"><?php echo $evt->event_categories; ?></option>
                      <?php foreach($event_type as $ev) { 
                        if($evt->event_categories != $ev->event_categories)
                        {
                        ?>

                        <option value="<?php echo $ev->id; ?>"><?php echo $ev->event_categories; ?></option>
                      
                      <?php } } ?>
                    </select> -->
                      <span class="input-error"><?php echo form_error('event_type', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Duration <span class="must_required">*</span></label>
                    
                      <input type="number" name="event_duration" id="event_duration" class="form-control" placeholder="Event Duration" value="<?php echo $evt->duration; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('event_duration', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Total Guests <span class="must_required">*</span></label>
                     
                      <input type="text" name="guest" id="guest" class="form-control" placeholder="Total Number of Guests" value="<?php echo $evt->guests; ?>" required>
                      <span class="input-error"><?php echo form_error('guest', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Location <span class="must_required">*</span></label>
                     
                      <input type="text" name="location" id="location" class="form-control" placeholder="Event Location" value="<?php echo $evt->location; ?>" required>
                      <span class="input-error"><?php echo form_error('location', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Event Venue </label>
                     
                      <input type="text" name="venue" id="venue" class="form-control" placeholder="Event Venue" value="<?php echo $evt->venue; ?>">
                      <?php if($evt->venue ==""){ ?>
                       <input type="checkbox" id="novenue1" name="novenue" checked/> Venue is not known
                     <?php  } else { ?>
                      <input type="checkbox" id="novenue1" name="novenue" /> Venue is not known
                     <?php } ?>
                      <span class="input-error"><?php echo form_error('venue', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>

                  <div class="row">
                 <div id="loc1">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>City /State </label>
                     
                      <input type="text" name="city" id="city" class="form-control" placeholder="Event City / State" value="<?php echo $evt->city; ?>">
                      <span class="input-error"><?php echo form_error('city', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Zipcode </label>
                     
                      <input type="number" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" value="<?php echo $evt->zipcode; ?>" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" >
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                </div>

                
                 <div class="row">
                 
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Event Comments</label>
                     
                      <input type="text" name="comment" id="comment" class="form-control" placeholder="Event Comments" value="<?php echo $evt->comments; ?>">
                      <span class="input-error"><?php echo form_error('comment', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                
                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary pull-right form-btn">Update</button>
                    
                  </div>
              </div>
          </div>
        </div>

        </form>
      <?php } ?>
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
