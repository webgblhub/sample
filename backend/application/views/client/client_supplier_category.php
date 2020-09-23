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

        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('client/supplier/add_supplier_category'); ?>">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Supplier Category Selection</h3>

            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div id="TextBoxesGroup">

        <div id="TextBoxDiv1">
                <div class="row">
                  
                  <div class="col-xs-6">
                    <input type="hidden" name ="id" value="<?php if(!empty($customer[0]->customer_id)) echo $customer[0]->customer_id; else echo ""; ?>">
                    <div class="form-group">
                      <label>Supplier Category <span class="must_required">*</span></label>
                       <select name="category1" class="form-control select2" required>
                      <option value="">Select</option>
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
                      <input type="text" name="budget1" id="en_title" class="form-control" placeholder="Enter Your Budget" value="" required>
                     
                      <span class="input-error"><?php echo form_error('budget', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                
              
               

                

                <div class="row">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <label>Category Development <span class="must_required">*</span></label>
                      
                      <input type="text" name="development1"  class="form-control" placeholder="Enter Category Development" value="" required>
                      <span class="input-error"><?php echo form_error('development', '<div class="error">','<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  
                  </div>
              </div>
            </div>
            <div class="row">
               <div class="col-xs-6">
                    <div class="form-group">

                    <input type="button" id="addButton" value="+"  class="btn btn-success form-btn addbu"> &nbsp;&nbsp;
                      <input type="button" id="removeButton" value="-"  class="btn btn-primary form-btn addbu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                  </div>
            </div>

                 
                 
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
