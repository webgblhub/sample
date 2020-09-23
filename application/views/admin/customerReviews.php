<?php if(!empty($categoryname)){
                $companyName = '-'.$categoryname[0]->company_name;
              }else{
                $companyName = '';
        } ?>
 <section>
   <div class="container">
    <div class="header-sec">
              <h5>Reviews</h5>
            </div> 
            </div> 
 </section>                 

<section class="final-container-section reviewstop">
          <div class="container container-contents-wrap">
            <table class="table table-striped table-bordered mydatatable" style="width: 100%">
              <thead>
                <tr>
                  <th style="width:7%;">#</th>
                  <th style="width:35%;">Message</th>
                  <th style="width:20%;">Rating</th>
                  <th style="width:25%;">Date</th>
                </tr>
              </thead>
  
              <tbody>
              <?php if($review){ $j = 1; foreach ($review as $r) {
                $str = wordwrap($r->message, 60, "<br />\n");?>
                   <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $r->message?> </td>
                    <td><?php for($i=1;$i<=$r->rating;$i++)
                                            { ?>
                                            <i class="fa fa-star" aria-hidden="true"></i> <?php  } ?></td>
                      <td><?php 
                                $old_date = $r->date;              
                                $old_date_timestamp = strtotime($old_date);
                                $new_date = date('l, d M, Y ', $old_date_timestamp);


                      echo $new_date ?></td>
                   </tr>
                   <?php } 

                  } 
                   
                    ?>
                   
              </tbody>
            </table>
          </div>
              <!--
            <div class="input-element-wrap">
              <div class="checkbox-wrap">
                <input type="checkbox">
                <label>Use Same Promo Info</label>
               </div>
              -->
          
        </section>