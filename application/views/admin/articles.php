<section class="final-container-section">
          <div class="container container-contents-wrap">
            <div class="header-sec">
              <h5>Articles</h5>
            </div>  
            <div class="row image-gallery-container-row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                    <div class = "Article-cont-wrapper"> 
                    <?php
                    if(!empty($articles)){//print_r($articles);die;
                        $i =0; ?>

                    <ul>
                       <?php
                          foreach ($articles as $key => $article) {
                            $i++;
                ?>

                   <?php //print_r($article);?>
                    <li class="article-ques" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>"><span class="order-list"><?php echo $i.'.';?></span><a href="#"><?php echo $article->Question ?> <span class="quest-txt">?</span></a>
                        <p id="collapse<?php echo $i; ?>" class="collapse answer" aria-labelledby="headingTwo" data-parent="#accordion"><?php echo $article->Answer; ?></p></li>

                  <?php  } ?>
                    </ul>
                    <?php } ?>
                    
                </div>
            
                </div>    
            </div>
              <!--
            <div class="input-element-wrap">
              <div class="checkbox-wrap">
                <input type="checkbox">
                <label>Use Same Promo Info</label>
               </div>
              -->
          
        </section>