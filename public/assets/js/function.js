 //affiche dynamiquement mes commentaire ajoutés   
    function loadPosts()
    {
        // Permet de récupérer des données au format JSON
        $.getJSON("<?php echo $this->url('detail_article' ) ?>", function(detail){
            console.log(detail); // équivalent à un var_dump()


            var resHTML = '';

            $.each(detail, function(key, value){
                resHTML+= '<div class="list-group-item text-center">';
                //resHTML+= '<p class="list-group-item-text">'+value.id+'</p>';
                resHTML+= '<p class="list-group-item-text">'+value.content+'</p>';
                resHTML+= '<p class="list-group-item-text>'+value.date+'</p>';
                //resHTML+= '<td>'+value.email+'</td>';
                //resHTML+= '<td><a href="#" class="deleteUser" data-id="'+value.id+'">Supprimer</td>';
                resHTML+= '</div>';
            });

            $('#comments').html(resHTML);
        });     
    }


//doc pour l'ajout d'une image via jquery: http://chez-syl.fr/2015/02/jquery-uploader-une-image-en-ajax-avec-un-apercu-avant-envoi/
function SubmitForm()
{
    //gestion de mon formulaire d'envoi
    $('form input[type="submit"]').click(function(e)
    {
        e.preventDefault();

        var myForm = $('form');
        var formdata = (window.FormData) ? new FormData(myForm[0]) : null;
        var data = (formdata !== null) ? formdata : myForm.serialize();
                       
        $.ajax(
        {
            method: myForm.attr('method'),
            url: myForm.attr('action'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            cache: false,
            data: data,
            success: function(res)
            {
                console.log('toto');
                $('#result').html(res);
                //$('#comment').html()
            }
        });
    });           
};


//Fonction pour personnaliser les files input
function fileInput()
{
    $("#picture").fileinput(
    {
        'showUpload':false,
        'showCaption' : false,
        language: "fr"
    });
}

