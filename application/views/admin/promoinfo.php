 <form enctype="multipart/form-data" method="post" action="<?php echo base_url('supplier/create/add_promoinfo'); ?>">

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
               <?php if($available=='1')
                {
                    ?>
              <div class="checkbox-wrap">

                <input type="checkbox" id="same" name="same" value="1" onclick="sameBusiness(this)" />
                <label>Use Same Promo Info</label>
               </div>
                <?php  } ?>
                <input type="hidden" name ="supplier_id" value="<?php echo $supplier_id ?>">
                   <input type="hidden" name ="switch_id" value="<?php echo $switch_id ?>">
                   <input type="hidden" name ="category_id" value="<?php echo $category_id ?>">
                   <div id="chk">
               <div class="input-section">
                 <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                     <label>BUSINESS NAME</label><br>
                     <input type="text" placeholder="Business Name" class="inp test-id-inp" name="bus_name" value="<?php echo @$promo_data->business_name ?>">
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BUSINESS DETAIL</label><br>
                    <input type="text" placeholder="Business Detail" class="inp test-id-inp" name="bus_detail" value="<?php echo @$promo_data->description ?>">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>PERSONAL BIO</label><br>
                    <input type="text" placeholder="Personal Bio"  class="inp test-id-inp-bio" name="bio" value="<?php echo @$promo_data->personal_bio ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-cont-wrap-col test-id-inp-div">
                    <label>PERSONAL PHOTO</label><br>
                    <?php if(!empty($promo_data->photo)){ ?>
                    
                    <input type="file" placeholder="Personal Photo" class="inp test-id-inp-file" name="personal_photo" id="personal" ><br>
                    <a href="<?php echo base_url('uploads/'.$promo_data->photo) ?>" class="img-choose-link">View Personal Photo</a>
                     <?php } else{?>
                       <input type="file" placeholder="Personal Photo" class="inp test-id-inp-file" name="personal_photo" id="personal" ><br>
                       <?php } ?>
                </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>BUSINESS FBLINK</label><br>
                   <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="fb" value="<?php echo @$promo_data->fb ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>LINKEDIIN</label><br>
                    <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="linkedin" value="<?php echo @$promo_data->linkedin ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>INSTAGRAM LINK</label><br>
                   <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="insta" value="<?php  echo @$promo_data->instagram ?>" data-toggle="tooltip" data-placement="top" title="Only allow www">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>TWITTER</label><br>
                    <input type="text" placeholder="www.google.com" class="inp test-id-inp" name="tweet" value="<?php echo @$promo_data->twitter ?>"  data-toggle="tooltip" data-placement="top" title="Only allow www">
                  </div>
                </div>
               </div>
             </div>



                 <div id="chk1" style="display: none;">
                  <?php if(!empty($promo))
   { ?>

               <div class="input-section">
                 <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                     <label>BUSINESS NAME</label><br>
                     <input type="text" placeholder="Business Name" class="inp test-id-inp" name="business_name1" value="<?php echo $promo['0']->business_name ?>" >
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BUSINESS DETAIL</label><br>
                    <input type="text" placeholder="Business Detail" class="inp test-id-inp" name="description1" value="<?php echo $promo['0']->description ?>">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>PERSONAL BIO</label><br>
                    <input type="text" placeholder="Personal Bio"  class="inp test-id-inp-bio" name="personal_bio1" value="<?php echo $promo['0']->personal_bio ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-cont-wrap-col test-id-inp-div">
                    <label>PERSONAL PHOTO</label><br>
                    <input type="file" placeholder="Personal Photo" class="inp test-id-inp-file" name="photo1" ><br>
                    <?php if(!empty($promo->photo)){ ?>
                    <a href="<?php echo base_url('uploads/'.$promo->photo) ?>" class="img-choose-link">View Personal Photo</a>
                  <?php } ?>
                </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>BUSINESS FBLINK</label><br>
                   <input type="text" placeholder="www.google.com" name="fb1" value="<?php echo $promo['0']->fb ?>" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>LINKEDIIN</label><br>
                    <input type="text" name="linkedin1" placeholder="www.google.com" value="<?php echo $promo['0']->linkedin ?>" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>INSTAGRAM LINK</label><br>
                   <input type="text" placeholder="www.google.com" name="instagram1" value="<?php echo $promo['0']->instagram ?>" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>TWITTER</label><br>
                    <input type="text" placeholder="www.google.com" name="twitter1" value="<?php echo $promo['0']->twitter ?>" data-toggle="tooltip" data-placement="top" title="Only allow www" class="inp test-id-inp">
                  </div>
                </div>
               </div>
             <?php } ?>
             </div>

             <?php if(count( $category_questions)>0) {
        ?>

             <div class="cont-sec-wrap">
          <div class="container page-cont-container questioncontainer">
            <div class="header-sec">
              <h5>Questions </h5>
            </div>
          </div>
        </div>
         <div class="row">
        <?php

                                    //print_r($questions);die;
                                    foreach ($category_questions as $key => $ques) {
                                      // code...
                                     ?>
                 
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label><?php echo $ques->question; ?></label><br>
                     <?php $quesType = isset($ques->ques_type)?$ques->ques_type:'';

                     if($ques->ques_type=='text'){ ?>
                    
                        <input type="text" <?php echo $ques->ques_type; ?> name="txt-<?php echo $ques->id; ?>" id="answer"  placeholder="Answer"  value="" <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> class="inp test-id-inp">
                    <?php } ?>
                    <?php
                      if($ques->ques_type=='numeric'){ ?>

                          <input type="number" name="num-<?php echo $ques->id; ?>" <?php echo $ques->ques_type; ?> id="answer"  placeholder="Answer"  value="" <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> class="inp test-id-inp">

                     <?php } ?>
                     <?php  if($ques->ques_type=='radio' ){ ?>

                    <?php
                        $chkbox=explode("<>",$ques->answer);
                        for($i=0;$i<count($chkbox);$i++) {  ?>

                          <input type="radio" name="ans-<?php echo $ques->id; ?>" <?php echo $ques->ques_type; ?> value="<?php echo $chkbox[$i] ?>" <?php if($ques->must_required=="reqiured"){ ?> required <?php } ?> />

                    <?php echo $chkbox[$i] ?>
                    <?php } ?>
                    <?php } ?>
                    <?php  if($ques->ques_type=='checkbox' ){ ?>
                    <?php
                      $chkbox=explode("<>",$ques->answer);
                     for($i=0;$i<count($chkbox);$i++) { ?>

                           <div class="checkbox-wrap-cont check-header">
                              <input type="checkbox" name="chk<?php echo $ques->id; ?>[]" value="<?php echo $chkbox[$i] ?>" /><?php echo $chkbox[$i] ?> &nbsp;&nbsp;
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
              <a href=""><button class="nxt-button" name="submit">SAVE & NEXT</button></a> 
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
  