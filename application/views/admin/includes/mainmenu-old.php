 <?php
if(!empty($this->uri->segment(4)))
{

$switching=$this->uri->segment(4);
$categories=$this->uri->segment(5);


}
$page=$this->uri->segment(3);
$ctrler=$this->uri->segment(2);

?>
 <section>
          <div class="container navigation-cont-wrap">
            <nav id="navigation-bar" class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="nav-link-wrpa">

                  <div id="yy" ></div>
                  <?php if(!empty($switchid) || !empty($switching))
                    {
                      ?>
                <ul class="navbar-nav">
                  <?php 
                  if(!empty($switching)) {
                  $data['count']=$this->Create_Model->selectProfileStatus(base64_decode($switching)); }
                  else {
                    $data['count']=$this->Create_Model->selectProfileStatus(base64_decode($switchid)); 
                  }

                   $percentage=(100/27)*$data['count'];                         
                        if(round($percentage)>96)
                           { 
                      ?>
                   <li class="nav-item">
                    <a class="nav-link" id="dash-link" href="<?php echo base_url('supplier/create/storefrontDashboard/'.$switching)?>">Dashboard</a>
                    <?php if($page=='storefrontDashboard'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                    <div class="linkline"></div>
                  </li>

                   <?php } else { ?>

                        <li class="nav-item">
                    <a class="nav-link" id="dash-link" href="#">Dashboard</a>
                    <?php if($page=='storefrontDashboard'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                    <div class="linkline"></div>
                  </li>

                   <?php } ?>
                  <?php if($ctrler=='create' && $page!='storefrontDashboard' ){ ?>
                  <li class="nav-item active" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link"  href="<?php echo base_url('supplier/create/addStoreFront/'.$switching.'/'.$categories)?>">Basic Info</a>
                     <?php if($page=='addStoreFront'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                  <li class="nav-item" id="dash-link-sub">
                    <!--<i class='fas fa-book-open'></i> -->
                   <a class="nav-link list" id="dash-link-sub-link" href="<?php echo base_url('supplier/create/promoinfo/'.$switching.'/'.$categories)?>">Public Promo</a>
                   <?php if($page=='promoinfo'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                  <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/create/add_bankdetail/'.$switching.'/'.$categories)?>">Bank Info</a>
                   <?php if($page=='add_bankdetail'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                 
                    <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/create/add_productpackages/'.$switching.'/'.$categories)?>">Products</a>
                   <?php if($page=='add_productpackages'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                   <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/create/photo/'.$switching.'/'.$categories)?>">Gallery</a>
                   <?php if($page=='photo'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>

                 <!--   <li class="nav-item dropdown" id="dash-link-sub">
                    <a class="nav-link dropdown-toggle dash-link-sub-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      
                    </a>
                   <?php if($page=='photo' || $page=="video"){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <div>
                      <a class="dropdown-item" id="dash-link-sub-link" href="<?php echo base_url('supplier/create/photo/'.$switching.'/'.$categories)?>">Photo Gallery</a>
                      </div>
                      <a class="dropdown-item" href="<?php echo base_url('supplier/create/video/'.$switching.'/'.$categories)?>">Video Gallery</a>
                     
                    </div>
                  </li> -->
                <?php } else if($ctrler=='edit' || $ctrler=='supplier' || $ctrler=='calendar' ||  $page=='storefrontDashboard'){ ?>

                    <li class="nav-item active" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link"  href="<?php echo base_url('supplier/edit/lead_list/'.$switching) ?>">Leads</a>
                    <?php if($page=='lead_list'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                  <li class="nav-item" id="dash-link-sub">
                    <!--<i class='fas fa-book-open'></i> -->
                   <a class="nav-link list" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/booked_Lead_list/'.$switching) ?>">Booking</a>
                    <?php if($page=='booked_Lead_list'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                  <!-- <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="#">Messages</a>
                    <?php if($page=='message'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li> -->
                  <li class="nav-item dropdown" id="dash-link-sub">
                    <a class="nav-link dropdown-toggle dash-link-sub-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Business Info
                    </a>
                    <?php if($page=='editBusinessInfo' || $page=='edit_promo_info' || $page=='update_bankdetail'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <div>
                      <a class="dropdown-item" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/editBusinessInfo/'.$switching) ?>">Basic Info</a>
                      </div>
                  <a class="dropdown-item" href="<?php echo base_url('supplier/edit/edit_promo_info/'.$switching) ?>">Public Promo</a>
                      <a class="dropdown-item" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/update_bankdetail/'.$switching) ?>">Bank Info</a>
                    </div>
                  </li>
                    <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/update_productpackages/'.$switching) ?>">Products</a>
                     <?php if($page=='update_productpackages'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>

                   <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/edit_photo_gallery/'.$switching)?>">Gallery</a>
                   <?php if($page=='edit_photo_gallery'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                      <!-- <li class="nav-item dropdown" id="dash-link-sub">
                    <a class="nav-link dropdown-toggle dash-link-sub-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Gallery
                    </a>
                   <?php if($page=='edit_photo_gallery' || $page=="edit_video_gallery"){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <div>
                      <a class="dropdown-item" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/edit_photo_gallery/'.$switching.'/'.$categories)?>">Photo Gallery</a>
                      </div>
                      <a class="dropdown-item" href="<?php echo base_url('supplier/edit/edit_video_gallery/'.$switching.'/'.$categories)?>">Video Gallery</a>
                     
                    </div>
                  </li> -->



                  
                  <?php } ?>
                    <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/calendar/lists/'.$switching) ?>">Calendar</a>
                   <?php if($page=='lists'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                
                  </li>
                  <?php if($ctrler=='edit' || $ctrler=='supplier' || $ctrler=='calendar' ||  $page=='storefrontDashboard'){ ?>
                   <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/listOfReviews/'.$switching) ?>">Reviews</a>
                     <?php if($page=='listOfReviews'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                    <!-- <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/editBusinessInfo/'.$switching) ?>">Stats</a>
                     <?php if($page=='update_productpackages'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li> -->
                    
                   <?php } ?>
                   
                    <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo site_url('supplier/supplier/badge/'.$switching); ?>">Badges</a>
                   <?php if($page=='badge'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                  <?php if($ctrler=='edit' || $ctrler=='supplier' || $ctrler=='calendar' ||  $page=='storefrontDashboard'){ ?>
                   <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo base_url('supplier/edit/article/'.$switching) ?>">Articles</a>
                     <?php if($page=='article'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                <?php } ?>
                <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo site_url('supplier/logout'); ?>">Logout</a>
                    <div class="linkline"></div>
                  </li>
                </ul>
                 <?php } else { ?>


                    <ul class="navbar-nav" id="maintabbar">
                   <li class="nav-item">
                    <a class="nav-link" id="dash-link" href="<?php echo base_url('Supplier/OVDashboard/')?>">Dashboard</a>
                      <?php if($page==''){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>  
                  </li>
                  
                  <li class="nav-item active" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link"  href="<?php echo base_url('supplier/create/addStoreFront/')?>">Create New StoreFront</a>
                     <?php if($page=='addStoreFront'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>
                   <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo site_url('supplier/supplier/change_password'); ?>">Change Password</a>
                     <?php if($page=='change_password'){ ?><div class="line"></div> <?php }else { ?> <div class="linkline"></div><?php } ?>
                  </li>

                  <li class="nav-item" id="dash-link-sub">
                    <a class="nav-link" id="dash-link-sub-link" href="<?php echo site_url('supplier/logout'); ?>">Logout</a>
                    <div class="linkline"></div>
                  </li>

                  </ul>




                 <?php } ?>
            </div>
            </div>
              </div>
            </nav>
           </div>
        </section>