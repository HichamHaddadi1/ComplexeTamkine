    function deleteItem(e, deleteUrl) {
       let id = e.getAttribute('data-id');
       var token = $("meta[name='csrf-token']").attr("content");
       console.log(deleteUrl+id);

       const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
              buttonsStyling: false
       });
              $.ajaxSetup({
              headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
              swalWithBootstrapButtons
                .fire({
                     title: 'Tu es sure ?',
                     text: "Tu ne peux pas récupérer l'enregistrement après la suppression",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Oui, Supprimer',
                     cancelButtonText: 'Non, Annuler',
                     reverseButtons: false
                })

                .then((willDelete) => {
                     if (willDelete.value == true) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl + id,
                            data: {
                            "_token": token
                        },

                        success: function (data) {
                        console.log('Succeess');
                        swalWithBootstrapButtons.fire(
                            'Supprimé!',
                            'Le fichier est bien supprimé',
                            "success"
                        );

                        console.log(data);
                        location.reload(true);
                        // get_company_data();
                        // $("#" + id + "").remove();  you can add name div to remove }
                    },
                });
            }

                    if(willDelete.dismiss == 'cancel'){
                            Swal.fire({
                                icon: 'error', title: 'Oops...', text: 'Queque chose fausse ici!', footer: 'Essayer encore'
                            })
                     }
                     });
};

//la sup de le pro
$(document).on('click','#btn-sup-pro', function() {
    var chemin =$(this).attr( "data-chemin" );
    location.replace(chemin);
});

//la sup de d'enre
$(document).on('click','#btn-sup-enr', function() {
    var chemin =$(this).attr( "data-chemin" );
    location.replace(chemin);
    //alert("Bonjour !"+chemin);
});

$(document).on('click','#btn-filter-edition', function() {
    $( "#frm-filter-edition" ).toggle();
});
