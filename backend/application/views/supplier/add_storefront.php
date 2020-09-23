<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>StoreFront</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/supplier/lists">Supplier</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">StoreFront</a>
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
                    <h5>Add StoreFront</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('supplier/supplier/add_storefront/'.$get_user->id); ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">StoreFront</label>
                            <div class="col-sm-10">
                                <select name="supplier_category" id="supplier_category" class="form-control">
                                    <option value="">--Select--</option>
                                    <?php
                                        foreach ($get_category as $category) {
                                         
                                        echo '<option ' . $selected . ' value="' . $category->cat_id . '">' . $category->category . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> 

                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">NEXT</button>
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