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
                    <h4>Edit Question</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>question/questions/">Question</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Question</a>
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
                                <a href="<?php echo base_url(); ?>question/questions/" class="btn btn-success"><i class="ti-menu-alt"></i> Question List</a>
                            </div>
                            <label class="col-sm-10 col-form-label"></label>
                            
                        </div>

                <div class="card-header">
                    <h5>Edit Question</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <?php echo form_open_multipart('question/questions/editQuestion/'.$ques[0]->id); ?>
                       <span class="input-error" style="display:none"><?php echo $this->session->flashdata('err'); ?></span>
                       <br><br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control" required>
                                	<option value="<?php echo $ques[0]->cat_id; ?>"><?php echo $ques[0]->category; ?></option>
                                   
                                    <?php foreach ($cat as $c)
                                    {
                                    	if($c->cat_id!=$ques[0]->cat_id)
                                    	{
                                        echo "<option value='".$c->cat_id."'>".$c->category."</option>";
                                    } } ?>
                               </select>
                                 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10">
                                <input type="text" name="question" class="form-control" placeholder="Type Question" value="<?php echo $ques[0]->question; ?>"" required>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Select Type</label>
                            <div class="col-sm-10">
                                <select name="ques_type" class="form-control" id="ques_type" required>
                                	<?php 
	                                	switch($ques[0]->ques_type)
	                                	{
	                                		case "checkbox" :
                                	?>		
                                    
	                                    <option value="checkbox">Checkbox</option>
	                                    <option value="numeric">Numeric</option>
	                                    <option value="radio">Radio</option>
	                                    <option value="text">Text</option>
                                    <?php

                                    	break;
                                    	case "numeric" :
                                    ?>
	                                   
	                                    <option value="numeric">Numeric</option>
	                                    <option value="checkbox">Checkbox</option>
	                                    <option value="radio">Radio</option>
	                                    <option value="text">Text</option>

	                                <?php
                                     
                                    	break;
                                    	case "radio" :
                                    ?>	
                                    	<option value="radio">Radio</option>
                                    	<option value="checkbox">Checkbox</option>
	                                    <option value="numeric">Numeric</option>
	                                    <option value="text">Text</option>
	                                 <?php
                                     
                                    	break;
                                    	case "text" :
                                    ?>
                                    	<option value="text">Text</option>
										<option value="checkbox">Checkbox</option>
	                                    <option value="numeric">Numeric</option>
	                                    <option value="radio">Radio</option>
	                                <?php
	                                    break;
	                                    default:
	                                  ?>  
	                                     <option value="">Select</option>
	                                     <option value="checkbox">Checkbox</option>
	                                    <option value="numeric">Numeric</option>
	                                    <option value="radio">Radio</option>
	                                    <option value="text">Text</option>
	                                <?php    
	                                }
	                                ?>
	                                    	    

                               </select>
                                
                            </div>
                        </div> 

                         <?php  if(!empty($ques[0]->answer))
                                {  ?>


                               <div class="form-group row" id="ques_answer">
                            <label class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                 <input type="text" name="answer"  class="form-control" placeholder="Type Answer" value="<?php echo $ques[0]->answer ; ?>" >
                                 <span style="color: red">(Answers are seperated with " <> ". Example : Yes<>No )</span>
                                 
                            </div>
                        </div>
                                   
                                <?php } else{ ?>
                       
                       <div class="form-group row" id="ques_answer" style="display: none;">
                            <label class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                 <input type="text" name="answer"  class="form-control" placeholder="Type Answer" >
                                 <span style="color: red">(Answers are seperated with '<>')</span>
                                 
                            </div>
                        </div>
                        <?php } if($ques[0]->ques_type=="checkbox")
                        {
                            ?>
                             <div class="form-group row"  id="mustreq" style="display: none">
                                <?php 
                        }
                        else
                        {
                            ?>
                        
                        <div class="form-group row" id="mustreq">
                            <?php 
                        }
                        ?>
                        
                            <label class="col-sm-2 col-form-label">Reqiured</label>
                            <div class="col-sm-10">
                                <select name="reqi" class="form-control">
                                    <?php  if(($ques[0]->must_required)=="reqiured")
                                {  ?>

                                    
                                    <option value="reqiured">Required</option>
                                    <option value="not">Non Required</option>
                                    <?php 
                                }else {
                                ?>

                                    <option value="not">Non Required</option>
                                     <option value="reqiured">Required</option>
                            <?php } ?>
                                   
                               </select>
                                 
                            </div>
                        </div> 
                       
                       
                        
                       <!--  <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                            <div class="col-sm-3">
                                <input type="checkbox" value="1" name="status" class="js-single" checked />
                            </div>
                        </div> -->
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary" >Update</button>
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
