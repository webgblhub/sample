$(document).ready(function(){
    
    $("a.clone").click(function() {
      $(".duplicate:last").clone(true).insertAfter('.duplicate:last').find("input").val("");
      return false;
    });

    $("a.delete").click(function() {
     if (confirm('Are you sure want to delete this?')) {
        return true;
     }
     else{
        return false;
     }
    });

    $("a.imagery-item-dlt").click(function() {
     if (confirm('Are you sure want to delete this?')) {
        var its = $(this);
        var url = its.data('url');
        var item = its.data('item');

        $.post(url, { item: item })
        .done(function(data){
            if(data)
            {
                its.closest(".imagery-item").fadeToggle();
            }
        });
     }
     else{
        return false;
     }
    });

    $("#gallerytype").bind('change', function(){
        var type = $(this).val();
        if(type == "Photos")
        {
            $(".image-block").show();
            $(".video-block").hide();
        }
        else if(type == "Videos")
        {
            $(".image-block").hide();
            $(".video-block").show();
        }
        else
        {
            $(".image-block").hide();
            $(".video-block").hide();
        }   
    });

    $('#gallerytype').trigger('change');
    

    $("#en_title, #title, #en_product_name, #en_category_title, #sub_category_title").on("keyup change", function(){
        var id = $("#id").val();
        var title = $(this).val();
        if(!id)
        {
            title = title.replace(/\s+/g, '-').toLowerCase();
            title = title.replace(/[^a-zA-Z0-9 ]/g, "-");
            $("#slug").val(title);
        }        
    });

    $("#category").bind('change', function(){
        var category_id = $(this).val();
        var url = $(this).data('url');

        $.post(url, { category_id: category_id })
        .done(function(data){
            $("#sub_category").html(data);
        });
    });

    $("#product_id").bind('change', function(){
        var product_id = $(this).val();
        var url = $("#siteurl").val();
        
        $.post(url+'admin/get_product_price/'+product_id, { })
        .done(function(data){
            $("#price").val(data);
        });
    });

    $(".address").bind('change keyup', function(){
        var address = $(this).val();
        var type = $(this).data('type');
        var id = $(this).closest("div").find(".address_id").val();
        var url = $("#siteurl").val();

        if(id)
        {
            $.post(url+'admin/change_address/', { id: id, address: address, type: type})
            .done(function(data){
                
            });
        }        
    });

    $(".a_phone").bind('change keyup', function(){
        var phone = $(this).val();
        var type = $(this).data('type');
        var id = $(this).data('aid');
        var url = $("#siteurl").val();

        if(id)
        {
            $.post(url+'admin/change_address_phone/', { id: id, phone: phone, type: type})
            .done(function(data){
                
            });
        }        
    });

    $(".imagery-item").hover(function(){
        $(this).find(".image-dlt, .image-copy").fadeToggle();
    });

    $("#photo").click(function (){
            var its = $(this);
            var photo = its.val();
            var multiple = its.data('multiple');
            var base_url = $(".imagery_url").val();

            $('.bg-imagery').removeClass("border");
            var photos = photo.split(',');
            
            $.each(photos, function(key, value){
                if(value){ $("[title='"+value+"']").find('.bg-imagery').toggleClass("border"); }
            });        

            if(multiple)
            {
                var item = photos;
                $(".imagery-item").click(function() {
                    var title = $(this).attr('title');

                    $(".imagery-preview img").attr('src', base_url+title);
                    $(".imagery-text h5 strong").text(title);
                    $(".imagery-link").val(base_url+title);
                    
                    if($.inArray(title, item) != -1)
                    {
                        item.splice($.inArray(title, item),1);
                    }
                    else{
                        $(this).find('.bg-imagery').removeClass("border");
                       item.push(title); 
                    }             
                    
                    $(this).find('.bg-imagery').toggleClass("border");

                    if(item[0] == ""){ item.shift(); }

                    $(".add-image").click(function(){
                        item.toString();
                        console.log(item);
                        its.val(item);
                        $(".close-modal").trigger("click");
                    });
                    
                });
            }
            else
            {
               $(".imagery-item").click(function() {                
                    var item = $(this).attr('title');
                    $(".imagery-preview img").attr('src', base_url+item);
                    $(".imagery-text h5 strong").text(item);
                    $(".imagery-link").val(base_url+item);
                    var img = $(".imagery-preview img");
                    // console.log(
                    //     img.prop("naturalWidth") +'\n'+  // Width  (Natural)
                    //     img.prop("naturalHeight") +'\n'+ // Height (Natural)
                    //     img.prop("width") +'\n'+         // Width  (Rendered)
                    //     img.prop("height") +'\n'+        // Height (Rendered)
                    //     img.prop("x") +'\n'+             // X offset
                    //     img.prop("y")                    // Y offset ... 
                    // );
                    $(".imagery-size").val(img.prop("naturalWidth")+" x "+img.prop("naturalHeight"));

                    $('.bg-imagery').removeClass("border");
                    $(this).find('.bg-imagery').toggleClass("border");
                    $(".add-image").click(function(){
                        its.val(item);
                        $(".close-modal").trigger("click");
                    });
               });
            }        
        });

     $("#photos").click(function (){
            var its = $(this);
            var photo = its.val();
            var multiple = its.data('multiple');
            var base_url = $(".imagery_url").val();

            $('.bg-imagery').removeClass("border");
            var photos = photo.split(',');
            
            $.each(photos, function(key, value){
                if(value){ $("[title='"+value+"']").find('.bg-imagery').toggleClass("border"); }
            });        

            if(multiple)
            {
                var item = photos;
                $(".imagery-item").click(function() {
                    var title = $(this).attr('title');

                    $(".imagery-preview img").attr('src', base_url+title);
                    $(".imagery-text h5 strong").text(title);
                    $(".imagery-link").val(base_url+title);
                    
                    if($.inArray(title, item) != -1)
                    {
                        item.splice($.inArray(title, item),1);
                    }
                    else{
                        $(this).find('.bg-imagery').removeClass("border");
                       item.push(title); 
                    }             
                    
                    $(this).find('.bg-imagery').toggleClass("border");

                    if(item[0] == ""){ item.shift(); }

                    $(".add-image").click(function(){
                        item.toString();
                        console.log(item);
                        its.val(item);
                        $(".close-modal").trigger("click");
                    });
                    
                });
            }
            else
            {
               $(".imagery-item").click(function() {                
                    var item = $(this).attr('title');
                    $(".imagery-preview img").attr('src', base_url+item);
                    $(".imagery-text h5 strong").text(item);
                    $(".imagery-link").val(base_url+item);

                    $('.bg-imagery').removeClass("border");
                    $(this).find('.bg-imagery').toggleClass("border");
                    $(".add-image").click(function(){
                        its.val(item);
                        $(".close-modal").trigger("click");
                    });
               });
            }        
        });

    $(".imagery-item-copy").click(function(){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).data('url')).select();
        document.execCommand("copy");
        $temp.remove();
        $(this).html('<i class="fa fa-check"></i> Copied!');
    });

    $('#en_title').on('keyup',function(){
      $('#eng_title').text(this.value.length+"/70");
    });

    $('#ml_title').on('keyup',function(){
      $('#mal_title').text(this.value.length+"/70");
    });

});

// $(".check_box").on("click",function()
// {
//      if($(".check_box:checked").length>0)
//      {
//         $('#delete_mail').prop('disabled',true);
//      }
//      else
//      {
//         $('#delete_mail').prop('disabled',false);
//      }
// });