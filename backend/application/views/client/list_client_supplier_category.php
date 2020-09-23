
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

	
      <div class="row">
  <form enctype="multipart/form-data"  id="comment" method="post" action="">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-star" aria-hidden="true"></i>Category Selected List</h3>
             
            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              
              
                
                <div class="box-body">
                  <a href="<?php echo site_url('client/supplier/addcategory'); ?>" class="btn btn-success pull-right form-btn">Add New</a>
                  <br><br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 7%;">#</th>
											<th style="width: 20%;">Category Name</th>
											<th style="width: 20%;">Budget</th>
                      <th style="width: 15%;">Category Development</th>
                      <th style="width: 20%;">Created Date</th>
                      <th style="width: 20%;">Action</th>
                   </tr>
                    </thead>
                    <tbody>
                    <?php if($category){ $i = 1; foreach ($category as $cat) {


											?>
                    <tr style="height: 4em; font-size: 15px">
                      <td><?php echo $i++; ?></td>

											<td><?php echo ucfirst($cat->category); ?></td>
									
                      <td><?php echo $cat->category_budget; ?></td>
                      <td><?php echo  $cat->catagory_development ?></td>
                      <td><?php 
                            $old_date = $cat->created_on;              
                            $old_date_timestamp = strtotime($old_date);
                            $new_date = date('l, F d, Y ', $old_date_timestamp);
                            echo $new_date; ?>
                              
                      </td>
                        
                  <td>
                      
                      <a href="<?php echo base_url("client/supplier/editClientSelectCategory/$cat->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                     
                     <a href="<?php echo base_url("client/supplier/deleteClientSelectCategory/$cat->id"); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

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
  

  


  