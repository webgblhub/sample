<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

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
    <style type="text/css">
      
    </style>

 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Clients</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>client/profile/lists">Clients</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Clients</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start $testimonials-->
                <div class="card">
                    <br>
                    <?php /*?><div class="form-group row">
                            <label class="col-sm-10 col-form-label"></label>
                            <div class="col-sm-2">
                                <a href="<?php echo base_url(); ?>supplier/supplier/add" class="btn btn-success"><i class="ti-plus"></i>Add Supplier</a>
                            </div>
                        </div><?php */?>
                       
                    <div class="card-block">

                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Business Info</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i=1;foreach($customers as $customer) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php echo $customer['customer_type'].' '.$customer['firstname'].' '.$customer['lastname']; ?></td>
                                        <td><?php echo $customer['email']; ?></td>
                                        <td><?php echo $customer['mobile']; ?></td>
                                        <td><a class="label arf-inverse-info" href='<?php echo base_url(); ?>client/profile/businessinfo/?cusid=<?php echo $customer['customer_id']; ?>'><i class="ti-pencil" title="Edit"></i></a></td>
                                        <td>
                                             <?php /*?><a class="label arf-inverse-primary" href='<?php echo base_url(); ?>supplier/supplier/list_storefront/<?php echo $customer['customer_id']; ?>'><i class="ti-eye" title="Package Details"></i></a><?php */?>

                                           
                                           <!-- Edit Button -->
                                            <a class="label arf-inverse-info" href='<?php echo base_url(); ?>client/profile/profileinfo/?cusid=<?php echo $customer['customer_id']; ?>'><i class="ti-pencil" title="Edit"></i></a>

                                             <?php if($customer['status'] == 1): ?>
                                           <a class="label arf-warning enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $customer['customer_id']; ?>?table=<?php echo base64_encode('customer_info'); ?>'><i class="ti-lock" title="Enable"></i></a> 
                                            <?php else: ?> 
                                            <a class="label arf-primary disable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $customer['customer_id']; ?>?table=<?php echo base64_encode('customer_info'); ?>'><i class="ti-unlock" title="Disable"></i></a>
                                            <?php endif; ?>

                                            <!-- Delete Button -->
                                            <a class="label arf-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $customer['customer_id']; ?>>?table=<?php echo base64_encode('customer_info'); ?>'><i class="ti-trash" title="Delete"></i></a>
                                            <!-- Pachage Button -->
                                           

                                            
                                        </td>
                                    </tr>
                                <?php $i++;endforeach; ?>
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
