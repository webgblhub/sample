<style type="text/css">
        .bor
        {
            border: 2px solid #20bb62;
        }
        .subtype
        {
          background-color: #2ecc71;
          padding: 5px;
          color: #e0fbfb;
        }
</style>
<?php
$id=$this->uri->segment(4);
$data['sup']=$this->Edit_Model->selectSupplierid($id);
//print_r($data['sup']);
//echo @$data['sup'][0]->category_id;
$suppcategory=$this->Create_Model->getCatId(@$data['sup'][0]->category_id);
//print_r($suppcategory);
$servcount=count($service);
?>

<?php
$id = '';
$product_name="";
$product_number="";
$product_price="";
$product_detail="";
$product_video="";
$discount="";
$cost="";
$minimum="";
$style="";
$peakdays="";
$peakmonths="";
$ethnicity="";
$denomination="";
$language="";
$category="";
$lowest="";
$highest="";
$average="";
$pro_image="";
$maximum="";

$promid = $this->input->get('promid');
$busid = $this->uri->segment(4);
$bus_id1 = $this->session->userdata('bus_id');

//$this->db->select('id');
//$this->db->from('event_dragon_supplier_promo_product_packages');
//$this->db->where('event_dragon_supplier_promo_product_packages.supplier_promo_info_id',$promid);
//$packageFirstIdDetiles = $this->db->get();
//$packageFirstIdDetiles =  $packageFirstIdDetiles->row();
//$packageFirstId = isset($packageFirstIdDetiles->id)?$packageFirstIdDetiles->id:0;

$scid = $this->session->userdata('scid');
//$this->db->select('category');
//$this->db->from('event_dragon_supplier_category');
//$this->db->where('event_dragon_supplier_category.cat_id', $scid);
//$query = $this->db->get();
//$result =  $query->result();
//$getCategoryName =isset($result[0]->category)?$result[0]->category:'';

//get company name
//$this->db->select('company_name');
//$this->db->from('event_dragon_supplier_business_info');
//$this->db->where('event_dragon_supplier_business_info.id', $bus_id1);
//$query = $this->db->get();
//$result =  $query->result();
//$getCompanyName =isset($result[0]->company_name)?$result[0]->company_name:'';
if (isset($service) && $service)
{
  $id = $service[0]['id'];

//  $status = $service[0]['status'];

}

?>

<style type="text/css">
  .discount_style
  {
    color: #3f51b5;
    font-weight: 700;
  }
  .discount_col
  {
     background-color: #ebeeff;
  }
</style>
<?php //print_r($suppcategory);exit; ?>

<div class="page-header">
                <div class="page-header-title">
                    <h4>Suppliers</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>supplier/supplier/lists">Suppliers</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"> Edit Suppliers Product Package</a>
                        </li>
                    </ul>
                </div>
            </div>
<div class="row" style="margin-left: 0%">
        
      
                                <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.$data['sup'][0]->id); ?>" class="btn btn-success bor" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-primary active  bor ">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                 <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Reviews</a>
                            </div>
<div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                          <br><br>
                            <div class="card-header">
                                <h5>Edit Product Packages - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">
          
                            <?php if($servcount!=0) { ?>
          <div class="box box-primary">
            
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                  <button   data-toggle="modal" data-target="#modalForm" class="btn btn-primary pull-right form-btn ">Add Product Package</button>
                <div class="row" style="margin-right: 11px;margin-left: 12px;">
                    <!-- //table list -->

                    <?php

                    $this->db->select('*');
                    $this->db->from('supplier_products');
                    $this->db->where('supplier_products.package_id', $busid);
                    $query = $this->db->get();
                    $query= $query->result();//echo '<pre>';print_r($query);die;
					
                    ?>
                                      <table id="dtMaterialDesignExample" class="table " cellspacing="0" width="100%">
                                        <thead>
                                          <tr>
                                            <th class="th-sm">Product Name
                                            </th>
                                            <th class="th-sm">Product Price
                                            </th>
                                            <th class="th-sm">Action
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if(!empty($query)){
                                            foreach ($query as $key => $article) {

                                               ?>
                                              <tr>
                                                <td><?php echo $article->product_name ?></td>
                                                <td><?php echo $article->price ?></td>
                                                <td>
                                                  <?php
                                                  $hidden = array('id' => $article->id,'promid'=>$promid,'busid'=>$article->package_id);
                                                  $attributes = array('onsubmit' => "return confirmDelete()",'class' => 'd-inline',);
                                                  echo form_open('supplier/edit/deleteProductPackage',$attributes, $hidden); ?>
                                                  <button type="submit" class="close text-danger" aria-label="Close">
                                                    <i class="ti-trash" title="Delete"></i>
                                                  </button>
                                                  <?php  echo form_close();  ?>
                                                  
                                                  <button   data-toggle="modal" data-target="#modalForm<?php echo $article->id ?>" class="btn btn-primary pull-right form-btn "><i class="ti-pencil" title="Edit"></i></button>
                                                  
                                                  <div class="modal fade" id="modalForm<?php echo $article->id ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Product Package</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                    
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('supplier/edit/add_products'); ?>">
                      <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                      <input type="hidden" name ="busid" value="<?php echo $busid ?>">
                      <input type="hidden" name ="id" value="<?php echo $id ?>">
                      <input type="hidden" name ="product_id" value="<?php echo $article->id?>">
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <?php if(set_value('product_name')){ $product_name = set_value('product_name'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_name']; } ?>
                            <label for="inputName">Product Name</label>
                            <input type="text" name="product_name" id="en_title" class="form-control" placeholder="Product Name" value="<?php echo $article->product_name; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                      <label>Product Number</label>
                      <?php if(set_value('product_number')){ $product_number = set_value('product_number'); } elseif (isset($service) &&$service) { $product_number = $service[0]['product_number']; } ?>
                      <input type="number" name="product_number" id="product_number" class="form-control" placeholder="Product Number" value="<?php echo $article->product_number; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      </div>
                    </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Price</label>
                          <?php if(set_value('product_price')){ $product_price = set_value('product_price'); } elseif (isset($service) &&$service) { $product_price = $service[0]['price']; } ?>
                          <input type="number" name="product_price" id="en_title" class="form-control" placeholder="product price" value="<?php echo $article->price; ?>" onkeypress="return isNumberKey(event)">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Details</label>
                          <?php if(set_value('product_detail')){ $product_detail = set_value('product_detail'); } elseif (isset($service) &&$service) { $product_detail = $service[0]['description']; } ?>
                          <input type="text" name="product_detail" id="en_product_detail" class="form-control" placeholder="produt details" value="<?php echo $article->description; ?>">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Video</label>
                          <?php if(set_value('product_video')){ $Company_name = set_value('product_video'); } elseif (isset($service) &&$service) { $product_video = $service[0]['video']; } ?>
                          <input type="url" name="product_video" id="en_product_video" class="form-control" placeholder="video link here" value="<?php echo $article->video; ?>">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <label>product Image</label>
                          <?php if(set_value('pro_image')){ $pro_image = set_value('pro_image'); } elseif (isset($service) &&$service) { $pro_image = $article->image; } ?>
                          <input type="file" name="pro_image" id="en_pro_image" class="form-control" placeholder="Supplier Capacity Minimum" value="">
                          <!-- <a class="fa fa-file"style="font-size:16px;" href = "<?php echo base_url()?>uploads/<?php echo $pro_image; ?> ?>"download>view file</a></td> -->
                          <?php if($pro_image){ ?>
                            <a class="fa fa-file"style="font-size:16px;" href = "<?php echo base_url('uploads/'.$pro_image)?>" target="_blank">view file</a>
                          <?php }else{ ?>

                         <?php } ?>
                       	  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
</div>

                        </div>


                <!-- Modal Footer -->
                <div class="modal-footer">
                <div class="col-md-11">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary pull-right form-btn" >SUBMIT</button>
                  </div>
                  </form>
                </div>
            </div>
        </div>
                                                </td>

                                              </tr>
                                            <?php } }else{ ?>
                                              <tr><td style="float: right;">No Data Found</td></tr>
                                            <?php } ?>
                                          </tbody>
                                          <tfoot>

                                          </tfoot>
                                        </table>
                                    <!-- table list -->
                                    <?php /*?><form enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/bank_details?prod_id='.$promid.''); ?>">
                                    <button type="submit" name="submit" class="btn btn-primary pull-right form-btn">Next</button>
                                  </form><?php */?>

                                  </div>
                                  <?php } ?>
                                  <div class="box-header with-border">
             

            </div>
                                  <form enctype="multipart/form-data" method="post" action="<?php echo ($servcount!=0)?site_url('supplier/edit/update_productpackages/'.$this->uri->segment(4)):site_url('supplier/edit/add_productpackages/'.@$data['sup'][0]->supplier_id."/".@$data['sup'][0]->category_id."/".$this->uri->segment(4)); ?>">
                                  <div class="row">

                  <div class="col-md-6">
                     <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                     <input type="hidden" name ="busid" value="<?php echo $busid ?>">
                     <input type="hidden" name ="id" value="<?php echo $id ?>">


                    <label>Product Name</label>
                    <?php if(set_value('product_name')){ $product_name = set_value('product_name'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_name']; } ?>
                    <input type="text" name="product_name" id="en_title" class="form-control" placeholder="Enter Productname" value="<?php echo $product_name; ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <span class="input-error"><?php echo form_error('product_name', '<div class="error">', '</div>'); ?></span>
                  </div>

                  <div class="col-md-6">
                     <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                     <input type="hidden" name ="busid" value="<?php echo $busid ?>">
                     <input type="hidden" name ="id" value="<?php echo $id ?>">


                    <label>Product Number</label>
                    <?php if(set_value('product_number')){ $product_name = set_value('product_number'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_number']; } ?>
                    <input type="text" name="product_number" id="en_title" class="form-control" placeholder="Enter Product Number" value="<?php echo @$service[0]['product_number']; ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <span class="input-error"><?php echo form_error('product_number', '<div class="error">', '</div>'); ?></span>
                  </div>
                </div>



                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Product Price</label>
                      <?php if(set_value('product_price')){ $product_price = set_value('product_price'); } elseif (isset($service) &&$service) { $product_price = @$service[0]['price']; } ?>
                      <input type="number" name="product_price" id="en_title" class="form-control" placeholder="product price" value="<?php echo @$product_price; ?>" onkeypress="return isNumberKey(event)">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('product_price', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                

                
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Product Details</label>
                      <?php if(set_value('product_detail')){ $product_detail = set_value('product_detail'); } elseif (isset($service) &&$service) { $product_detail = $service[0]['description']; } ?>
                      <input type="text" name="product_detail" id="en_product_detail" class="form-control" placeholder="produt detail" value="<?php echo $product_detail; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('product_detail', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>product Image</label>
                      <?php if(set_value('pro_image')){ $pro_image = set_value('pro_image'); } elseif (isset($service) &&$service) { $pro_image = $service[0]['image']; } ?>
                      <input type="file" name="pro_image" id="en_pro_image" class="form-control" placeholder="Supplier Capacity Minimum" value="<?php echo $pro_image; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <?php if($pro_image){ ?>
                            <a class="fa fa-file"style="font-size:16px;" href = "<?php echo base_url('uploads/'.$pro_image)?>" target="_blank">view file</a>
                          <?php }else{ ?>

                         <?php } ?>
                      <span class="input-error"><?php echo form_error('pro_image', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Product Video</label>
                      <?php if(set_value('product_video')){ $Company_name = set_value('product_video'); } elseif (isset($service) &&$service) { $product_video = $service[0]['video']; } ?>
                      <input type="text" name="product_video" id="en_product_video" class="form-control" placeholder="video link here" value="<?php echo $product_video; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('product_video', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                <div class="col-md-12 ">
                  <h4 class="subtype">Multi Storefront Discount</h4>
                </div>

              </div>
              <br>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Type</label>
                      <select id="dis_multi_type" name="dis_multi_type" class="form-control select2" >
                        <option value="Select" >Select Type</option>
                        <?php foreach($discount_types as $key =>$dis){ ?>
                           <option value="<?php echo $dis->discount_id; ?>" <?php if($dis->discount_id==@$service[0]['discount_multi_type']) { ?> selected="selected"<?php } ?>><?php echo $dis->discount_name; ?></option>
                        <?php } ?>
                       
                      </select>
                      <span class="input-error"><?php //echo form_error('discount_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div> -->
                  <!-- <div class="col-md-6 percentage">

                    <div class="form-group">
                      <label>Multi Storefront Discount Range Percentage(%)</label>
                      <?php //if(set_value('discount')){ $discount = set_value('discount'); } elseif (isset($service) &&$service) { $discount = $service[0]['discount']; } ?>
                      <input type="number" name="discount" id="discount" class="form-control" placeholder="Discount" value="<?php //echo $discount; ?>">
                      <input type="hidden" name="id" id="id" value="<?php //echo $id; ?>">
                      <span class="input-error"><?php //echo form_error('discount', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div> -->
                  <!-- <div class="col-md-6 flat_amount">

                    <div class="form-group">
                      <label>Multi Storefront Discount Amount</label>
                      <?php //if(set_value('discount')){ $discount = set_value('discount'); } elseif (isset($service) &&$service) { $discount = @$service[0]['multi_discount_amount']; } ?>
                      <input type="number" name="amount" id="amount" class="form-control" placeholder="Discount Amount" value="<?php //echo $discount; ?>">
                      <input type="hidden" name="id" id="id" value="<?php //echo $id; ?>">
                      <span class="input-error"><?php //echo form_error('amount', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 ">
                  <h4 class="subtype">Discount for Days</h4>
                </div>

              </div>
              <br>
                <div class="row">
                   <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Type</label>
                      <select id="dis_day_type" name="dis_day_type" class="form-control select2" >
                        <option value="Select" >Select Type</option>
                        <?php
                            //foreach ($discount_types as $key =>$dis) {
                              //if($dis->discount_id==@$service[0]['discount_day_type'])
                              {

                          ?>
                        <option value="<?php //echo $dis->discount_id; ?>" selected><?php //echo $dis->discount_name; ?></option>
                        <?php  } 
                        //else{
                          ?>
                          <option value="<?php //echo $dis->discount_id; ?>"><?php// echo $dis->discount_name; ?></option>
                          <?php
                       // } }?>
                      </select>
                      <span class="input-error"><?php //echo form_error('dis_day_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                   <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Amount</label>
                      <?php //if(set_value('discount_days_amt')){ $cost = set_value('cost'); } elseif (isset($service) &&$service) { $cost = $service[0]['discount_days_amt']; } ?>
                      <input type="number" name="discount_days_amt" min=1 id="en_cost" class="form-control" placeholder="Discount Days Amount " value="<?php echo $cost; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php //echo form_error('discount_days_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label>Supplier Discount Days</label>
                      <?php //if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($service) &&$service) { $peakdays = $service[0]['days']; } ?> -->
                      <!-- <input type="text" name="peakdays" id="en_peakdays" class="form-control" placeholder="v" value="<?php echo $peakdays; ?>"> -->
                     <!--   selected : --><?php //print_r($peakdays); if(!empty($peakdays))print_r("updated")?><br>


                       <?php


                    //    if($weekdays){

                    //     $weekday1=explode(',',trim($peakdays));
                    //     foreach($weekday1 as $each)
                    //       {
                    //         array_push($weekday1,trim($each));
                    //       }

                    //   foreach ($weekdays as $week) {


                    //   if(in_array($week->day,$weekday1))
                    //     {

                    //     echo '<input type="checkbox" name="peakdays[]" class="week" id="en_peakdays"  value="'.$week->day.'" checked>'.$week->day;
                    // }else{ ?>
                         <!-- <input type="checkbox" name="peakdays[]" id="en_peakdays" class="week" value="<?php echo $week->day;?> "> --><?php // echo $week->day;?>

                <?php  //} }}?>

                     <!--  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php //echo form_error('peakdays', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 ">
                  <h4 class="subtype">Discount for Month</h4>
                </div>

              </div>
              <br>
                <div class="row">
                   <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Type</label>
                      <select id="dis_month_type" name="dis_month_type" class="form-control select2" >
                        <option value="Select" >Select Type</option>
                        <?php
                           // foreach ($discount_types as $key =>$dis) {

                         // if($dis->discount_id==@$service[0]['discount_month_type'])
                              {

                          ?>
                        <option value="<?php echo $dis->discount_id; ?>" selected><?php echo $dis->discount_name; ?></option>
                        <?php  } 
                        //else{
                          ?>
                          <option value="<?php echo $dis->discount_id; ?>"><?php echo $dis->discount_name; ?></option>
                          <?php
                        //} }?>
                      </select>
                      <span class="input-error"><?php echo form_error('dis_month_type', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                   <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Amount </label>
                      <?php if(set_value('discount_month_amt')){ $cost = set_value('cost'); } elseif (isset($service) &&$service) { $cost = $service[0]['discount_month_amt']; } ?>
                      <input type="number" name="discount_month_amt" min=1 id="en_cost" class="form-control" placeholder="Discount Month Amount " value="<?php echo $cost; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('discount_month_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Supplier Discount Months</label>
                      <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($service) &&$service) { $peakmonths = $service[0]['month']; } ?> -->
                      <!-- <input type="text" name="peakmonths" id="en_peakmonths" class="form-control" placeholder="peakmonths" value="<?php echo $peakmonths; ?>"> -->
                      <!-- selected : --><?php //print_r($peakmonths); if(!empty($peakmonths))print_r("updated"); ?><br>


                       <?php //if($months){

                  //     $month1=explode(',',trim($peakmonths));
                  // foreach($month1 as $each)
                  //   {
                  //     array_push($month1,trim($each));
                  //   }
                  //    foreach ($months as $mont) {
//        var_dump($mont->month);
//        var_dump($month1[0]);
//        exit;
// print_r($mont->month==$month1[0]);exit;

                  //     if(in_array($mont->month,$month1))
                  //     {

                  //     echo '<input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="'.$mont->month.'" checked>'.$mont->month;
                  // }else{ ?>
                     <!--  <input type="checkbox" class="month" name="peakmonths[]" id="peakmonths"  value="<?php echo $mont->month;?> "> --><?php// echo $mont->month;?>

              <?php  //}}}
                       ?>




<!-- 
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('peakmonths', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                 
                </div> -->










<!-- 


                    <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Supplier Discount Days</label><br>
                      <?php if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($service) &&$service) { $peakdays = $service[0]['peakdays']; } ?>
                      <!-- <input type="text" name="peakdays" id="en_peakdays" class="form-control" placeholder="v" value="<?php echo $peakdays; ?>"> -->

                    <!--  <?php if($weekdays){
                      foreach ($weekdays as $week) { ?>
                   <input type="checkbox" name="peakdays[]" class="week" id="en_peakdays"  value="<?php echo $week->day ?>"><?php echo $week->day ?>
                   <?php }} ?>

                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('peakdays', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Discount Months</label><br>
                      <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($service) &&$service) { $peakmonths = $service[0]['peakmonths']; } ?> -->
                      <!-- <input type="text" name="peakmonths" id="en_peakmonths" class="form-control" placeholder="peakmonths" value="<?php echo $peakmonths; ?>"> -->

                    <!--  <?php if($months){
                     foreach ($months as $mont) { ?>
                  <input type="checkbox" name="peakmonths[]"  class="month" id="en_peakdays"  value="<?php echo $mont->month ?>"><?php echo $mont->month ?>
                  <?php }} ?>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('peakmonths', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div> --> 
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Capacity Minimum</label>
                      <?php if(set_value('minimum')){ $minimum = set_value('minimum'); } elseif (isset($service) &&$service) { $minimum = $service[0]['minimum']; } ?>
                      <input type="number" name="minimum" id="en_minimum" class="form-control" placeholder="Supplier Capacity Minimum" value="<?php echo $minimum; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('minimum', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div> -->
                  <!-- <div class="row">
                   <div class="col-md-6">

                    <div class="form-group">
                      <label>Discount Amount (Days)</label>
                      <?php if(set_value('discount_days_amt')){ $cost = set_value('cost'); } elseif (isset($service) &&$service) { $cost = $service[0]['discount_days_amt']; } ?>
                      <input type="number" name="discount_days_amt" min=1 id="en_cost" class="form-control" placeholder="Discount Days Amount " value="<?php echo $cost; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('discount_days_amt', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  
                
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Discount Amount (Month)</label>
                      <?php if(set_value('style')){ $style = set_value('style'); } elseif (isset($service) &&$service) { $style = $service[0]['discount_month_amt']; } ?>
                      <input type="text" name="discount_month_amt" id="en_style" class="form-control" placeholder="Discount Month Amount" value="<?php echo $style; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('style', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                  
                </div> -->

               <!--  <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Cost Minimum</label>
                      <?php if(set_value('cost')){ $cost = set_value('cost'); } elseif (isset($service) &&$service) { $cost = $service[0]['cost']; } ?>
                      <input type="number" min=1 name="cost" id="en_cost" class="form-control" placeholder="Minimum" value="<?php echo $cost; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('cost', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Style</label>
                      <?php if(set_value('style')){ $style = set_value('style'); } elseif (isset($service) &&$service) { $style = $service[0]['style']; } ?>
                      <input type="text" name="style" id="en_style" class="form-control" placeholder="style" value="<?php echo $style; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('style', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Supplier Discount Days</label>
                      <?php if(set_value('peakdays')){ $peakdays = set_value('peakdays'); } elseif (isset($service) &&$service) { $peakdays = $service[0]['peakdays']; } ?>
                      <!-- <input type="text" name="peakdays" id="en_peakdays" class="form-control" placeholder="v" value="<?php echo $peakdays; ?>"> -->

                     <!-- <?php if($weekdays){
                      foreach ($weekdays as $week) { ?>
                   <input type="checkbox" name="peakdays[]" class="week" id="en_peakdays"  value="<?php echo $week->day ?>"><?php echo $week->day ?>
                   <?php }} ?>

                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('peakdays', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Discount Months/label>
                      <?php if(set_value('peakmonths')){ $peakmonths = set_value('peakmonths'); } elseif (isset($service) &&$service) { $peakmonths = $service[0]['peakmonths']; } ?>
                      <!-- <input type="text" name="peakmonths" id="en_peakmonths" class="form-control" placeholder="peakmonths" value="<?php echo $peakmonths; ?>"> -->
<!-- 
                     <?php if($months){
                     foreach ($months as $mont) { ?>
                  <input type="checkbox" name="peakmonths[]"  class="month" id="en_peakdays"  value="<?php echo $mont->month ?>"><?php echo $mont->month ?>
                  <?php }} ?>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('peakmonths', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div> --> 
                 <?php if($scid=='21')
                { ?>
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Cultural Specialties</label>
                      <?php if(set_value('ethnicity')){ $ethnicity = set_value('ethnicity'); } elseif (isset($service) &&$service) { $ethnicity = $service[0]['ethnicity']; } ?>
                      <!-- <input type="text" name="ethnicity" id="en_ethnicity" class="form-control" placeholder="ethnicity" value="<?php echo $ethnicity; ?>"> -->
                      <select id="Ethinicity" name="ethnicity[]" class="form-control select2" multiple>
                        <option value="ALL">ALL</option>
                        <!-- <option value="White" <?php //echo in_array("White",$ethnicity)?'selected':"" ?>>White</option> -->
                        <option value="African" >African</option>
                        <option value="American" >American</option>
                        <option value="Arabic" >Arabic</option>
                        <option value="Asian" >Asian</option>
                        <option value="Brazilian">Brazilian</option>
                        <option value="Caribbean/Island">Caribbean/Island</option>
                        <option value="Cuban">Cuban</option>
                        <option value="Egyptian">Egyptian</option>
                        <option value="French">French</option>
                        <option value="German" >German</option>
                        <option value="Greek">Greek</option>
                        <option value="Hawaiian">Hawaiian</option>
                        <option value="Indian/Hindu">Indian/Hindu</option>
                        <option value="Irish/Scottish">Irish/Scottish</option>
                        <option value="Italian">Italian</option>
                        <option value="Jewish">Jewish</option>
                        <option value="Latin">Latin</option>
                        <option value="Mariachi">Mariachi</option>
                        <option value="Medieval">Medieval</option>
                        <option value="Middle Eastern">Middle Eastern</option>
                        <option value="Native American">Native American</option>
                        <option value="Polynesian">Polynesian</option>
                        <option value="Russian">Russian</option>
                        <option value="Spanish">Spanish</option>
                                          </select>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('ethnicity', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Denomination</label>
                      <?php if(set_value('denomination')){ $city_id = set_value('denomination'); } elseif (isset($service) &&$service) { $denomination = $service[0]['denomination']; } ?>
                      <select id="denomination" name="denomination" class="form-control select2" >
                                              <option value="Agnostic" >Agnostic</option>
                                              <option value="Buddhism" >Buddhism</option>
                                              <option value="Christianity" >Christianity</option>
                                              <option value="Hinduism" >Hinduism</option>
                                              <option value="Interfaith">Interfaith</option>
                                              <option value="Islam">Islam</option>
                                              <option value="Jainism">Jainism</option>
                                              <option value="Judaism">Judaism</option>
                                              <option value="Muslim">Muslim</option>
                                              <option value="Non-Denominational">Non-Denominational</option>
                                              <option value="Non-Religious">Non-Religious</option>
                                              <option value="Pagan">Pagan</option>
                                              <option value="Protestant">Protestant</option>
                                              <option value="Rastafarian">Rastafarian</option>
                                              <option value="Taoism">Taoism</option>


                                          </select>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('denomination', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- <div class="col-md-6">

                    <div class="form-group">
                      <div class="form-group">
                        <label>Supplier average cost(per person)</label>
                        <?php if(set_value('average')){ $average = set_value('average'); } elseif (isset($service) && $service) { $average = $service[0]['average']; } ?>
                         <input type="number" name="average"  id="averageNumber" class="form-control" placeholder="Supplier Certification" value="<?php echo $average; ?>">
                          <span class="input-error"><?php echo form_error('average', '<div class="error">', '</div>'); ?></span>
                      </div>


                    </div>

                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Languages Spoken</label>
                      <?php if(set_value('language')){ $language = set_value('language'); } elseif (isset($service) &&$service) { $language = $service[0]['language']; } ?>
                      <!-- <input type="text" name="language" id="en_language" class="form-control" placeholder="language" value="<?php echo $language; ?>"> -->
                      <select data-placeholder="Choose a Language..." class="form-control select2" multiple name="language[]">

                <option value="Arabic" <?php echo (isset($language) && $language==="Arabic")?'selected':"" ?>>Arabic</option>
                <option value="Bavarian" <?php echo (isset($language) && $language==="Bavarian")?'selected':"" ?>>Bavarian</option>
                <option value="Begali" <?php echo (isset($language) && $language==="Begali")?'selected':"" ?>>Begali</option>

                <option value="Chinese" <?php echo (isset($language) && $language==="Chinese")?'selected':"" ?>>Chinese</option>
                <option value="Dutch" <?php echo (isset($language) && $language==="Dutch")?'selected':"" ?>>Dutch</option>
                <option value="English" <?php echo (isset($language) && $language==="English")?'selected':"" ?>>English</option>
                <option value="French" <?php echo (isset($language) && $language==="French")?'selected':"" ?>>French</option>


                <option value="German" <?php echo (isset($language) && $language==="German")?'selected':"" ?>>German</option>
                <option value="Greek" <?php echo (isset($language) && $language==="Greek")?'selected':"" ?>>Greek</option>



                <option value="Gujarati" <?php echo (isset($language) && $language==="Gujarati")?'selected':"" ?>>Gujarati</option>
                <option value="Hindi" <?php echo (isset($language) && $language==="Hindi")?'selected':"" ?>>Hindi</option>


                <option value="Hungarian" <?php echo (isset($language) && $language==="Hungarian")?'selected':"" ?>>Hungarian</option>
                <option value="Indonesian" <?php echo (isset($language) && $language==="Indonesian")?'selected':"" ?>>Indonesian</option>
                <option value="Italian" <?php echo (isset($language) && $language==="Italian")?'selected':"" ?>>Italian</option>

                <option value="Iranian Persian"  <?php echo (isset($language) && $language==="Iranian Persian")?'selected':"" ?>>Iranian Persian</option>
                <option value="Japanese"  <?php echo (isset($language) && $language==="Japanese")?'selected':"" ?>>Japanese</option>

                <option value="Korean" <?php echo (isset($language) && $language==="Korean")?'selected':"" ?>>Korean</option>
                <option value="Nigerian" <?php echo (isset($language) && $language==="Nigerian")?'selected':"" ?>>Nigerian</option>


                <option value="Panjabi" <?php echo (isset($language) && $language==="Panjabi")?'selected':"" ?>>Panjabi</option>
                <option value="Persian" <?php echo (isset($language) && $language==="Persian")?'selected':"" ?>>Persian</option>



                <option value="Polish" <?php echo (isset($language) && $language==="Polish")?'selected':"" ?>>Polish</option>
                <option value="Portuguese" <?php echo (isset($language) && $language==="Portuguese")?'selected':"" ?>>Portuguese</option>


                <option value="Punjabi" <?php echo (isset($language) && $language==="Punjabi")?'selected':"" ?>>Punjabi</option>
                <option value="Romanian" <?php echo (isset($language) && $language==="Romanian")?'selected':"" ?>>Romanian</option>


                <option value="Russian" <?php echo (isset($language) && $language==="Russian")?'selected':"" ?>>Russian</option>
                <option value="Spanish" <?php echo (isset($language) && $language==="Spanish")?'selected':"" ?>>Spanish</option>


                <option value="Swahili" <?php echo (isset($language) && $language==="Swahili")?'selected':"" ?>>Swahili</option>
                <option value="Swedish" <?php echo (isset($language) && $language==="Swedish")?'selected':"" ?>>Swedish</option>

                <option value="Telugu" <?php echo (isset($language) && $language==="Telugu")?'selected':"" ?>>Telugu</option>
                <option value="Thai" <?php echo (isset($language) && $language==="Thai")?'selected':"" ?>>Thai</option>
                <option value="Turkish" <?php echo (isset($language) && $language==="Turkish")?'selected':"" ?>>Turkish</option>


                <option value="Ukranian" <?php echo (isset($language) && $language==="Ukranian")?'selected':"" ?>>Ukranian</option>
                <option value="Urdu" <?php echo (isset($language) && $language==="Urdu")?'selected':"" ?>>Urdu</option>


                                </select>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('language', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
            

                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Sports Category </label>
                      <?php if(set_value('category')){ $category = set_value('category'); } elseif (isset($service) &&$service) { $category = $service[0]['category']; } ?>


                      <?php
                      usort($sport_category, function($a, $b) {
                        return $a['name'] <=> $b['name'];
                    });


                      ?>

                      <select class="form-control select2" name="category[]" multiple>
                        <?php foreach($sport_category as $category){?>

                                  <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>


                        <?php } ?>
                      </select>
                      <!-- <input type="text" name="category" id="en_category" class="form-control" placeholder="category" value="<?php echo $category; ?>"> -->
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('category', '<div class="error">', '</div>'); ?></span>
                    </div>



                  </div>
                </div>
              <?php } ?>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Lowest Cost(per person) </label>
                      <?php if(set_value('lowest')){ $lowest = set_value('lowest'); } elseif (isset($service) &&$service) { $lowest = $service[0]['lowest']; } ?>
                      <input type="number" name="lowest" id="en_lowest" class="form-control" placeholder="lowest" value="<?php echo $lowest; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('lowest', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Highest Cost(per person) </label>
                      <?php if(set_value('highest')){ $highest = set_value('highest'); } elseif (isset($service) &&$service) { $highest = $service[0]['highest']; } ?>
                      <input type="number" name="highest" id="en_highest" class="form-control" placeholder="highest" value="<?php echo $highest; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('highest', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div> -->

                 <!--  <div class="col-md-6">
                    <div class="form-group">
                      <label>product Image</label>
                      <?php if(set_value('pro_image')){ $pro_image = set_value('pro_image'); } elseif (isset($service) &&$service) { $pro_image = $service[0]['pro_image']; } ?>
                      <input type="file" name="pro_image" id="en_pro_image" class="form-control" placeholder="Supplier Capacity Minimum" value="<?php echo $pro_image; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('pro_image', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div> -->
                </div>


                <!-- <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Supplier Capacity Maximum</label>
                      <?php if(set_value('maximum')){ $maximum = set_value('maximum'); } elseif (isset($service) &&$service) { $maximum = $service[0]['maximum']; } ?>
                      <input type="text" name="maximum" id="en_maximum" class="form-control" placeholder="Supplier Capacity Minimum" value="<?php echo $maximum; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('maximum', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>




                </div>
 -->

                                  <?php /*?><div class="row">
                                    <?php
                                    $this->db->select('supplier_category_id');
                                    $this->db->from('event_dragon_supplier_promo_info');
                                    $this->db->where('id', $promid);
                                    $query = $this->db->get();
                                    $catId = $query->row();

                                    $this->db->select('*');
                                    $this->db->from('event_dragon_supplier_category_questions');
                                    $this->db->where('cat_id', $catId->supplier_category_id);
                                    $query = $this->db->get();
                                    $questions = $query->result();
                                    //print_r($questions);die;
                                    foreach ($questions as $key => $ques) {
                                      // code...
                                     ?>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><?php echo $ques->question; ?></label>
                                        <?php
                                        $quesType = isset($ques->ques_type)?$ques->ques_type:'';

                                        //print_r($answers);die;
                                        if($quesType=='input'){

                                          ?>
                                        <input type="text" name="<?php echo $ques->id.'_answer'; ?>" id="answer" class="form-control" placeholder="Answer" value="">
                                      <?php } ?>
                                    <?php  if($quesType=='option'){

                                       ?>

                                                               <?php

                                                                      $data_user_role_id = array('' => 'Select Type','Yes' => 'Yes','NO' => 'No');

                                                                      echo form_dropdown($ques->id.'_answer', $data_user_role_id, set_value('answer',''), 'id="answer" class="form-control form-control-sm" required=""');
                                                                      ?>
                                    <?php } ?>
                                        <span class="input-error"><?php echo form_error('maximum', '<div class="error">', '</div>'); ?></span>
                                      </div>
                                    </div>
                                  <?php } ?>

                                  </div><?php */?>

                 <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>



              </div>
          </div>
        </div>
      <!-- </form> -->



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

    <!-- Modal -->
    <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Product Package</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                    
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('supplier/edit/add_products'); ?>">
                      <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                      <input type="hidden" name ="busid" value="<?php echo $busid ?>">
                      <input type="hidden" name ="id" value="<?php echo $id ?>">
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <?php if(set_value('product_name')){ $product_name = set_value('product_name'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_name']; } ?>
                            <label for="inputName">Product Name</label>
                            <input type="text" name="product_name" id="en_title" class="form-control" placeholder="Product Name" value="">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                      <label>Product Number</label>
                      <?php if(set_value('product_number')){ $product_number = set_value('product_number'); } elseif (isset($service) &&$service) { $product_number = $service[0]['product_number']; } ?>
                      <input type="number" name="product_number" id="product_number" class="form-control" placeholder="Product Number" value="">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      </div>
                    </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Price</label>
                          <?php if(set_value('product_price')){ $product_price = set_value('product_price'); } elseif (isset($service) &&$service) { $product_price = $service[0]['price']; } ?>
                          <input type="number" name="product_price" id="en_title" class="form-control" placeholder="product price" value="" onkeypress="return isNumberKey(event)">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Details</label>
                          <?php if(set_value('product_detail')){ $product_detail = set_value('product_detail'); } elseif (isset($service) &&$service) { $product_detail = $service[0]['description']; } ?>
                          <input type="text" name="product_detail" id="en_product_detail" class="form-control" placeholder="produt details" value="">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Video</label>
                          <?php if(set_value('product_video')){ $Company_name = set_value('product_video'); } elseif (isset($service) &&$service) { $product_video = $service[0]['video']; } ?>
                          <input type="url" name="product_video" id="en_product_video" class="form-control" placeholder="video link here" value="">
                          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <label>product Image</label>
                          <?php if(set_value('pro_image')){ $pro_image = set_value('pro_image'); } elseif (isset($service) &&$service) { $pro_image = $service[0]['image']; } ?>
                          <input type="file" name="pro_image" id="en_pro_image" class="form-control" placeholder="Supplier Capacity Minimum" value="">
                          <!-- <a class="fa fa-file"style="font-size:16px;" href = "<?php echo base_url()?>uploads/<?php echo $pro_image; ?> ?>"download>view file</a></td> -->
                          <?php if($pro_image){ ?>
                            <a class="fa fa-file"style="font-size:16px;" href = "<?php echo base_url('uploads/'.$pro_image)?>" target="_blank">view file</a></td>
                          <?php }else{ ?>

                         <?php } ?>
                       <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                          </div>
                        </div>
</div>

                        </div>


                <!-- Modal Footer -->
                <div class="modal-footer">
                <div class="col-md-11">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary pull-right form-btn" >SUBMIT</button>
                  </div>
                  </form>
                </div>
            </div>
        </div>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $("#discount_type").change(function(){
    var selctectdVal = $(this).children("option:selected").val();
    if(selctectdVal=='Flat Rate'){
      $(".percentage").hide();
      $(".flat_amount").show();
    }
    if(selctectdVal=='Percentage'){
      $(".flat_amount").hide();
      $(".percentage").show();
    }
  });
</script>

  <script>
  function confirmDelete(form) {
    if (!confirm("Do you really want to Delete?")) {
      return false;
    }
    this.form.submit();
  }


$(document).ready(function() {

  $('.selectpickers').selectpicker();
});

  function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


</script>
