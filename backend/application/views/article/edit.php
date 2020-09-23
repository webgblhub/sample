<div class="page-header">
                <div class="page-header-title">
                    <h4>Articles</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>article/article/lists">Articles</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Articles </a>
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
                                <a href="<?php echo base_url(); ?>article/article/lists" class="btn btn-success"><i class="ti-menu-alt"></i>Back to List</a>
                                </div>
                            <label class="col-sm-10 col-form-label"></label>

                        </div>
                            <div class="card-header">
                                <h5>Edit Articles</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">

                                <!-- <h4><?= $title ?></h4> -->
                                <?php echo form_open_multipart('article/article/update/'.$article['id']); ?>
                                <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                            <select name="category" id="category" class="form-control">
                               
                                 <?php
                                     foreach ($get_category as $cat) {
                                         $selected = ($article['cat_id'] == $cat->cat_id) ? ' selected ' : '';
                                         echo '<option ' . $selected . ' value="' . $cat->cat_id . '">' . $cat->category . '</option>';
                                         }
                                ?>
                            </select>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10">
                                <input type="text" name="question" class="form-control" placeholder="Type Question" value="<?php echo $article['Question']  ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <input type="text" name="answer" class="form-control" placeholder="Type Answer" value="<?php echo $article['Answer']  ?>">
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