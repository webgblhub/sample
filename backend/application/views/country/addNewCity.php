<link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">
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
<!-- Page header start -->
<div class="page-header">
                <div class="page-header-title">
                    <h4>Add City</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Add City</a>
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

                <br><br>
                    <div class="form-group row">
                        <div class="col-sm-2">
                                <a href="<?php echo base_url(); ?>country/state/listofCity/<?php echo $state[0]->id; ?>" class="btn btn-success"><i class="ti-menu-alt"></i> City List</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                            
                        </div>

                <div class="card-header">
                    <h5>Add City</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('country/state/addCity/'); ?>
                       <span class="input-error" style="display:none"><?php echo $this->session->flashdata('err'); ?></span>
                       <br><br>
                        <!-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">State Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" id="statecode" class="form-control" placeholder="Type State Code" value="<?php echo $state[0]->iso2; ?>">
                                 <span id="avilable"></span>
                            </div>
                        </div>  -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                                <select name="state" class="form-control" required>
                                  <option value="<?php echo $state[0]->id; ?>"><?php echo $state[0]->name; ?></option> 
                                  <?php foreach($other as $o) { 
                                    if($o->name!= $state[0]->name)
                                    {
                                        ?>
                                        <option value="<?php echo $o->id; ?>"><?php echo $o->name; ?></option> 
                                    <?php } } ?>
                                </select>
                            </div>
                        </div> 

                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" class="form-control" placeholder="Type City" required>
                            </div>
                        </div> 

                         
                        
                        
                        
                       <!--  <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                            <div class="col-sm-3">
                                <input type="checkbox" value="1" name="status" class="js-single" checked />
                            </div>
                        </div>
                         -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
