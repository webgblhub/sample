    $(function() { 
        $(".imageListId").sortable({ 
            update: function(event, ui) { 
                    getIdsOfImages(); 
                } //end update          
        }); 
    }); 
  
    function getIdsOfImages() { 
        var values = []; 
        $('.listitemClass').each(function(index) { 
            values.push($(this).attr("class") 
                        .replace("imageNo", "")); 
        }); 
        $('#outputvalues').val(values); 
    }  
    $(document).ready(function(){
        $(".listitemClass").mouseover(function(){
            (".delete-icon i").css("width","100");
        })
    })

function statCheck($formControl){
    if($formControl.val().length > 0){
        $($formControl).addClass('valid');
    }else{
        $($formControl).removeClass('valid');
    }
}
$(function(){
    $('.inp').on('focusout', function(){
        statCheck($(this));
    })
})