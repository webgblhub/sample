      <?php
$id=base64_decode($this->uri->segment(4));

    $data['sup']=$this->Edit_Model->selectSupplierid($id);
    $store_id= $data['sup'][0]->id;
 if(!empty($categoryname[0]->company_name)){
                $companyName = '-'.$categoryname[0]->company_name;
              }else{
                $companyName = '';
              }
    ?>

    <div class="promo-header-section">
            <div class="container promo-cont-section">
              <div class="row" id="cont-head-text-wrap-section">
                <div class="col-6">
                  <div class="text-wrap">
                    <label>Edit Gallery</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-wrap2">
                    <label><?php echo $categoryname[0]->category.$companyName; ?></label>
                  </div>
                </div>
              </div>
            </div>
         </div>
    <section>
      
             <?php if(!empty($this->session->flashdata('success')))
      {?>
       <div class="row success_div"><span class="input-error successfn"
                                        style=""><?php echo $this->session->flashdata('success'); ?></span>
                                </div><br><br>
                              <?php } ?>
          <div class="container container-contents-wrap">

            <div class="header-sec">
              <h5>PHOTO GALLERY</h5>
            </div>  
              
            <div class="container gallery-button-container footer-top-button-container">
              <div class="gallery-top-btn-division">
          <!-- Button trigger modal -->
          <button type="button" class="add-pic-btn-gallery" data-toggle="modal" data-target="#exampleModalCenter">
            Add Photo <i class="fas fa-images"></i>
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form enctype="multipart/form-data" method="post" action="<?php echo site_url('supplier/edit/edit_photo'); ?>">
                <input type="hidden" name="supplier_id" id="en_title" value=<?php echo $data['sup'][0]->supplier_id;?> >
                <input type="hidden" name="category_id" id="en_title" value=<?php echo $data['sup'][0]->category_id;?> >
                <input type="hidden" name="store_id" id="en_title"  value=<?php echo $data['sup'][0]->id;?> >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="row image-gallery-row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>Title</label><br>
                    <input type="text" name="title" placeholder="Title" class="title-inp input-root">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label>Upload Photo</label>
                    <div class="modal-container-wrap">
                      <input type="file" name="photo" id="personal" placeholder="Title" class="upload-ph-in input-root" multiple>
                      <!-- <span class="addmore" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    </div>

                  </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="footer-add-pic-btn" name="submit" >Upload</button>
                </div>
              </div>
            </div>
          </form>
          </div>

         
          </div>
            </div>



            <?php if(!empty($get_photo_data)){?>

             
             <div class="col-xs-12 col-sm-12col-md-12 col-lg-10 image-grid-column">
                   <div class="container gallery-container-image">
                    <ul class="img-grid imageListId" id="reorder-gallery">
                       <?php $i=1;
                       foreach($get_photo_data as $photo)  {?>
                      <li class = "imageNo2 listitemClass"  id="<?php echo $photo->id ; ?>"> 
                        <a data-fancybox="gallery" href="<?php echo base_url('uploads/'.$photo->photos) ?>"><img src="<?php echo base_url('uploads/'.$photo->photos) ?>" alt=""></a>   
                        <a href='<?php echo base_url(); ?>supplier/edit/delete_photo/<?php echo base64_encode($photo->id); ?>?table=<?php echo base64_encode('supplier_photos'); ?>' onclick="return deleletconfig()"><span class="delete" title="Delete Image"><i class="fas fa-trash"></i></span>  </a>    
                      </li>
                       <?php $i++; } ?>

                     
                    </ul>

            </div>        
          </div>
            <?php } ?>    
          </div>
            
        </section>

         <section>
     

          <div class="container container-contents-wrap">
            <div class="header-sec">
              <h5>VIDEO GALLERY</h5>
            </div>   
            <div class="container gallery-button-container footer-top-button-container">
              <div class="gallery-top-btn-division">
          <!-- Button trigger modal -->
          <button type="button" class="add-pic-btn-gallery" data-toggle="modal" data-target="#exampleModalCentervideo">
            Add Video <i class="fas fa-images"></i>
          </button>
         
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCentervideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form enctype="multipart/form-data" method="post" action="<?php echo site_url('supplier/edit/edit_video'); ?>">

               <input type="hidden" name="supplier_id" id="en_title" class="form-control" value=<?php echo $data['sup'][0]->supplier_id;?> >
                <input type="hidden" name="category_id" id="en_title" class="form-control"value=<?php echo $data['sup'][0]->category_id;?> >
                <input type="hidden" name="store_id" id="en_title" class="form-control"  value=<?php echo $data['sup'][0]->id;?> >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="row image-gallery-row elements" id="divvideo_1">
                  
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label>Upload Video</label>
                    <div class="modal-container-wrap">
                      <input type="url" name="video1" placeholder="Type Youtube Link" class="upload-ph-in input-root" multiple id="txtvideo_1">
                      <!-- <span class="addmorevideo" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                    </div>

                  </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="footer-add-pic-btn" name="fileSubmit" >Upload</button>
                </div>
              </div>
            </div>
          </form>
          </div>

         
          </div>
            </div>



            <?php if(!empty($get_video_data)){?>

            <div class="row image-gallery-container-row">
              <div class="col-xs-12 col-sm-12col-md-12 col-lg-10">
                <div class = "imageListId"> 
                   <?php $i=1;foreach($get_video_data as $video) : 
                      
                      $t=explode('=',$video->video1);
                      $videocode=$t[1];
                      $word="https://www.youtube.com/";

                      if(strpos($video->video1, $word) !==false)
                      {
                       

                         $t=explode('=',$video->video1);
                             if(!empty($t[1]))
                             {

                              $videocode=$t[1];
                              $poster="http://img.youtube.com/vi/".$videocode."/sddefault.jpg";
                              
                            }
                              else
                            {
                              
                              $poster="https://img.youtube.com/vi/BS8dtfFlS3I&feature/sddefault.jpg";
                            }

                          }
                          else
                          {

                             $poster="https://img.youtube.com/vi/BS8dtfFlS3I&feature/sddefault.jpg";
                          }
                      ?>

                  <div class = "imageNo<?php echo $i; ?> listitemClass"> 
                
                         <a data-fancybox="gallery" href="<?php echo $video->video1; ?>"><span class="play-btn"></span>
                        <video  controls="controls" poster="<?php echo $poster; ?>" width="250" height="150" > <source src="<?php echo $video->video1; ?>#t=1" type="video/mp4"> </video></a>  
                         <span class="delete" title="Delete Image"> 
                          <a  href='<?php echo base_url(); ?>supplier/edit/delete/<?php echo base64_encode($video->id); ?>?table=<?php echo base64_encode('supplier_videos'); ?>' onclick="return deleletconfig()">
                            <i class="fas fa-trash"></i></a></span>      
                  </div> 
                    



                   <?php $i++;endforeach; ?>
                   <input type="hidden" name="ivalues" value="<?php echo $i;?>"> 
              </div> 
              </div>
            </div>
            <?php } ?>    
          </div>
            
        </section>
        
<!-- <script src="<?php echo base_url(); ?>assets/supplier/lib/js/jquery.min.js"></script>
        <script>
           $(".addmore").click(function(){
        var html ='<div class="row image-gallery-row"><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input type="text" name="title[]" placeholder="Title" class="title-inp input-root"></div><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><div class="modal-container-wrap"><input type="file" placeholder="Title" name="files[]" id="personal" class="upload-ph-in input-root" multiple><span class="addmore" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="remove" title="remove"><i class="fas fa-minus-circle"></i></span></div></div></div>';
        $(".modal-body").append(html);
      });
        </script> -->