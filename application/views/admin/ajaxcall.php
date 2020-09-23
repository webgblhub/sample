<?php
$busyy_id = $this->input->get('busyyid');
// print_r($busyy_id);exit();
?>
<div class="">
  <p>hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
</div>
<div class="">
  <p>hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
</div>
<div class="">
  <p>hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
    hellooooooooooooooooooooooooooooooooooooooooooooooo
</div>
<input type="text" id="busyyid" value="<?php echo $busyy_id ?>">
<input type="button" value="hello" id="hello">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$.ajax({

     type : "POST",
     alert("hellos");
     var busyyid = $('#busyyid').val();
     url  : "<?php echo base_url(); ?>/Dashboard/edit_prominfos"
});
});

// $(document).ready(function(){
//
//   $('#hello').click(function()){
//     alert('test');
//   });
  // $.ajax({url: "demo_test.txt", success: function(result){
  //   $("#div1").html(result);

});


    </script>
