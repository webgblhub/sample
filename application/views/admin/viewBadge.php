 <section class="final-container-section">

  <div class="row success_div" id="success" style="display: none"><span class="input-error successfn" style="margin-left: -28px !important;">You copied this badge</span></div></br><br/>
          <div class="container">
            <div class="header-sec">
              <h5>Badges</h5>
            </div> 

             <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"> 
              <div class="image-container-badge" style="float: right">
               <?php echo $budge[0]->badge; ?>
             </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="badge-container-sec">
                  <div class="badge-text">
                    <textarea oninput="auto_grow(this)"  id="txt_copy"  rows="5"  oncontextmenu="this.focus();this.select()" readonly><?php echo $budge[0]->badge; ?> </textarea>
                   
                   
                  </div>
             </div>   

             <div class="copy-button-container">
              <div class="copy-button-cont">
                <a href=""><button class="copy-button" onClick="copyText();"><i class="fa fa-copy"></i></button></a> </div>
             </div> 
              </div>
            </div>
          </div>




          
        </section>

        <script type="text/javascript">
    
    function copyText(){
 document.getElementById("txt_copy").select();
 document.execCommand('copy');
// document.getElementById("success").innerHTML = "<div class='row success_div'> <span class='input-error successfn'>You copied this badge</span></div></br></br>";
document.getElementById("success").style.display = "block"; 
 event.preventDefault();  
}
  </script>

  