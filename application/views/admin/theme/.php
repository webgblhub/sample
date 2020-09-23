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
          <p><?php if(isset($this->session->userdata['admin_name'])){ echo $this->session->userdata['admin_name']; } ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php echo ($cur_page == "") ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin'); ?>">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>

          </a>
        </li>

        <!-- <li class="<?php echo ($cur_page == "media") ? 'active' : ''; ?>">
          <a href="<?php echo site_url('admin/media'); ?>">
            <i class="fa fa-image"></i> <span>Media</span>
          </a>
        </li> -->

        <li class="treeview <?php echo ($cur_page == "sliders" || $cur_page == "list-sliders" || $cur_page == "sliders" || $cur_page == "categories") ? 'active' : ''; ?>">
        <a href="#">
          <i class="fa fa-sliders"></i> <span>Store Front</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo ($cur_page == "sliders" || $cur_page == "sliders") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('admin/create_storefront'); ?>"><i class="fa fa-circle-o"></i> Create Storefront</a>
          </li>
          <li <?php echo ($cur_page == "list-sliders") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('admin/list_storefront'); ?>"><i class="fa fa-circle-o"></i> List Storefront</a>
          </li>
          <?php /*?><li <?php echo ($cur_page == "create-questionnaire") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('admin/create-questionnaire'); ?>"><i class="fa fa-circle-o"></i> Questionnaire</a>
          </li>
          <li <?php echo ($cur_page == "list-questionnaire") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('admin/list-questionnaire'); ?>"><i class="fa fa-circle-o"></i>List Questionnaire</a>
          </li>
          <li <?php echo ($cur_page == "list-articles") ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('admin/list-articles'); ?>"><i class="fa fa-circle-o"></i>List articles</a>
          </li><?php */?>

        </ul>
      </li>


<!-- //edit mode -->
<!--
 <?php if($details){ foreach ($details as $detail) { ?>
<li <?php echo ($cur_page == "list-sliders") ? 'class="active"' : ''; ?>>
  <a href="<?php echo base_url()?>Dashboard/edit_businessinfo/<?php echo $detail->id;?>"><i class="fa fa-circle-o"></i> edit business info</a>
</li>
<?php }} ?>
-->







      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
