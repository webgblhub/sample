<style type="text/css">
  .main_ftr
  {
    background: #2c3e50 !important;
    
    color: #c8ccd1 !important;
  }
</style>
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Media</h4>
    </div>
    <div class="modal-body imagery">
      <div class="row">
        <div class="col-lg-9 col-xs-12">
          <div class="row">
            <?php
              if($map){ foreach ($map as $map) {
                $ext = pathinfo($map, PATHINFO_EXTENSION);
                if($ext == "pdf") {
                  $image = base_url('uploads/').'pdf.jpg';
                } else {
                  $image = base_url('uploads/media/').$map;
                }
            ?>
            <div class="col-lg-2 col-xs-6 imagery-item" title="<?php echo $map; ?>">
              <div class="small-box bg-imagery">
                <div class="inner">
                    <img src="<?php echo $image; ?>" alt="<?php echo $map; ?>" style="width:100%;height:75px;">
                </div>
                <div class="image-dlt" title="Delete">
                  <a class="imagery-item-dlt" data-item="<?php echo $map; ?>" data-url="<?php echo site_url('admin/delete-media-item'); ?>"><i class="fa fa-trash-o"></i></a>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12 imagery-aside">
          <div class="imagery-details">
            <div class="imagery-preview">
              <img src="<?php echo base_url('uploads/no-image.jpg'); ?>" alt="Image" style="width:100%;">
            </div>
            <div class="imagery-text">
              <h5><strong>Image Preview</strong></h5>
              <input type="hidden" class="imagery_url" value="<?php echo base_url('uploads/media/'); ?>">
              <input type="text" class="form-control imagery-link" value="Preview URL" readonly>
              <input type="text" class="form-control imagery-size" value="width x height" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="pull-left ar_popup_pagination" ></div>
      <button type="button" class="btn btn-sm btn-default  close-modal" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-sm btn-primary add-image">Add</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 <footer class="main-footer main_ftr">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> -->
    <strong>Copyright &copy; <?php echo date('Y') ?>, Plan Tech, Inc (PTI) and EventsDragon.Com (EDC).  All rights reserved.
    <div class="col-md-4">
    <a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-default btn-flat sign-out">Sign out</a>
  </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<?php if($this->uri->segment(2)!="calendar") { ?>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<?php } ?>
<?php /*?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><?php */?>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<?php /*?><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script><?php */?>
<!-- Select2 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/raphael/raphael.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/dropzone.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php /*?><script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/dashboard.js"></script><?php */?>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/ckeditor/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<?php /*?><script src="<?php echo base_url('assets/admin/'); ?>dist/js/demo.js"></script><?php */?>
<script src="<?php echo base_url('assets/common/'); ?>jquery.simplePagination.js"></script>
<script src="<?php echo base_url('assets/common/'); ?>ar_pagination.js"></script>
<script src="<?php echo base_url('assets/common/'); ?>ar_search.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/custom.js"></script>
<!-- extra -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<?php /*?><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><?php */?>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<?php /*?><script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script><?php */?>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<?php /*?><script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script><?php */?>
<!--  -->

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/js/config.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/js/util.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/js/jquery.emojiarea.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/js/emoji-picker.js"></script>
  
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

</script>


  <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '<?php echo base_url(); ?>'+'assets/admin/lib/img',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
<script>




	function deleteimage(id)
	{

		if (confirm('Are you sure you want to delete this?')) {
		$.ajax({
                type : "POST",
                url  : "<?php echo site_url('dashboard/delete_photo_gallery_image')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){

                }
            });
						window.location.reload(true);

		}
	}


	$(document).ready(function() {

				$("#ckbCheckAll").click(function () {
            $(".week").attr('checked', this.checked);
        });

				$("#ckbCheckAllmonth").click(function () {
            $(".month").attr('checked', this.checked);
        });


				$("#acceptable_cosumer").click(function () {
					console.log('c');
            $(".cosumer").attr('checked', this.checked);
        });


				$("#acceptable_business").click(function () {
            $(".business").attr('checked', this.checked);
        });


  //set initial state.


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
<script type="text/javascript">

    $("#upload_link").click(function(){
    $("#upload").click();
});

  
  </script>

<script>

$(document).ready(function() {


 $("#bis").hide();

      $("#biscat").change(function()
      {
        var bist = $('#biscat').val(); 

        if(bist!=null)
        {
            $("#bis").show();
            $("#chk1").hide();
        }

       });
$("#bisnext").click(function()
      {
         var selected =  $('#biscat').val();
         var supplier_id = $('#supplier_id').val();
         var business_id = $('#businessid').val();
         location.href ="<?php echo base_url(); ?>supplier/create/addBusinessStore/" + supplier_id + "/" +business_id + "/" + selected;


          
       
        });
});

</script>

<script type="text/javascript">
      
      function sameBusiness(chk)
 {
     if(chk.checked == true)
    {
       $("#chk").hide();
       $("#chk1").show();

    }
    else
    {
        $("#chk").show();
        $("#chk1").hide();
    }
 } 

  </script>




  






</body>
</html>
<script>

$(document).ready(function() {


 $("#bis").hide();

      $("#biscat").change(function()
      {
        var bist = $('#biscat').val(); 

        if(bist!=null)
        {
            $("#bis").show();
            $("#chk1").hide();
        }

       });
$("#bisnext").click(function()
      {
         var selected =  $('#biscat').val();
         var supplier_id = $('#supplier_id').val();
         var business_id = $('#businessid').val();
         location.href ="<?php echo base_url(); ?>supplier/create/addBusinessStore/" + supplier_id + "/" +business_id + "/" + selected;


          
       
        });
});

</script>

<script type="text/javascript">
      
      function sameBusiness(chk)
 {
     if(chk.checked == true)
    {
       $("#chk").hide();
       $("#chk1").show();

    }
    else
    {
        $("#chk").show();
        $("#chk1").hide();
    }
 } 

  </script>