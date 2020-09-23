<?php
 if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true) {
      redirect('administrator/index');
    }
 $cur_page =  $this->uri->segment(2);

 ?>

     <!-- Menu aside start -->
    <div class="main-menu"  style="height: 900px !important;">
        <div class="main-menu-header">
           <ul class="nav-left-new">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-user   "></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-settings"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-email"></i>
                            </a>
                        </li>
                   
                    </ul>
        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
             <li class="nav-item <?php if($cur_page=="dashboard") { ?>  has-class <?php } ?> ">
                    <a href="<?php echo base_url(); ?>administrator/dashboard">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <!-- <li class="nav-item">
                    <a href="#!">
                        <i class="ti-location-pin"></i>
                        <span>Districts</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>district/add">Add District</a></li>
                        <li><a href="<?php echo base_url(); ?>district/lists">Districts</a></li>
                    </ul>
                </li> -->
                 <li class="nav-item <?php if($cur_page=="state") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-location-pin"></i>
                        <span>State</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>country/state/addState">Add State</a></li>
                        <li><a href="<?php echo base_url(); ?>country/state/">State List</a></li>
                        
                    </ul>
                </li>

                <li class="nav-item  <?php if($cur_page=="supplier") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-user"></i>
                        <span>Suppliers</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>supplier/supplier/add">Add Supplier</a></li>
                        <li><a href="<?php echo base_url(); ?>supplier/supplier/lists">List Supplier</a></li>
                    </ul>
                </li>
                
                <!--<li class="nav-item  <?php if($cur_page=="client") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-user"></i>
                        <span>Clients</span>
                    </a>
                    <ul class="tree-1">
                        <?php /*?><li><a href="<?php echo base_url(); ?>client/supplier/add">Add Client</a></li><?php */?>
                        <li><a href="<?php echo base_url(); ?>client/profile/lists">List Client</a></li>
                    </ul>
                </li> -->
                
                <li class="nav-item <?php if($cur_page=="category") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>category/category/supplier_category_lists">Supplier Category</a></li>
                        <li><a href="<?php echo base_url(); ?>category/category/business_category_lists">Business Category</a></li>
                        <li><a href="<?php echo base_url(); ?>category/category/consumer_category_lists">Consumer Category</a></li>
                        <li><a href="<?php echo base_url(); ?>category/category/badge_lists">Badge</a></li>

			<li><a href="<?php echo base_url(); ?>category/category/mail_lists">Mail Templates</a></li>
             <li><a href="<?php echo base_url(); ?>category/category/message_lists">Messages</a></li>
 
                    </ul>
                </li>
                 <li class="nav-item  <?php if($cur_page=="questions") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-help"></i>
                        <span>Question</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>question/questions/addQuestion">Add Questions</a></li>
                        <li><a href="<?php echo base_url(); ?>question/questions/">Question List</a></li>

                    </ul>
                </li>

                <li class="nav-item <?php if($cur_page=="cultural_speciality") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-shine"></i>
                        <span>Cultural Specialities</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>cultural_speciality/cultural_speciality/lists">Cultural Specialities List</a></li>
                        <li><a href="<?php echo base_url(); ?>cultural_speciality/cultural_speciality/add">Add Cultural Speciality</a></li>
                    


                        
                    </ul>
                </li>
                
                <li class="nav-item <?php if($cur_page=="language_spoken") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-flag-alt"></i>
                        <span>Language</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>language_spoken/language_spoken/lists">Language Spoken List</a></li>
                        <li><a href="<?php echo base_url(); ?>language_spoken/language_spoken/add">Add Language Spoken</a></li>
                    


                        
                    </ul>
                </li> 

                <li class="nav-item <?php if($cur_page=="sports_category") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-basketball"></i>
                        <span>Sports Category</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>sports_category/sports_category/lists">Sports Category List</a></li>
                        <li><a href="<?php echo base_url(); ?>sports_category/sports_category/add">Add Sports Category</a></li>
   
                    </ul>
                </li>    
                    
                <li class="nav-item <?php if($cur_page=="denomination") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-world"></i>
                        <span>Denomination</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>denomination/denomination/lists">Denomination List</a></li>
                        <li><a href="<?php echo base_url(); ?>denomination/denomination/add">Add Denomination</a></li>
   
                    </ul>
                </li>    
                <li class="nav-item <?php if($cur_page=="article") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-book"></i>
                        <span>Articles</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>article/article/lists">Article List</a></li>
                        <li><a href="<?php echo base_url(); ?>article/article/add">Add Article</a></li>
   
                    </ul>
                </li>   
                 <li class="nav-item <?php if($cur_page=="discountType") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-bar-chart-alt"></i>
                        <span>Discount</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>discount/discountType/">Discount List</a></li>
                        <li><a href="<?php echo base_url(); ?>discount/discountType/addDiscount">Add Discount</a></li>
                    


                        
                    </ul>
                </li>    
                    <li class="nav-item <?php if($cur_page=="lists") { ?>  has-class <?php } ?>">
                    <a href="#!">
                        <i class="ti-bar-chart-alt"></i>
                        <span>Payment Methods</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>payment/lists/">Payment Method List</a></li>
                        <li><a href="<?php echo base_url(); ?>payment/add/">Add Payment Method</a></li>
                    


                        
                    </ul>
                </li>
                    
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->
     <!-- Main-body start -->
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->

    <?php if($this->session->flashdata('success')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
    <?php endif; ?>

     <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('match_old_password')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?>
    <?php endif; ?>


     



