<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <style type="text/css">
        .bor
        {
            border: 2px solid #20bb62;
        }
    </style>
<?php
   $id=$this->uri->segment(6);

    $data['sup']=$this->Edit_Model->selectSupplierid($id);?>



<script type="text/javascript">
     $(document).ready(function(){
            $(".delete").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });
    $(document).ready(function(){
            $(".enable").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });

    $(document).ready(function(){
            $(".disable").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });

    </script>
 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Of Reviews</h4>
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
                        <li class="breadcrumb-item"><a href="#!">List Of Reviews</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
           <!--  <p> <a class="btn btn-success"  href="<?php echo base_url('supplier/supplier/list_storefront/'.$supplier_id)?>"><i class="ti-menu-alt"></i> Store Front List</a></p>
 -->
            <div class="page-body">
                <!-- DOM/Jquery table start $testimonials-->
                <div class="row" style="margin-left: 0%">
                   <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.$data['sup'][0]->id); ?>" class="btn btn-success" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-primary active bor">Reviews</a>
                            </div>


       
                <div class="card">
                 <br><br>
                    <div class="form-group row">
                         
                            <label class="col-sm-4 col-form-label"></label>
                             
                           
                        </div>
                     <div class="card-header">
                    <h5>Review Details - <?php echo $categoryname[0]->category; ?> - <?php echo $company[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Message</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(!empty($review)){ ?>
                                 <?php $i=1;foreach($review as $rev): 
                                 $str = wordwrap($rev->message, 60, "<br />\n");
                                 //echo $str;die; 
                                 //$str = preg_replace("/(.{30})/", "$1\n\r", $rev->message);
                                 ?>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php echo $str; ?></td>
                                        <td>
                                            <?php for($i=1;$i<=$rev->rating;$i++)
                                            { ?>
                                            <i class="ti-star" title="Edit" style="color: #2ecc71;font-size: 19px;"></i> <?php  } ?></td>
                                        <td><?php echo $rev->date; ?></td>
                                        <td> <?php if($rev->status == 0): ?>
                                           <a class="label arf-warning enable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $rev->id; ?>?table=<?php echo base64_encode('supplier_reviews'); ?>'><i class="ti-lock" title="Enable"></i></a> 
                                            <?php else: ?> 
                                            <a class="label arf-primary disable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $rev->id; ?>?table=<?php echo base64_encode('supplier_reviews'); ?>'><i class="ti-unlock" title="Disable"></i></a>
                                            <?php endif; ?></td>

                                           
                                       
                                    </tr>
                                 
                                <?php $i++;endforeach; ?>
                                 <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
                <!-- DOM/Jquery table end -->

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
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
