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
        <h4>Promo Info</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/create/add_promo_info">Promo Info</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Edit Promo Info</a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
   
        <div class="row" style="margin-left: 0%">
        
      
                                <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.$data['sup'][0]->id); ?>" class="btn btn-success bor" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.$data['sup'][0]->id); ?>" class="btn btn-primary active bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                 <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Reviews</a>
                            </div>
            <!-- Basic Form Inputs card start -->
            <div class="card">
                 <br><br>
                    <div class="form-group row">
                         
                            <label class="col-sm-4 col-form-label"></label>
                           
                        </div>

                <div class="card-header">
                    <h5>Edit Promo Info  - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                
                    <?php echo form_open_multipart('supplier/edit/promo_info_editted'); ?>
                    <?php if(!empty($promo_user_data))
                {
                    ?>

                     <div class="form-group row">
                
                   <div class="col-sm-10">
                         <input type="checkbox" id="same" name="same" value="1" onclick="sameBusiness(this)"/> Use same Promo info
                         
                     
                     
                    </div>

                  </div>
                

              <?php  } ?>
               <input type="hidden" name="supplier_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->supplier_id;?> >
                <input type="hidden" name="category_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->category_id;?> >
                <input type="hidden" name="store_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->id;?> >
              <div id="chk">
                   
               

                

      
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-4">
                              
                                <input type="text" name="business_name" class="form-control" placeholder="Type Business Name" 
                                <?php if(!empty($get_promo_data)){ ?> value="<?php echo $get_promo_data->business_name ; ?>" <?php } ?>>
                            </div>
                            <label class="col-sm-2 col-form-label">Personal Bio</label>
                            <div class="col-sm-4">
                              <textarea class="form-control" name="personal_bio" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->personal_bio ;} ?>"></textarea>
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business detail</label>
                            <div class="col-sm-4">
                                <input type="text"  name="busines_detail" class="form-control" placeholder="Type Business details"<?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->description;} ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Business FB link</label>
                            <div class="col-sm-4">
                                <input type="text"  name="fb_link" class="form-control" placeholder="www.google.com" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->fb;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">personal photo</label>
                            <div class="col-sm-4">
                              <input type="file" name="personal_photo" id="personal" class="form-control" placeholder="personal photo" >
                              <?php if($get_promo_data){?>
                                <?php if($get_promo_data->photo){?>
                                <a href="<?php echo base_url('../uploads/'.$get_promo_data->photo)?>" >View  Personal Photo</a>
                                <?php }} ?>

                            </div>
                            <label class="col-sm-2 col-form-label">Instagram link</label>
                            <div class="col-sm-4">
                              <input type="text"  name="insta_link" class="form-control" placeholder="www.google.com" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->instagram;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Linked In</label>
                            <div class="col-sm-4">
                              <input type="text"  name="linked_in" class="form-control" placeholder="www.google.com" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->linkedin;}?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-4">
                             <input type="text"  name="twitter_link" class="form-control" placeholder="www.google.com" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->twitter;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                </div>
                <div id="chk1" style="display:none">
                <?php if(!empty($promo_user_data))
                {
                ?>
                        <div class="form-group row">
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                        <label class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-4">
                              
                            <input type="text"  class="form-control" placeholder="Type Business Name" 
                            value="<?php echo $promo_user_data[0]->business_name;?>" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Personal Bio</label>
                            <div class="col-sm-4">
                            <textarea class="form-control" readonly><?php echo $promo_user_data[0]->personal_bio;?></textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business detail</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="Type Business details"  value="<?php echo $promo_user_data[0]->description;?>" readonly>
                                
                            </div>
                            <label class="col-sm-2 col-form-label">Business FB link</label>
                            <div class="col-sm-4">
                            <input type="text"   class="form-control" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->fb;?>" data-toggle="tooltip" data-placement="top" title="Only allow www" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">personal photo</label>
                            <div class="col-sm-4">
                            <?php if($promo_user_data[0]->photo)
                            {
                            ?>
                            <br>
                            <img src="<?php echo base_url('../uploads/'.$promo_user_data[0]->photo) ?>" class="doc" style="width: 150px;height: 150px;">

                            <!-- <input type="file"   value="<?php echo $promo_user_data[0]->photo;?> class="form-control" placeholder="personal photo" readonly > -->
                            <?php } else{
                            echo "<br>";
                            echo "<span style='font-size:15px;color: #e8362d;font-weight: 600;'>No Personal Photo </span>";
                            }  ?>
      

                            </div>
                            <label class="col-sm-2 col-form-label">Instagram link</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->instagram;?>" data-toggle="tooltip" data-placement="top" title="Only allow www" readonly>
                                
                            </div>
                        </div>
                           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Linked In</label>
                    <div class="col-sm-4">
                    <input type="text"   class="form-control" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->linkedin;?>" data-toggle="tooltip" data-placement="top" title="Only allow www" readonly>
                               
                    </div>
                <label class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->twitter;?>" data-toggle="tooltip" data-placement="top" title="Only allow www" readonly>
                                
                    </div>
                </div>

                <?php } ?>
                </div>
             
                        <br><br>
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
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