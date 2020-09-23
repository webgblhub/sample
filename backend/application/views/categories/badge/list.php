<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
<style>
    .btn-default:hover {opacity: 0.6}
</style>
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
                    <h4>Denominations</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category/badge_lists">Badge</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Badge</a>
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
                      
                                <?php 
                                $element = $badge['0']['badge'];
                               // print_r($element);die();
                                if($element) {?>
                                <a id="add_badge" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Badge already Exists"><i class="ti-plus"></i>Add New</a>
                                    
                                   <?php }
                                    else{?>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i>Add New</a>
                                    <?php }?>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                            
                        </div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                        <div class="container">
  
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Badge</h4>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('category/category/add_badge'); ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Badge</label>
                    <div class="col-sm-10">
                        
                        <textarea class="form-control" name="badge" placeholder="Type  Badge"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </div> 
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th> Badge</th>
                                        

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                 <?php $i=1;foreach($badge as $category) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><a href="<?php echo base_url(); ?>category/category/badge_lists/<?php echo $category['id']; ?>"></a>
                                        <?php
                                        if($category['badge']){
                                            echo $category['badge'];
                                        }else{
                                            echo 'no badge available';
                                        }
                                          ?>
                                        </td>
                                    

                                        <td>

                                            <!-- Delete Button -->

                                             <a class="label arf-inverse-danger delete"  href='<?php echo base_url(); ?>category/category/delete_badge/<?php echo $category['id']; ?>?table=<?php echo base64_encode('denominations'); ?>'><i title="edit" class="ti-trash"></i></a>
                                            

                                            
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
