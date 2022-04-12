$(document).ready(function() {
    $(document).on('click','#btn-mpo', function() {
        var id =$(this).attr( "data-id" );
        $.ajax({
               type:'post',
               url:'/profile/'+id,
               data :$("#frmReg").serialize(),
               success:function(data) {
                    $(".succes").css("display","block");
                    //nom
                    $('#nom').text(data.user.nom);
                    //prenom
                    $('#prenom').text(data.user.prenom);
                    //tel
                    $('#tel').text(data.user.tel);
                    //email
                    $('#email').text(data.user.email);
                    //region
                    $('#region').text(data.region.nom);
               }
        });
        console.log($("#frmReg").serialize());
    });

    $(document).on('click','#btn-mso', function() {
        var origin= window.location.origin;
        var id =$(this).attr("data-id");
        var form = $('form')[1];
        var frmData=new FormData(form);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url:'/orientateur/salle/'+id,
            method:"POST",
            data:frmData,
            cache: false,
            contentType: false,
            processData: false,
                success:function(data){
                    $(".succes").css("display","block");
                    // //nom
                    $('#nom').text(data.nom);
                    // //description
                    $('#description').text(data.description);
                    // //Lien video
                    $('#lien_video').html("Lien de vidéo: <a href='"+data.lien_video+"' target='_blank'>"+data.lien_video+"</a>");
                    // //Lien video
                    $('#lien_stand').html("<img src='"+origin+"/dist/files/stands/"+data.stand+"'/>");
                    console.log(data);
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }

           }) //fin ajax

    });


    var url = window.location.href;
    $('.sidebar .mt-2 .nav-item .nav-link').filter(function() {
        return this.href == url;
    }).addClass('active');

    $(document).on('click','.btn-recherche-globale', function() {
        $(".recherche-par-regions").hide();
        $(".recherche-globale").show();
    });

    $(document).on('click','.btn-recherche-par-region', function() {
        $(".recherche-globale").hide();
        $(".recherche-par-regions").show();
    });

});
