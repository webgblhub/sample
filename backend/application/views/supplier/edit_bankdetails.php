<style type="text/css">
        .bor
        {
            border: 2px solid #20bb62;
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
$bank_name="";
$account_nr="";
$routing_nr="";
$bank_addr1="";
$bank_addr2="";
$city="";
$state="";
$state="";
$zipcode="";
$ccnr="";
$ccdate="";
$paypal_addr="";
$Default="";
$ccvc="";




$prod_id = $this->input->get('prod_id');

// print_r($x);exit();

if (isset($service) && $service)
{
  $id = $service[0]['id'];
  //$proid = $service[0]['supplier_product_info_id'];

  // var_dump($id);
  // exit();
  // $status = $service[0]['status'];

}
$scid1 = $this->session->userdata('masterId');
$bus_id1 = $this->session->userdata('bus_id');

//$this->db->select('category');
//$this->db->from('event_dragon_supplier_category');
//$this->db->where('event_dragon_supplier_category.cat_id', $scid1);
//$query = $this->db->get();
//$result =  $query->result();
//$getCategoryName =isset($result[0]->category)?$result[0]->category:''; //print_r($getCategoryName);die;
//
//$this->db->select('company_name');
//$this->db->from('event_dragon_supplier_business_info');
//$this->db->where('event_dragon_supplier_business_info.id', $bus_id1);
//$query = $this->db->get();
//$result =  $query->result();
//$getCompanyName =isset($result[0]->company_name)?$result[0]->company_name:'';

?>
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
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/supplier/lists">Supplier</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Supplier Edit Bank Details</a>
            </li>
        </ul>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
<div class="row" style="margin-left: 0%">
        
      
                                <a href="<?php echo site_url('supplier/edit/editBusinessInfo/'.$data['sup'][0]->id); ?>" class="btn btn-success bor" >Business Info</a>
                            
                            
                                <a href="<?php echo site_url('supplier/edit/edit_promo_info/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Promo Info</a>
                           
                           
                                <a href="<?php echo site_url('supplier/edit/update_productpackages/'.$data['sup'][0]->id); ?>" class="btn btn-success bor ">Products Packages</a>
                           
                                <a href="<?php echo site_url('supplier/edit/update_bankdetail/'.$data['sup'][0]->id); ?>" class="btn btn-primary active  bor">Bank Details</a>

                                <a href="<?php echo site_url('supplier/edit/edit_photo_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Photos</a>

                                <a href="<?php echo site_url('supplier/edit/edit_video_gallery/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Video</a>

                                <a href="<?php echo site_url('supplier/edit/lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Lead</a>

                                <a href="<?php echo site_url('supplier/edit/booked_Lead_list/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Booked</a>

                                <a href="<?php echo site_url('supplier/edit/listOfReviews/'.$data['sup'][0]->supplier_id.'/'.$data['sup'][0]->category_id.'/'.$data['sup'][0]->id); ?>" class="btn btn-success bor">Reviews</a>
                            </div>
            <!-- Basic Form Inputs card start -->
            <div class="card">
               <br><br>
                <div class="card-header">
                    <h5>Edit Bank Details - <?php echo $categoryname[0]->category; ?> - <?php echo $categoryname[0]->company_name; ?></h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">

<form enctype="multipart/form-data" method="post" id="frm" name="frm" action="<?php echo ($servcount!=0)? site_url('supplier/edit/update_bankdetail/'.$this->uri->segment(4)):site_url('supplier/edit/add_bankdetail/'.@$data['sup'][0]->supplier_id."/".@$data['sup'][0]->category_id."/".$this->uri->segment(4)); ?>">
      <div class="row">
        <!-- left column -->
        <!-- <?php echo form_open_multipart('dashboard/add_promoinfo'); ?> -->

        
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Bank Details (<?php echo $suppcategory[0]->category.'-'.$getCompanyName; ?>)</h3> -->

              <!-- <a href="<?php echo site_url('admin/list-businessinfo'); ?>" alt="list-all" class="btn btn-sm btn-box">List All</a> -->
            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">
                  <input type="hidden" name ="prod_id" value="<?php echo $prod_id ?>">
                  <input type="hidden" name ="proid" value="<?php echo @$proid ?>">

                   <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank Name</label>
                      <?php if(set_value('bank_name')){ $bank_name = set_value('bank_name'); } elseif (isset($service) &&$service) { $bank_name = $service[0]['bank_name']; } ?>
                      <input type="text" name="bank_name" id="en_title" class="form-control" placeholder="Bank Name" value="<?php echo $bank_name; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('bank_name', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Bank Account Number</label>
                      <?php if(set_value('account_nr')){ $account_nr = set_value('account_nr'); } elseif (isset($service) &&$service) { $account_nr = @$service[0]['account_number']; } ?>
                      <input type="number"   oninput="if(value.length>17)value=value.slice(0,17)" name="account_nr" id="en_account_nr" class="form-control" placeholder="Bank Account Number" value="<?php echo $account_nr; ?>" data-toggle="tooltip" data-placement="top" title="Only 17 numerical digits only" onkeypress="return isNumberKey(event)">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('account_nr', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank Routing Number</label>
                      <?php if(set_value('routing_nr')){ $routing_nr = set_value('routing_nr'); } elseif (isset($service) && $service) { $routing_nr = @$service[0]['routing_number']; } ?>
                       <input type="number"  onkeypress="return isNumberKey(event)" maxlength="9"  name="routing_nr"  id="routing_nrNumber" class="form-control" placeholder="Bank Routing Number" value="<?php echo $routing_nr; ?>" oninput="if(value.length>9)value=value.slice(0,9)">

					   <span class="input-error"><?php echo form_error('routing_nr', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Bank Address1</label>
                      <?php if(set_value('bank_addr1')){ $bank_addr1 = set_value('bank_addr1'); } elseif (isset($service) &&$service) { $bank_addr1 = @$service[0]['address1']; } ?>
                      <input type="text" name="bank_addr1" id="en_bank_addr1" class="form-control" placeholder="Bank Address1" value="<?php echo $bank_addr1; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('bank_addr1', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank Address2</label>
                      <?php if(set_value('bank_addr2')){ $bank_addr2 = set_value('bank_addr2'); } elseif (isset($service) &&$service) { $bank_addr2 = @$service[0]['address2']; } ?>
                      <input type="text" name="bank_addr2" id="en_bank_addr2" class="form-control" placeholder=" Bank Address2" value="<?php echo $bank_addr2; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('bank_addr2', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>State</label>


						<select class="form-control select2" id="state" name="State_id">
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" <?php echo ($item->id==@$service[0]['state_id'])?"selected":""; ?> ><?php echo $item->name?></option>
                        <?php } ?>
                      	</select>

                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('state', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>City</label>
                      <input type="hidden" name="city2" value="<?php echo @$service[0]['city_id']; ?>">
                      <select class="form-control select2" id="city" name="city_id" >
                        <option value="" >Select City</option>
                        
                      </select>
                      <span class="input-error"><?php echo form_error('city', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Zip Code</label>
                      <?php if(set_value('zipcode')){ $zipcode = set_value('zipcode'); } elseif (isset($service) &&$service) { $zipcode = @$service[0]['zip_code']; }
                          // $c=strlen($zipcode);
                          // if($c==4)
                          // {
                          //   $zipcode='0'.$zipcode; }                        
                      ?>
                      <input type="text"  onkeypress="return isNumberKey(event)" maxlength="5"  name="zipcode" id="en_zipcode" class="form-control" placeholder="Zip Code" value="<?php echo $zipcode; ?>" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <div class="form-group">
                      <label>  CC Holder Name</label>
                      <input type="text" name="holder_name" id="holder_name" class="form-control" placeholder="CC Holder Name" value="<?php echo @$service[0]['holder_name']?>">
                    </div>

                    <div class="form-group">
                      <label>  CC Number</label>
                      <?php if(set_value('cc_number')){ $ccnr = set_value('cc_number'); } elseif (isset($service) &&$service) { $ccnr = @$service[0]['cc_number']; } ?>
                      <input type="number" name="cc_number" id="cc_number"  maxlength="16" class="form-control" placeholder="CC Number" value="<?php echo $ccnr; ?>" data-toggle="tooltip" data-placement="top" title="Only 16 numerical digits only">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('ccnr', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <div class="form-group">
                      <label>  CC Billing Address</label>
                      <input type="text" name="billing_address" id="billing_address" class="form-control" placeholder="CC Billing Address" value="<?php echo @$service[0]['billing_address']?>">
                    </div>

                    <div class="form-group">
                      <label>  CC Billing Zipcode</label>
                      <input type="number"  oninput="if(value.length>5)value=value.slice(0,5)" name="billing_zipcode" id="billing_zipcode" class="form-control" placeholder="CC Billing Zipcode" value="<?php echo @$service[0]['billing_zipcode']?>">
                    </div>

                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>CC date</label>
												<br>
												<?php if (isset($service) &&$service) { $month = @$service[0]['months'];} ?>
                                              <select class="form-control" name="month" id="month">
                                                  <option value="0" <?php echo (isset($month) && $month=="0")?'selected':"" ?>>--Month--</option>
                                                  <option value="01" <?php echo (isset($month) && $month=="01")?'selected':"" ?>>01</option>
                                                  <option value="02" <?php echo (isset($month) && $month=="02")?'selected':"" ?>>02</option>
                                                  <option value="03" <?php echo (isset($month) && $month=="03")?'selected':"" ?>>03</option>
                                                  <option value="04" <?php echo (isset($month) && $month=="04")?'selected':"" ?>>04</option>
                                                  <option value="05" <?php echo (isset($month) && $month=="05")?'selected':"" ?>>05</option>
                                                  <option value="06" <?php echo (isset($month) && $month=="06")?'selected':"" ?>>06</option>
                                                  <option value="07" <?php echo (isset($month) && $month=="07")?'selected':"" ?>>07</option>
                                                  <option value="08" <?php echo (isset($month) && $month=="08")?'selected':"" ?>>08</option>
                                                  <option value="09" <?php echo (isset($month) && $month=="09")?'selected':"" ?>>09</option>
                                                  <option value="10" <?php echo (isset($month) && $month=="10")?'selected':"" ?>>10</option>
                                                  <option value="11" <?php echo (isset($month) && $month=="11")?'selected':"" ?>>11</option>
                                                  <option value="12" <?php echo (isset($month) && $month=="12")?'selected':"" ?>>12</option>
											</select>

											<?php if (isset($service) &&$service) { $year = @$service[0]['years'];} ?>
                                              <select class="form-control" name="year" id="year">
                                                  <option value="0" <?php echo (isset($year) && $year=="0")?'selected':"" ?>>--Year--</option>
                                                  <option value="2020" <?php echo (isset($year) && $year=="2020")?'selected':"" ?>>2020</option>
                                                  <option value="2021" <?php echo (isset($year) && $year=="2021")?'selected':"" ?>>2021</option>
                                                  <option value="2022" <?php echo (isset($year) && $year=="2022")?'selected':"" ?>>2022</option>
                                                  <option value="2023" <?php echo (isset($year) && $year=="2023")?'selected':"" ?>>2023</option>
                                                  <option value="2024" <?php echo (isset($year) && $year=="2024")?'selected':"" ?>>2024</option>
                                                  <option value="2025" <?php echo (isset($year) && $year=="2025")?'selected':"" ?>>2025</option>
                                                  <option value="2026" <?php echo (isset($year) && $year=="2026")?'selected':"" ?>>2026</option>
                                                  <option value="2027" <?php echo (isset($year) && $year=="2027")?'selected':"" ?>>2027</option>
                                                  <option value="2028" <?php echo (isset($year) && $year=="2028")?'selected':"" ?>>2028</option>
                                                  <option value="2029" <?php echo (isset($year) && $year=="2029")?'selected':"" ?>>2029</option>
                                                  <option value="2030" <?php echo (isset($year) && $year=="2030")?'selected':"" ?>>2030</option>
                                              </select>

                    </div>
                    

                    <div class="form-group">
                      <label>CC State</label>

                      <select class="form-control select2" id="en_state" name="state">
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" <?php echo ($item->id==@$service[0]['ccstate'])?"selected":""; ?> ><?php echo $item->name?></option>
                        <?php } ?>
                      </select>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('state', '<div class="error">', '</div>'); ?></span>
                    </div>
                    
                    <div class="form-group">
                      <label>CC City</label>
                      <input type="hidden" name="city3" value="<?php echo @$service[0]['cccity']; ?>">
                      <select class="form-control select2" id="en_city" name="city" >
                        <option value="" >Select City</option>
                        
                      </select>
                      <span class="input-error"><?php echo form_error('city', '<div class="error">', '</div>'); ?></span>
                    </div>

                  <div class="form-group">
                    <label>CVV/CVC/CID</label>
                    <?php if(set_value('ccvc')){ $ccvc = set_value('ccvc'); } elseif (isset($service) &&$service) { $ccvc = @$service[0]['cvc']; } ?>
                    <input type="text" name="ccvc"  maxlength="4"  id="en_ccvc" class="form-control" placeholder="CVC" value="<?php echo $ccvc; ?>" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <span class="input-error"><?php echo form_error('ccvc', '<div class="error">', '</div>'); ?></span>
                  </div>

                    <div class="form-group">

                      <label> Paypal Address</label>
                      <?php if(set_value('paypal_addr')){ $paypal_addr = set_value('paypal_addr'); } elseif (isset($service) &&$service) { $paypal_addr = @$service[0]['paypal_address']; } ?>
                      <input type="email" name="paypal_addr" id="en_paypal_addr" class="form-control" placeholder="Paypal Address" value="<?php echo $paypal_addr; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('paypal_addr', '<div class="error">', '</div>'); ?></span>
											<?php /*?><input type="checkbox"  value="1" name="same_email" <?php if(@$service[0]['same_email_business']==1){ echo 'checked'; }?>>SAME EMAIL AS BUSINESS EMAIL<?php */?>
										<br/>
										</div>

                  </div>

                </div>
                <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <label></label>
									<?php /*?><?php if(@$service[0]['load_default']==1){?>
										<input type="checkbox" name="Default" id="en_Default"  class="en_Default_bank"  checked value="<?php echo "1"; ?>"> Load default bank details
									<?php } else {
?>
<input type="checkbox" name="Default" id="en_Default"  class="en_Default_bank"  value="<?php echo "1"; ?>"> Load default bank details
<?php
									}
									?><?php */?>

                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <span class="input-error"><?php echo form_error('Default', '<div class="error">', '</div>'); ?></span>
                  </div>
                </div>
              </div>
               <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>

               <!--  <div class="box-footer">
                  <!-- <button type="reset" class="btn btn-default pull-right form-btn">Cancel</button> -->
									<!-- <?php if($id){ ?>

										<div class="row">
                  <div class="col-md-10">
									<button type="submit" name="previous" value="Previous" class="btn btn-primary pull-right form-btn">PREVIOUS</button>
									</div>
									<div class="col-md-1">
									<button type="submit" name="submit" class="btn btn-primary pull-right form-btn">CONTINUE</button>
									</div>
										</div>

									<?php }else{ ?>
										<div class="row">
                  <div class="col-md-10">
									<button type="submit" name="previous" value="Previous" class="btn btn-primary pull-right form-btn">PREVIOUS</button>
									</div>
									<div class="col-md-1">
									<button type="submit" name="submit" class="btn btn-primary pull-right form-btn">CONTINUE</button>
									</div>
										</div>
                  <?php } ?>
                </div> --> 


              </div>
          </div>
        </div>
      <!-- </form> -->




        
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
<script>

// var value =$('#en_zipcode').val();alert(value);
//
//   if(value==0){
//     return true;
//   }else {
//     $("#test").html("Hello !");
//     return false;
//   }

  function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>
