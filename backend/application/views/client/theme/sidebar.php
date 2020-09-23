  <!-- =============================================== -->

 <?php $cur_page =  $this->uri->segment(2); ?>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin/user.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php  if(!empty($customer[0]->firstname)){ echo $customer[0]->customer_type ." ".$customer[0]->firstname ." " . $customer[0]->lastname; }  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      </form>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php echo ($cur_page == "") ? 'active' : ''; ?>">
          <a href="<?php echo site_url('client/profile/home'); ?>">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>

          </a>
        </li>

     
        <li class="treeview <?php echo ($cur_page == "profileinfo") ? 'active' : ''; ?>">
        <a href="#">
          <i class="fa fa-sliders"></i> <span>Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo ($cur_page == "profile/profileinfo") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/profile/profileinfo'); ?>"><i class="fa fa-circle-o"></i> Profile Details</a>
          </li>         
        </ul>
      </li>

       <li class="treeview <?php echo ($cur_page == "event") ? 'active' : ''; ?>">
        <a href="#">
           <i class="fa fa-calendar-o"></i><span>Event</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
           <li <?php echo ($cur_page == "event/index") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/event/'); ?>"><i class="fa fa-circle-o"></i> All Events </a>
          </li>
          <li <?php echo ($cur_page == "event/event") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/event/event'); ?>"><i class="fa fa-circle-o"></i> New Event</a>
          </li>         
        </ul>
      </li>

       <li class="treeview <?php echo ($cur_page == "supplier") ? 'active' : ''; ?>">
        <a href="#">
           <i class="fa fa-user-circle"></i><span>Supplier</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
           <li <?php echo ($cur_page == "supplier/index") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/supplier/'); ?>"><i class="fa fa-circle-o"></i> List of Category </a>
          </li>
          <li <?php echo ($cur_page == "supplier/addcategory") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/supplier/addcategory'); ?>"><i class="fa fa-circle-o"></i> Add Category</a>
          </li>         
        </ul>
      </li>

        <!-- <li class="treeview <?php echo ($cur_page == "budget") ? 'active' : ''; ?>">
        <a href="#">
          <i class="fa fa-money"></i><span>Budget</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
           <li <?php echo ($cur_page == "budget/index") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/budget/'); ?>"><i class="fa fa-circle-o"></i>Event Budget  List </a>
          </li>
          <li <?php echo ($cur_page == "budget/addbudget") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('client/budget/addbudget'); ?>"><i class="fa fa-circle-o"></i> Add Event Budget</a>
          </li>         
        </ul>
      </li> -->
      
      
       <li class="<?php echo ($cur_page == "") ? 'active' : ''; ?>">
          <a href="<?php echo site_url('client/customer/logout'); ?>">
           <i class="fa fa-sign-out"></i> <span>Logout</span>

          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
