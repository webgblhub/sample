<?php
$id=$this->session->userdata('supplier_id');
$store=$this->Supplier_Model->selectStoreFront($id);
$t=0;
//print_r($store);die;
 foreach($store as $std)
      {

         $data['count'][$t]=$this->Create_Model->selectProfileStatus($std->storeid);
         $t++;

      } 

$c=count($store);


?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php if($this->uri->segment(2)!="calendar" && $this->uri->segment(3)!="photo" && $this->uri->segment(3)!="edit_photo_gallery") { ?>

    <!-- Bootstrap CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    -->

     <!-- bootstrap css local-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap.min.css">

    <!-- bootstrap js local -->
    <script src="<?php echo base_url(); ?>assets/supplier/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/style.css">

     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/dataTables.bootstrap4.min.css">



    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/jquery.fancybox.min.css"/>
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/successtag.css"/>

    <!-- FontAwsome CDN-->
    
    <link rel="<?php echo base_url(); ?>assets/supplier/css/font-awesome.min.css">

    <!-- Font Awsome CDN-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap-font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Emoji css------------------------->

     <link href="<?php echo base_url(); ?>assets/supplier/lib/css/emoji.css" rel="stylesheet">
    <!-- script icon -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
      <?php
  }
  else if($this->uri->segment(3)=="photo" || $this->uri->segment(3)=="edit_photo_gallery"){ ?>


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/successtag.css"/>

     <!-- FontAwsome CDN-->
    
    <link rel="<?php echo base_url(); ?>assets/supplier/css/font-awesome.min.css">

    <!-- Font Awsome CDN-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap-font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

     <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>



  <?php }
    
  else
  {
  ?>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/successtag.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/supplier/css/bootstrap.min.css">


  <?php
  }
  ?>

    <title><?php if(!empty($title)) { echo "EventsDragon - Supplier - ".$title; } else { echo "EventsDragon - Supplier" ; } ?></title>
  </head>
  <body>
      <main>
        <header>
          <div class="container nav-cont">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="logo">
                  <a href="<?php echo base_url('supplier/create/')?>"><img src="<?php echo base_url(); ?>uploads/logo/EDC_Logo_w_Tag_Horizontal.png"></a>
                </div>
              </div> 

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <?php if($c>0) {?>
                <div class="header-fext-wrap">
                   
                  <label class="label-text topselect">Your business type</label>
                  <div class="top-res-flex-wrp-container">
                  <div class="sect-header">
                    <?php if($c>1)
                      {
                        ?>
                    <select class="top-nav-inp" onChange="location = this.options[this.selectedIndex].value;">
                      <option id="header-opt" value="<?php echo base_url('Supplier/OVDashboard/')?>">StoreFront List</option>
                      <?php 
                      $i = 1;
                        foreach($store as $st)
                        {
                          

                           $percentage=(100/27)*$data['count'][$i-1]; 
                           // if(round($percentage)>96)
                           // { 
                        
                        ?> 
                       <option  value=" <?php echo base_url(); ?>supplier/create/storefrontDashboard/<?php echo base64_encode($st->storeid); ?>" <?php if(!empty($this->uri->segment(4)) && base64_decode($this->uri->segment(4))== $st->storeid) { echo "selected"; } ?>  <?php if(round($percentage)==100) { echo "class='completed'" ;} ?>  ><?php echo $st->category . " &nbsp;&nbsp;  -&nbsp;&nbsp;   ".round($percentage).""; ?></option>
                        
                        <?php 
                     /* }

                      else {  */ ?>

                                <!--   <option  value=" <?php echo base_url(); ?>supplier/edit/editBusinessInfo/<?php echo base64_encode($st->storeid); ?>" <?php if(!empty($this->uri->segment(4)) && base64_decode($this->uri->segment(4))== $st->storeid) { echo "selected"; } ?>  <?php if(round($percentage)==100) { echo "class='completed'" ;} ?>  ><?php echo $st->category . " &nbsp;&nbsp;  -&nbsp;&nbsp;   ".round($percentage).""; ?></option> --> <?php// } ?>

                      <?php $i++;  } ?></select>
                      <?php } 
                              else if($c==1)
                              {
                           //       $percentage=(100/27)*$data['count'][0]; 

                           //       if(round($percentage)>96)
                           // { 
                                echo "<a href='".base_url('supplier/create/storefrontDashboard/'.base64_encode($store[0]->storeid))."'><label class='label-text indivudalstore'> is ".$store[0]->category." &nbsp;&nbsp;  -&nbsp;&nbsp;   ".round($percentage)."</label></a>";
                            //   }
                            
                            // else
                            // {

                            //    echo "<a href='".base_url('supplier/edit/editBusinessInfo/'.base64_encode($store[0]->storeid))."'><label class='label-text indivudalstore'> is ".$store[0]->category." &nbsp;&nbsp;  -&nbsp;&nbsp;   ".round($percentage)."</label></a>";
                            // }
                            }
                        ?>
                   
                  
                  </div>

                  <div class="user-prof-sec-container">
                  <div class="top-user-icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>

                  <div class="top-user-list-sec-container">
                    <ul>
                      <li><a class="log-out-top-sec user-tag-sec" href="<?php echo site_url('supplier/supplier/change_password'); ?>">
                      
<i class="fas fa-lock"></i>
                     Change Password</a></li>
                      <li><a class="log-out-top-sec user-tag-sec" href="<?php echo site_url('supplier/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                  </div>
                  </div> 
                </div>
                </div> 
                <?php } ?>   
              </div>
                </div>
               </div>
           </div>
        </header>