<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">

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
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/create">Promo Info</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Promo Info</a>
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
                    <h5>Add Promo Info</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
               
              
              <form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('supplier/create/save_promo_info'); ?>">
                 <input type="hidden" name="supplier_id" id="en_title" class="form-control" value=<?php echo $supplier_id ?> >
                        <input type="hidden" name="category_id" id="en_title" class="form-control" value=<?php echo $category_id ?> >
                        <input type="hidden" name="switch_id" id="en_title" class="form-control" value=<?php echo $switch_id ?> >
              <?php if($available=='1')
                {
                    ?>

                     <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                   <div class="col-sm-10">
                         <input type="checkbox" id="same" name="same" value="1" onclick="sameBusiness(this)"/> Use same Promo info
                         
                     
                     
                    </div>

                  </div>
                

              <?php  } ?>
                
                <div id="chk">

                       
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="busss" name="business_name" class="form-control" placeholder="Type Business Name">
                            </div>
                            <label class="col-sm-2 col-form-label">Personal Bio</label>
                            <div class="col-sm-4">
                              <textarea class="form-control" name="personal_bio"></textarea>
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business detail</label>
                            <div class="col-sm-4">
                                <input type="text"  name="busines_detail" class="form-control" placeholder="Type Business details">
                            </div>
                            <label class="col-sm-2 col-form-label">Business FB link</label>
                            <div class="col-sm-4">
                                <input type="text"  name="fb_link" class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">personal photo</label>
                            <div class="col-sm-4">
                              <input type="file" name="personal_photo" id="personal" class="form-control" placeholder="personal photo" >

                            </div>
                            <label class="col-sm-2 col-form-label">Instagram link</label>
                            <div class="col-sm-4">
                              <input type="text"  name="insta_link" class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Linked In</label>
                            <div class="col-sm-4">
                              <input type="text"  name="linked_in" class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-4">
                             <input type="text"  name="twitter_link" class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                
                       
                </div>
                <div id="chk1" style="display:none;">
                        <?php if(!empty($promo))
                        { ?>
       

                           
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business Name</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="Type Business Name" value="<?php echo $promo['0']->business_name ?>" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Personal Bio</label>
                            <div class="col-sm-4">
                              <textarea class="form-control" readonly><?php echo $promo['0']->personal_bio ?></textarea>
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Business detail</label>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $promo['0']->description ?>" readonly class="form-control" placeholder="Type Business details">
                            </div>
                            <label class="col-sm-2 col-form-label">Business FB link</label>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $promo['0']->fb ?>" readonly class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">personal photo</label>
                            <div class="col-sm-4">
                            <input type="file" class="form-control" placeholder="personal photo" readonly >
                            </div>
                            <label class="col-sm-2 col-form-label">Instagram link</label>
                            <div class="col-sm-4">
                              <input type="text" value="<?php echo $promo['0']->instagram ?>" readonly  class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Linked In</label>
                            <div class="col-sm-4">
                              <input type="text" value="<?php echo $promo['0']->linkedin ?>" readonly class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                               
                            </div>
                            <label class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-4">
                             <input type="text"  value="<?php echo $promo['0']->twitter ?>" readonly class="form-control" placeholder="www.google.com" data-toggle="tooltip" data-placement="top" title="Only allow www">
                                
                            </div>
                        </div>
                        <?php } ?>
                        
                      

                      
                
                       
                  
                </div>
                    
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">SAVE & NEXT</button>
                            </div>
                        </div>
                         </form>
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
