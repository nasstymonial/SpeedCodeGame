(function($){

    $('.addPanier').click(function(event){
        event.preventDefault(); 
        $.get($(this).attr('href'),{}, function(data){
            if(data.error){
                alert(data.message); 
            }else{
                if(confirm(data.message + '. Voulez vous consulter votre panier ?')){
                    location.href = 'pages/panier.php'; 
                } else{
                    $('#total').empty().append(data.total); 
                    $('#count').empty().append(data.count);
                }

            }
        },'json');
        return false;
    }); 
})(jQuery); 

$(document).ready(function(){       
    var scroll_start = 0;
    var startchange = $('#startchange');
    var offset = startchange.offset();
     if (startchange.length){
    $(document).scroll(function() { 
       scroll_start = $(this).scrollTop();
       if(scroll_start > offset.top) {
           $(".navbar").css('background-color', '#000');
        } else {
           $('.navbar').css('background-color', 'transparent');
        }
    });
     }
 });