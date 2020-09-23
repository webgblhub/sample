<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Consumer Categories</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/consumer_category_lists">Consumer Categories</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Consumer Categories</a>
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
                    <a href="<?php echo base_url(); ?>category/category/consumer_category_lists" class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                </div>
                <label class="col-sm-10 col-form-label"></label>
               
            </div>
                <div class="card-header">
                    <h5>Add Consumer Category</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('category/category/add_consumer_category'); ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Consumer Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="category" class="form-control" placeholder="Type Consumer Category Name">
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                            <div class="col-sm-3">
                                <input type="checkbox" value="1" name="display" class="js-single" checked />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
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