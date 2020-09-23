

 <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/message_lists">Message Lists</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Message Content </a>
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
                                <h5>Edit Mail Content</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                           
                                <?php echo form_open_multipart('category/category/update_message_content/'.$get_message->id); ?>
                                    <input type="hidden" name="id" value="<?php echo $get_message->id; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> Message Field</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="field" value="<?php echo $get_message->field;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Edit Message Content</label>
                                        <div class="col-sm-10">
                                        <textarea rows="5" cols="60" name="message"><?php echo $get_message->message;?></textarea>
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