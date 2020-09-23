
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
</style>


<div class="content-wrapper">

    <section class="content">

		<!-- <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo base_url().$this->session->userdata('business-info')?>">BUSSINESS INFO</a>
  </li>
  
</ul> -->
      <div class="row">
  <form enctype="multipart/form-data"  id="comment" method="post" action="">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-star" aria-hidden="true"></i> All Event List</h3>
             
            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              
              
                
                <div class="box-body">
                   <a href="<?php echo site_url('client/event/event'); ?>" class="btn btn-success pull-right form-btn">Add New</a>
                  <br><br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 7%;">#</th>
											<th style="width: 20%;">Event Name</th>
											<th style="width: 20%;">Event Date</th>
                      <th style="width: 15%;">Guests Count</th>
                      <th style="width: 20%;">Venue</th>
                      
                      <th style="width: 25%;">Action</th>
                      <!-- <th style="width: 12%;">status</th> -->

                    </tr>
                    </thead>
                    <tbody>
                    <?php if($event){ $i = 1; foreach ($event as $evt) {


											?>
                    <tr style="height: 4em; font-size: 15px">
                      <td><?php echo $i++; ?></td>

											<td><?php echo ucfirst($evt->event_name); ?></td>
									
                  <td><?php
                            $old_date = $evt->event_date;              
                            $old_date_timestamp = strtotime($old_date);
                            $new_date = date('l, F d, Y ', $old_date_timestamp);
                            echo $new_date;
                        ?>
                    
                  </td>
                  <td><?php echo  $evt->guests ?></td>
								
                  <td><?php echo  $evt->location ?></td>
                  <td>
                      <a href="<?php echo base_url("client/event/viewEventDetails/$evt->event_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 

                      <a href="<?php echo base_url("client/event/viewEventDetails/$evt->event_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                     <!--  <button class="btn btn-xs btn-danger" onclick="confirmDelete(<?php echo $evt->event_id; ?>)"><i class="fa fa-trash"></i></button>  -->
                     <a href="<?php echo base_url("client/event/deleteEvent/$evt->event_id"); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                  </td>


                    </tr>
                    <?php } } ?>
                    </tbody>

                  </table>
                </div>




              </div>
          </div>
        
      <!-- </form> -->




        </form>
      </div>
    </section>

  </div>
  <!-- // -->
  

  


  