<?php if(!empty($categoryname[0]->company_name)){
            $companyName = '-'.$categoryname[0]->company_name;
     }else{
            $companyName = '';
 } 

 $id=base64_decode($this->uri->segment(4));
$data['sup']=$this->Edit_Model->selectSupplierid($id);
 $store_id= $data['sup'][0]->id;

 ?>


  <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <label>Edit Basic Info</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-wrap2">
                    <label><?php echo $categoryname[0]->category.$companyName; ?></label>
                  </div>
                </div>
              </div>
            </div>
         </div>

              <form enctype="multipart/form-data" method="post" action="<?php echo base_url('supplier/edit/edit_promoinfo'); ?>">

           <section class="cont-sec-wrap">
          <div class="container page-cont-container">
            <div class="header-sec">
              <h5>PUBLIC PROMO </h5>
            </div>
          </div>
        </section>
 <section>

  <?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>
         
          <div class="container container-contents-wrap">
            
            
            <div class="input-element-wrap">
               <?php if(!empty($promo_user_data))
                {
                    ?>
              <div class="checkbox-wrap">

                <input type="checkbox" id="same" name="same" value="1" onclick="sameBusiness(this)" />
                <label>Use Same Promo Info</label>
               </div>
                <?php  } ?>
                
                <input type="hidden" name="supplier_id" id="en_title" class="form-control" <?php if($get_promo_data) {?> value=<?php echo $get_promo_data->supplier_id;} else { ?> value=<?php echo $data['sup'][0]->supplier_id;}?> >
                <input type="hidden" name="category_id" id="en_title" class="form-control" <?php if($get_promo_data) {?>  value=<?php echo $get_promo_data->category_id ;} else { ?> value=<?php echo $data['sup'][0]->category_id;}?> >
                <input type="hidden" name="store_id" id="en_title" class="form-control" <?php if($get_promo_data) {?>  value=<?php echo $get_promo_data->switch_id ;}else { ?> value=<?php echo $data['sup'][0]->id;}?> >

                   <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">


                   <div id="chk">
               <div class="input-section">
                 <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                     <label>BUSINESS NAME</label><br>
                     <input type="text" placeholder="Business Name" class="inp test-id-inp" name="business_name" value="<?php if(!empty($get_promo_data)){ echo $get_promo_data->business_name ; } ?>">
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BUSINESS DETAIL</label><br>
                    <input type="text" placeholder="Business Detail" class="inp test-id-inp" name="busines_detail" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->description;} ?>">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>PERSONAL BIO</label><br>
                    <input type="text" placeholder="Personal Bio"  class="inp test-id-inp-bio" name="personal_bio" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->personal_bio ;} ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-cont-wrap-col test-id-inp-div">
                    <label>PERSONAL PHOTO</label><br>
                   
                    
                    <input type="file" placeholder="Personal Photo" class="inp test-id-inp-file" name="personal_photo" id="personal" ><br>
                    <?php if($get_promo_data){?>
                          <?php if($get_promo_data->photo){?>
                    <a href="<?php echo base_url('uploads/'.$get_promo_data->photo)?>" class="img-choose-link">View Personal Photo</a>
                     <input type="hidden" name="imgg" value="<?php echo $get_promo_data->photo; ?>">
                          <?php }} ?>
                </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>BUSINESS FBLINK</label><br>
                   <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="fb_link" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->fb;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>LINKEDIIN</label><br>
                    <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="linked_in" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->linkedin;}?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>INSTAGRAM LINK</label><br>
                   <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="insta_link" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->instagram;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>TWITTER</label><br>
                    <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="twitter_link" <?php if($get_promo_data){ ?> value="<?php echo $get_promo_data->twitter;} ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                  </div>
                </div>
               </div>
             </div>



                 <div id="chk1" style="display: none;">
                  <?php if(!empty($promo_user_data))
   { ?>

               <div class="input-section">
                 <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                     <label>BUSINESS NAME</label><br>
                     <input type="text" placeholder="Business Name" class="inp test-id-inp" value="<?php echo $promo_user_data[0]->business_name;?>" name="business_name1" >
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BUSINESS DETAIL</label><br>
                    <input type="text" placeholder="Business Detail" class="inp test-id-inp" value="<?php echo $promo_user_data[0]->description;?>" name="description1">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>PERSONAL BIO</label><br>
                    <input type="text" placeholder="Personal Bio"  class="inp test-id-inp-bio" name="personal_bio1" value="<?php echo $promo_user_data[0]->personal_bio;?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-cont-wrap-col test-id-inp-div">
                    <label>PERSONAL PHOTO</label><br>
                    
                    <input type="file" placeholder="Personal Photo" class="inp test-id-inp-file" name="photo1" ><br>
                    <?php if(!empty($promo_user_data[0]->photo)){ ?>
                    <a href="<?php echo base_url('uploads/'.$promo_user_data[0]->photo) ?>" class="img-choose-link">View Personal Photo</a>
                  <?php } ?>
                </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>BUSINESS FBLINK</label><br>
                   <input type="text" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->fb;?>" name="fb1" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>LINKEDIIN</label><br>
                    <input type="text" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->linkedin;?>" name="linkedin1" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>INSTAGRAM LINK</label><br>
                   <input type="text" placeholder="www.google.com"  class="inp test-id-inp" value="<?php echo $promo_user_data[0]->instagram;?>" name="instagram1" data-toggle="tooltip" data-placement="top" title="Only allow www">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>TWITTER</label><br>
                    <input type="text" placeholder="www.google.com" value="<?php echo $promo_user_data[0]->twitter;?>" name="twitter1" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                  </div>
                </div>
               </div>
             <?php } ?>
             </div>

             <?php if(!empty($category_questions)){ ?>  

             <div class="cont-sec-wrap">
          <div class="container page-cont-container questioncontainer">
            <div class="header-sec">
              <h5>Questions </h5>
            </div>
          </div>
        </div>
         <div class="row">
        <?php

                                    //print_r($category_questions);die;
                                    foreach ($category_questions as $key => $ques) {
                                      // code...
                                     ?>
                 
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label><?php echo $ques->question; ?></label><br>
                     <?php
                                        $quesType = isset($ques->ques_type)?$ques->ques_type:'';

                                        //print_r($answers);die;
                    
                                        if($ques->ques_type=='text'){

                                          ?>
                    
                        <input type="text" <?php echo $ques->ques_type; ?> name="txt-<?php echo $ques->id; ?>" id="answer"  placeholder="Answer"  value="<?php echo @$ques->qanswer ?>" <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> class="inp test-id-inp">
                    <?php } ?>
                                      <?php
                                      if($ques->ques_type=='numeric'){

                                          ?>

                          <input type="number" name="num-<?php echo $ques->id; ?>" <?php echo $ques->ques_type; ?> id="answer"  placeholder="Answer"  value="<?php echo @$ques->qanswer  ?>" <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> class="inp test-id-inp">

                    <?php } ?>
                                    <?php  if($ques->ques_type=='radio' ){
                                       ?>

                                        <?php

                                          
                     $chkbox=explode("<>",$ques->answer);
                     $ansbox=explode("<>",@$ques->qanswer);
                     for($i=0;$i<count($chkbox);$i++) {
                                                                     ?>
<input type="radio"  name="ans-<?php echo @$ques->id; ?>" <?php echo $ques->ques_type; ?> value="<?php echo $chkbox[$i] ?>" <?php if(in_array($chkbox[$i],$ansbox)) { ?> checked="checked"<?php } ?> <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> /><?php echo $chkbox[$i] ?>
<?php } ?>
                                    <?php } ?>
                                    <?php  if($ques->ques_type=='checkbox' ){

                                       ?>

                                        <?php

                                          
                     $chkbox=explode("<>",$ques->answer);
                     $ansbox=explode("<>",@$ques->qanswer);
                     for($i=0;$i<count($chkbox);$i++) {
                       
                                                                      ?>

                           <div class="checkbox-wrap-cont check-header">
                              <input type="checkbox" name="chk<?php echo $ques->id; ?>[]" value="<?php echo @$chkbox[$i] ?>" <?php if(in_array($chkbox[$i],$ansbox)) { ?> checked="checked"<?php } ?> /><?php echo $chkbox[$i] ?> &nbsp;&nbsp;
                         </div>
                  <?php } ?>
                                    <?php } ?>

                  </div>
               

                 <?php } ?>
                <?php } ?>
 </div>

            </div>
          </div>
          <div class="container footer-button-container footer-top-button-container">
            <div class="footer-button">
              <a href=""><button class="nxt-button" name="submit">UPDATE</button></a> 
             </div>
           </div> 
        </section>
      </form>


<script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>

      <script type="text/javascript">
      
      function sameBusiness(chk)
 {
  

     if(chk.checked == true)
    {
      
       $("#chk").hide();
       $("#chk1").show();

    }
    else
    {
     
        $("#chk").show();
        $("#chk1").hide();
    }
 } 

  </script>
  