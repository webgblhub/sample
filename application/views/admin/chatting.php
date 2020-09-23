 <section class="final-container-section">



          <div class="container">
            <div class="header-sec">
              <h5><a href="#"><i class="fas fa-comments"></i></a> Chat Messages</h5>
            </div>  
            <div class="chat-container-sec">

              <?php 
                 if(!empty($msg))
                 {
                  foreach($msg as $message)
                  {
                     $old_date = $message->date;              
                     $old_date_timestamp = strtotime($old_date);
                     $new_date = date('h:i A', $old_date_timestamp);


                  if($userid==$message->from_id)
                  {
                ?>  


                 <div class="chats-right">
                  <?php if(!empty($message->document))
                          {
                              $filename= "./assets/chatimage/".$message->document;
                               $filesizes=filesize($filename);

                               $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                              $power = $filesizes > 0 ? floor(log($filesizes, 1024)) : 0;
                              $size =number_format($filesizes / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                              $fname=str_split($message->document,5);
             
              
                            $tt=explode(".",$message->document);

                            if($tt[1]=='jpeg' || $tt[1]=='jpg' || $tt[1]=='png' || $tt[1]=='gif'){

                ?>
                       <div class="img-msg">
                          <div class="img-send">
                            <a href="<?php echo base_url() ?>supplier/edit/download/chat/<?php echo $message->id; ?>" >
                              <img src="<?php echo base_url() ?>assets/chatimage/<?php echo $message->document; ?>"> </a>
                            <span class="time"><?php echo $new_date;?></span><span class="double-check <?php if($message->msg_read_status=='1') { ?>message_read <?php } ?>"><i class="fas fa-check-double"></i></span>
                            <div class="right-btm-arrow"></div>
                          </div>
                        </div>
                  <?php }
                        
                      else
                      {
                  ?>

                    <div class="right-file-chat">
                  <div class="chat-wrap">
                    <div class="chat-file">
                     <a href="<?php echo base_url() ?>supplier/edit/download/chat/<?php echo $message->id; ?>" > <span class="file-chat-icon"><i class="fas fa-file"></i></span><span><?php echo $fname[0]; ?>...<?php echo $tt[1]; ?></span></a>
                      <span class="file-double-check <?php if($message->msg_read_status=='1') { ?>message_read <?php } ?>"><i class="fas fa-check-double"></i></span>
                     </div>
                     <span class="file-size"><?php echo strtoupper($tt[1]); ?> * <?php echo $size; ?></span>
                     <span class="file-time"><?php echo $new_date;?></span>
                         <div class="right-btm-arrow"></div>     
                  </div>
                </div>



                    
                    <?php
                        }
                       
                        }else
                        {

                    ?>
                            <div class="img-msg">
                            <div class="right-side-chat-sec">
                          <span><?php echo $message->message; ?><span class="time"><?php echo $new_date; ?></span><span class="double-check <?php if($message->msg_read_status=='1') { ?>message_read <?php } ?>"><i class="fas fa-check-double"></i></span></span>
                          <div class="right-btm-arrow"></div>
                        </div>
                      </div>
                      <?php }  ?>

            </div>



          <?php 
              }else{ ?>

                  <div class="chats-left">


                    <?php if(!empty($message->document))
                          {

                              $filename= "./assets/chatimage/".$message->document;
                               $filesizes=filesize($filename);

                               $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                              $power = $filesizes > 0 ? floor(log($filesizes, 1024)) : 0;
                              $size =number_format($filesizes / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                              $fname=str_split($message->document,5);

                            $tt=explode(".",$message->document);

                        if($tt[1]=='jpeg' || $tt[1]=='jpg' || $tt[1]=='png' || $tt[1]=='gif'){

                      ?> 

                           <div class="left-img-msg">
                            <div class="left-img-send">
                              <a href="<?php echo base_url() ?>supplier/edit/download/chat/<?php echo $message->id; ?>" >
                                        <img src="<?php echo base_url() ?>assets/chatimage/<?php echo $message->document; ?>"> </a>
                                      <span class="time"><?php echo $new_date;?></span> 
                              <div class="btm-arrow"></div>
                            </div>
                          </div>

                  <?php } else {  ?>

                 



                              <div class="left-file-chat">
                              <div class="left-chat-wrap">
                                <div class="left-chat-file">
                                  <a href="<?php echo base_url() ?>supplier/edit/download/chat/<?php echo $message->id; ?>" > <span class="file-chat-icon"><i class="fas fa-file"></i></span><span><?php echo $fname[0]; ?>...<?php echo $tt[1]; ?></span></a>
                                 </div>
                                 <span class="file-size"><?php echo strtoupper($tt[1]); ?> * <?php echo $size; ?></span>
                                  <span class="file-time"><?php echo $new_date;?></span>
                                 
                                 <div class="btm-arrow"></div>   
                              </div>
                            </div>
                    
                  <?php } ?>

              <?php }else{ ?>


                
                <div class="left-side-chat">
                  <span><?php echo $message->message; ?></span><span class="time left_msg_time"><?php echo $new_date;?></span>
                  <div class="btm-arrow"></div>
                </div>


            <?php   } ?>
              </div>
               

              

            <?php }} }?>


           
             
          </div>



</div>
</section>
<script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
  $(document).bind("contextmenu",function(e){
  return false;
    });
</script>
<script>
  
  $(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});


</script>