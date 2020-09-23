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
                    <h4>Mail Templates</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/mail_template">Cultural Specialities</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Mail Templates</a>
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
                    <div class="form-group row">
                        <div class="col-sm-2">
                                <a href="<?php echo base_url(); ?>category/category/add_mail" class="btn btn-success"><i class="ti-plus"></i>Add New</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                            
                        </div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i=1;foreach($mail_lists as $lists) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><a href="<?php echo base_url(); ?>category/category/update_mail/<?php echo $lists['category']; ?>"></a><?php echo $lists['category']; ?></td>
                                    

                                        <td>
                                            <!-- <?php if($cultural['status'] == 1): ?>
                                           <a class="label arf-primary disable"  href='<?php echo base_url(); ?>cultural_speciality/cultural_speciality/enable/<?php echo $cultural['cultural_speciality_id']; ?>?table=<?php echo base64_encode('cultural_speciality'); ?>'><i title="enable" class="ti-unlock"></i></a>&nbsp;&nbsp;&nbsp; 
                                            <?php else: ?> 
                                            <a class="label arf-warning enable" href='<?php echo base_url(); ?>cultural_speciality/cultural_speciality/desable/<?php echo $cultural['cultural_speciality_id']; ?>?table=<?php echo base64_encode('cultural_speciality'); ?>'><i title="disable" class="ti-lock"></i></a>&nbsp;&nbsp;&nbsp;
                                            <?php endif; ?> -->
                                            <!-- Edit Button -->
                                            <a class="label arf-inverse-info" href='<?php echo base_url(); ?>category/category/view_mail/<?php echo $lists['id']; ?>'><i title="edit" class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;

                                            <a class="label arf-inverse-info" href='<?php echo base_url(); ?>category/category/update_mail/<?php echo $lists['id']; ?>'><i title="edit" class="ti-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                            <!-- Delete Button -->
                                                <?php if($lists['id'] == 1){ ?>
                                                    <a class="label arf-inverse-danger delete" style="display:none;" href='<?php echo base_url(); ?>category/category/delete_mail/<?php echo $lists['id']; ?>?table=<?php echo base64_encode('master_template'); ?>'><i title="delete" class="ti-trash"></i></a>
                                            
                                               <?php } else { ?>
                                             <a class="label arf-inverse-danger delete"  href='<?php echo base_url(); ?>category/category/delete_mail/<?php echo $lists['id']; ?>?table=<?php echo base64_encode('master_template'); ?>'><i title="delete" class="ti-trash"></i></a>
                                                <?php } ?>

                                            
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
