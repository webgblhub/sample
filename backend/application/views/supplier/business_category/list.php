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
 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Business Categories</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/business_category/lists">Business Categories</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Business Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
            <p> <a class="btn btn-primary"  href="<?php echo base_url('supplier/business_category/add')?>"><i class="ti-plus"></i>Add Business Category</a></p>

            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start $testimonials-->
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Business Category Name</th>
                                        

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i=1;foreach($business_category as $category) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><a href="<?php echo base_url(); ?>supplier/business_category/update/<?php echo $category['id']; ?>"></a><?php echo $category['event_categories']; ?></td>
                                    

                                        <td>
                                            <?php if($category['display'] == 0): ?>
                                           <a class="label arf-warning enable"  href='<?php echo base_url(); ?>supplier/business_category/enable/<?php echo $category['id']; ?>?table=<?php echo base64_encode('event_dragon_supplier__businessevent_categories'); ?>'><i class="ti-lock"></i></a>&nbsp;&nbsp;&nbsp; 
                                            <?php else: ?> 
                                            <a class="label arf-primary disable" href='<?php echo base_url(); ?>supplier/business_category/desable/<?php echo $category['id']; ?>?table=<?php echo base64_encode('event_dragon_supplier__businessevent_categories'); ?>'><i class="ti-unlock"></i></a>&nbsp;&nbsp;&nbsp;
                                            <?php endif; ?>
                                            <!-- Edit Button -->
                                            <a class="label arf-inverse-info" href='<?php echo base_url(); ?>supplier/business_category/update/<?php echo $category['id']; ?>'><i class="ti-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                            <!-- Delete Button -->

                                             <a class="label arf-inverse-danger delete"  href='<?php echo base_url(); ?>supplier/business_category/delete/<?php echo $category['id']; ?>'><i class="ti-trash"></i></a>
                                            

                                            
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
