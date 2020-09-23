<style type="text/css">
  .must_required
  {
    color: red;
    font-weight: 700;
    font-size: 18px;
  }
  .addbu
  {
        margin-top: 6% !important;
  }


</style>



<div class="content-wrapper">

    <section class="content">

      <div class="row">
        <?php foreach ($select_category as $se) {
        
        ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("client/supplier/edit_supplier_category/$se->id"); ?>">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Supplier Category Selection</h3>
               <a href="<?php echo site_url('client/supplier/addcategory'); ?>" class="btn btn-success pull-right form-btn">Add New</a>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                
                <div class="row">
                  
                  <div class="col-xs-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($select_category[0]->id)) echo $select_category[0]->id; else echo ""; ?>">
                    <div class="form-group">
                      <label>Supplier Category <span class="must_required">*</span></label>
                       <select name="category" class="form-control select2" required>
                      <option value=" <?php echo $se->cat_id; ?>"><?php echo $se->category; ?></option>
                      <?php foreach($category as $cat) { ?>

                        <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->category; ?></option>
                      
                      <?php } ?>
                    </select>
                      <span class="input-error"><?php echo form_error('category', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Category Budget <span class="must_required">*</span></label>
                      <input type="text" name="budget" id="en_title" class="form-control" placeholder="Enter Your Budget" value="<?php echo $select_category[0]->category_budget; ?>" required>
                     
                      <span class="input-error"><?php echo form_error('budget', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Category Development <span class="must_required">*</span></label>
                      
                      <input type="text" name="development"  class="form-control" placeholder="Enter Category Development" value="<?php echo $select_category[0]->catagory_development; ?>" required>
                      <span class="input-error"><?php echo form_error('development', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  
                  </div>
                <?php } ?>
             
                </div>

              

               
                
                
                  <div class="box-footer">
                      <button class="btn btn-primary pull-right form-btn">Save</button>
                    
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
