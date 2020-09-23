           <div class="page-header">
                <div class="page-header-title">
                    <h4>Payment Methods</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>payment/lists">Payment Methods</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Payment Method</a>
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
                                <h5>Edit Payment Method</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                                <h4><?= $title ?></h4>
                                <?php echo form_open_multipart('payment/update/'.$testimonial['id']); ?>
                                    <input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payment Method</label>
                                        <div class="col-sm-10">
                                            <input type="text" required value="<?php echo $testimonial['title']; ?>" name="title" class="form-control" placeholder="Type Payment Method">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" value="<?php echo $testimonial['email']; ?>" name="email" class="form-control" placeholder="Type Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="number" value="<?php echo $testimonial['phone']; ?>" name="phone" class="form-control" placeholder="Type Phone Number">
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