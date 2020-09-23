
function placeholder(){
    document.getElementById("inp-num-attr").placeholder = "Discount Amount";
}
function myFunction() {
    document.getElementById("inp-num-attr").placeholder = "Amount";
  }

      
    $(document).ready(function(){
        $(".listitemClass").mouseover(function(){
            ("#delete-icon i").css("width","100");
        })
    })

    $(document).ready(function(){
     
      $(this).on("click", ".remove", function(){
        $(this).parents('.image-gallery-row').remove();
      })
        });


    $(document).ready(function(){
    $(".dropdown-toggle").click(function(){
      $(".dropdown-menu").toggleClass("intro");
       $(".dropdown-menu").removeClass("dropstyle");
     });
    });

    $(document).ready(function(){
    $(".top-user-icon").click(function(){
       $(".top-user-list-sec-container").toggleClass("user-prof-add")
    })
})
