

 <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script> 
 <div class="page-header">
                <div class="page-header-title">
                    <h4>Add Message</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/message_lists">Messages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Add Messages</a>
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
                                <a href="<?php echo base_url(); ?>category/category/message_lists" class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                                </div>
                            <label class="col-sm-10 col-form-label"></label>
                                 
                        </div>
                            <div class="card-header">
                                <h5>Add Messages</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                           
                                <?php echo form_open_multipart('category/category/save_message'); ?>
                                  
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> Message Field</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="field" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Message Content Content</label>
                                        <div class="col-sm-10">
                                        <textarea rows="5" cols="60" name="message_body"></textarea>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
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