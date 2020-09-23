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
        <h4>Photo Gallery</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Photo gallery</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Edit Photo gallery </a>
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
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-success bor ">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-primary active bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Reviews</a>
                            </div>
            <!-- Basic Form Inputs card start -->
            <div class="card">
                 <br><br>
                    <div class="form-group row">
                         
                            <div class="col-sm-4 col-form-label">
                             <button class="btn btn-primary pull-right form-btn " id="new_photo">Add Photo</button></div>
                           
                        </div>

                <div class="card-header">
                    <h5>Add Photo gallery - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                     <div id="newp" style="display: none; background: rgb(219, 228, 227);" >
                        <br>
                    <?php echo form_open_multipart('supplier/edit/editted_photo_gallery'); ?>
                        <input type="hidden" name="supplier_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->supplier_id;?> >
                        <input type="hidden" name="category_id" id="en_title" class="form-control"value=<?php echo $data['sup'][0]->category_id;?> >
                        <input type="hidden" name="store_id" id="en_title" class="form-control"  value=<?php echo $data['sup'][0]->id;?> >

                        <div class="form-group row">
                            <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" value="" placeholder="Type Title"><br>
                            </div>
                        </div> 
                        <div class="form-group row">
                             <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">Upload Photo</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo" id="personal" class="form-control" placeholder="personal photo" >
                               

                            </div>
                        </div> 


                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </div>
                        
                   <?php form_close(); ?>
                    <br>
                </div>
                   
                   <br>

                    <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php if(!empty($get_photo_data)) { $i=1;foreach($get_photo_data as $photo) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php echo $photo->title; ?></td>
                                        <td><img src="<?php echo base_url('../uploads/'.$photo->photos) ?>" style="width: 100px;height: 100px;"/></td>
                                        <td>
                                            

                                            <!-- Delete Button -->
                                            <a class="label arf-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $photo->id; ?>?table=<?php echo base64_encode('supplier_photos'); ?>'><i class="ti-trash" title="Delete"></i></a>
                                            <!-- Pachage Button -->
                                           

                                            
                                        </td>
                                    </tr>
                                <?php $i++;endforeach; }?>
                                </tbody>
                            </table>
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
 <!-- Main-body end -->  
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/swithces.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Date-dropper js -->
<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.js"></script>

<!-- ck editor -->
<script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
<!-- echart js -->

<script src="<?php echo base_url(); ?>admintemplate/assets/pages/user-profile.js"></script>