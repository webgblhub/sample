<style type="text/css">
tr:hover{

  -webkit-box-shadow: 0 0 10px #676262;
        box-shadow: 0 0 10px #676262;
    
  }
  .searching
  {
    width: 30%;
    margin-left: 50%;

  }
  .searchi_left
  {
    width: 30%;
    margin-left: 15%;
  }
  .status_clr
  {
    color:red;
  }
  .right_msg
  {
  	/*border: 2px solid  #90e4adc2;
  	background-color: #90e4adc2;*/
  	text-align: right;
  }
  .left_msg
  {
  	/*border: 2px solid  #c3c4ca;
  	background-color: #c3c4ca;*/
  	text-align: left;

  }
  .msgtime
  {
  	padding-left: 2%;
  	margin-top: 3%;
  	color:#666666;
    font-size: 12px;
  }
  .msgtime1{
  	padding-left: 1%;
  	margin-top: 3%;
  	color:#666666;
    font-size: 12px;
  }
 .tick
 {
 	color:#21a1ec !important;
 }
 .tickdefalut
 {
 	color:#7b7979 !important;
 }
 .doc
 {
 	width: 200px;
    height: 200px;
 }

 
 .ex1 {
    border: 1px solid #abeac1;
    padding: 0em 1em;
    border-radius: 16px;
    font-size: 15px;
    /* line-height: 2; */
    background-color: #abeac1;
    -webkit-box-decoration-break: clone;
    -o-box-decoration-break: clone;
    box-decoration-break: clone;
}
.ex2 {


    border: 1px solid #c3c4ca;
    padding: 0em 1em;
    border-radius: 16px;
    font-size: 15px;
    /* line-height: 2; */
    background-color: #c3c4ca;
    -webkit-box-decoration-break: clone;
    -o-box-decoration-break: clone;
    box-decoration-break: clone;
}
.ex3
{
font-size: 36px !important;
}


</style>
              <link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Chat History</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!"> Chat</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Chat History</a>
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
            <div class="col-sm-2">
              <?php if($bookStatus==0)
              {
                ?>
                        <a href="<?php echo base_url("supplier/edit/lead_list/".$store_id) ?> "class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                        <?php
                      } else { ?>
                        <a href="<?php echo base_url("supplier/edit/booked_Lead_list/".$store_id) ?> "class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>

                      <?php } ?>
                    </div>
                    <label class="col-sm-10"></label>
               
                <div class="card-block">
           
                <div class="form-group row">
                  <div class="col-md-1">
                
              </div>
              <div class="col-md-10" style="background-image: url(<?php echo base_url() ?>uploads/de.png); margin-bottom: 3%;">

               
		            <?php 
		             if(!empty($msg))
		             {
		             	foreach($msg as $message)
		             	{
		             		 $old_date = $message->date;              
							 $old_date_timestamp = strtotime($old_date);
							 $new_date = date('h:i A', $old_date_timestamp);


		             	if($userid==$message->from_id)
		             	{
		            ?>        <div class="right_msg">
		            			<?php if(!empty($message->document))
		            					{
		            						$tt=explode(".",$message->document);

		            						if($tt[1]=='jpeg' || $tt[1]=='jpg' || $tt[1]=='png' || $tt[1]=='gif'){

		            			?>			<span>
												<a href="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>"><img src="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>" class="doc"></a> 
											</span>
		            		<?php }
		            				
		            				else
		            				{
		            		?>
		            		           <span>
											<a href="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> 
										</span>
		            		<?php
		            				}
		            				}

		            					 ?>
		            			<span class="ex1"><?php echo $message->message; ?>
			            		<span class="msgtime"><?php echo $new_date; if($message->msg_read_status=='1') { ?><i class="fa fa-check tick" aria-hidden="true"></i><i class="fa fa-check tick" aria-hidden="true"></i></span></span>
			            <?php } 
			            	else
			            	{
			            ?>	<i class="fa fa-check tickdefalut" aria-hidden="true"></i><i class="fa fa-check tickdefalut" aria-hidden="true"></i>		
			            				

			            <?php } ?>
			        
			            	</div><br/>
		            			
		            			<br/>
		            <?php
		             	}
		             	else
		             	{
		            ?> 		
		            		<div class="left_msg" style="margin-top: 3%">
		            			<?php if(!empty($message->document))
		            					{
		            						$tt=explode(".",$message->document);

		            						if($tt[1]=='jpeg' || $tt[1]=='jpg' || $tt[1]=='png' || $tt[1]=='gif'){

		            			?>			<span>
												<a href="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>"><img src="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>" class="doc"></a> 
											</span>
		            		<?php }
		            				
		            				else
		            				{
		            		?>
		            		           <span>
											<a href="<?php echo base_url() ?>../assets/chatimage/<?php echo $message->document; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> 
										</span>
		            		<?php
		            				}
		            				}

		            					 ?>
		            			<span class="ex2"><?php echo $message->message; ?>
		            			<span class="msgtime1"><?php echo $new_date;?></span></span>
		            		<br/><br/>
		         <?php
		             	}
		             	}

		             }
		             ?>
              </div>
           
          </div>
              </div>
           
          </div>
              <div class="col-md-1">

              
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
</div>
<!-- Page body end -->
</div>
</div>
           
                
               








      
    
    
  
  <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="bower_components/switchery/dist/switchery.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/advance-elements/swithces.js"></script>



