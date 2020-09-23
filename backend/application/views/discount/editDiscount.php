<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Edit Discount</h4>
    </div>
   <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>discount/discountType/">Discount</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Discount</a>
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
                                <a href="<?php echo base_url(); ?>discount/discountType/" class="btn btn-success"><i class="ti-menu-alt"></i> Discount List</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                           
                        </div>

                <div class="card-header">
                    <h5>Edit Discount</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('discount/discountType/editDiscount/'.$dis[0]->discount_id); ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discount Type</label>
                            <div class="col-sm-10">
                                <input type="text" name="discount" class="form-control" placeholder="Type Discount" value="<?php echo $dis[0]->discount_name; ?>" required>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                            <div class="col-sm-3">
                             <input type="checkbox" value="1" name="status" class="js-single" checked />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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