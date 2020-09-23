<style type="text/css">
	.col_box
{
	border: 1px solid #ccc9c9;
    box-shadow: 5px 6px #cac6c6;
}
.phargraph
{
	text-align: justify;
	padding-left: 3%;
	color:#9e9696;
	padding-right: 3%;
}
.img_res
{
	width: 97%;
    padding-left: 3%;
    padding-top: 4%;
    padding-bottom: 3%;
    font-size: 100px;
    text-align: center;
}
.header_st
{
background-color: #00000066 !important;
border-color: none !important;
}
.heading_ss
{
	text-align: center;
	color:#203acc;
}
.model_sizing
{
  right: 30%;
    bottom: 9%;
    left: 30%; top:30%; background:none;
}
    </style>


<div class="content-wrapper">

    <section class="content">

      <div class="row">
      	<div class="col-md-12">
      		<div class="clearfix">
				</div>
      		<div class="row">
      			<div class="col-md-4">
      				<div class="col_box">
      				<div class="img_res">	
      					<i class="fa fa-calendar" aria-hidden="true"></i></div>
      					<h4 class="heading_ss">New Event</h4>
							<p class="phargraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

      				</div>
      			</div>
      			<div class="col-md-4">
      				<div class="col_box">	
      					<div class="img_res" id="dialog">	
      					<i class="fa fa-address-card" aria-hidden="true"></i></div>
      					<h4 class="heading_ss">EDC Event Number</h4>
							<p class="phargraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

      				</div>
      			</div>
      			<div class="col-md-4">
      				<div class="col_box">	
      					<div class="img_res">	
      					<i class="fa fa-user-circle" aria-hidden="true"></i></div>
      					<h4 class="heading_ss">Consumer vs. Business</h4>
							<p class="phargraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

      				</div>
      			</div>
      		</div>
        
      </div>
  </div>



    </section>

	</div>

   <!-- Modal -->
<div class="modal fade model_sizing" id="modalForm" role="dialog">
    <div class="modal-dialog" style="width:490px !important">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New Event</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                <form enctype="multipart/form-data" method="post" action="">
                 
                  
                   
                    
                   

                    <div class="col-xs-12">
                    <div class="form-group">
                      <label style="color: #2c2ce6; padding-left: 25%;">Are ready to plan a New Event ?</label><br><br>
                      
                      </div>
                    </div>
</form>

                    </div>

            <!-- Modal Footer -->
            <div class="modal-footer" style="border-top:none">
            <div class="col-xs-11">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" name="submit" id="new_event" class="btn btn-primary pull-right form-btn" >Yes</button>
              </div>
            </div>
          
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade model_sizing" id="modalForm1" role="dialog">
    <div class="modal-dialog" style="width:490px !important">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: #2c2ce6; padding-left: 25%;">If Consumer or Business Event ?</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                <form enctype="multipart/form-data" method="post" action="<?php echo site_url('client/profile/customer_event_selection'); ?>">
                 
                  

                      <div class="col-xs-12">
                    <div class="form-group">
                      <label>Event Type <span class="must_required">*</span></label><br>
                      <input type="radio" name="event_type" value="consumer"> Consumer
                      <input type="radio" name="event_type" value="business" style="    margin-left: 20px;"> Business
                     
                      <span class="input-error"><?php echo form_error('event_type', '<div class="error">', '</div>'); ?></span>
                      <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo ""; ?>">
                    </div>
                  </div>
                
                      
                      


                    </div>

            <!-- Modal Footer -->
            <div class="modal-footer" style="border-top:none">
            <div class="col-xs-11">

               
                <button type="submit" name="submit" id="event" class="btn btn-primary pull-right form-btn" >Yes</button>
                </form>
              </div>
            </div>
          
        </div>
    </div>
</div>

 

<script>
   
</script>