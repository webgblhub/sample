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
      .input-error
        {
            background-color: #2c3e50;
            font-size: 19px;
            color: white;
            border-radius: 12px;
            padding: 10px;

        }
        
        
    </style>

 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List State</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>country/state/">State</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List State</a>
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
                                <a href="<?php echo base_url(); ?>country/state/addState" class="btn btn-success"><i class="ti-plus"></i>Add State</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                           
                        </div>
                       
                    <div class="card-block">
                        <span class="input-error" style="display: none"><?php echo $this->session->flashdata('err'); ?></span><br><br>
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>State Code</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i=1;foreach($state as $states) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php echo $states->fips_code; ?></td>
                                        <td><?php echo $states->name; ?></td>
                                        <td><a class="label arf-inverse-primary" href='<?php echo base_url(); ?>country/state/listofCity/<?php echo $states->id; ?>'><i class="ti-eye" title="View All City"></i></a></td>
                                        <td>
                                            
                                           
                                           <!-- Edit Button -->
                                            <a class="label arf-inverse-info" href='<?php echo base_url(); ?>country/state/editState/<?php echo $states->id; ?>'><i class="ti-pencil" title="Edit"></i></a>

                                             
                                            <!-- Delete Button -->
                                            <a class="label arf-inverse-danger delete" href='<?php echo base_url(); ?>country/state/deleteState/<?php echo $states->id; ?>'><i class="ti-trash" title="Delete"></i></a>
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
