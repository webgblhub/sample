

 <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script> -->
 <div class="page-header">
                <div class="page-header-title">
                    <h4>Edit Mail Content</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/mail_lists">Mail Content</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Mail Content </a>
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
                                <a href="<?php echo base_url(); ?>category/category/mail_lists" class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                                </div>
                            <label class="col-sm-10 col-form-label"></label>
                                 
                        </div>
                            <div class="card-header">
                                <h5>Edit Mail Content</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                           
                                <?php echo form_open_multipart('category/category/save_content'); ?>
                                    <input type="hidden" name="id" value="<?php echo $get_body->id; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> Mail Category</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="category" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Edit Body Content</label>
                                        <div class="col-sm-10">
                                        <textarea rows="30" cols="90" name="mail_body"><?php echo $get_body->body;
?></textarea>
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

    <!-- ck editor -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>