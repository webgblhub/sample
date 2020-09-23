<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">
<style type="text/css">
        .bor
        {
            border: 2px solid #20bb62;
        }
    </style>
<?php
$id=$this->uri->segment(4);

    $data['sup']=$this->Edit_Model->selectSupplierid($id);?>
<!-- Page header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Video Gallery</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Video gallery</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Edit Video gallery </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row" style="margin-left: 0%">
        
      
                                <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.$data['sup'][0]->id); ?>" class="btn btn-success bor" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-primary active bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                 <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Reviews</a>
                            </div>
       
           
            <div class="card">
                 <br><br>
                    <div class="form-group row">
                         
                            <div class="col-sm-4 col-form-label">
                             <button class="btn btn-primary pull-right form-btn " id="new_photo">Add Video</button></div>
                           
                        </div>

                <div class="card-header">
                    <h5>Edit Video gallery  - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div id="newp" style="display: none; background: rgb(219, 228, 227);" >
                        <br>
                    <?php echo form_open_multipart('supplier/edit/editted_video_gallery'); ?>
                        <input type="hidden" name="supplier_id" id="en_title" class="form-control"  value=<?php echo $data['sup'][0]->supplier_id;?> >
                        <input type="hidden" name="category_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->category_id;?> >
                        <input type="hidden" name="store_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->id;?>  >

                        <div class="form-group row">
                             <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">Video link1</label>
                            <div class="col-sm-8">
                                <input type="url" name="link1" id="link1" class="form-control" placeholder="youtube link" value="" >
                                
                            </div>
                        </div> 
                       <!--  <div class="form-group row">
                             <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">Video link2</label>
                            <div class="col-sm-8">
                                <input type="url" name="link2" id="link2" class="form-control" placeholder="youtube link" value="" >
                            </div>
                        </div>  -->


                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </div>
                        
                    </form>
                    <br>
                </div>
                   
                   <br>

                    <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Video 1</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php if(!empty($get_video_data)) { 
                                    $i=1;foreach($get_video_data as $vid) : 
                                   ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php if(!empty($vid->video1)) {?><a href="<?php echo $vid->video1; ?>" target="_blank">View</a><?php } else { echo "No Video"; } ?>
                                       </td>
                                        <!-- <td><?php if(!empty($vid->video2)) {?><a href="<?php echo $vid->video2; ?>" target="_blank">View</a><?php } else { echo "No Video"; } ?> </td> -->
                                       
                                        <td>
                                            

                                            <!-- Delete Button -->
                                            <a class="label arf-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $vid->id; ?>?table=<?php echo base64_encode('supplier_videos'); ?>'><i class="ti-trash" title="Delete"></i></a>
                                            <!-- Pachage Button -->
                                           

                                            
                                        </td>
                                    </tr>
                                <?php $i++;endforeach; 
                            }?>
                                </tbody>
                            </table>
                        </div>
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