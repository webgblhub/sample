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

$id=base64_decode($this->uri->segment(4));

$data['sup']=$this->Edit_Model->selectSupplierid($id);
 $store_id= $data['sup'][0]->id;

$data['categoryname']=$this->Edit_Model->selectCategoryname($store_id);
 if(!empty($data['categoryname'][0]->company_name)){
                $companyName = '-'.$data['categoryname'][0]->company_name;
              }else{
                $companyName = '';
              } 

$suppcategory=$this->Create_Model->getCatId(@$data['sup'][0]->category_id);
$servcount=count($service);
$prod_id = $this->input->get('prod_id');
if (isset($service) && $service)
{
  $id = $service[0]['id'];
  $proid = $service[0]['switch_id'];

  }


$scid1 = $this->session->userdata('masterId');
$bus_id1 = $this->session->userdata('bus_id');


$switchid=$this->input->get('prod_id');

//print_r($service);
$ids=array();
$pays=array();
$values=array();
foreach($service as $item)
{
array_push($ids,$item['id']);
array_push($pays,$item['payment_id']);
$values[$item['payment_id']]=$item['value'];
}
//print_r($values);
 ?>

 
  <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <h5>EDIT PAYMENT METHODS</h5>
                    
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

<form enctype="multipart/form-data" method="post"  id="frm" action="<?php echo ($servcount!=0)? site_url('supplier/edit/update_bankdetail/'.$this->uri->segment(4)):site_url('supplier/edit/add_bankdetail/'.base64_encode(@$data['sup'][0]->supplier_id)."/".base64_encode(@$data['sup'][0]->category_id)."/".$this->uri->segment(4)); ?>">

 
       <input type="hidden" name ="prod_id" value="<?php echo $prod_id ?>">
       <input type="hidden" name ="proid" value="<?php echo @$proid ?>">
       <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

<?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>

                              
 <div class="container container-contents-wrap">
 <div class="col-md-12"><h5>Events Dragon is in the process of integrating our platform-based digital payment processor.  However for now, please provide us with your preferred mobile payment means.</h5></div>
  <?php /*?><div class="header-sec">
              <h5>BANK DETAILS</h5>
            </div><?php */?>

            <?php /*?><div class="input-element-wrap">
              
               <div class="input-section">
                 <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                     <label>BANK NAME</label><br>
                     <?php if(set_value('bank_name')){ $bank_name = set_value('bank_name'); } elseif (isset($service) &&$service) { $bank_name = $service[0]['bank_name']; } ?>
                     <input type="text" placeholder="Bank Name" value="<?php echo $bank_name; ?>" class="inp test-id-inp bank_test-id-inp" name="bank_name" id="en_title">
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BANK ACCOUNT NUMBER</label><br>
                    <?php if(set_value('account_nr')){ $account_nr = set_value('account_nr'); } elseif (isset($service) &&$service) { $account_nr = $service[0]['account_number']; } ?>
                    <input type="number" class="inp test-id-inp bank_test-id-inp" name="account_nr" id="en_account_nr" maxlength="17" placeholder="Bank Account Number" value="<?php echo $account_nr; ?>" data-toggle="tooltip" data-placement="top" title="Only 17 numerical digits only" oninput="if(value.length>17)value=value.slice(0,17)">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>BANK ROUTING NUMBER</label><br>
                    <?php if(set_value('routing_nr')){ $routing_nr = set_value('routing_nr'); } elseif (isset($service) && $service) { $routing_nr = $service[0]['routing_number']; } ?>
                    <input type="number" class="inp test-id-inp bank_test-id-inp" name="routing_nr"  maxlength="9" id="routing_nrNumber" placeholder="Bank Routing Number" value="<?php echo $routing_nr; ?>" oninput="if(value.length>9)value=value.slice(0,9)" data-toggle="tooltip" data-placement="top" title="Only 9 numerical digits only">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-cont-wrap-col test-id-inp-div">
                    <label>BANK ADDRESS1</label><br>
                    <?php if(set_value('bank_addr1')){ $bank_addr1 = set_value('bank_addr1'); } elseif (isset($service) &&$service) { $bank_addr1 = $service[0]['address1']; } ?>
                     <input type="text" name="bank_addr1" id="en_bank_addr1"  placeholder="Bank Address1" value="<?php echo $bank_addr1; ?>"  class="inp test-id-inp-bio bank_test-id-inp">
                </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>BANK ADDRESS2</label><br>
                   <?php if(set_value('bank_addr2')){ $bank_addr2 = set_value('bank_addr2'); } elseif (isset($service) &&$service) { $bank_addr2 = $service[0]['address2']; } ?>
                   <input type="text" name="bank_addr2" id="en_bank_addr2"  placeholder=" Bank Address2" value="<?php echo $bank_addr2; ?>"  class="inp test-id-inp-bio bank_test-id-inp">
                 </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label>STATE</label><br>
                     <?php if(set_value('state')){ $state = set_value('state'); } elseif (isset($service) &&$service) { $state = $service[0]['state_id']; } ?>
                    <select class="selec-attr bank_test-id-inp" id="state" name="State_id">
                    <option id="header-opt" value="">Select State</option>
                    <?php foreach($states as $item) { ?> 
                        
                        <option id="header-opt" value="<?php echo $item->id ?>" <?php echo ($item->id==@$service[0]['state_id'])?"selected":""; ?> ><?php echo $item->name?></option>
                        <?php } ?>
                                           
                 </select>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                   <label>CITY</label><br>
                     <input type="hidden" name="city2" value="<?php echo @$service[0]['city_id']; ?>">
                   <select class="selec-attr bank_test-id-inp" id="city" name="city_id">
                     <option id="header-opt" value="" >Select City</option>
                 </select>
                 </div>
                
               
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label>ZIP CODE</label><br>
                    <?php if(set_value('zipcode')){ $zipcode = set_value('zipcode'); } elseif (isset($service) &&$service) { $zipcode = $service[0]['zip_code']; } ?>
                    <input type="number" maxlength="5" name="zipcode" id="en_zipcode" placeholder="Zip Code" value="<?php echo $zipcode; ?>" data-toggle="tooltip"  data-placement="top" title="Only 5 numerical digits only" class="inp test-id-inp bank_test-id-inp" oninput="if(value.length>5)value=value.slice(0,5)">
                  </div>
                </div>
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <label>CC HOLDER NAME</label><br>
                   
                    <input type="text" name="holder_name" id="holder_name" placeholder="CC Holder Name" value="<?php echo @$service[0]['holder_name'] ?>" class="inp test-id-inp bank_test-id-inp">
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                   <label>CC NUMBER</label><br>
                   <?php if(set_value('cc_number')){ $ccnr = set_value('cc_number'); } elseif (isset($service) &&$service) { $ccnr = @$service[0]['cc_number']; } ?>
                     <input type="number" name="cc_number" maxlength="16" id="cc_number" placeholder="Number" value="<?php echo $ccnr; ?>" data-toggle="tooltip" data-placement="top" title="Only 16 numerical digits only" class="inp test-id-inp bank_test-id-inp" oninput="if(value.length>16)value=value.slice(0,16)">
                 </div>
                  
                
                
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                   <label>CC BILLING ADDRESS</label><br>
                  
                     <input type="text" name="billing_address" id="billing_address" placeholder="CC Billing Address" value="<?php echo @$service[0]['billing_address'] ?>" class="inp test-id-inp-bio bank_test-id-inp" >
                 </div>
                  
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>CC BILLING ZIPCODE</label><br>
                    <input type="number" name="billing_zipcode" id="billing_zipcode" placeholder="CC Billing Zipcode" value="<?php echo @$service[0]['billing_zipcode'] ?>" class="inp test-id-inp bank_test-id-inp" oninput="if(value.length>5)value=value.slice(0,5)" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" >
                  </div> 

                  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <label>CC MONTH</label><br>
                    <?php if (isset($service) &&$service) { $month = @$service[0]['months'];} ?>
                    <select name="month" class="selec-attr bank_test-id-inp" id="month" >
                         
                          <option id="header-opt" value="" <?php echo (isset($month) && $month=="0")?'selected':"" ?>>--Month--</option>
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
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                      <label>CC YEAR</label><br>
                      <?php if (isset($service) &&$service) { $year = $service[0]['years'];} ?>
                      <select name="year" class="selec-attr bank_test-id-inp" id="year" >
                          
                          <option id="header-opt" value="" <?php echo (isset($year) && $year=="0")?'selected':"" ?>>--Year--</option>
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
                </div>

                   <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>CC STATE</label><br>
                    <select class="selec-attr bank_test-id-inp" id="en_state" name="state">
                      <?php if(set_value('state')){ $state = set_value('state'); } elseif (isset($service) &&$service) { $state = $service[0]['ccstate']; } ?>
                    <option id="header-opt" value="">Select State</option>
                    <?php foreach($states as $item) { ?>
                        <option id="header-opt" value="<?php echo $item->id ?>" <?php echo ($item->id==@$service[0]['ccstate'])?"selected":""; ?> ><?php echo $item->name?></option>
                        <?php } ?>
                                           
                 </select>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   <label>CC CITY</label><br>
                     <?php if(set_value('city')){ $city = set_value('city'); } elseif (isset($service) &&$service) { $city = $service[0]['cccity']; } ?>
                      <input type="hidden" name="city3" value="<?php echo @$service[0]['cccity']; ?>">
                   <select class="selec-attr bank_test-id-inp" id="en_city" name="city">
                     <option id="header-opt" value="" >Select City</option>
                 </select>             
                </div>
              </div>
                <div class="row">

                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>CVV/CVC/CID</label><br>
                      <?php if(set_value('ccvc')){ $ccvc = set_value('ccvc'); } elseif (isset($service) &&$service) { $ccvc = $service[0]['cvc']; } ?>
                    <input type="number" name="ccvc"  maxlength="4" id="en_ccvc" placeholder="CVC" value="<?php echo $ccvc; ?>" data-toggle="tooltip" data-placement="top" title="Only 4 numerical digits only" class="inp test-id-inp bank_test-id-inp" oninput="if(value.length>4)value=value.slice(0,4)">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>PAYMENT METHODS</label><br>
                    <select class="selec-attr bank_test-id-inp" id="pay" name="pay">
                    
                    <?php foreach($paymethods as $item) { ?> 
                        
                        <option id="header-opt" value="<?php echo $item->id ?>" <?php if(@$service[0]['pay_method']==$item->id) { ?> selected="selected"<?php } ?> ><?php echo $item->title?></option>
                        <?php } ?>
                                           
                 </select>
                  </div>
                  
                  
                </div>
                
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  
                    <label>EMAIL ADDRESS</label><br>
                    
                    <input type="email" name="email" id="email" placeholder="Email Address" value="<?php echo @$service[0]['email']; ?>" class="inp test-id-inp bank_test-id-inp">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  
                    <label>PHONE NUMBER</label><br>
                    
                    <input type="number" name="phone" id="phone" placeholder="Phone Number" value="<?php echo @$service[0]['phone']; ?>" class="inp test-id-inp bank_test-id-inp">
                  </div>
                  </div>
                  
                </div>


               </div><?php */?>
               
               <table class="payment" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>Payment Methods</th>
    <th>Values(Email Id/Phone Numbers)</th>
  </tr>
  
  <?php $i=0;foreach($paymethods as $item) {  ?>
  <tr>
    <td><input type="checkbox" name="chk[]" value="<?php echo $item->id ?>" <?php if(in_array($item->id,$pays)) { ?> checked="checked"<?php } ?> onclick="document.getElementById('<?php echo $item->id ?>').disabled=!this.checked" /><?php echo $item->title ?></td>
    <td><input type="text" name="value[]" value="<?php echo @$values[$item->id]; ?>" id="<?php echo $item->id ?>" class="inp test-id-inp bank_test-id-inp" <?php if(!in_array($item->id,$pays)) { ?>disabled="disabled"<?php } ?> /></td>
    </tr>
    <?php ++$i; } ?>
  
</table>
            </div>
          </div>
          <div class="container footer-button-container footer-top-button-container">
            <div class="footer-button">
              <button class="nxt-button" type="submit">UPDATE</button>
             </div>
           </div> 
        </section>
      </form>


<script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {


$(function () {
    $("select#state").change();
  
});
    $('#state').change(function(e) {
  
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>dashboard/getCity',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#city').html(response); 
           }
       });
     });
});

</script>

<script type="text/javascript">

$(document).ready(function() {
$(function () {
    $("select#en_state").change();
});
    $('#en_state').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>dashboard/getCity2',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#en_city').html(response); 
           }
       });
     });
});

 $(document).ready(function() {

$('.en_Default_bank').click(function() {
    if ($(this).is(':checked')) {
          $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dashboard/bankdetails')?>",
                dataType : "JSON",
                data : {},
                success: function(data){
                   console.log(data);
                   var obj = JSON.parse(JSON.stringify(data));

                   $('#en_title').val(obj.bank_name);
                   $('#en_account_nr').val(obj.bank_account_number);
                   $('#routing_nrNumber').val(obj.bank_routing_number);


                   $('#en_bank_addr1').val(obj.bank_address1);

                   $('#en_bank_addr2').val(obj.bank_address2);

                   $('#en_city').val(obj.bank_city_id);
                   $('#en_state').val(obj.bank_state_id).change();;

                   $('#en_zipcode').val(obj.bank_zip_code);


                   $('#cc_number').val(obj.cc_number);

                   $('#holder_name').val(obj.holder_name);

                   $('#billing_address').val(obj.billing_address);

                   $('#billing_zipcode').val(obj.billing_zipcode);

                   $('#month').val(obj.months);
                   $('#year').val(obj.years);




                   $('#en_ccvc').val(obj.cc_cvc);
                  $('#en_paypal_addr').val(obj.paypal_address);







                }
            });
    }
if(!$(this).is(':checked')){

  console.log('f');
  $('#en_title').val("");
                   $('#en_account_nr').val("");
                   $('#routing_nrNumber').val("");


                   $('#en_bank_addr1').val("");

                   $('#en_bank_addr2').val("");

                   $('#en_city').val("");
                   $('#en_state').val("");

                   $('#en_zipcode').val("");


                   $('#cc_number').val("");

                   $('#holder_name').val("");

                   $('#billing_address').val("");

                   $('#billing_zipcode').val("");

                   $('#month').val("");
                   $('#year').val("");



                   $('#en_title').val("");
                   $('#en_ccvc').val("");
                  $('#en_paypal_addr').val("");
}

  });
});
</script>
