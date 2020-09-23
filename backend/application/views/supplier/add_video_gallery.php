<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Video Gallery</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/create">Video gallery</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Video gallery </a>
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

                <div class="card-header">
                    <h5>Add Video gallery</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('supplier/create/save_video_gallery'); ?>
                        <input type="hidden" name="supplier_id" id="en_title" class="form-control" value=<?php echo $supplier_id ?> >
                        <input type="hidden" name="category_id" id="en_title" class="form-control" value=<?php echo $category_id ?> >
                         <input type="hidden" name="switch_id" id="en_title" class="form-control" value=<?php echo $switch_id ?> >


                        <div class="table-responsive" style="overflow-x: hidden;">  
                            <table class="table table-bordered" id="dynamic_field" > 
                                 <thead>
                                    <tr>
                                        <th>Youtube link</th>
                                 
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>  
                                        <td> <input type="url" name="link1[]" class="form-control" placeholder="Type Youtube Link"></td>  


                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                            </table>  
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                        
                    </form>
                   
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="link1[]" class="form-control" placeholder="Type Youtube Link"></td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script>