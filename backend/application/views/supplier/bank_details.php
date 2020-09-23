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
$scid = $this->session->userdata('scid');
$bus_id1 = $this->session->userdata('bus_id');

//$this->db->select('category');
//$this->db->from('event_dragon_supplier_category');
//$this->db->where('event_dragon_supplier_category.cat_id', $scid);
//$query = $this->db->get();
//$result =  $query->result();
//$getCategoryName =isset($result[0]->category)?$result[0]->category:'';

//get company name
$this->db->select('company_name');
//$this->db->from('event_dragon_supplier_business_info');
//$this->db->where('event_dragon_supplier_business_info.id', $bus_id1);
//$query = $this->db->get();
//$result =  $query->result();
//$getCompanyName =isset($result[0]->company_name)?$result[0]->company_name:'';

// print_r($x);exit();

if (isset($service) && $service)
{
  $id = $service[0]['id'];

  // var_dump($id);
  // exit();
  $status = $service[0]['status'];

}

?>

<div class="page-header">
                <div class="page-header-title">
                    <h4>Supplier</h4>
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
                        <li class="breadcrumb-item"><a href="#!"> Add Suppliers Bank Details</a>
                        </li>
                    </ul>
                </div>
            </div>

<div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Add Supplier Bank Details</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>

                            <div class="card-block">
<form enctype="multipart/form-data" method="post" name="frm" id="frm" action="<?php echo site_url('supplier/create/add_bankdetail/'.$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)); ?>">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <!-- <?php echo form_open_multipart('dashboard/add_promoinfo'); ?> -->

        
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bank Details (<?php echo $suppcategory[0]->category.'-'.$getCompanyName; ?>)</h3>

              <!-- <a href="<?php echo site_url('admin/list-businessinfo'); ?>" alt="list-all" class="btn btn-sm btn-box">List All</a> -->
            </div>
            <span class="input-error"><?php echo $this->session->flashdata('err'); ?></span>
              <div class="box-body">
                <div class="row">
                  <input type="hidden" name ="prod_id" value="<?php echo $prod_id ?>">

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
                      <?php if(set_value('account_nr')){ $account_nr = set_value('account_nr'); } elseif (isset($service) &&$service) { $account_nr = $service[0]['account_nr']; } ?>
                      <input type="number"  oninput="if(value.length>17)value=value.slice(0,17)" name="account_nr" id="en_account_nr" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="17" class="form-control" placeholder="Bank Account Number" value="<?php echo $account_nr; ?>" data-toggle="tooltip" data-placement="top" title="Only 17 numerical digits only" onkeypress="return isNumberKey(event)">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('account_nr', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank Routing Number</label>
                      <?php if(set_value('routing_nr')){ $routing_nr = set_value('routing_nr'); } elseif (isset($service) && $service) { $routing_nr = $service[0]['routing_nr']; } ?>
                       <input type="number" oninput="if(value.length>9)value=value.slice(0,9)"  name="routing_nr"  id="routing_nrNumber" class="form-control" placeholder="Bank Routing Number" value="<?php echo $routing_nr; ?>" onkeypress="return isNumberKey(event)">
                        <span class="input-error"><?php echo form_error('routing_nr', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Bank Address1</label>
                      <?php if(set_value('bank_addr1')){ $bank_addr1 = set_value('bank_addr1'); } elseif (isset($service) &&$service) { $bank_addr1 = $service[0]['bank_addr1']; } ?>
                      <input type="text" name="bank_addr1" id="en_bank_addr1" class="form-control" placeholder="Bank Address1" value="<?php echo $bank_addr1; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('bank_addr1', '<div class="error">', '</div>'); ?></span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank Address2</label>
                      <?php if(set_value('bank_addr2')){ $bank_addr2 = set_value('bank_addr2'); } elseif (isset($service) &&$service) { $bank_addr2 = $service[0]['bank_addr2']; } ?>
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
						<select class="form-control select2" id="state" name="State_id" >
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                        <?php } ?>
                      	</select>

                      <span class="input-error"><?php echo form_error('state', '<div class="error">', '</div>'); ?></span>
                    </div>
                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>City</label>
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
                      <?php if(set_value('zipcode')){ $zipcode = set_value('zipcode'); } elseif (isset($service) &&$service) { $zipcode = $service[0]['zipcode']; } ?>
                      <input type="text"  onkeypress="return isNumberKey(event)" maxlength="5" name="zipcode" id="en_zipcode" class="form-control" placeholder="Zip Code" value="<?php echo $zipcode; ?>" data-toggle="tooltip" data-placement="top" title="Only 5 numerical digits only" onkeypress="return isNumberKey(event)">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('zipcode', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <div class="form-group">
                      <label>  CC Number</label>
                      <?php if(set_value('ccnr')){ $ccnr = set_value('ccnr'); } elseif (isset($service) &&$service) { $ccnr = $service[0]['ccnr']; } ?>
                      <input type="number" name="cc_number" maxlength="16" id="cc_number" class="form-control" placeholder="Number" value="<?php echo $ccnr; ?>" data-toggle="tooltip" data-placement="top" title="Only 16 numerical digits only">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" onkeypress="return isNumberKey(event)">
                      <span class="input-error"><?php echo form_error('ccnr', '<div class="error">', '</div>'); ?></span>
                    </div>

                    <div class="form-group">
                      <label>  CC Holder Name</label>
                      <input type="text" name="holder_name" id="holder_name" class="form-control" placeholder="CC Holder Name" value="" >
                    </div>

                    <div class="form-group">
                      <label>  CC Billing Address</label>
                      <input type="text" name="billing_address" id="billing_address" class="form-control" placeholder="CC Billing Address" value=""  >
                    </div>

                    <div class="form-group">
                      <label>  CC Billing Zipcode</label>
                      <input type="text" oninput="if(value.length>5)value=value.slice(0,5)" name="billing_zipcode" id="billing_zipcode" class="form-control" placeholder="CC Billing Zipcode" value="" >
                    </div>

                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>CC date</label>
                        <br>
                      <select name="month" class="form-control" id="month" >
                          <option class="form-control" value="0" disabled selected>--Month--</option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                          <option>04</option>
                          <option>05</option>
                          <option>06</option>
                          <option>07</option>
                          <option>08</option>
                          <option>09</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                      </select>
                      <select name="year" class="form-control" id="year" >
                          <option class="form-control" value="0" disabled selected>--Year--</option>
                          <option>2020</option>
                          <option>2021</option>
                          <option>2022</option>
                          <option>2023</option>
                          <option>2024</option>
                          <option>2025</option>
                          <option>2026</option>
                          <option>2027</option>
                          <option>2028</option>
                          <option>2029</option>
                          <option>2030</option>
                      </select>

                    </div>
                    
                    <div class="form-group">
                      <label>CC State</label>
                      <select class="form-control select2" id="en_state" name="state">
                        <option value="" >Select State</option>
                        <?php foreach($states as $item) { ?>
                        <option value="<?php echo $item->id ?>" ><?php echo $item->name?></option>
                        <?php } ?>
                      </select>
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('state', '<div class="error">', '</div>'); ?></span>
                    </div>
                    
                    <div class="form-group">
                      <label>CC City</label>
                      <select class="form-control select2" id="en_city" name="city" >
                        <option value="" >Select City</option>
                        
                      </select>
                      <span class="input-error"><?php echo form_error('city', '<div class="error">', '</div>'); ?></span>
                    </div>

                  <div class="form-group">
                    <label> CVV/CVC/CID</label>
                    <?php if(set_value('ccvc')){ $ccvc = set_value('ccvc'); } elseif (isset($service) &&$service) { $ccvc = $service[0]['ccvc']; } ?>
                    <input type="text" name="ccvc"  maxlength="4" id="en_ccvc"  class="form-control" placeholder="CVC" value="<?php echo $ccvc; ?>" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" onkeypress="return isNumberKey(event)">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <span class="input-error"><?php echo form_error('ccvc', '<div class="error">', '</div>'); ?></span>
                  </div>

                    <div class="form-group">

                      <label> Paypal Address</label>
                      <?php if(set_value('paypal_addr')){ $paypal_addr = set_value('paypal_addr'); } elseif (isset($service) &&$service) { $paypal_addr = $service[0]['paypal_addr']; } ?>
                      <input type="email" name="paypal_addr" id="en_paypal_addr" class="form-control" placeholder="Paypal Address" value="<?php echo $paypal_addr; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <span class="input-error"><?php echo form_error('paypal_addr', '<div class="error">', '</div>'); ?></span>
											<?php /*?><input type="checkbox"  name="same_email" value="1">SAME EMAIL AS BUSINESS EMAIL<?php */?>
										</div>

                  </div>

                </div>
                <?php /*?><div class="row">
                <div class="col-md-6">



                  <div class="form-group">
                    <label></label>
                    <?php if(set_value('Default')){ $Default = set_value('Default'); } elseif (isset($service) &&$service) { $Default = $service[0]['Default']; } ?>
                    <input type="checkbox" name="Default" class="en_Default_bank" id="en_Default_bank"   value="<?php echo "1" ?>"> Load default bank details
										<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

                    <span class="input-error"><?php echo form_error('Default', '<div class="error">', '</div>'); ?></span>
                  </div>
                </div>
              </div><?php */?>

              <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">SAVE & NEXT</button>
                            </div>
                        </div>


              </div>
          </div>
        </div>
      <!-- </form> -->

        
      </div>
    </section>
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
