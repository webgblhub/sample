
</main>
<div class="footer-cont">
              <div class="container">
                <div class="row footer-row">
               <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">



                 <div class="social-icons">
                  <?php if($this->uri->segment(2)!="calendar") { ?>
           <a href="#" class="facebk"><i class="fab fa-facebook-f"></i></a>
           <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
           <a href="#" class="ytbe"><i class="fab fa-youtube"></i></a>
           <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
           <a href="#"><img class="tiktok" src="<?php echo base_url(); ?>uploads/logo/tik-tok-icon.png"></a>
           <a href="#" class="pintrest"><i class="fab fa-pinterest"></i></a>
           <a href="#" class="snapchat"><i class="fab fa-snapchat"></i></a>
           <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
         <?php } else{ ?>

           <a href="#" class="facebk"><i class="fa fa-facebook-f"></i></a>
           <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
           <a href="#" class="ytbe"><i class="fa fa-youtube"></i></a>
           <a href="#" class="insta"><i class="fa fa-instagram"></i></a>
           <a href="#"><img class="tiktok" src="<?php echo base_url(); ?>uploads/logo/tik-tok-icon.png"></a>
           <a href="#" class="pintrest"><i class="fa fa-pinterest"></i></a>
           <a href="#" class="snapchat"><i class="fa fa-snapchat"></i></a>
           <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
       <?php   } ?>
          </div>
               
               </div>
               <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="footer-text-cont">
               <span id="footer-text-wrapper"><span id="footer-text"><a href="<?php echo base_url('Embed/terms_conditions') ?>">Terms & Conditions</a></span> | <span id="footer-text"><a href="<?php echo base_url('Embed/privacy_policy') ?>">Privacy Policy</a></span> | Copyright @ 2020, Plan Tech, Inc (PTI) and EventsDragon.Com (EDC).</span>
             </div>	
               </div>
             </div>
             </div>
            </div>
          <!-- footer -->

     


    <!-- Optional JavaScript -->
<?php if($this->uri->segment(3)=="photo"  || $this->uri->segment(3)=="edit_photo_gallery") { ?>

   <script src = "<?php echo base_url(); ?>assets/gallery/js/jquery-1.10.2.js"> </script> 
    <script src = "<?php echo base_url(); ?>assets/gallery/js/jquery-ui.js"> </script> 
    <script src="<?php echo base_url(); ?>assets/gallery/js/bootstrap.min.js"></script>
    <!-- Js -->
     <script src="<?php echo base_url(); ?>assets/gallery/js/script.js"></script>
     <script src="<?php echo base_url(); ?>assets/gallery/js/jquery.fancybox.min.js"></script>

     <script type="text/javascript">
          
          $(document).ready(function(){ 
            
  $("#reorder-gallery").sortable({    
    update: function( event, ui ) {

      // updateOrder();

       var item_order = new Array();
  $('#reorder-gallery li').each(function() {
    item_order.push($(this).attr("id"));
  });
  var order_string = 'order='+item_order;
//alert(order_string);
  $.ajax({
    type: "GET",
    url: "<?php echo base_url(); ?>supplier/supplier/change_order/"+order_string,
    data: order_string,
    cache: false,
    success: function(data){      
    }
  });
    }
  });  
});



        </script>

<?php } else { ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php if($this->uri->segment(2)!="calendar" ) { ?>
    <script src = "<?php echo base_url(); ?>assets/supplier/js/jquery-1.10.2.js"> </script> 
    <script src = "<?php echo base_url(); ?>assets/supplier/js/jquery-ui.js"> </script> 
    <script src="<?php echo base_url(); ?>assets/supplier/js/popper.min.js "></script>
    <script src="<?php echo base_url(); ?>assets/supplier/js/bootstrap.min.js"></script>
    <?php } else { ?>
    
    <?php } ?>
    <!-- Js -->
     <script src="<?php echo base_url(); ?>assets/supplier/js/script.js"></script>
    <!--  <script src="<?php echo base_url(); ?>assets/supplier/js/jquery.fancybox.min.js"></script> -->
    <!-- Js -->
    <!--  <script src="<?php echo base_url(); ?>assets/supplier/js/script.js"></script> -->
      <!--  <script src="<?php echo base_url(); ?>assets/supplier/js/popcorn.js"></script>
       <script src="<?php echo base_url(); ?>assets/supplier/js/popcorn.capture.js"></script> -->
       <?php if($this->uri->segment(2)!="calendar") { ?>
      <script src="<?php echo base_url(); ?>assets/supplier/js/jquery-3.5.1.js "></script>
      
      <?php } ?>
     <script src="<?php echo base_url(); ?>assets/supplier/js/jquery.dataTables.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/supplier/js/dataTables.bootstrap4.min.js"></script>
   <?php } ?>
     <script>
      $(document).ready(function(){
        $('.mydatatable').DataTable();

      });
    </script>
         
<?php
$currentpg= $this->uri->segment(3);

if($currentpg=='view_all_lead' || $currentpg=='view_booked_lead' || $currentpg=='chat_history')
  { ?>
     <script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/supplier/lib/js/config.js"></script>
  <script src="<?php echo base_url(); ?>assets/supplier/lib/js/util.js"></script>
  <script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.emojiarea.js"></script>
  <script src="<?php echo base_url(); ?>assets/supplier/lib/js/emoji-picker.js"></script>

  <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '<?php echo base_url(); ?>'+'uploads/emojy',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>

    <script type="text/javascript">

    $("#upload_link").click(function(){
    $("#chatupload").click();
});

  
  </script>

<?php }
   ?>



     <script>
       $(document).ready(function() {
 

  $('[data-toggle="tooltip"]').tooltip();
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


});
</script>
<script type="text/javascript">

    $("#upload_link").click(function(){
    $("#upload").click();
});

  
  </script>

  <script>
           $('[data-fancybox]').fancybox({
        loop:true,
        buttons: [
            //"zoom",
            //"share",
            //"slideShow",
            //"fullScreen",
            //"download",
            "thumbs",
            "close"
          ],
    })
     </script>



  </body>
</html>