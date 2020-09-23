<div class="page-header">
                <div class="page-header-title">
                    <h4>Roles</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/supplier/lists">Suppliers</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Add Suppliers</a>
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
                                <h5>Edit Role</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                                <h4><?= $title ?></h4>
                                <?php echo form_open_multipart('supplier/supplier/update/'.$testimonial['id']); ?>
                                    <input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Supplier User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $testimonial['username']; ?>" name="title" class="form-control" placeholder="Type User Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Supplier Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $testimonial['email']; ?>" name="email" class="form-control" placeholder="Type User Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="Password" required="" value="<?php echo $testimonial['password']; ?>" name="password" class="form-control" placeholder="Type PassWord">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                                        <div class="col-sm-3">
                                            <input type="checkbox" value="1" name="status" class="js-single" <?php if($testimonial['status'] == 1){ echo "checked"; } else { echo ""; } ?> />
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