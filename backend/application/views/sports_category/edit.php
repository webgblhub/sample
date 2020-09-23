<div class="page-header">
                <div class="page-header-title">
                    <h4>Sports Categories</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>sports_category/sports_category/lists">Sports Categories</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Sports Categories </a>
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
                                <a href="<?php echo base_url(); ?>sports_category/sports_category/lists" class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                                </div>
                            <label class="col-sm-10 col-form-label"></label>

                        </div>
                            <div class="card-header">
                                <h5>Edit Sports Categories</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                                <!-- <h4><?= $title ?></h4> -->
                                <?php echo form_open_multipart('sports_category/sports_category/update/'.$sports_category['id']); ?>
                                    <input type="hidden" name="id" value="<?php echo $sports_category['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cultural Speciality Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $sports_category['name']; ?>" name="sports_category" class="form-control" placeholder="Type Cultural Speciality Name">
                                        </div>
                                    </div>


                                    
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                                        <div class="col-sm-3">
                                            <input type="checkbox" value="1" name="display" class="js-single" <?php if($categories['display'] == 0){ echo "checked"; } else { echo ""; } ?> />
                                        </div>
                                    </div>
                                     -->
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