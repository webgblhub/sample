 <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?>  <a href="#"><?php echo "Events Dragon"; ?></a>.</strong> All rights
    reserved.
    <div class="col-md-4">
    <a href="<?php echo site_url('client/customer/login'); ?>" class="btn btn-default btn-flat sign-out">Sign out</a>
  </div>
  </footer>
</div>

<!-- jQuery 3 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/raphael/raphael.min.js"></script>
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
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/dashboard.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/ckeditor/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<script src="<?php echo base_url('assets/common/'); ?>jquery.simplePagination.js"></script>
<script src="<?php echo base_url('assets/common/'); ?>ar_pagination.js"></script>
<script src="<?php echo base_url('assets/common/'); ?>ar_search.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/custom.js"></script>
<!-- extra -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  } );


  </script>

  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();  
  $('#modalForm').modal('show');
  $('#loc').hide(); 




if($('#flexible:checked').length){
        $('#datepicker1').attr('readonly',true); // On Load, should it be read only?
    }

    $('#flexible').change(function(){
        if($('#flexible:checked').length){
            $('#datepicker1').attr('readonly',false);
            $('#datepicker2').attr('readonly',false); //If checked - Read only
        }else{
            $('#datepicker1').attr('readonly',true);
            $('#datepicker2').attr('readonly',true);//Not Checked - Normal
        }
    });



   

    $('#novenue').change(function(){
        if($('#novenue:checked').length){
            $('#loc').show();
            ; //If checked - Read only
        }else{
           $('#loc').hide();    
        }
    });

if($('#novenue1:checked').length){
         $('#loc1').show(); // On Load, should it be read only?
    }
    else
    {
      $('#loc1').hide();
    }

     $('#novenue1').change(function(){
        if($('#novenue1:checked').length){
            $('#loc1').show();
            ; //If checked - Read only
        }else{
           $('#loc1').hide();    
        }
    });

});


 $('#new_event').click(function()
 {
  $('#modalForm1').modal('show');
   $('#modalForm').modal('hide');



});
  

</script>

<script type="text/javascript">
$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

        if(counter>10){

            alert("Only 10 textboxes allow");

            return false;

        }  

        var newTextBoxDiv = $(document.createElement('div'))

             .attr("id", 'TextBoxDiv' + counter);

        newTextBoxDiv.after().html(' <div class="row"> <div class="col-xs-6">'+' <div class="form-group">'+'<label>Supplier Category '+'</label>'+'<select name="category'+counter+'" class="form-control select2" required>'+
                      '<option value="">Select</option> <?php foreach($category as $cat) { ?> <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->category; ?></option>'                       + '<?php } ?>'+
                    '</select>'+
                      '<span class="input-error"><?php echo form_error('category', '<div class="error">', '</div>'); ?></span>'+
                    '</div>'+

                  '</div>'+
                  '<div class="col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Category Budget</label>'+
                      '<input type="text" name="budget'+counter+'" id="en_title" class="form-control" placeholder="Enter Your Budget" value="" required>'+
                     
                      '<span class="input-error"><?php echo form_error('budget', '<div class="error">', '</div>'); ?></span>'+
                    '</div>'+
                  '</div>'+
                 '</div>'+
                 '<div class="row">'+
                  '<div class="col-xs-6">'+

                    '<div class="form-group">'+
                      '<label>Category Development </label>'+
                      
                      '<input type="text" name="development'+counter+'"  class="form-control" placeholder="Enter Category Development" value="" required>'+
                      '<span class="input-error"><?php echo form_error('development', '<div class="error">','<div class="error">', '</div>'); ?></span>'+
                    '</div>'+

                  '</div>'+
                  
                  '</div>');

        newTextBoxDiv.appendTo("#TextBoxesGroup");

        counter++;

     });

 

     $("#removeButton").click(function () {

        if(counter==1){

          alert("No more textbox to remove");

          return false;

       }  

        counter--;
        $("#TextBoxDiv" + counter).remove();

     });

              

     $("#getButtonValue").click(function () {

        var msg = '';

        for(i=1; i<counter; i++){

          msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();

        }

          alert(msg);

     });

  });

</script>


</body>
</html>
