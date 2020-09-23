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
$prvious_id='';

$promid = $this->input->get('promid');

$id=$prid=base64_decode($this->uri->segment(4));
//print_r($id);die();
$data['sup']=$this->Edit_Model->selectSupplierid($id);
$store_id= $data['sup'][0]->id;
$data['categoryname']=$this->Edit_Model->selectCategoryname($store_id);
//print_r($data);die;
 if(!empty($data['categoryname'][0]->company_name)){
                $companyName = '-'.$data['categoryname'][0]->company_name;
              }else{
                $companyName = '';
              }
//print_r($data['sup']);exit;
//print_r($data['sup']);

$suppcategory=$this->Create_Model->getCatId(@$data['sup'][0]->category_id);
//print_r($data['sup'][0]->category_id);die;
$servcount=count($service);


if (isset($service) && $service)
{

  // var_dump($service);exit();
  $id = $service[0]['id'];
  //$prid = $service[0]['switch_id'];

  // $status = $service[0]['status'];

}


// $scid1 = (@$service[0]['category_id'])?$service[0]['category_id']:$data['sup'][0]->category_id;
// $bus_id1 = $this->session->userdata('bus_id');

$catary=array();
foreach($categories as $item)
{
array_push($catary,$item->cat_id);
}

?>

 <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <label>Edit Product Details</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-wrap2">
                    <label><?php echo $data['categoryname'][0]->category.$companyName; ?></label>
                  </div>
                </div>
              </div>
            </div>
         </div>

<section>

    <?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>

    <div class="container container-contents-wrap">
        <div class="header-sec">
            <h5>PRODUCT PACKAGES</h5>
        </div>
<?php if(!in_array(@$data['sup'][0]->category_id,$catary)) { ?>
        <!-- Button trigger modal -->
        <?php //if($servcount!=0) { ?>

        <button type="button" class="product-btn" data-toggle="modal" data-target="#exampleModal">
            Add Product/Package
        </button>
        <?php

$this->db->select('*');
$this->db->from('supplier_products');
$this->db->where('supplier_products.package_id', $prid);
$query = $this->db->get();
$query= $query->result();//echo '<pre>';print_r($query);die;
 ?>
        <div class="tag-header">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                if(!empty($query)){
                  foreach ($query as $key => $article) {

                      ?>
                    <tr>
                        <td><?php echo $article->product_name ?></td>
                        <td><?php echo '$'.number_format($article->price) ?></td>
                        <td>
                        <a data-toggle="modal" data-target="#modalForm<?php echo $article->id; ?>" class="update"><img src="<?php echo base_url(); ?>uploads/edit-24.png"/></a>


                            <!-- Modal -->
                            <div class="modal fade" id="modalForm<?php echo $article->id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Product Package</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
<form enctype="multipart/form-data" method="post"
                                                    action="<?php echo site_url('supplier/edit/add_products'); ?>">
                                        <div class="modal-body">
                                            <div class="input-section">
                                                

                    <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                  <input type="hidden" name ="busid" value="<?php echo @$bus_id1 ?>">
                  <input type="hidden" name ="product_id" value="<?php echo $article->id?>">
                  <input type="hidden" name ="prid" value="<?php echo $prid ?>">
                  <input type="hidden" name ="cat_id" value="<?php echo @$data['sup'][0]->category_id ?>">

                  
                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <?php if(set_value('product_name')){ $product_name = set_value('product_name'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_name']; } ?>
                                                            <label>PRODUCT NAME</label><br>
                                                            <input type="text" name="product_name" id="en_title"
                                                                placeholder="Product Name" class="inp test-id-inp bank_test-id-inp"
                                                                value="<?php echo $article->product_name; ?>">
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?php echo $id; ?>">

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                                            <?php if(set_value('product_number')){ $product_number = set_value('product_number'); } elseif (isset($service) &&$service) { $product_number = $service[0]['product_number']; } ?>

                                                            <label>PRODUCT NUMBER</label><br>
                                                            <input type="text" name="product_number" id="product_number"
                                                                placeholder="Product Number" maxlength="16"
                                                                oninput="if(value.length>17)value=value.slice(0,17)"
                                                                class="inp test-id-inp bank_test-id-inp"
                                                                value="<?php echo $article->product_number; ?>">
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?php echo $id; ?>">

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                                            <label>PRODUCT PRICE ($)</label><br>
                                                            <?php if(set_value('product_price')){ $product_price = set_value('product_price'); } elseif (isset($service) &&$service) { $product_price = $service[0]['price']; } ?>

                                                            <input type="number" name="product_price" id="en_title"
                                                                value="<?php echo $article->price; ?>"
                                                                placeholder="Product Price" class="inp test-id-inp-bio bank_test-id-inp">
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?php echo $id; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-cont-wrap-col test-id-inp-div">
                                                                <label>PRODUCT DETAILS</label><br>
                                                                <?php if(set_value('product_detail')){ $product_detail = set_value('product_detail'); } elseif (isset($service) &&$service) { $product_detail = $service[0]['description']; } ?>

                                                                <input type="text" placeholder="Product Details"
                                                                    name="product_detail" id="en_product_detail"
                                                                    class="inp test-id-inp bank_test-id-inp"
                                                                    value="<?php echo $article->description; ?>"><br>
                                                                <input type="hidden" name="id" id="id"
                                                                    value="<?php echo $id; ?>">

                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <label>PRODUCT VIDEO</label><br>
                                                            <?php if(set_value('product_video')){ $Company_name = set_value('product_video'); } elseif (isset($service) &&$service) { $product_video = $service[0]['video']; } ?>

                                                            <input type="url" name="product_video" id="en_product_video"
                                                                placeholder="Video Link Here" class="inp test-id-inp bank_test-id-inp"
                                                                value="<?php echo $article->video; ?>">
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?php echo $id; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                                                            <label>PRODUCT IMAGE</label><br>
                                                            <?php  $pro_image2 = $article->image;  ?>

                                                            <input type="file" name="pro_image" id="en_pro_image"
                                                                class="inp test-id-inp file-input bank_test-id-inp">
                                                            <?php if(@$pro_image2){ ?>
                                                            <a class="fa fa-file-image" title="view file" style="font-size:16px;"
                                                                href="<?php echo base_url('uploads/'.$pro_image2)?>"
                                                                target="_blank"></a>&nbsp;&nbsp;&nbsp;
                                                                <a class="fa fa-trash" title="delete file" style="font-size:16px;"
                                                                href="<?php echo base_url('supplier/create/delete_img/'.base64_encode($pro_image2)."/".base64_encode($prid))?>"
                                                                ></a>
                                                            <?php }else{ ?>

                                                            <?php } ?>
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?php echo $id; ?>">
                                                        </div>
                                                    </div>


                                                    
                                            </div>

                                        
                                        
                                        <div class="modal-footer">
                                                        <button type="button" class="btn product-bt-btn-close"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn product-bt-submit">Submit</button>
                                                    </div>
                                        
                                        
                                    </div>
                                    </form>
                                    </div>

                                    
                                </div>
                            </div>
                                                          
                        </td>
                        <td>
                                                <?php
												
                                                $hidden = array('id' => $article->id,'promid'=>$prid,'busid'=>@$bus_id1);
                                                $attributes = array('onsubmit' => "return confirmDelete()",'class' => 'd-inline',);
                                                echo form_open('supplier/edit/deleteProductPackage',$attributes, $hidden); ?>
                                                <button type="submit" class="close text-danger" aria-label="Close">
                                                  <img width="16" src="<?php echo base_url(); ?>uploads/delete-24.png"/>
                                                </button>
                                                <?php  echo form_close();  ?>
                                              </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr>
                        <td style="float: right;">No Data Found</td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <?php //} ?>
        <?php } else { ?>
        <h5>As one of our Dynamic Suppliers, input of product packages are not available.</h5>
        <?php } ?>
        <div class="input-element-wrap">
            
              <?php /*?><form enctype="multipart/form-data" method="post" action="<?php echo ($servcount!=0)?site_url('supplier/edit/update_productpackages/'.$this->uri->segment(4)):site_url('supplier/edit/add_productpackages/'.base64_encode(@$data['sup'][0]->supplier_id)."/".base64_encode(@$data['sup'][0]->category_id)."/".$this->uri->segment(4)); ?>">

                <div class="input-section">
                	 <input type="hidden" name ="promid" value="<?php echo $promid ?>">
                     <input type="hidden" name ="id" value="<?php echo $id ?>">
                     <input type="hidden" name ="lastId" value="<?php echo @$lastId ?>">
                     <input type="hidden" name ="prid" value="<?php echo $prid ?>">
                     <input type="hidden" name ="masterId" value="<?php echo @$masterId ?>">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                            <label>PRODUCT NAME</label><br>
                            <?php if(set_value('product_name')){ $product_name = set_value('product_name'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_name']; } ?>

                            <input input type="text" name="product_name" id="en_title" placeholder="Product Name"
                                class="inp test-id-inp bank_test-id-inp" value="<?php echo $product_name; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <span
                                class="input-error"><?php echo form_error('product_name', '<div class="error">', '</div>'); ?></span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">


                            <label>PRODUCT NUMBER</label><br>
                            <?php if(set_value('product_number')){ $product_name = set_value('product_number'); } elseif (isset($service) &&$service) { $product_name = $service[0]['product_number']; } ?>

                            <input type="text" name="product_number" id="en_title" placeholder="Product Number"
                                maxlength="16" oninput="if(value.length>17)value=value.slice(0,17)"
                                class="inp test-id-inp  bank_test-id-inp" value="<?php echo @$service[0]['product_number']; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <span
                                class="input-error"><?php echo form_error('product_number', '<div class="error">', '</div>'); ?></span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <label>PRODUCT PRICE ($)</label><br>
                            <?php if(set_value('product_price')){ $product_price = set_value('product_price'); } elseif (isset($service) &&$service) { @$product_price = $service[0]['product_price']; } ?>

                            <input type="number" name="product_price" id="en_title" placeholder="Product Price"
                                class="inp test-id-inp-bio bank_test-id-inp" value="<?php echo @$service[0]['price']; ?>"
                                onkeypress="return isNumberKey(event)">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <span
                                class="input-error"><?php echo form_error('product_price', '<div class="error">', '</div>'); ?></span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="input-cont-wrap-col test-id-inp-div">
                                <label>PRODUCT DETAILS</label><br>
                                <?php if(set_value('product_detail')){ $product_detail = set_value('product_detail'); } elseif (isset($service) &&$service) { $product_detail = @$service[0]['description']; } ?>

                                <input type="text" name="product_detail" id="en_product_detail"
                                    placeholder="Product Details" class="inp test-id-inp bank_test-id-inp"
                                    value="<?php echo $product_detail; ?>"><br>
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                <span
                                    class="input-error"><?php echo form_error('product_detail', '<div class="error">', '</div>'); ?></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>PRODUCT VIDEO</label><br>
                            <?php if(set_value('product_video')){ $Company_name = set_value('product_video'); } elseif (isset($service) &&$service) { $product_video = $service[0]['video']; } ?>

                            <input type="text" name="product_video" id="en_product_video" placeholder="Video Link Here"
                                class="inp test-id-inp bank_test-id-inp" value="<?php echo $product_video; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <span
                                class="input-error"><?php echo form_error('product_video', '<div class="error">', '</div>'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                            <label>PRODUCT IMAGE</label><br>
                            <?php if(set_value('pro_image')){ $pro_image = set_value('pro_image'); } elseif (isset($service) &&$service) { $pro_image = $service[0]['image']; } ?>

                            <input type="file" name="pro_image" id="en_pro_image" placeholder=""
                                class="inp test-id-inp file-input bank_test-id-inp">
                            <?php if($pro_image){ ?>
                            <a class="fa fa-file" style="font-size:16px;"
                                href="<?php echo base_url('uploads/'.$pro_image)?>" target="_blank">view file</a>
                            <?php } ?>
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <span
                                class="input-error"><?php echo form_error('pro_image', '<div class="error">', '</div>'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="container footer-button-container footer-top-button-container">
                    <div class="footer-button">
                        <a href=""><button class="nxt-button">UPDATE</button></a>
                    </div>
                </div>

</form><?php */?>
<div class="container footer-button-container footer-top-button-container">
                  
                     <div class="footer-button">
                        <a href="<?php echo base_url('supplier/create/photo/'.$this->uri->segment(4)."/".$this->uri->segment(5)) ; ?>"><input type="submit" class="next_tab" value="NEXT"></a>
                       
                    </div>
                    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="post" action="<?php echo site_url('supplier/edit/add_products'); ?>">
        <div class="input-section">
          <div class="row">
          <input type="hidden" name ="type" value="edit">
                  <input type="hidden" name ="busid" value="<?php echo @$bus_id1 ?>">
                  <input type="hidden" name ="id" value="<?php echo $id ?>">
                  <input type="hidden" name ="prid" value="<?php echo $prid ?>">
                  <input type="hidden" name ="cat_id" value="<?php echo @$data['sup'][0]->category_id ?>">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
              <label>PRODUCT NAME</label><br>
              <input type="text"  name="product_name" id="en_title"" placeholder="Product Name" class="inp test-id-inp bank_test-id-inp">
              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
             <label>PRODUCT NUMBER</label><br>
             <input type="text"  type="text" name="product_number" id="product_number" placeholder="Product Number" maxlength="16" oninput="if(value.length>17)value=value.slice(0,17)" class="inp test-id-inp bank_test-id-inp">
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
           
            </div>
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
             <label>PRODUCT PRICE ($)</label><br>
             <input type="number" name="product_price" id="en_title"  placeholder="Product Price"  class="inp test-id-inp-bio bank_test-id-inp">
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
           
            </div>
          </div>
          <div class="row">

           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div class="input-cont-wrap-col test-id-inp-div">
             <label>PRODUCT DETAILS</label><br>
             <input type="text" name="product_detail" id="en_product_detail" class="inp test-id-inp bank_test-id-inp" placeholder="Product Details"><br>
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        
            </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label>PRODUCT VIDEO</label><br>
             <input type="url" name="product_video" id="en_product_video" placeholder="Video Link Here" class="inp test-id-inp bank_test-id-inp">
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
           
            </div>
         </div>
         <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
           <label>PRODUCT IMAGE</label><br>
           <input type="file" name="pro_image" id="en_pro_image" class="inp test-id-inp file-input bank_test-id-inp">
           <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

         </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn product-bt-btn-close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn product-bt-submit">Submit</button>
        </div>
        </form>
   </div>
      </div>
                         
    </div>
  </div>
</div>