                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->
   
 <!-- Warning Section Ends -->
    <!-- Required Jqurey -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/classie/classie.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
    <!-- Rickshow Chart js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/d3/d3.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/rickshaw/rickshaw.js"></script>
    <!-- Morris Chart js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/morris.js/morris.js"></script>
    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/horizontal-timeline/js/main.js"></script>
    <!-- amchart js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/amcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/serial.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/light.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/custom-amchart.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
     <!-- jquery file upload js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/js/jquery.filer.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/custom-filer.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/js/script.js"></script>

   <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/data-table-custom.js"></script>
    
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>   
     <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
	$( ".delete" ).click(function() {
	  if(confirm( "Are you really need to delete this data?" ))
	  {
	  return true;
	  }
	  else
	  {
	  return false;
	  }
	});
    </script> 
    <script>
$(document).ready(function(){  

     $('[data-toggle="tooltip"]').tooltip();  

     $("#busss").attr("required", true);
     
      $("#statecode").change(function(){  
          
           var code = $('#statecode').val();  
           
           if(code != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>country/state/check_available",  
                     type:"POST",  
                     data:{code:code},  
                     success:function(data){  
                          $('#avilable').html(data); 
                            var label = $('#tt');
                            var text = label.text();
                            if(text=="Yes")
                            {
                                 $('#sub').hide();
                            }  
                            else if(text=="No")
                            {

                                $('#sub').show();
                            }
                     }  
                });

           }  
          
      });

      $("#ques_type").change(function(){  
          
           var type = $('#ques_type').val();  
           
          if(type == "checkbox")  
           {  
             $("#mustreq").hide();
            $("#ques_answer").show();
           
           }
            else if(type == 'radio')  
           {  
            $("#ques_answer").show();
             $("#mustreq").show();
           }
           
           else{
                 $("#ques_answer").hide();
                  $("#mustreq").show();
           }
           
           }); 

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
      // $("#bisnext").click(function()
      // {
      //    var selected =  $('#biscat').val();
      //    var supplier_id = $('#supplier_id').val();
      //    var business_id = $('#businessid').val();
      //    location.href ="<?php echo base_url(); ?>supplier/create/addBusinessStore/" + supplier_id + "/" +business_id + "/" + selected;


          
       
      //   });
      $("#new_photo").click(function()
      {
        $("#newp").slideToggle();
    });


 });  

 

// assumes you're using jQuery
$(document).ready(function() {
$('.input-error').hide();
<?php if($this->session->flashdata('err')){ ?>
$('.input-error').html('<?php echo $this->session->flashdata('err'); ?>').show();
<?php } ?>
});
</script>
<script type="text/javascript">

$(document).ready(function() {
$(function () {
    $("select#state").change();
});
    $('#state').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>administrator/getCity',
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
            url: '<?php echo base_url(); ?>administrator/getCity2',
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#en_city').html(response); 
           }
       });
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
        $("#busss").attr("required", false);

    }
    else
    {
        $("#chk").show();
        $("#chk1").hide();
        $("#busss").attr("required", true);
    }
 } 

  </script>

    </body>
</html>