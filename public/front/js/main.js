!(function ($){
    "use strict";

// Clients carousel (uses the Owl Carousel library)
    $('.clients-carousel').owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            },
            900: {
                items: 6
            }
        }
    });
    $('#agree-term').change(function(event){
        if ($(this).is(':checked')) {
            $(this).closest('form').find('button[type="submit"]').removeAttr('disabled');
        }else{
            $(this).closest('form').find('button[type="submit"]').attr('disabled','disabled');
        }
    });
    // $('#aboutVideo .close').on('click',function(){
    //     var reSrc = $('.aboutPlayer').attr("src");
    //     $('.aboutPlayer').attr("src",reSrc)
    // })

    $(document).on('click','.btn-par', function() {
          var type=$(this).attr('type');
        
          $('.btn-par').removeClass("btn-active shadow");
          $(this).addClass("btn-active shadow");
      
          if(type=="*"){
            $("#tous-par").css("display",'block');
            $("#media").css("display",'none');
            $("#partenaire-academique").css("display",'none');
            $("#ofi").css("display",'none');
          }
           
          else if(type=="media"){
            $("#media").css("display",'block');
            $("#partenaire-academique").css("display",'none');
            $("#tous-par").css("display",'none');
            $("#ofi").css("display",'none');
          }
      
          else if(type=="partenaire-academique"){
            $("#partenaire-academique").css("display",'block');
            $("#media").css("display",'none');
            $("#tous-par").css("display",'none');
            $("#ofi").css("display",'none');
          }
      
          else if(type=="organisme-fondation-instituts"){
            $("#ofi").css("display",'block');
            $("#partenaire-academique").css("display",'none');
            $("#media").css("display",'none');
            $("#tous-par").css("display",'none');
          }
            
      });

      $(document).on('click','.mlctr-close', function() {
          $(".mlctr-underlayer").css("display",'none');
      });

})(jQuery);
